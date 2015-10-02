<?php

use backend\my\services\SpecialForms;
use backend\assets\TestModalAsset;
TestModalAsset::register($this);

if ($action == 'work') {
    echo \backend\widgets\SpecialForm::widget(['width' => '95%']);
}
?>
<style>
    table.table.testOrderTable tbody tr td.testModalActionTd {
        text-align: center !important;
        margin: 0 auto !important;
    }
    .table a.table-link.danger.testedA {
        position: relative;
        right: 5px;
    }
    .table a.table-link.danger.testedA.deleteTestOrder {
        position: relative;
        right: 5px !important;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <button data-modal="testModal" class="md-trigger btn btn-primary mrg-b-lg testModalOpen"
                url="<?php echo Yii::$app->getUrlManager()->createUrl(['test/index/modal']); ?>"
                title="Добавление теста">
            <i class="fa fa-plus-circle fa-lg"></i> Добавить тест
        </button>
    </div>
</div>
<div class="row testOrderDiv<?php if (!$tests) { echo ' hide'; } ?>">
    <div class="col-md-12">
        <table class="table table-responsive table-bordered testOrderTable">
            <colgroup>
                <col style="width: <?php echo $action == 'work' ? '180' : '40'; ?>px;">
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>
                    Действия
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Тип контейнера
                </th>
                <th>
                    Тип биоматериала
                </th>
            </tr>
            </thead>
            <tbody>
                <?php if ($tests) : ?>
                    <?php
                    $successStyle = null;
                    $isAdmin = Yii::$app->access->isAdmin() ? 1 : 0;
                    ?>
                    <?php foreach ($tests as $test) : ?>
                        <tr<?php if ($test->valid) { echo ' class="success"'; } ?>>
                            <?php
                            $invalidate = $test->valid && Yii::$app->access->isAdmin() ? '' : ' hide';
                            $validate = !$test->valid ? '' : ' hide';
                            $deleteTestOrder = !$test->valid ? '' : ' hide';
                            $specialFormOpen = !$test->valid ? '' : ' hide';
                            $showPdfA = $test->valid ? '' : ' hide';
                            $downloadPdfA = $test->valid ? '' : ' hide';
                            $specialForm = new SpecialForms([
                                'testId' => $test->test_id,
                                'orderId' => $test->order_id,
                                'specialForm' => $test->test->special_form,
                            ]);
                            ?>
                            <td class="testModalActionTd">
                                <?php if ($action == 'work') : ?>
                                    <a href="#"
                                       url="<?php echo Yii::$app->getUrlManager()->createUrl([
                                           'test/special-forms/invalidate-test-order-relation']); ?>"
                                       data-modal="confirmModal"
                                       action="invalidate"
                                       confirm="Вы уверены, что хотите сделать этот элемент не проверенным?"
                                       class="table-link md-trigger testedA<?php echo $invalidate; ?>"
                                       data-toggle="tooltip"
                                       title="Не проверенный"
                                       test="<?php echo $test->test_id; ?>"
                                       order="<?php echo $test->order_id; ?>"
                                       view="work"
                                       admin="<?php echo $isAdmin; ?>">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-minus-square fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="<?php echo $specialForm->getPathToPdf('download'); ?>"
                                       class="table-link danger downloadPdfA<?php echo $downloadPdfA; ?>"
                                       data-toggle="tooltip"
                                       title="Скачать pdf файл"
                                       download>
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-download fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a target="_blank"
                                       class="table-link warning showPdfA<?php echo $showPdfA; ?>"
                                       href="<?php echo $specialForm->getPathToPdf('show'); ?>"
                                       title="Просмотреть pdf файл"
                                       data-toggle="tooltip">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-file-pdf-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#"
                                       class="table-link md-trigger specialFormOpen<?php echo $specialFormOpen; ?>"
                                       url="<?php echo Yii::$app->getUrlManager()->createUrl([
                                           'test/special-forms/index',
                                           'testId' => $test->test_id,
                                           'orderId' => $test->order_id,
                                           'specialForm' => $test->test->special_form]); ?>"
                                       title="Результаты теста"
                                       data-modal="specialForm"
                                       data-toggle="tooltip">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#"
                                       url="<?php echo Yii::$app->getUrlManager()->createUrl([
                                           'test/special-forms/delete-test-order-relation']); ?>"
                                       data-modal="confirmModal"
                                       action="delete"
                                       confirm="Вы уверены, что хотите удалить этот элемент?"
                                       class="table-link danger md-trigger testedA deleteTestOrder<?php echo $deleteTestOrder; ?>"
                                       data-toggle="tooltip"
                                       title="Удалить"
                                       test="<?php echo $test->test_id; ?>"
                                       order="<?php echo $test->order_id; ?>"
                                       special-form="<?php echo $test->test->special_form; ?>">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#"
                                       url="<?php echo Yii::$app->getUrlManager()->createUrl([
                                        'test/special-forms/validate-test-order-relation']); ?>"
                                       data-modal="confirmModal"
                                       action="validate"
                                       confirm="Вы уверены, что хотите сделать этот элемент проверенным?"
                                       class="table-link warning md-trigger testedA<?php echo $validate; ?>"
                                       data-toggle="tooltip"
                                       title="Проверенный"
                                       test="<?php echo $test->test_id; ?>"
                                       order="<?php echo $test->order_id; ?>"
                                       special-form="<?php echo $test->test->special_form; ?>"
                                       admin="<?php echo $isAdmin; ?>">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-plus-square fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <?php $successStyle = ' style="right: 15px;"'; ?>
                                    <a target="_blank"<?php echo $successStyle; ?>
                                       class="table-link success"
                                       href="<?php echo Yii::$app->getUrlManager()->createUrl([
                                           'test/special-forms/print',
                                           'testId' => $test->test_id,
                                           'orderId' => $test->order_id,
                                           'specialForm' => $test->test->special_form]); ?>"
                                       title="Распечатать"
                                       data-toggle="tooltip">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-print fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                <?php else : ?>
                                    <a href="#"
                                       url="<?php echo Yii::$app->getUrlManager()->createUrl([
                                           'test/special-forms/invalidate-test-order-relation']); ?>"
                                       data-modal="confirmModal"
                                       action="invalidate"
                                       confirm="Вы уверены, что хотите сделать этот элемент не проверенным?"
                                       class="table-link danger md-trigger testedA<?php echo $invalidate; ?>"
                                       data-toggle="tooltip"
                                       title="Не проверенный"
                                       test="<?php echo $test->test_id; ?>"
                                       order="<?php echo $test->order_id; ?>"
                                       view="index">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-minus-square fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                    <a href="#"
                                       url="<?php echo Yii::$app->getUrlManager()->createUrl([
                                           'test/special-forms/delete-test-order-relation']); ?>"
                                       data-modal="confirmModal"
                                       action="delete"
                                       confirm="Вы уверены, что хотите удалить этот элемент?"
                                       class="table-link danger md-trigger testedA deleteTestOrder<?php echo $deleteTestOrder; ?>"
                                       data-toggle="tooltip"
                                       title="Удалить"
                                       test="<?php echo $test->test_id; ?>"
                                       order="<?php echo $test->order_id; ?>"
                                       special-form="<?php echo $test->test->special_form; ?>">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo $test->test->code; ?>
                            </td>
                            <td>
                                <?php echo $test->test->name; ?>
                            </td>
                            <td>
                                <?php echo Yii::$app->current->getValueForGrid($test->test->container, 'text'); ?>
                            </td>
                            <td>
                                <?php echo Yii::$app->current->getValueForGrid($test->test->biomaterial, 'text'); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="md-modal md-effect-12" id="testModal">
    <div class="md-content">
        <div class="modal-header">
            <button class="md-close close">&times;</button>
            <h4 class="modal-title">
                Тесты
            </h4>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary testModalSave">
                Сохранить
            </button>
            <button type="button" class="btn btn-danger testModalClose">
                Закрыть
            </button>
        </div>
    </div>
</div>
<div class="md-modal md-effect-13" id="confirmModal">
    <div class="md-content">
        <div class="modal-header">
            <button class="md-close close">&times;</button>
            <h4 class="modal-title">
                Информация
            </h4>
        </div>
        <div class="modal-body">
            <p></p>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary confirmModalSave">
                Да
            </button>
            <button type="button" class="btn btn-danger confirmModalClose">
                Нет
            </button>
        </div>
    </div>
</div>
<div class="md-overlay"></div><!-- the overlay element -->