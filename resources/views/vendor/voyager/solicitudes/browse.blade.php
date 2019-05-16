
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
                            {{-- TODO buscar por fechas y exportar a excel --}}

                            {{-- <div class="row">
                                <form name="actions" method="get">
                                    <div class="row form-group">

                                        <div class="row form-group">
                                            <label class="col-sm-2">Desde:</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="date_from" class="form-control input-sm" value="{{ $date_from }}">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <label class="col-sm-2">Hasta:</label>
                                            <div class="col-sm-10">
                                                <input type="date" name="date_to" class="form-control input-sm" value="{{ $date_to  }}">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row form-group">

                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <input id="filterbtn" name="filterbtn" type="button" class="form-control input-sm" value="Filtrar">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <input id="exportbtn" name="exportbtn" type="button" class="form-control input-sm btn btn-success" value="Exportar">
                                            </div>
                                        </div>

                                    </div>

                                    @if (isset($tables))
                                        <div class="row form-group">
                                            <div class="col-sm-12">
                                                <select class="form-control select" id="table" name="table">
                                                    @foreach ($tables as $item)
                                                    <option value="{{ $item['table_name'] }}"
                                                    {{ ($item['table_name'] == $table ? 'selected' : '') }}>{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif                                    


                                </form>
                            </div> --}}

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
                                            @foreach ($solicitudes as $key => $item)
                                            <tr role="row">
                                                {{-- {{dd($item->contratistas[0])}} --}}
                                                <td>
                                                    <div>{{ $item->name }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->username }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->email }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->telefono }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->contratistas[0]->plan->titulo }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->contratistas[0]->descripcion }}</div>
                                                </td>
                                                <td class="bet">
                                                    <a href="#" title="Aprobar" class="btn btn-sm btn-success pull-right" style="margin-right: 5px;">
                                                        <i class="voyager-check"></i> <span class="hidden-xs hidden-sm"></span>
                                                    </a>
                                                    <a href="#" title="Rechazar" class="btn btn-sm btn-danger pull-right" style="margin-right: 5px;">
                                                        <i class="voyager-x"></i> <span class="hidden-xs hidden-sm"></span>
                                                    </a>
                                                    <a href="{{ route('voyager.solicitudes.read', $item->id) }}" title="Ver" class="btn btn-sm btn-warning pull-right" style="margin-right: 5px;">
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