<?php

namespace common\my\traits;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * Class GetValue
 * @package common\my\traits
 */
trait GetValue
{

    /**
     * @param $key
     * @return mixed
     */
    public static function getValue($key)
    {
        if (($data = Yii::$app->cache->get(self::tableName())) === false) {
            $data = (new Query)
                ->from(self::tableName())
                ->one();
            Yii::$app->cache->set(self::tableName(), $data, Yii::$app->params['duration']['month']);
        }
        return ArrayHelper::getValue($data, $key);
    }

}