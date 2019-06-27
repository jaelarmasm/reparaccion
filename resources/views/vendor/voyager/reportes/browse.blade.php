
@extends('voyager::master') 
@section('page_title', 'Solicitudes') 
@section('page_header')

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
                                    {{$title}}
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