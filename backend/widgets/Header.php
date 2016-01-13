<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;
use backend\my\app\Menu;

class Header extends Widget
{

    public function run()
    {
        return $this->render('header', [
            'menu' => (new Menu)->getHeader()
        ]);
    }

} 