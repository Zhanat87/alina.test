<?php

namespace backend\my\app;

use Yii;

/**
 * Class Access
 * @package backend\my\app
 */
class Access
{

    private $role, $userId, $user;

    const ADMIN = 'admin';
    const USER = 'простой пользователь';

    const COOKIE_ROLE = 'role';
    const COOKIE_USER_ID = 'userId';

    /**
     * class construct
     */
    public function __construct()
    {
        $this->setRole(Yii::$app->getRequest()->getCookies()->getValue(self::COOKIE_ROLE));
        $this->setUser(Yii::$app->user->identity);
        $this->setUserId(Yii::$app->getRequest()->getCookies()->getValue(self::COOKIE_USER_ID));
    }

    /**
     * @param null|\yii\web\IdentityInterface $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return null|\yii\web\IdentityInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role == self::ADMIN;
    }

    /**
     * @param bool $withAdmin
     * @return bool
     */
    public function isUser($withAdmin = false)
    {
        return $withAdmin ? $this->isAdmin() || $this->role == self::USER : $this->role == self::USER;
    }

}