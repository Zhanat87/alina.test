<?php
use yii\helpers\Html;
use backend\assets\GridFilterAsset;
GridFilterAsset::register($this);
?>
<div class="row gridFilterDiv" grid="<?php echo $gridId; ?>" entity="<?php echo $entity; ?>">
    <div class="col-lg-12">
        <button type="button" class="btn btn-info gridFilterOpen"
                data-html="true" data-placement="left"
                data-toggle="popover" title="Задайте имя для фильтра">
            Сохранить фильтр
        </button>
        <div class="gridFilterContent hide">
            <?php
            echo Html::beginForm(Yii::$app->urlManager->createUrl(['/result/result/filter']), 'post', ['class' => 'gridFilterForm']);
            echo Html::hiddenInput('value', null, ['class' => 'gridFilterValue']);
            echo Html::hiddenInput('entity', $entity, ['class' => 'gridFilterEntity']);
            echo Html::input('text', 'name', null, ['class' => 'form-control gridFilterName']);
            echo Html::submitButton('Сохранить', ['class' => 'btn btn-primary gridFilterSave']);
            echo Html::endForm();
            ?>
        </div>
    </div>
    <div class="col-md-12 gridFiltersDiv" url="<?php echo Yii::$app->urlManager->createUrl(['/result/result/filter']); ?>">
        <?php if ($filters) : ?>
            <?php foreach ($filters as $filter) : ?>
                <div class="filterDiv">
                    <button class="btn btn-default applyGridFilter" data-toggle="tooltip"
                            title="Применить фильтр" filter="<?php echo $filter['value']; ?>">
                        <?php echo $filter['name']; ?>
                    </button>
                    <a href="#" class="deleteGridFilter" data-toggle="tooltip" title="Удалить фильтр"
                       value="<?php echo $filter['value']; ?>" name="<?php echo $filter['name']; ?>"
                       entity="<?php echo $entity; ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-times fa-stack-1x fa-inverse"></i>
                        </span>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>