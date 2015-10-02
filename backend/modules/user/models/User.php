<?php

namespace backend\modules\user\models;

use Yii;
use yii\base\NotSupportedException;
use common\my\yii2\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\IdentityInterface;
use backend\modules\rbac\models\AuthAssignment;
use backend\modules\rbac\models\AuthItem;
use yii\base\Exception;
use backend\my\app\Access;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property string $password write-only password
 * @property string $role
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property AuthItem $authItem
 * @property AuthAssignment[] $authAssignments
 */
class User extends ActiveRecord implements IdentityInterface
{

    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::find()
            ->where('username = :username OR email = :username AND status = 1')
            ->params([':username' => $username])
            ->one();
    }

    /**
     * Finds user by password reset token
     *
     * @param  string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => 1,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->getSecurity()->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = [
            'username',
            'email',
            'password',
            'auth_key',
            'password_hash',
            'created_at',
            'updated_at',
            'role',
            'status',
        ];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => 1],
            ['status', 'in', 'range' => array_keys($this->getStatuses())],
            [['status'], 'integer'],

            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
            ['email', 'unique'],

            ['password', 'filter', 'filter' => 'trim'],
            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 6],

            [['created_at', 'updated_at', 'password_hash'], 'safe'],

            ['role', 'default', 'value' => Access::ADMIN],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'email' => 'E-mail пользователя',
            'password' => 'Пароль',
            'auth_key' => 'уникальный ключ авторизации каждого пользователя',
            'password_hash' => 'хэш пароля',
            'password_reset_token' => 'token восстановления пароля',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
            'role' => 'Роль',
            'status' => 'Опубликован',
        ];
    }

    /**
     * @return AuthItem
     */
    public function getAuthItem()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'role']);
    }

    /**
     * @return AuthAssignment[]
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * @param bool $insert
     * @return bool
     * @throws Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->getSecurity()->generateRandomString();
            }
            if ($this->password) {
                $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            Yii::$app->authManager->revokeAll($this->id);
            Yii::$app->cache->delete(self::tableName() . 'getAllForListsByRole' . $this->role);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        try {
            $auth = Yii::$app->authManager;
            $auth->revokeAll($this->id);
            $auth->assign($auth->getRole($this->role), $this->id);
        } catch (Exception $e) {
            Yii::warning($e->getCode() . ' - ' . $e->getMessage(), 'auth assign');
        }
        return parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @param null $status
     * @return array
     */
    public function getStatuses($status = null)
    {
        /**
         * сливает массивы и сохраняет ключи
         */
        $statuses = [1 => 'Опубликован', 0 => 'Отключен'];
        return $status !== null ? $statuses[$status] : $statuses;
    }

    /**
     * @return array|mixed
     */
    public static function getAllForLists()
    {
        return self::getCachedKeyValueData(
            self::tableName(),
            ['id', 'username'],
            ['status' => 1],
            'getAllForLists'
        );
    }

}