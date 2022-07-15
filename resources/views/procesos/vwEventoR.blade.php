@extends('vwMainTemplate')
@section('contenido')

</br>
<form>
<div class="container-fluid px-4">
    <h1 class="mt-4">Registrar Evento</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Prototipo (Mockup) Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>

    <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Riesgo</label>
        <select id="cbCategoria" class="form-control">
            <option selected>Seleccione...</option>
            <option>Falla en servidor</option>
            <option>Fraude externo</option>
            <option>Aumento del tipo de cambio</option>
            <option>Rotación de Personal</option>
        </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Fecha del Evento</label>
        <input type="text" class="form-control" id="txtClasificacion" placeholder="">
        </div>
    </div>
    
    
    </br>
    
    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Situación Presentada</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3"></textarea>
        </div>
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Detalle de medidas o controles aplicados</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3"></textarea>
        </div>
    </div>

    </br>
    
    <div class="row">
        <div class="col-sm">
        <label for="cbProbabilidad">Estado de Resolución del Evento</label>
        <select id="cbProbabilidad" class="form-control">
            <option selected>Seleccione...</option>
            <option>Abierto / Pendiente</option>
            <option>Cerrado / Resuelto</option>
            <option>Cerrado / No Resuelto</option>
        </select>
        </div>
        <div class="col-sm">
        <label for="cbImpacto">Accion Aplicada al evento</label>
        <select id="cbImpacto" class="form-control">
            <option selected>Seleccione...</option>
            <option>Eliminar</option>
            <option>Mitigar</option>
            <option>Evitar</option>
            <option>Asumir</option>
        </select>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Justificación por evento no resuelto</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3"></textarea>
        </div>
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Justificación por medida aplicada</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3"></textarea>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="cbUnidadMedida">Unidad de Medida (Pérdidas anuales)</label>
            <select id="cbUnidadMedida" class="form-control" readonly>
                <option selected>Seleccione...</option>
                <option>Unidad</option>
                <option>Monto</option>
                <option>Porcentaje</option>
            </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Pérdida Estimada por el Evento</label>
        <input type="text" class="form-control" id="txtClasificacion" placeholder="" >
        </div>
        <div class="col-sm">
            <label for="txtClasificacion">RTO Estimado</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="" >
        </div>
    </div>

    </br>
    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Lecciones aprendidas</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3"></textarea>
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

@endsection