<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class Modal extends Widget
{

    public $width;

    public function run()
    {
        return $this->render('modal', [
            'width' => $this->width,
        ]);
    }

} 