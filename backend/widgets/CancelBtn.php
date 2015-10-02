<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class CancelBtn extends Widget
{

    public $url;

    public function run()
    {
        return $this->render('cancel-btn', [
            'url' => $this->url,
        ]);
    }

} 