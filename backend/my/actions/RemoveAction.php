<?php

namespace backend\my\actions;

use Yii;

/**
 * Class RemoveAction
 * @package backend\my\actions
 */
class RemoveAction extends DeleteAction
{

    public function run($id)
    {
        if ($this->findModel($id)) {
            if($this->_model->delete()) {
                return Yii::$app->params['ajaxOk'];
            }
        }
        return Yii::$app->params['ajaxError'];
    }

}