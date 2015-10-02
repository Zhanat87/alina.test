<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class SendResultMailModal extends Widget
{

    public function run()
    {
        return $this->render('send-result-mail-modal');
    }

}