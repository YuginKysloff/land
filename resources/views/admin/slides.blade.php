@extends('layouts.admin')

@section('head')
    @parent
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Секция управления слайдами
            </h1>
            <a class="btn btn-primary" href="{{ route('createSlide') }}">Добавить слайд</a>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        @if(session()->has('message'))
                            <div class="box-header">
                                <p class="text-center text-success text-bold bg-success">{{ session('message') }}</p>
                            </div>
                        @endif
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table__slides" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Вкл/Выкл</th>
                                    <th>Заголовок</th>
                                    <th>Подзаголовок</th>
                                    <th>Сортировка</th>
                                    <th>Операции</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(is_object($slides))
                                        @foreach($slides as $slide)
                                            <tr class="table__row" data-id="{{ $slide->id }}">
                                                <td>
                                                    <input type="checkbox" {{ ($slide->published) ? 'checked' : '' }}>
                                                </td>
                                                <td>{!! $slide->title !!}</td>
                                                <td>{!! $slide->subtitle !!}</td>
                                                <td>
                                                    {{ $slide->weight }}
                                                    <select style="margin: 0 10px;">
                                                        @for($i = 1; $i <= count($slides); $i++)
                                                            <option {{ ($slide->weight == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="{{ route('editSlide', ['id' => $slide->id]) }}" title="Редактирование записи">
                                                        <i class="fa fa-edit fa-2x"></i>
                                                    </a>
                                                    <a href="{{ route('destroySlide') }}" onclick="event.preventDefault(); document.getElementById('delete-form{{ $slide->id }}').submit();">
                                                        <i class="fa fa-close fa-2x"></i>
                                                    </a>
                                                    <form id="delete-form{{ $slide->id }}" action="{{ route('destroySlide') }}" method="POST">
                                                        <input type="hidden" name="id" value="{{ $slide->id }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">
                                                Нет результатов
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>

        </section>
        <!-- /.content -->
    </div>

    <div id="modal__wrapper"></div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#table__slides').DataTable({
                "order": [[ 1, 'asc' ], [ 2, 'asc' ], [3, 'asc']],
                "language": {
                    "decimal":        "",
                    "emptyTable":     "Нет результатов",
                    "info":           "Показано от _START_ до _END_ из _TOTAL_ результатов",
                    "infoEmpty":      "Показано от 0 до 0 из 0 результатов",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Показано _MENU_ результатов",
                    "loadingRecords": "Загрузка...",
                    "processing":     "Обработка...",
                    "search":         "Поиск:",
                    "zeroRecords":    "Нет результатов поиска",
                    "paginate": {
                        "first":      "<<",
                        "last":       ">>",
                        "next":       ">",
                        "previous":   "<"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                },
                "columns": [
                    { "width": "5%", "orderable": false },
                    null,
                    null,
                    { "width": "5%" },
                    { "width": "5%", "orderable": false }
                ]
            });
        });
    </script>
@endsection