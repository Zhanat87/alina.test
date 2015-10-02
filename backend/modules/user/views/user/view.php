<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var backend\modules\user\models\User $model
 */

if ($model->id == Yii::$app->access->getUserId()) {
    $label = 'Редактировать профиль';
    $url = ['/user/deny/profile-edit'];
    $this->title = 'Профиль';
} else {
    $label = 'Редактировать';
    $url = ['/user/user/update', 'id' => $model->id];
    $this->title = $model->username;
    $this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['/user/user/index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <p>
        <?php echo Html::a($label, $url, ['class' => 'btn btn-primary']); ?>
        <?php
        echo Html::a('Закрыть',
            Yii::$app->access->isAdmin() ?
                Yii::$app->getUrlManager()->createUrl(['user/user/index']) :
                Yii::$app->getUrlManager()->createUrl(['user/deny/index']),
            ['class' => 'btn btn-danger']);
        ?>
    </p>
    <?php
    $attributes = [
        'id',
        'username',
        'email:email',
        'role',
        'created_at',
        'updated_at',
        [
            'label' => $model->getAttributeLabel('status'),
            'value' => $statuses[$model->status],
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $attributes,
    ]);
    ?>
</div>