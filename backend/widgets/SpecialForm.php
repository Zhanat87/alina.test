<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class SpecialForm extends Widget
{

    public $width, $style;

    public function run()
    {
        if ($this->width) {
            $this->style = ' style="width: ' . $this->width . '; max-width: ' . $this->width . ';"';
        }
        return $this->render('special-form', [
            'style' => $this->style,
        ]);
    }

}