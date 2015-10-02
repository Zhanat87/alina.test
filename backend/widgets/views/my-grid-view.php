<?php
use backend\assets\GridViewAsset;

GridViewAsset::register($this);
?>
<div class="rowCounter" grid="<?php echo $grid; ?>" page-size="<?php echo $pageSize; ?>">
    <p>
        Отображать
    </p>
    <select class="select2 width-100">
        <?php foreach ($counts as $k => $v) : ?>
            <option value="<?php echo $k; ?>">
                <?php echo $v; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>