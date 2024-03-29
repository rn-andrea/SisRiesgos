
@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>

 
.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

.btn-file:hover {
 color: #0d6efd;
 
  
}
</style>
<body>

<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Identificación y Análisis del Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
        <form action="/identificarriesgo/update/{{$riesg->id}}" method="POST" enctype="multipart/form-data">
		@csrf
        {{method_field('PUT')}}
    <div class="row">
    <input class="form-check-input" type="hidden" value="RI-" name="id_riesgo" >
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Riesgo</label>

        <input type="text" class="form-control {{$errors->has('nom_riesgos')?'is-invalid':'' }}" id="txtRiesgo" placeholder="Nombre Riesgo" name="nom_riesgos" value="{{$riesg->nom_riesgos}}">
        {!! $errors->first('nom_riesgos','<div class="invalid-feedback">:message</div>') !!}   
    </div>
        <div class="col-sm">
        <label for="cbCategoria">Categoria</label>
        <select id="cbCategoria" class="form-control " name="id_categoria" value="{{$riesg->id_categoria}}">
        <option value="{{$riesg['id_categoria']}}">{{$riesg->categoria->nombre_categoria}}</option>  
                @foreach ($categoriasel as $categ)
                        <option value="{{$categ['id']}}">{{$categ['nombre_categoria']}}</option>
                   @endforeach
                </select>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="txtDetalleRiesgo">Detalle del Riesgo</label>
        <textarea class="form-control {{$errors->has('detalle')?'is-invalid':'' }}" id="txtDetalleRiesgo" rows="3" name="detalle">{{$riesg->des_detalle}}</textarea>
        {!! $errors->first('detalle','<div class="invalid-feedback">:message</div>') !!}       
    </div>
        <div class="col-sm">
        <label for="cbProceso">Proceso que afecta</label>

        <select id="cbProceso" class="form-control" name="id_proceso_afecta" >
        <option value="{{$riesg['id_proceso_afecta']}}">{{$riesg->procesoafecta->nom_proceso_afecta}}</option>  
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
        <select id="cbProbabilidad" class="form-control" name="id_probabilidad">
        <option value="{{$riesg['id_probabilidad']}}">{{$riesg->probabilidad->nom_probabilidad}}</option>  
            @foreach ($probabilidadsel as $probabilida)
                 <option value="{{$probabilida['id']}}">{{$probabilida['nom_probabilidad']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm">
        <label for="cbImpacto">Impacto</label>
        <select id="cbImpacto" class="form-control" name="id_impacto">
        <option value="{{$riesg['id_impacto']}}">{{$riesg->impacto->nom_impacto}}</option>  
            @foreach ($impactosel as $impactosel)
                 <option value="{{$impactosel['id']}}">{{$impactosel['nom_impacto']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Calificacion</label>
        <input type="text" class="form-control" id="calificacion" name="calificacion" readonly value="{{$riesg->tot_calificacion}}">
        <input type="hidden" class="form-control" id="calificacionp" name="calificacionp" readonly >
        <input type="hidden" class="form-control" id="calificacioni" name="calificacioni" readonly  >
    </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
            <label for="cbAccion">Acción</label>
            <select id="cbImpacto" class="form-control" name="id_accion">
            <option value="{{$riesg['id_accion']}}">{{$riesg->accion->nombre_accion}}</option>    
                @foreach ($accionsel as  $accion)
                    <option value="{{$accion['id']}}">{{$accion['nombre_accion']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
                <input class="form-check-input" type="checkbox"  name="ind_afecta_servicio" id="ind_afecta_servicio" checked>
                    <label class="form-check-label" for="defaultCheck2">
                Afecta directamente la prestación de uno o varios servicios?
            </label>
        </div>
        <div class="col-sm">
            <label for="txtClasificacion">RTO (Tiempo Objetivo de Recuperación)</label>
            <input type="number"class="form-control" id="rto" placeholder="" name="rto" value="{{$riesg->num_rto}}">
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="cbUnidadMedida">Unidad de Medida (Pérdidas anuales)</label>
            <select id="cbUnidadMedida" class="form-control" name="id_unidad_medida">
            <option value="{{$riesg['id_unidad_medida']}}">{{$riesg->unidadmedida->nom_unidad_medida}}</option>    
             @foreach ($unidadmedidasel as  $unidadmed)
                    <option value="{{$unidadmed['id']}}">{{$unidadmed['nom_unidad_medida']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Tolerancia (Pérdidas anuales)</label>
        <input type="text" class="form-control {{$errors->has('tolerancia')?'is-invalid':'' }}" id="txtClasificacion" placeholder="" name="tolerancia"  value="{{$riesg->tot_tolerancia}}">
        {!! $errors->first('tolerancia','<div class="invalid-feedback">:message</div>') !!}      
    </div>
        <div class="col-sm">
        <label for="txtClasificacion">Capacidad (Pérdidas anuales)</label>
        <input type="text" class="form-control {{$errors->has('capacidad')?'is-invalid':'' }}" id="txtClasificacion" placeholder="" name="capacidad" value="{{$riesg->tot_capacidad}}">
        {!! $errors->first('capacidad','<div class="invalid-feedback">:message</div>') !!}         
    </div>

    </div>

    </br>

       <div class="row">
                <div class="col-sm">
				<input class="form-check-input" type="hidden" value="2" name="estado" >
                <input class="form-check-input" type="checkbox" value="1" name="estado" id="defaultCheck3" checked>
                    <label class="form-check-label" for="Activo">
                        Estado Activo
                    </label>
                    </div>
                    </br>          
</div>
</br>

<div class="row">
</br>
        <div class="col-sm">
        <span class="btn btn-file">Haga click aquí para subir un archivo
                        <input type="file" id="fileUpload" placeholder="Seleccione el archivo" name="inpArchivo">
    </span>
                    </div><label id='lblArchR' style="color: red"></label>
    </div>
    <div class="row">
    </br>
    <div class="row">

    <div class="col-sm">

<button type="submit" class="btn btn-primary my-1">Actualizar Riesgo</button>
</div>
    
        
</div>
    </form>

    <div class="row">
    <div class="card-body">
                <table id="datatablesSimple">
                <thead>
                        <tr>
                            <th>ID Riesgo</th>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>ProcesoAfecta</th>
                            <th>Probabilidad</th>
                            <th>Impacto</th>
                            <th>Calificacion</th>
                            <th>Accion</th>
                            <th>RTO</th>
                            <th>Unidad Medida</th>
                            <th>Tolerancia</th>
                            <th>Capacidad</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creador</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificador</th>
                            <th>Estado</th>
                            <th>Archivo</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Riesgo</th>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>ProcesoAfecta</th>
                            <th>Probabilidad</th>
                            <th>Impacto</th>
                            <th>Calificacion</th>
                            <th>Accion</th>
                            <th>RTO</th>
                            <th>Unidad Medida</th>
                            <th>Tolerancia</th>
                            <th>Capacidad</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creador</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificador</th>
                            <th>Estado</th>
                            <th>Archivo</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($riesgos as $riesgo)
                             <tr>
								<td>{{$riesgo->id_riesgos}}</td>
								<td>{{$riesgo->nom_riesgos}}</td>
								<td>{{$riesgo->des_detalle}}</td>
                                <td>{{$riesgo->categoria->nombre_categoria}}</td>
                                <td>{{$riesgo->procesoafecta->nom_proceso_afecta}}</td>
                                <td>{{$riesgo->probabilidad->nom_probabilidad}}</td>
                                <td>{{$riesgo->impacto->nom_impacto}}</td>
                                <td>{{$riesgo->tot_calificacion}}</td>
                                <td>{{$riesgo->accion->nombre_accion}}</td>
                                <td>{{$riesgo->num_rto}}</td>
                                <td>{{$riesgo->unidadmedida->nom_unidad_medida}}</td>
                                <td>{{$riesgo->tot_tolerancia}}</td>
                                <td>{{$riesgo->tot_capacidad}}</td>
                                <td>{{$riesgo->created_at}}</td>
                                <td>{{$riesgo->usuario->usr_nombre}} {{$riesgo->usuario->usr_apellidos}}</td>
                                <td>{{$riesgo->updated_at}}</td>
                                <td>{{$riesgo->usuario1->usr_nombre}} {{$riesgo->usuario1->usr_apellidos}}</td>
                                <td>{{$riesgo->estado->nom_estado}}</td>
                                <td><a href='{{Storage::url($riesgo->nom_archivo)}}'>Link del archivo</a></td>
							 </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
    </div>


</form>
</div>
<label id='lblArch'>{{$riesg->nom_archivo}}</label>

<script>
           
        $('#ind_afecta_servicio').click(function(){
        if($('#ind_afecta_servicio').is(':checked')){
        // Acá dentro pones tu código para cuando esté seleccionado
        
         $('#rto').show();
         $('#ind_afecta_servicio').val('Afecta');
         } else {
        // Acá dentro pones tu código para cuando NO esté seleccionado
        $('#rto').hide();
        $('#ind_afecta_servicio').val('No afecta');
        $('#rto').val('0');
         }
    });

             var datoaccion = document.getElementById("lblArch").innerText;
            if(datoaccion == null || datoaccion.length == 0 || /^\s+$/.test(datoaccion) ){
               
                document.getElementById("lblArchR").innerText = "";
            }else
            {
               document.getElementById("lblArchR").innerText = "Hay un archivo almacenado, si inserta un archivo nuevo este se borrara";
           
            }
          


    var selection= document.getElementById("cbProbabilidad");
    var selection2= document.getElementById("cbImpacto");
    $('#calificacion').val(selection.selectedOptions[0].value*selection2.selectedOptions[0].value);
    selection.addEventListener('change',
        function(){
            $('#calificacionp').val(selection.selectedOptions[0].value);
            $('#calificacion').val(selection.selectedOptions[0].value*selection2.selectedOptions[0].value);
           
     });
     selection2.addEventListener('change',
        function(){
            $('#calificacioni').val(selection2.selectedOptions[0].value);
            $('#calificacion').val(selection.selectedOptions[0].value*selection2.selectedOptions[0].value);
           
     });
let nomArch = document.getElementById('lblArch').innerText;
if(nomArch!=null)
{
    Swal.fire('Atención: si sube un archivo a este riesgo, reemplazará al anterior', '', 'info');
}

</script>
</body>
</html>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Agregar')=='ok')
        <script>
             Swal.fire('Riesgo registrado con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/>El nombre de riesgo ya está en uso', '', 'error')
        </script>
    @endif
  
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
    @if (session('Modifica')=='info')
        
        <script>
             Swal.fire('Atención: si sube un archivo a este riesgo, reemplazará al anterior', '', 'info')
        </script>
    @endif
@endsection