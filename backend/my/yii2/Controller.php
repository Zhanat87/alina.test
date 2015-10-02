<?php

namespace backend\my\yii2;

use Yii;
use yii\web\Controller as YiiController;
use yii\web\Response;
use yii\web\BadRequestHttpException;
use backend\modules\rbac\components\CheckAccess;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Class Controller
 * @package backend\my\yii2
 */
class Controller extends YiiController
{

    /**
     * @var array $_params
     */
    private $_params;

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'checkAccess' => [
                'class' => CheckAccess::className(),
            ],
        ];
    }

    /**
     * @return bool|void
     */
    public function init()
    {
        parent::init();
        $this->setParams();
    }

    /**
     * @throws \yii\base\InvalidConfigException
     */
    private function setParams()
    {
        if (Yii::$app->request->isAjax && in_array(Yii::$app->request->method, ['POST', 'PUT', 'DELETE'])) {
            if (strpos(Yii::$app->request->headers['content-type'], 'application/json') !== false) {
                $inputJSON = file_get_contents('php://input');
                if ($inputJSON) {
                    if ($inputJSON[0] == '{' && substr($inputJSON, -1) == '}') {
                        $this->_params = Json::decode($inputJSON);
                    } else {
                        parse_str($inputJSON, $this->_params);
                    }
                }
            } else {
                $this->_params = Yii::$app->request->getBodyParams();
            }
        } else {
            $this->_params = Yii::$app->request->getQueryParams();
        }
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * @param $key
     * @param null $defaultValue
     * @return mixed
     */
    public function getParam($key, $defaultValue = null)
    {
        return ArrayHelper::getValue($this->_params, $key, $defaultValue);
    }

    /**
     * @throws BadRequestHttpException
     */
    protected function isAjax()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
        } else {
            throw new BadRequestHttpException('Request not ajax!!!');
        }
    }

    /**
     * @param $csrf
     * @param $ajax
     * @return bool
     * @throws BadRequestHttpException
     */
    protected function csrfValidate($csrf, $ajax = false)
    {
        if ($csrf == Yii::$app->request->csrfTokenFromHeader) {
            return true;
        } else {
            if ($ajax) {
                return false;
            }
            throw new BadRequestHttpException('Danger request!!!');
        }
    }

    /**
     * yii2 disable csrf
     * @link http://sammaye.wordpress.com/2014/06/09/disable-yii2-csrf-on-specific-actions/
     */
    protected function disableCrf()
    {
        Yii::$app->request->enableCsrfValidation = false;
        Yii::$app->request->enableCsrfCookie = false;
        Yii::$app->request->enableCookieValidation = false;
    }

    /**
     * @param null|array $data
     * @return array
     */
    public function getSuccessResponse($data = null)
    {
        return $data ? ArrayHelper::merge($data, Yii::$app->params['response']['success']) :
            Yii::$app->params['response']['success'];
    }

    /**
     * @param null|\Exception $e
     * @return array
     */
    public function getErrorResponse($e = null)
    {
        return $e ? ArrayHelper::merge(['code' => $e->getCode(), 'message' => $e->getMessage()],
            Yii::$app->params['response']['error']) : Yii::$app->params['response']['error'];
    }

}