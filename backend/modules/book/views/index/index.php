<?php

use yii\helpers\Html;
use backend\my\yii2\GridView;
use yii\widgets\Pjax;
use backend\assets\Select2Asset;
use backend\widgets\Modal;
use backend\assets\GridViewConstAsset;
use yii\helpers\ArrayHelper;
use backend\assets\BookAsset;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var backend\modules\book\models\search\BookSearch $searchModel
 */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
Select2Asset::register($this);
GridViewConstAsset::register($this);
BookAsset::register($this);
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
                            url="<?php echo Yii::$app->getUrlManager()->createUrl(['book/index/create']); ?>"
                            title="Добавление книги">
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
                                'attribute'     => 'id',
                                'options' => [
                                    'style' => 'width: 40px',
                                ],
                            ],
                            [
                                'attribute'     => 'name',
                                'options' => [
                                    'style' => 'width: 150px',
                                ],
                            ],
                            [
                                'attribute' => 'image',
                                'format' => 'html',
                                'value' => function ($searchModel) {
                                    /** @var backend\modules\book\models\search\BookSearch $searchModel */
                                    return Html::img($searchModel->getThumbFileUrl('image', 'thumb'),
                                        [
                                            'data-zoom-image' => $searchModel->getImageFileUrl('image'),
                                            'class' => 'zoomImage',
                                        ]);
                                },
                            ],
                            [
                                'attribute'     => 'publish_date',
                                'filterOptions' => [
                                    'class' => 'dateRangeFilter',
                                ],
                                'options' => [
                                    'style' => 'width: 200px',
                                ],
                            ],
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
                                'attribute' => 'author_id',
                                'format' => 'html',
                                'value' => function ($searchModel) use ($authors) {
                                    return ArrayHelper::getValue($authors, $searchModel->author_id);
                                },
                                'filter' => Html::activeDropDownList(
                                    $searchModel,
                                    'author_id',
                                    $authors,
                                    ['class' => 'select2 width100']),
                                'options' => [
                                    'style' => 'width: 170px',
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
                                    $statuses,
                                    ['class' => 'select2 width100']),
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
                                'template' => '{update} {remove} {delete} {restore}',
                                'buttons' => [
                                    'update' =>
                                        function ($url, $searchModel) {
                                            return Html::a('<span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                            </span>', $url, [
                                                'title' => 'Редактировать',
                                                'class' => 'table-link mdUpdateB md-trigger mrg-b-lg',
                                                'id' => $searchModel->id,
                                                'url' => $url,
                                                'data-modal' => 'actionModal',
                                                'modalTitle' => 'Редактирование книги: ' . $searchModel->name,
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
                                    'delete' =>
                                        function ($url, $searchModel) {
                                            return $searchModel->status ? Html::a('<span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                            </span>', '#', [
                                                'title' => 'Удалить в корзину',
                                                'class' => 'table-link warning deleteFromGrid',
                                                'confirm' => 'Вы уверены, что хотите удалить этот элемент в корзину?',
                                                'url' => $url,
                                            ]) : null;
                                        },
                                    'restore' =>
                                        function ($url, $searchModel) {
                                            return !$searchModel->status ? Html::a('<span class="fa-stack">
                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                <i class="fa fa-retweet fa-stack-1x fa-inverse"></i>
                                                            </span>', '#', [
                                                'title' => 'Восстановить из корзины',
                                                'class' => 'table-link success deleteFromGrid',
                                                'confirm' => 'Вы уверены, что хотите восстановить этот элемент из корзины?',
                                                'url' => $url,
                                            ]) : null;
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