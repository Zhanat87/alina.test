<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;
use backend\my\app\Menu;

class Sidebar extends Widget
{

    public function run()
    {
        return $this->render('sidebar', [
            'menu' => (new Menu)->getSideBar(),
        ]);
    }

} 