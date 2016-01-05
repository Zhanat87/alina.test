<?php

namespace backend\modules\book\models;

use Yii;
use common\my\yii2\ActiveRecord;
use backend\my\behaviors\ImageBehavior;

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

    public function behaviors()
    {
        return [
            [
                'class' => ImageBehavior::className(),
                'attribute' => 'image',
                'thumbs' => [
                    'thumb' => ['width' => 50, 'height' => 50],
                ],
                'filePath' => '@webroot/images/books/[[pk]].[[extension]]',
                'fileUrl' => '/images/books/[[pk]].[[extension]]',
                'thumbPath' => '@webroot/images/books/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/images/books/[[profile]]_[[pk]].[[extension]]',
            ],
        ];
    }

}