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
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Слайды</h3>
                        </div>
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
                                    @foreach($slides as $slide)
                                        <tr>
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
                                                <a href="#" title="Редактирование записи">
                                                    <i class="fa fa-edit fa-2x" style="margin: 0 10px;"></i>
                                                </a>
                                                <a href="#" title="Удаление записи" onclick="return confirm('Вы точно хотите удалить запись')">
                                                    <i class="fa fa-close fa-2x" style="margin: 0 10px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#table__slides').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        });
    </script>
@endsection