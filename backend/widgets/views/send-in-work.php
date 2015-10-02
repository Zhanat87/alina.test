<?php
use yii\helpers\Html;
use backend\assets\SendInWorkAsset;
SendInWorkAsset::register($this);
?>
<div class="md-modal md-effect-13" id="sendInWorkModal">
    <div class="md-content">
        <div class="modal-header">
            <button class="md-close close">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <?php
            echo Html::beginForm(Yii::$app->getUrlManager()->createUrl('order/index/send-in-work'),
                'post', ['id' => 'sendInWorkForm']);
            echo Html::hiddenInput('id', null, ['id' => 'orderId']);
            ?>
            <div class="row">
                <div class="col-md-4">
                    <label for="send_in_work_type">
                        Кому
                    </label>
                    <br/>
                    <select class="select2 width-150" name="send_in_work_type" id="send_in_work_type">
                        <option value="">
                            Всем
                        </option>
                        <option value="1">
                            В отделение
                        </option>
                        <option value="2">
                            Пользователю
                        </option>
                    </select>
                </div>
                <div class="col-md-8 usersDiv hide">
                    <label for="users">
                        Выберите пользователя
                    </label>
                    <br/>
                    <?php
                    echo Html::dropDownList('user', null, $users,
                        ['class' => 'select2 width100', 'id' => 'users']);
                    ?>
                </div>
                <div class="col-md-8 subdivisionsDiv hide">
                    <label for="subdivisions">
                        Выберите подразделение
                    </label>
                    <br/>
                    <?php
                    echo Html::dropDownList('subdivision', null, $subdivisions,
                        ['class' => 'select2 width100', 'id' => 'subdivisions']);
                    ?>
                </div>
            </div>
            <br/>
            <?php echo Html::endForm(); ?>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary sendInWorkSaveB">
                Сохранить
            </button>
            <button type="button" class="btn btn-danger mdClose">
                Закрыть
            </button>
        </div>
    </div>
</div>
<div class="md-overlay"></div><!-- the overlay element -->