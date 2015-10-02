<?php

namespace common\my\app;

use Yii;

/**
 * Class Service
 * @package common\my\app
 */
class Service
{

    public static function run($class, $params)
    {
        $object = new $class;
        $object->setAttributes($params);
        if ($object->validate()) {
            return $object->execute();
        }
        return Yii::$app->current->getResponseWithErrors($object->getErrors());
    }

} 