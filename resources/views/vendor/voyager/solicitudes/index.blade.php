<?php
use \Carbon\Carbon;
?>

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
                                                <th aria-label="Apellido">
                                                    Apellido
                                                </th>
                                                <th aria-label="Teléfono">
                                                    Teléfono
                                                </th>
                                                <th aria-label="Email">
                                                    Email
                                                </th>
                                                <th aria-label="Mac">
                                                    Mac
                                                </th>
                                                <th aria-label="Fecha de acceso">
                                                    Fecha de acceso
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                            <tr role="row">
                                                <td>
                                                    <div>{{ $item->name }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->lastname }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->phone }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->email }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->mac }}</div>
                                                </td>
                                                <td>
                                                    <div>{{ $item->created_at }}</div>
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

    <script>

        document.actions.exportbtn.onclick = function(){
            document.actions.action = '/export';
            document.actions.submit();
        };
        
        document.actions.filterbtn.onclick = function(){
            document.actions.action = '/admin';
            document.actions.submit();
        };

        document.actions.table.onchange = function(){
            document.actions.action = '/admin';
            document.actions.submit();
        };


    </script>

@stop