@extends('voyager::master') 

@section('page_title', 'Ver Solicitud') 

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-check"></i> Viendo Solicitud &nbsp;
        
        <a href="#" title="Aprobar" class="btn btn-sm btn-success" style="left: 0; top: 0; ">
            <i class="voyager-check"></i> <span class="hidden-xs hidden-xs">Aprobar</span>
        </a>
        <a href="#" title="Rechazar" class="btn btn-sm btn-danger">
            <i class="voyager-x"></i> <span class="hidden-xs hidden-xs">Rechazar</span>
        </a>
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered" style="padding-bottom:5px;">

                        {{-- {{dd($solicitud['user'])}} --}}

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Avatar</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <img class="img-responsive" style="max-height: 300px;" src="@if( !filter_var($solicitud['user']->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( $solicitud['user']->avatar ) }}@else{{ $solicitud['user']->avatar }}@endif">
                        </div><!-- panel-body -->
                        
                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Nombre</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <p>{{ $solicitud['user']->name }}</p>
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Username</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <p>{{ $solicitud['user']->username }}</p>
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Email</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <p>{{ $solicitud['user']->email }}</p>
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Teléfono</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <p>{{ $solicitud['user']->telefono }}</p>
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Dirección</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <p>{{ $solicitud['user']->direccion }}</p>
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Plan</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <p>{{ $solicitud['contratista']->plan->titulo }}</p>
                        </div><!-- panel-body -->
    
                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Descripción</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <p>{{ $solicitud['contratista']->descripcion }}</p>
                        </div><!-- panel-body -->
    
                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Tipos de Trabajo</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            @if ($solicitud['contratista']->tipotrabajos->isEmpty())
                                <p>No hay resultados</p>
                            @else
                                <ul>
                                    @foreach ($solicitud['contratista']->tipotrabajos as $item)
                                        <li>{{ $item->nombre }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Role</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <p>{{ $solicitud['user']->role->display_name }}</p>
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Roles</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <ul>
                                @foreach ($solicitud['user']->roles as $role)
                                    <li>{{ $role->display_name }}</li>
                                @endforeach
                            </ul>
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Estado</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            @if ( is_null($solicitud['contratista']->estado) )
                                <p>No hay resultados</p>
                            @else
                                <p>{{ $solicitud['contratista']->estado }}</p>
                            @endif
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Última ubicación</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            <p>{{ $solicitud['contratista']->ultima_ubicacion }}</p>                            
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Created At</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            {{ $solicitud['contratista']->created_at }}                            
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">Updated At</h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            {{ $solicitud['contratista']->updated_at }}
                        </div><!-- panel-body -->

                        <hr style="margin:0;">

                    </div>
                </div>
            </div>
        </div>
@stop 

@section('javascript')