@extends('vwMainTemplate')
@section('contenido')

</br>
<form>
<div class="container-fluid px-4">
    <h1 class="mt-4">Identificación y Análisis del Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Prototipo (Mockup) Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>

    <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Riesgo</label>
        <input type="text" class="form-control" id="txtRiesgo" placeholder="Nombre Riesgo"> 
        </div>
        <div class="col-sm">
        <label for="cbCategoria">Categoria</label>
        <select id="cbCategoria" class="form-control">
            <option selected>Seleccione...</option>
            <option>Operativo</option>
            <option>Financiero</option>
            <option>Tecnológico</option>
            <option>Otro</option>
        </select>
        </div>
    </div>
    
    
    </br>
    
    <div class="row">
        <div class="col-sm">
        <label for="txtDetalleRiesgo">Detalle del Riesgo</label>
        <textarea class="form-control" id="txtDetalleRiesgo" rows="3"></textarea>
        </div>
        <div class="col-sm">
        <label for="cbProceso">Proceso que afecta</label>
        <select id="cbProceso" class="form-control">
            <option selected>Seleccione...</option>
            <option>...</option>
        </select>
        </div>
    </div>

    </br>
    
    <div class="row">
        <div class="col-sm">
        <label for="cbProbabilidad">Probabilidad</label>
        <select id="cbProbabilidad" class="form-control">
            <option selected>Seleccione...</option>
            <option>Casi Nunca</option>
            <option>Rara vez</option>
            <option>Ocasionalmente</option>
            <option>Muy Probable</option>
            <option>Casi siempre</option>
        </select>
        </div>
        <div class="col-sm">
        <label for="cbImpacto">Impacto</label>
        <select id="cbImpacto" class="form-control">
            <option selected>Seleccione...</option>
            <option>Mínimo</option>
            <option>Bajo</option>
            <option>Moderado</option>
            <option>Alto</option>
            <option>Crítico</option>
        </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Calificacion</label>
        <input type="text" class="form-control" id="txtClasificacion" placeholder="Riesgo Moderado" readonly>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
            <label for="cbImpacto">Acción</label>
            <select id="cbImpacto" class="form-control">
                <option selected>Seleccione...</option>
                <option>Eliminar</option>
                <option>Mitigar</option>
                <option>Evitar</option>
                <option>Asumir</option>
            </select>
        </div>
        <div class="col-sm">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
            <label class="form-check-label" for="defaultCheck2">
                Afecta directamente la prestación de uno o varios servicios?
            </label>
        </div>
        <div class="col-sm">
            <label for="txtClasificacion">RTO (Tiempo Objetivo de Recuperación)</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="" >
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="cbUnidadMedida">Unidad de Medida (Pérdidas anuales)</label>
            <select id="cbUnidadMedida" class="form-control">
                <option selected>Seleccione...</option>
                <option>Unidad</option>
                <option>Monto</option>
                <option>Porcentaje</option>
            </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Tolerancia (Pérdidas anuales)</label>
        <input type="text" class="form-control" id="txtClasificacion" placeholder="" >
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Capacidad (Pérdidas anuales)</label>
        <input type="text" class="form-control" id="txtClasificacion" placeholder="" >
        </div>
    </div>

    </br>
    
    <div class="row">
        <div class="col-sm">
            
       
        
        <a href="#" class="link-primary">Ver Revisiones</a> 
        <br>
        <button type="submit" class="btn btn-primary my-1">Registrar Riesgo</button>  
    </div>
    
</div>
</form>

@endsection