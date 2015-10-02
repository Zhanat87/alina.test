<?php
use backend\assets\OnOffSwitchAsset;
OnOffSwitchAsset::register($this);
?>
<div class="onoffswitch">
    <input type="checkbox"
           value="<?php echo $value; ?>"
           id="<?php echo $id; ?>"
           class="onoffswitch-checkbox"
           name="<?php echo $baseClassName; ?>[status]"
        <?php echo $value ? ' checked' : ''; ?> />
    <label for="<?php echo $id; ?>" class="onoffswitch-label">
        <div class="onoffswitch-inner"></div>
        <div class="onoffswitch-switch"></div>
    </label>
</div>