@extends('vwMainTemplate')
@section('contenido')
<html>
</br>
<form>
<div class="container-fluid px-4">
    <h1 class="mt-4">Registrar Evento</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/evento/store" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="row">
        <div class="col-sm">
        <label for="txtEvento">Nombre del Evento</label>

        <input type="text" class="form-control" id="txtEvento" placeholder="Nombre del evento" name="NOM_EVENTO">
        </div>

    </div>
    </br>
    <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Riesgo</label>
        <select id="cbCategoria" class="form-control" name="NOM_RIESGO">
            @foreach ($riesgo as $riesg)
                <option value="{{$riesg['id']}}">{{$riesg['nom_riesgos']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Fecha del Evento</label>
        <input type="date" class="form-control" id="txtClasificacion" placeholder="" name="FEC_EVENTO">
        </div>
    </div>
    
    
    </br>
    
    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Situación Presentada</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="DES_SITUACION_PRE"></textarea>
        </div>
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Detalle de medidas o controles aplicados</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="DES_DETALLE_MEDIDAS"></textarea>
        </div>
    </div>

    </br>
    
    <div class="row">
        <div class="col-sm">
        <label for="cbProbabilidad">Estado de Resolución del Evento</label>
        <select id="cbProbabilidad" class="form-control" name="ID_ESTADO_RESOLUCION">
           @foreach ($estadoresolucion as $estresolucion)
                <option value="{{$estresolucion['id']}}">{{$estresolucion['nom_estado_resolucion']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm">
        <label for="cbImpacto">Accion Aplicada al evento</label>
        <select id="cbImpacto" class="form-control" name="ID_ACCION">
          @foreach ($accionsel as $accion)
                <option value="{{$accion['id']}}">{{$accion['nom_accion']}}</option>
          @endforeach
        </select>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Justificación por evento no resuelto</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="JUS_EVENTO_NO_RESUELTO"></textarea>
        </div>
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Justificación por medida aplicada</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="JUS_MEDIDA_APLICADA"></textarea>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="cbUnidadMedida">Unidad de Medida (Pérdidas anuales)</label>
            <select id="cbUnidadMedida" class="form-control" name="ID_UNIDAD_MEDIDA">
                 @foreach ($unidadmedidasel as $unidadmed)
                    <option value="{{$unidadmed['id']}}">{{$unidadmed['nom_unidad_medida']}}</option>
                 @endforeach
            </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Pérdida Estimada por el Evento</label>
        <input type="text" class="form-control" id="txtClasificacion" placeholder="" name="NUM_PERDIDA_ESTIMADA" >
        </div>
        <div class="col-sm">
            <label for="txtClasificacion">RTO Estimado</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="" name="NUM_RTO">
        </div>
    </div>

    </br>
    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Lecciones aprendidas</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="DES_LECCIONES_APREND"></textarea>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
            <button type="submit" class="btn btn-primary my-1">Registrar Evento</button>
        </div>  
    </div>
    
</div>
</form>
</html>
@endsection