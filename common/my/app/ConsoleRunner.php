<?php

namespace common\my\app;

use Yii;

/**
 * Class ConsoleRunner
 * @package common\my\app
 */
class ConsoleRunner
{

    /*
     * запустить фоновый процесс, выполнить и удалить
     */
    public static function execute($cmd)
    {
        pclose(popen('php ' . Yii::getAlias('@root') . '/yii ' . $cmd . ' /dev/null &', 'r'));
    }

}