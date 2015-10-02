<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class Delete extends Widget
{

    public $grid;
    public $title;
    public $msg;
    
    public function run()
    {
        return $this->render('delete', [
            'grid' => $this->grid,
            'title' => $this->title,
            'msg' => $this->msg
        ]);
    }

} 