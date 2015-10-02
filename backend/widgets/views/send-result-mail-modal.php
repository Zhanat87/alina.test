<?php

use yii\helpers\Html;
use backend\modules\result\models\EmailConfiguration;
use yii\bootstrap\Alert;
use backend\assets\SendResultMailModalAsset;
SendResultMailModalAsset::register($this);
?>
<div class="md-modal md-effect-4" id="sendResultMailModal">
    <div class="md-content">
        <div class="modal-header">
            <button class="md-close close">&times;</button>
            <h4 class="modal-title">
                Отправить сообщение
            </h4>
        </div>
        <div class="modal-body">
            <div class="alertDiv hide">
                <?php
                echo Alert::widget([
                    'options' => [
                        'class' => 'alert-info',
                    ],
                    'body' => 'Сообщение успешно отправлено!',
                ]);
                ?>
            </div>
            <div class="formDiv">
                <?php
                echo Html::beginForm(
                    Yii::$app->getUrlManager()->createUrl(['/result/message/send']),
                    'post',
                    ['id' => 'sendResultMailModalForm']
                );
                /** @var \backend\modules\user\models\User $user */
                $user = Yii::$app->user->identity;
                echo Html::hiddenInput('userId', $user->id, ['id' => 'sendResultMailModalUserId']);
                echo Html::hiddenInput('resultId', null, ['id' => 'sendResultMailModalResultId']);
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p>
                                Тема:
                            </p>
                            <?php
                            echo Html::textInput(
                                'subject',
                                EmailConfiguration::getValue('default_subject_for_send_result'),
                                [
                                    'id' => 'sendResultMailModalSubject',
                                    'class' => 'form-control',
                                ]
                            );
                            ?>
                        </div>
                        <div class="col-md-6">
                            <p>
                                Email:
                            </p>
                            <?php
                            echo Html::input(
                                'email',
                                'email',
                                $user->email,
                                [
                                    'id' => 'sendResultMailModalEmail',
                                    'class' => 'form-control',
                                ]
                            );
                            ?>
                            <p class="error hide emptyEmail">
                                Email не может быть пустым
                            </p>
                            <p class="error hide invalidEmail">
                                Email не валидный
                            </p>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <p>
                                Сообщение:
                            </p>
                            <?php
                            echo Html::textarea(
                                'text',
                                EmailConfiguration::getValue('default_text_for_send_result'),
                                [
                                    'id' => 'sendResultMailModalText',
                                    'class' => 'form-control',
                                ]
                            );
                            ?>
                        </div>
                    </div>
                </div>
                <br/>
                <?php echo Html::endForm(); ?>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary sendResultMailModalSave">
                Отправить
            </button>
            <button type="button" class="btn btn-danger sendResultMailModalClose">
                Отмена
            </button>
        </div>
    </div>
</div>
<div class="md-overlay"></div><!-- the overlay element -->