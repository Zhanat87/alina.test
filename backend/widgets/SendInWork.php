<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;
use backend\modules\user\models\User;
use backend\modules\subdivision\models\Subdivision;

class SendInWork extends Widget
{

    public function run()
    {
        return $this->render('send-in-work', [
            'users' => User::getAllForLists(),
            'subdivisions' => Subdivision::getAllForLists(),
        ]);
    }

} 