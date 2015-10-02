<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\modules\news\models\search\NewsSearch $searchModel
 */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box clearfix">
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
                            'title',
                            'text',
                            [
                                'attribute'     => 'created_at',
                                'filterOptions' => [
                                    'class' => 'dateFilter',
                                ],
                                'options' => [
                                    'style' => 'width: 142px',
                                ],
                            ],
                            [
                                'attribute' => 'status',
                                'format' => 'html',
                                'value' => function ($searchModel) use ($statuses) {
                                    $v = '<span class="label label-' .
                                        Yii::$app->current->getLabel($searchModel->status) . '">' .
                                        $statuses[$searchModel->status] . '</span>';
                                    return $v;
                                },
                                'filter' => Html::activeDropDownList(
                                    $searchModel,
                                    'status',
                                    $statuses),
                                'options' => [
                                    'style' => 'width: 170px',
                                ],
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'options' => [
                                    'class' => 'actionColumn',
                                    'style' => 'width: 130px',
                                ],
                                'header' => 'Действия',
                                'template' => '{view}',
                                'buttons' => [
                                    'view' =>
                                        function ($url, $searchModel) {
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',
                                                ['site/news', 'id' => $searchModel->id]);
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