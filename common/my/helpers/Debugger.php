<?php

namespace common\my\helpers;

use yii\helpers\VarDumper as YiiVarDumper;
use Symfony\Component\VarDumper\VarDumper as SymfonyVarDumper;

/**
 * Class Debugger
 * @package common\my\helpers
 * класс-отладчик кода
 */
class Debugger
{

    public function debug($v)
    {
        echo '<pre style="' . $this->getStyle() . '">';
        /*
         * debug_zval_dump($v);
         * xdebug_debug_zval($v);
         */
        var_dump($v);
        echo '</pre>';
    }

    public function stop($v)
    {
        exit($this->debug($v));
    }

    public function margin()
    {
        echo '<br /><br /><br /><br /><br />';
    }

    public function yii($v, $stop = false, $depth = 100)
    {
        echo '<pre style="' . $this->getStyle() . '">';
        YiiVarDumper::dump($v, $depth, true);
        echo '</pre>';
        if ($stop) {
            exit;
        }
    }

    public function symfony($v, $stop = false)
    {
        echo '<pre style="' . $this->getStyle() . '">';
        SymfonyVarDumper::dump($v);
        echo '</pre>';
        if ($stop) {
            exit;
        }
    }

    public function getStyle()
    {
        return "background-color: #000; color: #fff; font-size: 14px;
                    font-weight: 600; line-height: 18px; margin: 20px;
                    padding: 20px; border: 3px solid #00FF40; border-radius: 10px;";
    }

}