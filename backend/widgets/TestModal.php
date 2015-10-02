<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class TestModal extends Widget
{

    public $tests;

    public function run()
    {
        return $this->render('test-modal', [
            'tests' => $this->tests,
            'action' => Yii::$app->request->getQueryParam('action'),
        ]);
    }

}