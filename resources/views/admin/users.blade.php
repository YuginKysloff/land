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
                Секция управления пользователями
            </h1>
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
                {{--<li class="active">Here</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Пользователи</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="table__slides" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 5%;">Вкл/Выкл</th>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th colspan="2" style="width: 10%;">Операции</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" {{ ($user->status) ? 'checked' : '' }}>
                                        </td>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td>
                                            <a href="#" title="Редактирование записи">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" title="Удаление записи" onclick="return confirm('Вы точно хотите удалить запись')">
                                                <i class="fa fa-close fa-2x"></i>
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