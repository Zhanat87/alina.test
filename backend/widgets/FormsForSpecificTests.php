<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class FormsForSpecificTests extends Widget
{

    public $value, $id, $form;

    public function run()
    {
        return $this->render('forms-for-specific-tests', [
            'value' => $this->value,
            'id' => $this->id,
            'form' => $this->form,
        ]);
    }

}