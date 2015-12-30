<?php

namespace backend\modules\book\models;

use common\my\yii2\ActiveRecord;

/**
 * This is the model class for table "author".
 *
 * @property integer $id
 * @property string $name
 * @property string $surname
 *
 * @property Book[] $books
 */
class Author extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
        ];
    }

    /**
     * @return Book[]
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['author_id' => 'id']);
    }

    /**
     * @return array|mixed
     */
    public static function getAllForLists()
    {
        $res = null;
        $rows = self::getCachedKeyValueData(
            self::tableName(),
            ['id', 'name', 'surname'],
            null,
            self::GET_ALL_FOR_LISTS
        );
        if ($rows) {
            foreach ($rows as $id => $row) {
                $res[$id] = $row['name'] . ' ' . $row['surname'];
            }
        }
        return $res;
    }

}