<?php

namespace backend\modules\book\models;

use Yii;
use common\my\yii2\ActiveRecord;
use yii\imagine\Image;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property integer $author_id
 * @property string $name
 * @property string $image
 * @property string $publish_date
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property Author $author
 */
class Book extends ActiveRecord
{

    protected $dateTimeFields = [
        self::DATE_KEY => [
            'publish_date',
        ],
    ];

    const DIR = 'images/books/';
    const THUMB_PREFIX = 'thumb-';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'name', 'publish_date'], 'required'],
            [['created_at', 'updated_at', 'image'], 'safe'],
            [['author_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'image'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Автор',
            'name' => 'Название',
            'image' => 'Изображение',
            'publish_date' => 'Дата публикации',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
            'status' => 'Опубликован',
        ];
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->uploadImage();
            return true;
        } else {
            return false;
        }
    }

    private function uploadImage()
    {
        if (isset($_FILES['Book']) && is_array($_FILES['Book'])) {
            $imageTypes = [
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
            ];
            if (isset($imageTypes[$_FILES['Book']['type']['image']])) {
                $imageName = Yii::$app->security->generateRandomString() . '.' .
                    $imageTypes[$_FILES['Book']['type']['image']];
                if (move_uploaded_file($_FILES['Book']['tmp_name']['image'],
                    Yii::getAlias('@backend/web/') . self::DIR . $imageName)) {
                    $this->image = $imageName;
                    Image::thumbnail($this->getImagePath(), 50, 50)
                        ->save($this->getThumbPath(), ['quality' => 80]);
                }
            } else {
                $this->addError('image', 'Невалидное изображение');
            }
        }
    }

    public function getImagePath()
    {
        return $this->image ? Yii::getAlias('@backend/web/') . self::DIR . $this->image : null;
    }

    public function getThumbPath()
    {
        return $this->image ? Yii::getAlias('@backend/web/') . self::DIR . self::THUMB_PREFIX . $this->image : null;
    }

    public function getImageUrl()
    {
        return $this->image ? Yii::$app->params['backendDomainName'] . self::DIR . $this->image : null;
    }

    public function getThumbUrl()
    {
        return $this->image ? Yii::$app->params['backendDomainName'] . self::DIR .
            self::THUMB_PREFIX . $this->image : null;
    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $this->deleteImage();
            return true;
        } else {
            return false;
        }
    }

    private function deleteImage()
    {
        if ($this->image) {
            unlink($this->getImagePath());
            unlink($this->getThumbPath());
        }
    }

}