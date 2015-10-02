<?php

namespace common\my\helpers;

use Yii;
use yii\base\Exception as YiiException;
use Exception as PhpException;

/**
 * Class Exception
 * @package common\my\helpers
 *
 * @link http://www.yiiframework.com/doc-2.0/guide-runtime-handling-errors.html
 * @link http://www.yiiframework.com/doc-2.0/yii-log-filetarget.html
 */
class Exception
{

    /**
     * @param $e
     * @param string $action
     * @throws YiiException
     *
     * todo
     * уведомление по e-mail для администратора
     */
    public static function register(PhpException $e, $action = 'stop')
    {
        $eInfo = self::getInfo($e);
        if (YII_DEBUG) {
            throw new YiiException($eInfo, $e->getCode());
        }
        switch ($action) {
            case 'continue':
                return;
                break;
            case 'stop':
                throw new YiiException($e->getMessage(), $e->getCode());
                break;
            default:
                throw new YiiException('Произошла ошибка!!!', 500);
                break;
        }
    }

    /**
     * @param PhpException $e
     * @return string
     */
    public static function getInfo(PhpException $e)
    {
        $eInfo = 'message - ' . $e->getMessage()
            . ', code - ' . $e->getCode()
            . ', file - ' . $e->getFile()
            . ', line - ' . $e->getLine()
            . ', dateTime - ' . date(Yii::$app->params['format']['dateTime'])
            . ', exceptionType - ' . get_class($e);
        return $eInfo;
    }

}