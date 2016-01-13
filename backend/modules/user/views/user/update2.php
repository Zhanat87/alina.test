<?php
/**
 * @var yii\web\View $this
 * @var backend\modules\user\models\User $model
 */
if ($model->id == Yii::$app->access->getUserId()) {
    $this->title = $this->params['breadcrumbs'][] = 'Редактирование профиля';
} else {
    $this->title = 'Редактирование пользователя: ' . $model->username;
    $this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Редактирование';
}
?>
<div class="user-update">
    <?= $this->render('_form2', [
        'model' => $model,
        'statuses' => $statuses,
        'roles' => $roles,
    ]) ?>
</div>