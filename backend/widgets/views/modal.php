<?php
use backend\assets\ModalAsset;
ModalAsset::register($this);
?>
<div class="md-modal md-effect-1" id="actionModal"<?php echo $style; ?>>
    <div class="md-content">
        <div class="modal-header">
            <button class="md-close close">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body mdCreateDiv"></div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary mdFormSendB">
                Сохранить
            </button>
            <button type="button" class="btn btn-danger mdClose">
                Закрыть
            </button>
        </div>
    </div>
</div>
<div class="md-overlay"></div><!-- the overlay element -->