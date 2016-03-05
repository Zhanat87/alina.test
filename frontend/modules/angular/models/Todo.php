<?php
/**
 * Created by PhpStorm.
 * User: zhanat
 * Date: 3/5/16
 * Time: 4:30 PM
 */

namespace frontend\modules\angular\models;

use yii\mongodb\ActiveRecord;

/**
 * Class Todo
 * @package frontend\modules\angular\models
 *
 * @property string $_id
 * @property string $action
 * @property boolean $done
 */
class Todo extends ActiveRecord
{

    public static function collectionName()
    {
        return 'todo';
    }

    public function rules()
    {
        return [
            [['action'], 'required'],
            [['done'], 'boolean'],
            [['done'], 'default', 'value' => false],
        ];
    }

    public function attributes()
    {
        return ['_id', 'action', 'done'];
    }

    public static function getAll()
    {
        return self::find()->asArray()->all();
    }

}