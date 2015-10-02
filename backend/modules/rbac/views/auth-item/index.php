<?php

use yii\helpers\Html;
use backend\my\yii2\GridView;
use yii\widgets\Pjax;
use backend\assets\Select2Asset;
use backend\widgets\Modal;
use backend\assets\GridViewConstAsset;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\modules\rbac\models\search\AuthItemSearch $searchModel
 */

$this->title = 'Роли и разрешения';
$this->params['breadcrumbs'][] = 'Настройки';
$this->params['breadcrumbs'][] = 'Права доступа';
$this->params['breadcrumbs'][] = $this->title;
Select2Asset::register($this);
GridViewConstAsset::register($this);
?>
<?php echo Modal::widget(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <header class="main-box-header clearfix">
                    <h2 class="pull-left">
                        <?php echo Html::encode($this->title); ?>
                    </h2>
                    <div class="filter-block pull-right">
                        <button data-modal="actionModal" class="md-trigger btn btn-primary mrg-b-lg mdCreateB"
                                url="<?php echo Yii::$app->getUrlManager()->createUrl(['rbac/auth-item/create']); ?>"
                                title="Добавление роли или разрешения">
                            <i class="fa fa-plus-circle fa-lg"></i> Добавить
                        </button>
                    </div>
                </header>
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <?php
                        Pjax::begin(
                            [
                                'timeout' => 5000
                            ]
                        );
                        echo GridView::widget([
                            'tableOptions' => ['class' => 'table'],
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                [
                                    'class' => 'yii\grid\SerialColumn',
                                    'options' => [
                                        'style' => 'width: 40px',
                                    ],
                                ],
                                'name',
                                [
                                    'label' => $searchModel->getAttributeLabel('type'),
                                    'value' => function ($searchModel) {
                                        return $searchModel->getTypes($searchModel->type);
                                    },
                                    'filter' => Html::activeDropDownList($searchModel, 'type',
                                        $searchModel->getTypesForGridFilter(), ['class' => 'select2 width-150']),
                                ],
                                'description:ntext',
                                'rule_name',
                                [
                                    'attribute'     => 'created_at',
                                    'filterOptions' => [
                                        'class' => 'dateFilter',
                                    ],
                                    'options' => [
                                        'style' => 'width: 130px',
                                    ],
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'options' => [
                                        'class' => 'actionColumn',
                                        'style' => 'width: 130px',
                                    ],
                                    'header' => 'Действия',
                                    'template' => '{update} {remove}',
                                    'buttons' => [
                                        'update' =>
                                            function ($url, $searchModel) {
                                                $url = str_replace('?id=', '?name=', $url);
                                                return Html::a('<span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                            </span>', $url, [
                                                    'title' => 'Редактировать',
                                                    'class' => 'table-link mdUpdateB md-trigger mrg-b-lg',
                                                    'url' => $url,
                                                    'data-modal' => 'actionModal',
                                                    'modalTitle' => 'Редактирование роли или разрешения: ' . $searchModel->name,
                                                ]);
                                            },
                                        'remove' =>
                                            function ($url, $searchModel) {
                                                $url = str_replace('?id=', '?name=', $url);
                                                return Html::a('<span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                                                            </span>', '#', [
                                                    'title' => 'Удалить',
                                                    'class' => 'table-link danger deleteFromGrid',
                                                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                    'url' => $url,
                                                ]);
                                            },
                                    ],
                                ],
                            ],
                        ]);
                        Pjax::end();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo \backend\widgets\Delete::widget(['grid' => 'w0']); ?>