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
 * @var backend\modules\rbac\models\search\AuthItemChildSearch $searchModel
 */

$this->title = 'Иерархия';
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
                            url="<?php echo Yii::$app->getUrlManager()->createUrl(['rbac/auth-item-child/create']); ?>"
                            title="Добавление иерархии">
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
                            [
                                'attribute' => 'parent',
                                'filter' => Html::activeDropDownList(
                                    $searchModel,
                                    'parent',
                                    $authItems,
                                    ['class' => 'select2 width100']),
                                'options' => [
                                    'style' => 'width: 40%',
                                ],
                            ],
                            [
                                'attribute' => 'child',
                                'filter' => Html::activeDropDownList(
                                    $searchModel,
                                    'child',
                                    $authItems,
                                    ['class' => 'select2 width100']),
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
                                            return Html::a('<span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                            </span>', $url, [
                                                'title' => 'Редактировать',
                                                'class' => 'table-link mdUpdateB md-trigger mrg-b-lg',
                                                'url' => $url,
                                                'data-modal' => 'actionModal',
                                                'modalTitle' => 'Редактирование иерархии: ' . $searchModel->parent
                                            ]);
                                        },
                                    'remove' =>
                                        function ($url, $searchModel) {
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