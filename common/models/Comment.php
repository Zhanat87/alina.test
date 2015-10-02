<?php

namespace common\models;

use Yii;
use backend\modules\news\models\News;

/**
 * This is the model class for table "comment".
 *
 * @property integer $id
 * @property string $email
 * @property string $text
 * @property integer $news_id
 *
 * @property News $news
 */
class Comment extends \common\my\yii2\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'text'], 'required'],
            [['news_id'], 'integer'],
            [['email', 'text'], 'string', 'max' => 255],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'text' => 'Text',
            'news_id' => 'News ID',
        ];
    }

    /**
     * @return News
     */
    public function getNews()
    {
        return $this->hasOne(News::className(), ['id' => 'news_id']);
    }

}