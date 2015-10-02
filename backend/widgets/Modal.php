<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class Modal extends Widget
{

    public $width, $style;

    public function run()
    {
        if ($this->width) {
            $this->style = ' style="width: ' . $this->width . '; max-width: ' . $this->width . ';"';
        }
        return $this->render('modal', [
            'style' => $this->style,
        ]);
    }

} 