<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;
use backend\modules\user\models\User;

class GridFilter extends Widget
{

    public $gridId, $entity;

    public function run()
    {
        /** @var User $user */
        $user = Yii::$app->user->identity;
        return $this->render('grid-filter', [
            'gridId' => $this->gridId,
            'entity' => $this->entity,
            'filters' => $user->getGridFiltersByEntity($this->entity),
        ]);
    }

}