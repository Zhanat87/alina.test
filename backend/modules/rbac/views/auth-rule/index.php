<?php

use yii\helpers\Html;
use backend\my\yii2\GridView;
use yii\widgets\Pjax;
use backend\widgets\Modal;
use backend\assets\GridViewConstAsset;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\modules\rbac\models\search\AuthRuleSearch $searchModel
 */

$this->title = 'Правила';
$this->params['breadcrumbs'][] = 'Настройки';
$this->params['breadcrumbs'][] = 'Права доступа';
$this->params['breadcrumbs'][] = $this->title;
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
                            url="<?php echo Yii::$app->getUrlManager()->createUrl(['rbac/auth-rule/create']); ?>"
                            title="Добавление правила">
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
                                'attribute'     => 'created_at',
                                'filterOptions' => [
                                    'class' => 'dateFilter',
                                ],
                                'options' => [
                                    'style' => 'width: 160px',
                                ],
                            ],
                            [
                                'attribute'     => 'updated_at',
                                'filterOptions' => [
                                    'class' => 'dateFilter',
                                ],
                                'options' => [
                                    'style' => 'width: 160px',
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
                                                'modalTitle' => 'Редактирование правила: ' . $searchModel->name,
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