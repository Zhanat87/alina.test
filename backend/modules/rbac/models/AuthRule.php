<?php

namespace backend\modules\rbac\models;

use Yii;
use common\my\yii2\ActiveRecord;

/**
 * This is the model class for table "auth_rule".
 *
 * @property string $name
 * @property string $data
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AuthItem[] $authItems
 */
class AuthRule extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'data'], 'required'],
            [['name'], 'unique', 'targetAttribute' => ['name']],
            [['data'], 'string'],
            [['name'], 'string', 'max' => 64],
            [['created_at', 'updated_at'], 'safe'],
            ['data', 'issetRule'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Правило',
            'data' => 'Данные (Имя класса правила)',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItems()
    {
        return $this->hasMany(AuthItem::className(), ['rule_name' => 'name']);
    }

    public function issetRule($attribute, $params)
    {
        if (!file_exists(Yii::$app->basePath . DIRECTORY_SEPARATOR . 'modules' .
                DIRECTORY_SEPARATOR . 'rbac' . DIRECTORY_SEPARATOR . 'rules' .
                DIRECTORY_SEPARATOR . $this->$attribute . '.php')) {
            $this->addError($attribute, 'Не существует такого правила');
        }
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $ruleClass = "backend\\modules\\rbac\\rules\\{$this->data}";
            $this->data = serialize(new $ruleClass);
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
        $start = strpos($this->data, '\\rules\\') + 7;
        $end = strpos($this->data, '"', $start) - $start;
        $this->data = substr($this->data, $start, $end);
        return parent::afterFind();
    }

    public static function getAllForLists()
    {
        return self::getCachedKeyValueData(
            self::tableName(),
            ['name'],
            null,
            'getAllForLists',
            ['' => 'Выберите правило']
        );
    }

}