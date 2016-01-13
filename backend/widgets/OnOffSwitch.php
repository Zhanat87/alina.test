<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class OnOffSwitch extends Widget
{

    public $value, $className;

    public function run()
    {
        $baseClassName = basename(str_replace('\\', '/', $this->className));
        return $this->render('on-off-switch', [
            'value' => $this->value,
            'baseClassName' => $baseClassName,
            'id' => strtolower($baseClassName) . '-status-checkbox',
        ]);
    }

}