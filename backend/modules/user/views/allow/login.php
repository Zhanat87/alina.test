<?php
use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var backend\modules\user\models\LoginForm $model
 */
$this->title = 'Авторизация';
?>
<div id="login-box-inner">
    <?php echo Html::beginForm(Yii::$app->user->loginUrl, 'post', ['id' => 'loginForm']); ?>
        <div class="form-group field-loginform-username required
            <?php echo $model->getErrors('username') ? ' has-error' : ''; ?>">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user"></i>
                </span>
                <?php
                echo Html::textInput('LoginForm[username]', $model->username, [
                    'class' => 'form-control',
                    'placeholder' => $model->getAttributeLabel('username')
                ]);
                ?>
            </div>
            <?php if ($model->getErrors('username')) : ?>
                <div class="help-block">
                    <?php foreach ($model->getErrors('username') as $error) : ?>
                        <p>
                            <?php echo $error; ?>
                        </p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group field-loginform-password required
            <?php echo $model->getErrors('password') ? ' has-error' : ''; ?>">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <?php
                echo Html::passwordInput('LoginForm[password]', $model->password, [
                    'class' => 'form-control',
                    'placeholder' => $model->getAttributeLabel('password')
                ]);
                ?>
            </div>
            <?php if ($model->getErrors('password')) : ?>
                <div class="help-block">
                    <?php foreach ($model->getErrors('password') as $error) : ?>
                        <p>
                            <?php echo $error; ?>
                        </p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div id="remember-me-wrapper">
            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox-nice">
                        <?php
                        echo Html::checkbox('запомнить меня', true, ['id' => 'remember-me']);
                        ?>
                        <label for="remember-me">
                            <?php echo $model->getAttributeLabel('rememberMe'); ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php echo Html::submitButton('OK', ['class' => 'btn btn-success col-xs-12']); ?>
            </div>
        </div>
    <?php echo Html::endForm(); ?>
</div>