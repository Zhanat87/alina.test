<?php

namespace backend\my\app;

use Yii;
use yii\helpers\Url;

class Menu
{

    public $module,
           $controller,
           $action,
           $type,
           $appAccess;

    public function __construct()
    {
        $this->module     = Yii::$app->controller->module->id;
        $this->controller = Yii::$app->controller->id;
        $this->action     = Yii::$app->controller->action->id;
        $this->appAccess  = Yii::$app->access;
    }

    public function getHeader()
    {
        $data   = [];
        $data[] = [
            'label'   => 'Настройки',
            'icon'    => 'fa fa-cog',
            'active'  => in_array($this->module, ['rbac'])
                || ($this->module == 'user' && $this->controller == 'user'),
            'visible' => $this->appAccess->isAdmin(),
            'subMenu' => [
                [
                    'url'     => Url::to('/user/user/index'),
                    'label'   => 'Пользователи',
                    'icon'    => 'fa fa-users fa-fw',
                    'active'  => $this->module == 'user' && $this->controller == 'user',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'label'   => 'Права доступа',
                    'icon'    => 'fa fa-key',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/rbac/auth-rule/index'),
                    'label'   => 'Правила',
                    'active'  => $this->module == 'rbac' && $this->controller == 'auth-rule',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/rbac/auth-item/index'),
                    'label'   => 'Роли и разрешения',
                    'active'  => $this->module == 'rbac' && $this->controller == 'auth-item',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/rbac/auth-item-child/index'),
                    'label'   => 'Иерархия',
                    'active'  => $this->module == 'rbac' && $this->controller == 'auth-item-child',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/rbac/auth-assignment/index'),
                    'label'   => 'Назначить права доступа',
                    'active'  => $this->module == 'rbac' && $this->controller == 'auth-assignment',
                    'visible' => $this->appAccess->isAdmin(),
                ],
            ],
        ];
        $data[] = [
            'label'   => 'Новости',
            'icon'    => 'fa fa-list',
            'active'  => $this->module == 'news',
            'visible' => $this->appAccess->isUser(true),
            'url'     => Url::to('/news/index/index'),
        ];
        return $data;
    }

    public function getSideBar()
    {
        $data             = [];
        if ($this->module == 'rbac' || ($this->module == 'user' && $this->controller == 'user')) {
            $data[] = [
                'url'     => Url::to('/user/user/index'),
                'label'   => 'Пользователи',
                'icon'    => 'fa fa-users fa-fw',
                'active'  => $this->module == 'user' && $this->controller == 'user',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'label'   => 'Права доступа',
                'icon'    => 'fa fa-key',
                'active'     => $this->module == 'rbac',
                'url'        => '#',
                'visible'    => $this->appAccess->isAdmin(),
                'subMenu' => [
                    [
                        'url'     => Url::to('/rbac/auth-rule/index'),
                        'label'   => 'Правила',
                        'active'  => $this->module == 'rbac' && $this->controller == 'auth-rule',
                    ],
                    [
                        'url'     => Url::to('/rbac/auth-item/index'),
                        'label'   => 'Роли и разрешения',
                        'active'  => $this->module == 'rbac' && $this->controller == 'auth-item',
                    ],
                    [
                        'url'     => Url::to('/rbac/auth-item-child/index'),
                        'label'   => 'Иерархия',
                        'active'  => $this->module == 'rbac' && $this->controller == 'auth-item-child',
                    ],
                    [
                        'url'     => Url::to('/rbac/auth-assignment/index'),
                        'label'   => 'Назначить права доступа',
                        'active'  => $this->module == 'rbac' && $this->controller == 'auth-assignment',
                    ],
                ],
            ];
        }
        if ($this->module == 'news') {
            $data[] = [
                'label'   => 'Новости',
                'icon'    => 'fa fa-list',
                'active'  => $this->module == 'news',
                'visible' => $this->appAccess->isUser(true),
                'url'     => Url::to('/news/index/index'),
            ];
        }
        return $data;
    }

}