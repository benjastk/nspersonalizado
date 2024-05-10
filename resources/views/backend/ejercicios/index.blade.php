@extends('backend.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('css/dataTables.bootstrap.min.css') }}">
<style>
    .dataTables_length
    {
        float: left;
    }
    .paginate_button.previous
    {
        border: 1px solid black;
        padding: 6px;
        border-radius: 5px;
        background-color: #2a3042;
        color: white !important;
        font-weight: 500;
    }
    .paginate_button.next
    {
        border: 1px solid black;
        padding: 6px;
        border-radius: 5px;
        background-color: #2a3042;
        color: white !important;
        font-weight: 500;
    }
    .paginate_button
    {
        border: 1px solid black;
        padding: 6px;
        border-radius: 5px;
        background-color: #2a3042;
        color: white !important;
        font-weight: 500;
    }
    .pagination
    {
        float: right;
    }
</style>
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Listado de ejercicios</h4>

                            <div class="page-title-right">
                                <!--<ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Contactos</a></li>
                                    <li class="breadcrumb-item active">Lista de usuarios</li>
                                </ol>-->
                                <a href="/ejercicios/create" class="btn btn-info waves-effect waves-light" style="margin-right: 10px">
                                    <i class="bx bx-plus font-size-16 align-middle mr-2"></i> Crear Ejercicio
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="width: 100%;">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tabla-ingresos" class="table table-centered table-nowrap table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col" style="width: 200px; word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;" >Ejercicio</th>
                                                <th scope="col">Descripcion</th>
                                                <th scope="col">Activacion Muscular</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ejercicios as $ejercicio )
                                            <tr>
                                                <td>
                                                    <div class="avatar-xs">
                                                        <span class="avatar-title">
                                                            @if($ejercicio->imagen)
                                                            <img src="/img/ejercicios/{{ $ejercicio->imagen }}" style="width: 100%;">
                                                            @else
                                                            <img src="/backend/images/userTransparent.png" style="width: 100%;">
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                                <td style="width: 150px; word-wrap: break-word; overflow: hidden; text-overflow: ellipsis;">
                                                    <h5 class="font-size-14 mb-1"><a href="#" class="text-dark">{{ $ejercicio->nombreEjercicio }}</a></h5>
                                                    <p class="text-muted mb-0">Repeticiones: {{ $ejercicio->repeticiones }} - Series: {{ $ejercicio->series }}</p>
                                                </td>
                                                <td>{{ $ejercicio->descripcionEjercicio }}</td>
                                                <td>{{ $ejercicio->activacionMuscular }}</td>
                                                <!--
                                                <td>
                                                    <div>
                                                        <span class="badge badge-dark">{{ $ejercicio->nombre }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $ejercicio->telefono }}
                                                </td>-->
                                                <td>
                                                    <ul class="list-inline font-size-20 contact-links mb-0">
                                                        <!--<li class="list-inline-item px-2">
                                                            <a href="" data-toggle="tooltip" data-placement="top" title="Message"><i class="bx bx-message-square-dots"></i></a>
                                                        </li>
                                                        <li class="list-inline-item px-2">
                                                            <a href="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="bx bx-user-circle"></i></a>
                                                        </li>-->
                                                        <li class="list-inline-item">
                                                            <a href="/ejercicios/edit/{{ $ejercicio->id }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="bx bxs-edit-alt"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <form id="form1" action="{{ url('/ejercicios/destroy') }}" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id" value="{{ $ejercicio->id }}"/>
                                                                <button style="border: 0px; background-color: transparent;" type="submit"><i class="bx bxs-trash-alt"></i></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div style="text-align:center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © NS Personalizado.
                    </div>
                    <div class="col-sm-6">
                        <!--<div class="text-sm-right d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>-->
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->
@endsection
@section('script')
<script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('js/dataTables.bootstrap.min.js') }}"></script>
<script>
	$(document).ready( function () {
		$('#tabla-ingresos').DataTable( {
			"order": [[ 0, "desc" ]]
		});
	} );
</script>
@endsection