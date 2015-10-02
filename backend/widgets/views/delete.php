<div class="modal fade deleteM" grid="<?php echo $grid; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    <?php echo $title ? $title : 'Информация'; ?>
                </h4>
            </div>
            <div class="modal-body">
                <p>
                    <?php echo $msg ? $msg : 'Вы уверены, что хотите удалить этот элемент?'; ?>
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
        </div>
    </div>
</div>