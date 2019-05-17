
@extends('voyager::master') 
@section('page_title', 'Solicitudes') 
@section('page_header')
<style>
    .bet {
        display: flex;
        justify-content: space-around;
    }
</style>

@stop 
@section('content')

<div class="page-content browse container-fluid">
    <div class="alerts"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dataTable" class="table table-hover dataTable no-footer" role="grid" aria-describedby="dataTable_info">
                                        <thead>
                                            <tr role="row">
                                                <th aria-label="Nombre">
                                                    Nombre
                                                </th>
                                                <th aria-label="Username">
                                                    Username
                                                </th>
                                                <th aria-label="Email">
                                                    Email
                                                </th>
                                                <th aria-label="Teléfono">
                                                    Teléfono
                                                </th>
                                                <th aria-label="Plan">
                                                    Plan
                                                </th>
                                                <th aria-label="Descripción">
                                                    Descripción
                                                </th>
                                                <th aria-label="Accions">
                                                    Acciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($solicitudes as $key => $solicitud)
                                            <tr role="row">
                                                <td>
                                                    <div>{{ $solicitud['user']->name }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $solicitud['user']->username }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $solicitud['user']->email }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $solicitud['user']->telefono }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $solicitud['contratista']->plan->titulo }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $solicitud['contratista']->descripcion }}</div>
                                                </td>
                                                <td class="bet">
                                                    <form action="{{ route('solicitudes.aprobar', $solicitud['user']->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="voyager-check"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('solicitudes.rechazar', $solicitud['user']->id) }}" method="POST" style="margin: 0 5px;">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="voyager-x"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('voyager.solicitudes.read', $solicitud['user']->id) }}" title="Ver" class="btn btn-sm btn-warning pull-right" style="margin-right: 5px;">
                                                        <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop 

@section('javascript') 

@stop