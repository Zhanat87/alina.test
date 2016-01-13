<?php

namespace backend\modules\user\models;

use backend\my\app\Access;
use Yii;
use yii\base\Model;
use yii\web\Cookie;

/**
 * Class LoginForm
 * @package backend\modules\user\models
 */
class LoginForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError('password', 'Неверное имя пользователя или пароль.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            if (Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0)) {
                $cookies = Yii::$app->getResponse()->getCookies();
                $timestamp = time() + 86400 * 30;
                $role = new Cookie([
                    'name' => Access::COOKIE_ROLE,
                    'value' => $user->role,
                    'expire' => $timestamp,
                ]);
                $cookies->add($role);
                $userId = new Cookie([
                    'name' => Access::COOKIE_USER_ID,
                    'value' => $user->id,
                    'expire' => $timestamp,
                ]);
                $cookies->add($userId);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

}