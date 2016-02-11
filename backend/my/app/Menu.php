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
        $data[] = [
            'label'   => 'Книги',
            'icon'    => 'fa fa-book',
            'active'  => $this->module == 'book',
            'visible' => $this->appAccess->isUser(true),
            'url'     => Url::to('/book/index/index'),
        ];
        $data[] = [
            'label'   => 'Angular',
            'icon'    => 'fa fa-cubes',
            'active'  => $this->module == 'angular',
            'visible' => $this->appAccess->isAdmin(),
            'subMenu' => [
                [
                    'url'     => Url::to('/angular/index/ng-repeat'),
                    'label'   => 'ng-repeat',
                    'active'  => $this->module == 'angular' && $this->action == 'ng-repeat',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/module'),
                    'label'   => 'module',
                    'active'  => $this->module == 'angular' && $this->action == 'module',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/one-bind'),
                    'label'   => 'one-bind',
                    'active'  => $this->module == 'angular' && $this->action == 'one-bind',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/two-bind'),
                    'label'   => 'two-bind',
                    'active'  => $this->module == 'angular' && $this->action == 'two-bind',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/built-in-variables'),
                    'label'   => 'built-in-variables',
                    'active'  => $this->module == 'angular' && $this->action == 'built-in-variables',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/partial-views'),
                    'label'   => 'partial-views',
                    'active'  => $this->module == 'angular' && $this->action == 'partial-views',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/ng-cloak'),
                    'label'   => 'ng-cloak',
                    'active'  => $this->module == 'angular' && $this->action == 'ng-cloak',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/ng-if-hide-show'),
                    'label'   => 'ng-if-hide-show',
                    'active'  => $this->module == 'angular' && $this->action == 'ng-if-hide-show',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/ng-class-style'),
                    'label'   => 'ng-class-style',
                    'active'  => $this->module == 'angular' && $this->action == 'ng-class-style',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/ng-events'),
                    'label'   => 'ng-events',
                    'active'  => $this->module == 'angular' && $this->action == 'ng-events',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/ng-attributes'),
                    'label'   => 'ng-attributes',
                    'active'  => $this->module == 'angular' && $this->action == 'ng-attributes',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/filter'),
                    'label'   => 'filter',
                    'active'  => $this->module == 'angular' && $this->action == 'filter',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/validation'),
                    'label'   => 'validation',
                    'active'  => $this->module == 'angular' && $this->action == 'validation',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/form'),
                    'label'   => 'form',
                    'active'  => $this->module == 'angular' && $this->action == 'form',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/basic-controller'),
                    'label'   => 'basic-controller',
                    'active'  => $this->module == 'angular' && $this->action == 'basic-controller',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/controller-communication'),
                    'label'   => 'controller-communication',
                    'active'  => $this->module == 'angular' && $this->action == 'controller-communication',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/controller-inheritance'),
                    'label'   => 'controller-inheritance',
                    'active'  => $this->module == 'angular' && $this->action == 'controller-inheritance',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/multiple-controllers'),
                    'label'   => 'multiple-controllers',
                    'active'  => $this->module == 'angular' && $this->action == 'multiple-controllers',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/working-with-other-frameworks'),
                    'label'   => 'working-with-other-frameworks',
                    'active'  => $this->module == 'angular' && $this->action == 'working-with-other-frameworks',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/filter-single-data'),
                    'label'   => 'filter-single-data',
                    'active'  => $this->module == 'angular' && $this->action == 'filter-single-data',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/filtering-data-collection'),
                    'label'   => 'filtering-data-collection',
                    'active'  => $this->module == 'angular' && $this->action == 'filtering-data-collection',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/filters-chain'),
                    'label'   => 'filters-chain',
                    'active'  => $this->module == 'angular' && $this->action == 'filters-chain',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/custom-filters'),
                    'label'   => 'custom-filters',
                    'active'  => $this->module == 'angular' && $this->action == 'custom-filters',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/custom-directives'),
                    'label'   => 'custom-directives',
                    'active'  => $this->module == 'angular' && $this->action == 'custom-directives',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/jq-lite'),
                    'label'   => 'jq-lite',
                    'active'  => $this->module == 'angular' && $this->action == 'jq-lite',
                    'visible' => $this->appAccess->isAdmin(),
                ],
                [
                    'url'     => Url::to('/angular/index/creating-complex-directives'),
                    'label'   => 'creating-complex-directives',
                    'active'  => $this->module == 'angular' && $this->action == 'creating-complex-directives',
                    'visible' => $this->appAccess->isAdmin(),
                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
//                [
//                    'url'     => Url::to('/angular/index/'),
//                    'label'   => '',
//                    'active'  => $this->module == 'angular' && $this->action == '',
//                    'visible' => $this->appAccess->isAdmin(),
//                ],
            ],
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
        } else if ($this->module == 'news') {
            $data[] = [
                'label'   => 'Новости',
                'icon'    => 'fa fa-list',
                'active'  => $this->module == 'news',
                'visible' => $this->appAccess->isUser(true),
                'url'     => Url::to('/news/index/index'),
            ];
        } else if ($this->module == 'book') {
            $data[] = [
                'label'   => 'Книги',
                'icon'    => 'fa fa-book',
                'active'  => $this->module == 'book',
                'visible' => $this->appAccess->isUser(true),
                'url'     => Url::to('/book/index/index'),
            ];
        } else if ($this->module == 'angular') {
            $data[] = [
                'url'     => Url::to('/angular/index/ng-repeat'),
                'label'   => 'ng-repeat',
                'active'  => $this->module == 'angular' && $this->action == 'ng-repeat',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/module'),
                'label'   => 'module',
                'active'  => $this->module == 'angular' && $this->action == 'module',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/one-bind'),
                'label'   => 'one-bind',
                'active'  => $this->module == 'angular' && $this->action == 'one-bind',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/two-bind'),
                'label'   => 'two-bind',
                'active'  => $this->module == 'angular' && $this->action == 'two-bind',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/built-in-variables'),
                'label'   => 'built-in-variables',
                'active'  => $this->module == 'angular' && $this->action == 'built-in-variables',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/partial-views'),
                'label'   => 'partial-views',
                'active'  => $this->module == 'angular' && $this->action == 'partial-views',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/ng-cloak'),
                'label'   => 'ng-cloak',
                'active'  => $this->module == 'angular' && $this->action == 'ng-cloak',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/ng-if-hide-show'),
                'label'   => 'ng-if-hide-show',
                'active'  => $this->module == 'angular' && $this->action == 'ng-if-hide-show',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/ng-class-style'),
                'label'   => 'ng-class-style',
                'active'  => $this->module == 'angular' && $this->action == 'ng-class-style',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/ng-events'),
                'label'   => 'ng-events',
                'active'  => $this->module == 'angular' && $this->action == 'ng-events',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/ng-attributes'),
                'label'   => 'ng-attributes',
                'active'  => $this->module == 'angular' && $this->action == 'ng-attributes',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/filter'),
                'label'   => 'filter',
                'active'  => $this->module == 'angular' && $this->action == 'filter',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/validation'),
                'label'   => 'validation',
                'active'  => $this->module == 'angular' && $this->action == 'validation',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/form'),
                'label'   => 'form',
                'active'  => $this->module == 'angular' && $this->action == 'form',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/basic-controller'),
                'label'   => 'basic-controller',
                'active'  => $this->module == 'angular' && $this->action == 'basic-controller',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/controller-communication'),
                'label'   => 'controller-communication',
                'active'  => $this->module == 'angular' && $this->action == 'controller-communication',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/controller-inheritance'),
                'label'   => 'controller-inheritance',
                'active'  => $this->module == 'angular' && $this->action == 'controller-inheritance',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/multiple-controllers'),
                'label'   => 'multiple-controllers',
                'active'  => $this->module == 'angular' && $this->action == 'multiple-controllers',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/working-with-other-frameworks'),
                'label'   => 'working-with-other-frameworks',
                'active'  => $this->module == 'angular' && $this->action == 'working-with-other-frameworks',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/filter-single-data'),
                'label'   => 'filter-single-data',
                'active'  => $this->module == 'angular' && $this->action == 'filter-single-data',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/filtering-data-collection'),
                'label'   => 'filtering-data-collection',
                'active'  => $this->module == 'angular' && $this->action == 'filtering-data-collection',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/filters-chain'),
                'label'   => 'filters-chain',
                'active'  => $this->module == 'angular' && $this->action == 'filters-chain',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/custom-filters'),
                'label'   => 'custom-filters',
                'active'  => $this->module == 'angular' && $this->action == 'custom-filters',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/custom-directives'),
                'label'   => 'custom-directives',
                'active'  => $this->module == 'angular' && $this->action == 'custom-directives',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/jq-lite'),
                'label'   => 'jq-lite',
                'active'  => $this->module == 'angular' && $this->action == 'jq-lite',
                'visible' => $this->appAccess->isAdmin(),
            ];
            $data[] = [
                'url'     => Url::to('/angular/index/creating-complex-directives'),
                'label'   => 'creating-complex-directives',
                'active'  => $this->module == 'angular' && $this->action == 'creating-complex-directives',
                'visible' => $this->appAccess->isAdmin(),
            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
//            $data[] = [
//                'url'     => Url::to('/angular/index/'),
//                'label'   => '',
//                'active'  => $this->module == 'angular' && $this->action == '',
//                'visible' => $this->appAccess->isAdmin(),
//            ];
        }
        return $data;
    }

}