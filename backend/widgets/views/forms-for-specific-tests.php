<?php
use backend\assets\FormsForSpecificTestsAsset;
FormsForSpecificTestsAsset::register($this);
?>
<div class="row formForSpecificTestsDiv<?php echo $value ? '' : ' hide'; ?>"
    url="<?php echo Yii::$app->getUrlManager()->createUrl(['test/index/forms-for-specific-tests']); ?>"
    value="<?php echo $value; ?>" id="<?php echo $id; ?>">
    <div class="col-md-12">
        <fieldset>
            <legend>Форма ввода для специфичных тестов</legend>
        </fieldset>
        <div class="form">
            <?php echo $form; ?>
        </div>
    </div>
    <hr />
</div>