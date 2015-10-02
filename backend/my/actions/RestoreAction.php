<?php

namespace backend\my\actions;

use Yii;

/**
 * Class RestoreAction
 * @package backend\my\actions
 */
class RestoreAction extends DeleteAction
{

    public function run($id)
    {
        if ($this->findModel($id)) {
            $this->_model->status = 1;
            if($this->_model->save(false)) {
                return Yii::$app->params['ajaxOk'];
            }
        }
        return Yii::$app->params['ajaxError'];
    }

}