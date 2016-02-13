<?php
namespace frontend\controllers;

use common\models\Comment;
use common\my\vendor\ReCaptcha;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use common\my\yii2\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\modules\news\models\News;
use backend\modules\news\models\search\NewsSearch;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'statuses' => Yii::$app->current->defaultValue(Yii::$app->current->getStatuses()),
        ]);
    }

    public function actionNews($id)
    {
        $news = News::find()
            ->where('id = :id', [':id' => $id])
            ->with('comments')
            ->one();
        if (!$news) {
            throw new NotFoundHttpException('нет такой новости');
        }
        return $this->render('news', [
            'news' => $news,
            'comment' => new Comment(),
        ]);
    }

    public function actionNewComment()
    {
        if ($this->isAjax()) {
            $model = new Comment();
            $model->load($this->getParams());
            $validate = $model->validate();
            $reCaptcha = new ReCaptcha();
            $response = $reCaptcha->check();
            if ($validate && $response->isValid() && $model->save(false)) {
                return $this->getSuccessResponse([
                    'email' => $model->email,
                    'text' => $model->text,
                ]);
            } else {
                $res = [];
                if (!$validate) {
                    $res['modelErrors'] = ActiveForm::validate($model);
                }
                if (!$response->isValid()) {
                    $res['reCaptchaError'] = true;
                }
                return $res;
            }
        }
        return Yii::$app->params['response']['error'];
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('login', [
            'model' => new LoginForm(),
        ]);
    }

    public function actionLoginAjax()
    {
        if (Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $loginForm = new LoginForm();
            $loginForm->username = $this->getParam('username');
            $loginForm->password = $this->getParam('password');
            $loginForm->rememberMe = $this->getParam('rememberMe');
            if ($loginForm->login()) {
                return $this->getSuccessResponse();
            } else {
                return $this->getModelErrorResponse($loginForm->getErrors());
            }
        }
        return $this->getBadRequestResponse();
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionContactAjax()
    {
        if (Yii::$app->request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model = new ContactForm();
            $model->name = $this->getParam('name');
            $model->email = $this->getParam('email');
            $model->subject = $this->getParam('subject');
            $model->body = $this->getParam('body');
            if ($model->validate()) {
                if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                    return $this->getSuccessResponse();
                } else {
                    return $this->getErrorResponse();
                }
            } else {
                return $this->getModelErrorResponse($model->getErrors());
            }
        }
        return $this->getBadRequestResponse();
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
