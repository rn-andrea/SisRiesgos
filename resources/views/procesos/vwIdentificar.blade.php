
@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    input[type=file]::file-selector-button {
  border: 2px solid   #7d7d7d;
  padding: .2em .4em;
  border-radius: .2em;
  background-color:   #7d7d7d;;
  color: #ffffff;
  transition: 1s;
 
}

input[type=file]::file-selector-button:hover {
  background-color: #81ecec;
  border: 2px solid #00cec9;
  
}
</style>
<body>

<div class="container-fluid px-4">
    <h1 class="mt-4">Identificación y Análisis del Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/identificarriesgo/store" method="POST" enctype="multipart/form-data">
	@csrf
    <input class="form-check-input" type="hidden" value="RI-" name="id_riesgo" >
    <div class="row">
    
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Riesgo</label>
        <input type="text" class="form-control {{$errors->has('nom_riesgos')?'is-invalid':'' }}" id="txtRiesgo" placeholder="Digite el nombre del riesgo" name="nom_riesgos" value="{{old('nom_riesgos')}}">
        {!! $errors->first('nom_riesgos','<div class="invalid-feedback">:message</div>') !!}
    </div>
        <div class="col-sm">
        <label for="cbCategoria">Categoria</label>
        <select id="cbCategoria" class="form-control" name="id_categoria" >
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
        <textarea class="form-control {{$errors->has('detalle')?'is-invalid':'' }}" id="txtDetalleRiesgo" rows="3" name="detalle" placeholder="Digite los detalle del riesgo" value="{{old('detalle')}}"></textarea>
        {!! $errors->first('detalle','<div class="invalid-feedback">:message</div>') !!}    
    </div>
        <div class="col-sm">
        <label for="cbProceso">Proceso que afecta</label>

        <select id="cbProceso" class="form-control" name="id_proceso_afecta">
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
        <select  id="cbProbabilidad" class="form-control" name="id_probabilidad">
            @foreach ($probabilidadsel as $probabilida)
                 <option value="{{$probabilida['id']}}">{{$probabilida['nom_probabilidad']}}</option>
                 
                 @endforeach

        </select>
        </div>
        <div class="col-sm">
        <label for="cbImpacto">Impacto</label>
        <select id="cbImpacto" class="form-control" name="id_impacto">
            @foreach ($impactosel as $impactosel)
                 <option value="{{$impactosel['id']}}">{{$impactosel['nom_impacto']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm">
        <label for="calificacion">Calificacion</label>
        <input type="text" class="form-control" id="calificacion" name="calificacion" readonly  >
        <input type="hidden" class="form-control" id="calificacionp" name="calificacionp" readonly >
        <input type="hidden" class="form-control" id="calificacioni" name="calificacioni" readonly  >
    </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
            <label for="cbAccion">Acción</label>
            <select id="cbImpacto" class="form-control" name="id_accion">
                @foreach ($accionsel as  $accion)
                    <option value="{{$accion['id']}}">{{$accion['nombre_accion']}}</option>
                @endforeach
            </select>
        </div>
       
        <div class="col-sm">
            
       
                <input class="form-check-input" type="checkbox"  id="ind_afecta_servicio" value="Afecta" name="ind_afecta_servicio" id="defaultCheck3" >
                    <label class="form-check-label" for="defaultCheck2">
                Afecta directamente la prestación de uno o varios servicios?
            </label>

        </div>
        <div class="col-sm">
      
            <label id="x" for="txtClasificacion">RTO (Tiempo Objetivo de Recuperación)</label>
                <input type="number" class="form-control {{$errors->has('rto')?'is-invalid':'' }}" id="rto" name="rto" placeholder="Digite el número de RTO" >
                {!! $errors->first('rto','<div class="invalid-feedback">:message</div>') !!}  
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="cbUnidadMedida">Unidad de Medida (Pérdidas anuales)</label>
            <select id="cbUnidadMedida" class="form-control" name="id_unidad_medida">
                @foreach ($unidadmedidasel as  $unidadmed)
                    <option value="{{$unidadmed['id']}}">{{$unidadmed['nom_unidad_medida']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Tolerancia (Pérdidas anuales)</label>
        <input type="text" class="form-control {{$errors->has('tolerancia')?'is-invalid':'' }}" id="txtClasificacion" name="tolerancia"  placeholder="Digite el número de telerancia" value="{{old('tolerancia')}}">
        {!! $errors->first('tolerancia','<div class="invalid-feedback">:message</div>') !!}      
    </div>
        <div class="col-sm">
        <label for="txtClasificacion">Capacidad (Pérdidas anuales)</label>
        <input type="text" class="form-control {{$errors->has('capacidad')?'is-invalid':'' }}" id="txtClasificacion" name="capacidad"  placeholder="Digite el número de capacidad" value="{{old('capacidad')}}">
        {!! $errors->first('capacidad','<div class="invalid-feedback">:message</div>') !!}     
    </div>
    </br>

    <input type="hidden" class="form-control" id="txtRiesgo" placeholder="Digite el nombre del riesgo" name="id_riesgo" value="RI- ">

    </br>
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
    <div class="row">
        
    <div class="col-sm">
                    
                    <input type="file" id="fileUpload" placeholder="Seleccione el archivo" name="inpArchivo">
                </div>
</div>

<div class="row">
    
    <div class="row">

    <div class="col-sm">

<button type="submit" class="btn btn-primary my-1">Registrar Riesgo</button>
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
                            <th>Archivo</th>
                            <th>Estado</th>
                            <th></th>
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
                            <th>Archivo</th>
                            <th>Estado</th>
                            <th></th>
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
                                <td><a href='{{Storage::url($riesgo->nom_archivo)}}'>Link del archivo</a></td>
                                <td>{{$riesgo->estado->nom_estado}}</td>
                                
                                 
                                
                                <td>  <a href="/identificarriesgo/{{$riesgo->id}}">Modificar</a></td>
							 </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
    </div>



</div>
<script>
           $('#rto').hide();
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
             Swal.fire('Error<br/>', '', 'error')
        </script>
    @endif
  
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
    @if (session('Modifica')=='info')
        
        <script>
             Swal.fire('No ha realizado ningun cambio al riesgo seleccionada', '', 'info')
        </script>
    @endif
@endsection