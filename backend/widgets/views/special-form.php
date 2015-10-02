<?php
use backend\assets\SpecialFormAsset;
SpecialFormAsset::register($this);
?>
<div class="md-modal md-effect-11" id="specialForm"<?php echo $style; ?>>
    <div class="md-content">
        <div class="modal-header">
            <button class="md-close close">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary specialFormSave">
                Сохранить
            </button>
            <button type="button" class="btn btn-danger specialFormClose">
                Закрыть
            </button>
        </div>
    </div>
</div>
<div class="md-overlay"></div><!-- the overlay element -->