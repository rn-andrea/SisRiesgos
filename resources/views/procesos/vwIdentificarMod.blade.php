
@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Identificación y Análisis del Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
        <form action="/identificarriesgo/update/{{$riesg->id}}" method="POST">
		@csrf
        {{method_field('PUT')}}
    <div class="row">
    <input class="form-check-input" type="hidden" value="RI-" name="ID_RIESGO" >
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Riesgo</label>

        <input type="text" class="form-control" id="txtRiesgo" placeholder="Nombre Riesgo" name="NOM_RIESGO" value="{{$riesg->nom_riesgos}}">
        </div>
        <div class="col-sm">
        <label for="cbCategoria">Categoria</label>
        <select id="cbCategoria" class="form-control" name="ID_CATEGORIA" value="{{$riesg->id_categoria}}">
                   @foreach ($categoriasel as $categ)
                        <option value="{{$categ['id']}}">{{$categ['nom_categoria']}}</option>
                   @endforeach
                </select>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="txtDetalleRiesgo">Detalle del Riesgo</label>
        <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="DES_DETALLE">{{$riesg->des_detalle}}</textarea>
        </div>
        <div class="col-sm">
        <label for="cbProceso">Proceso que afecta</label>

        <select id="cbProceso" class="form-control" name="ID_PROCESO_AFECTA" >
                    @foreach ($procesoafectasel as $procesoafect)
                        <option value="{{$procesoafect['id']}}">{{$procesoafect['nom_proceso_afecta']}}</option>
                   @endforeach
        </select>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="cbProbabilidad">Probabilidad</label>
        <select id="cbProbabilidad" class="form-control" name="ID_PROBABILIDAD">
            @foreach ($probabilidadsel as $probabilida)
                 <option value="{{$probabilida['id']}}">{{$probabilida['nom_probabilidad']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm">
        <label for="cbImpacto">Impacto</label>
        <select id="cbImpacto" class="form-control" name="ID_IMPACTO">
            @foreach ($impactosel as $impactosel)
                 <option value="{{$impactosel['id']}}">{{$impactosel['nom_impacto']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Calificacion</label>
        <input type="text" class="form-control" id="txtClasificacion" name="TOT_CALIFICACION" readonly value="{{$riesg->tot_calificacion}}">
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
            <label for="cbAccion">Acción</label>
            <select id="cbImpacto" class="form-control" name="ID_ACCION">
                @foreach ($accionsel as  $accion)
                    <option value="{{$accion['id']}}">{{$accion['nom_accion']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
        <input class="form-check-input" type="hidden" value="2" name="IND_AFECTA_SERVICIO" >
                <input class="form-check-input" type="checkbox" value="1" name="IND_AFECTA_SERVICIO" id="defaultCheck3" checked>
                    <label class="form-check-label" for="defaultCheck2">
                Afecta directamente la prestación de uno o varios servicios?
            </label>
        </div>
        <div class="col-sm">
            <label for="txtClasificacion">RTO (Tiempo Objetivo de Recuperación)</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="" name="NUM_RTO" value="{{$riesg->num_rto}}">
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="cbUnidadMedida">Unidad de Medida (Pérdidas anuales)</label>
            <select id="cbUnidadMedida" class="form-control" name="ID_UNIDAD_MEDIDA">
                @foreach ($unidadmedidasel as  $unidadmed)
                    <option value="{{$unidadmed['id']}}">{{$unidadmed['nom_unidad_medida']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Tolerancia (Pérdidas anuales)</label>
        <input type="text" class="form-control" id="txtClasificacion" placeholder="" name="TOT_TOLERANCIA" value="{{$riesg->tot_tolerancia}}">
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Capacidad (Pérdidas anuales)</label>
        <input type="text" class="form-control" id="txtClasificacion" placeholder="" name="TOT_CAPACIDAD" value="{{$riesg->tot_capacidad}}">
        </div>

    </div>

    </br>

       <div class="row">
                <div class="col-sm">
				<input class="form-check-input" type="hidden" value="2" name="IND_ESTADO" >
                <input class="form-check-input" type="checkbox" value="1" name="IND_ESTADO" id="defaultCheck3" checked>
                    <label class="form-check-label" for="Activo">
                        Estado Activo
                    </label>
                    </div>
                    <div class="row">
                    <input type="file" name="inpArchivo">
            </div>
    <div class="row">
        <div class="col-sm">
        <br>
        <button type="submit" class="btn btn-primary my-1">Registrar Riesgo</button>
    </div>


    <div class="row">
    <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>ProcesoAfecta</th>
                            <th>Probabilidad</th>
                            <th>Impacto</th>
                            <th>Calificacion</th>
                            <th>Accion</th>
                            <th>Unidad Medida</th>
                            <th>Estado</th>
                            <th>Fecha Creacion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID </th>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>ProcesoAfecta</th>
                            <th>Probabilidad</th>
                            <th>Impacto</th>
                            <th>Calificacion</th>
                            <th>Accion</th>
                            <th>Unidad Medida</th>
                            <th>Estado</th>
                            <th>Fecha Creacion</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($riesgos as $riesgo)
                             <tr>
								<td>{{$riesgo->id_riesgos}}</td>
								<td>{{$riesgo->nom_riesgos}}</td>
								<td>{{$riesgo->des_detalle}}</td>
                                <td>{{$riesgo->categoria->nom_categoria}}</td>
                                <td>{{$riesgo->procesoafecta->nom_proceso_afecta}}</td>
                                <td>{{$riesgo->probabilidad->nom_probabilidad}}</td>
                                <td>{{$riesgo->impacto->nom_impacto}}</td>
                                <td>{{$riesgo->tot_calificacion}}</td>
                                <td>{{$riesgo->accion->nom_accion}}</td>
                                <td>{{$riesgo->unidadmedida->nom_unidad_medida}}</td>
                                <td>{{$riesgo->estado->nom_estado}}</td>
                                <td>{{$riesgo->created_at}}</td>
                             
							 </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
    </div>


</form>
</div>
</html>

@endsection
