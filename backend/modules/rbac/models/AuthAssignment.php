<?php

namespace backend\modules\rbac\models;

use Yii;
use backend\modules\user\models\User;
use common\my\yii2\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property integer $user_id
 * @property string $created_at
 *
 * @property AuthItem $itemName
 */
class AuthAssignment extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
            [['user_id'], 'integer'],
            [['item_name'], 'string', 'max' => 64],
            [['created_at'], 'default', 'value' => new Expression('NOW()')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_name' => 'Роль или разрешение',
            'user_id' => 'Имя Пользователя',
            'created_at' => 'Дата создания',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'item_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}