<?php
use backend\assets\CancelBtnAsset;
CancelBtnAsset::register($this);
?>
<button type="button" class="btn btn-danger cancelBtn" url="<?php echo $url ?>">
    Отменить
</button>
<div class="modal fade cancelBtnM">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Информация
                </h4>
            </div>
            <div class="modal-body">
                <p>
                    Вы действительно хотите покинуть эту страницу?
                    Вся введенная вами информация на странице будет утеряна!
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    Да
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Нет
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->