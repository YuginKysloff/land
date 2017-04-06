<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Подробная информация</h4>
            </div>
            <div class="modal-body">
                <h1>{!! $slide->title !!}</h1>
                <h2>{!! $slide->subtitle !!}</h2>
                <p><strong>Статус:</strong> {{ ($slide->published) ? 'включен' : 'выключен' }}</p>
                <p><strong>Вес:</strong> {{ $slide->weight }}</p>
                <p><strong>Создан:</strong> {{ $slide->created_at }}</p>
                <p><strong>Изменен:</strong> {{ $slide->updated_at }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary">Редактировать</button>
            </div>
        </div>
    </div>
</div>