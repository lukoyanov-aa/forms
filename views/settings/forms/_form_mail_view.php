<div class="fforms-view">
    <h1> Привет мир</h1>
</div>
<div class="modal fade" id="modalFields" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFieldsTitle">Вставка значения</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="btn-event" id="btn-event">
                <select name="fields" id="fields" size="6">
                    <option value='{=event}'>К примеру событие</option>
                    <option value='{=room_type}'>Тип номера</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" id="addModalFieldsBTN" onclick="app.addCode($('#btn-event').val())">Вставить</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Отменить</button>                        
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">                   
            <textarea rows="3" cols="45" name="text" id="UF_CRM_XXXXXXMM"></textarea>
        </div>
        <div class="col">
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalFields" data-field="UF_CRM_XXXXXXMM">
                ...
            </button>
        </div>                
    </div>
</div>
<button type="button" class="btn btn-primary">Сохранить</button>
<button type="button" class="btn btn-secondary">Отмена</button>
<?php
$js = <<<JS
$('#modalFields').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)                 
                var buttonField = button.data('field')                
                var modal = $(this)                
                modal.find('#btn-event').val(buttonField)
            })
JS;
$this->registerJs($js);
?>
