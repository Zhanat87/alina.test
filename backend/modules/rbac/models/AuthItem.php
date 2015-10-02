<?php

namespace backend\modules\rbac\models;

use Yii;
use common\my\yii2\ActiveRecord;
use yii\rbac\Item;
use backend\modules\user\models\User;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AuthAssignment $authAssignment
 * @property AuthRule $ruleName
 * @property AuthItemChild $authItemChild
 * @property User[] $users
 */
class AuthItem extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            ['name', 'unique', 'targetAttribute' => ['name']],
            [['type'], 'integer'],
            [['description', 'data'], 'string'],
            [['data'], 'default', 'value' => null],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Роль или разрешение',
            'type' => 'Тип',
            'description' => 'Описание',
            'rule_name' => 'Имя правила',
            'data' => 'Данные для правила',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignment()
    {
        return $this->hasOne(AuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(AuthRule::className(), ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChild()
    {
        return $this->hasOne(AuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['name' => 'role']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->type == 1) {
                Yii::$app->cache->delete(self::tableName() . 'getRoles');
            }
            if ($this->rule_name === '') {
                $this->rule_name = null;
            }
            /**
             * надо сериализовать данные для правила
             */
            if ($this->data) {
                $this->data = serialize($this->data);
            }
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if ($this->type == Item::TYPE_ROLE) {
                Yii::$app->cache->delete(self::tableName() . 'getRoles');
            }
            return true;
        } else {
            return false;
        }
    }

    public static function getAllForLists()
    {
        return self::getCachedKeyValueData(
            self::tableName(),
            ['name'],
            null,
            'getAllForLists'
        );
    }

    public static function getAllForLists2()
    {
        return self::getCachedKeyValueData(
            self::tableName(),
            ['name', 'description'],
            null,
            'getAllForLists2'
        );
    }

    public static function getRoles()
    {
        return self::getCachedKeyValueData(
            self::tableName(),
            ['name'],
            ['type' => Item::TYPE_ROLE],
            'getRoles'
        );
    }

    public function afterFind()
    {
        if ($this->data) {
            $this->data = unserialize($this->data);
        }
        return parent::afterFind();
    }

    public function getTypes($type = null)
    {
        $types = [
            Item::TYPE_ROLE => 'Role (роль)',
            Item::TYPE_PERMISSION => 'Permission (разрешение)',
        ];
        return $type !== null ? $types[$type] : $types;
    }

    public function getTypesForGridFilter()
    {
        return Yii::$app->current->defaultValue($this->getTypes());
    }

}