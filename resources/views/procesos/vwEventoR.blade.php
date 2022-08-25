@extends('vwMainTemplate')
@section('contenido')
<html>
</br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<body>
<div class="container-fluid px-4">
    <h1 class="mt-4">Registrar Evento</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form id='form1' action="/evento/store" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="row">
        <div class="col-sm">
        <label for="txtEvento">Nombre del Evento</label>

        <input type="text" class="form-control {{$errors->has('nom_evento')?'is-invalid':'' }}" id="txtEvento" placeholder="Nombre del evento" name="nom_evento" value="{{old('nom_evento')}}">
        {!! $errors->first('nom_evento','<div class="invalid-feedback">:message</div>') !!}   
    </div>

    </div>
    </br>
    <div class="row">
        <div class="col-sm">
        
       
        <label id="lbl" type="hidden" name='lbl'></label>

        <label for="txtRiesgo">Nombre del Riesgo</label>
        <select id="id_riesgos" class="form-control" onchange="selecNombre();" name="id_riesgos">
            @foreach ($riesgo as $riesg)
                <option value="{{$riesg['id']}}"> {{$riesg['nom_riesgos']}} </option>
                @endforeach
        </select>

        


       
        </div>
       
        <div class="col-sm">
        <label for="txtClasificacion">Fecha del Evento</label>
        <input type="date" class="form-control {{$errors->has('fec_evento')?'is-invalid':'' }}" id="txtClasificacion" placeholder="" name="fec_evento">
        {!! $errors->first('fec_evento','<div class="invalid-feedback">:message</div>') !!}
    </div>
    </div>
    
    
    </br>
    
    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Situación Presentada</label>
            <textarea class="form-control {{$errors->has('des_situacion_pre')?'is-invalid':'' }}" id="txtDetalleRiesgo" rows="3" name="des_situacion_pre"></textarea>
            {!! $errors->first('des_situacion_pre','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Detalle de medidas o controles aplicados</label>
            <textarea class="form-control  {{$errors->has('des_detalle_medidas')?'is-invalid':'' }}" id="txtDetalleRiesgo" rows="3" name="des_detalle_medidas"></textarea>
            {!! $errors->first('des_detalle_medidas','<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    </br>
    
    <div class="row">
        <div class="col-sm">
        <input class="form-check-input" type="hidden" name="valestado" id="valestado">
        <label for="id_estado_resolucion">Estado de Resolución del Evento</label>
        <select id="id_estado_resolucion" class="form-control" onchange="cambio();" name="id_estado_resolucion">
           @foreach ($estadoresolucion as $estresolucion)
                <option value="{{$estresolucion['id']}}">{{$estresolucion['nom_estado_resolucion']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm">
        <label for="cbImpacto">Accion Aplicada al evento</label>
        <select id="id_accion" class="form-control"  name="id_accion" onchange="detectChange(this)">
          @foreach ($accionsel as $accion)
                <option value="{{$accion['id']}}">{{$accion['nombre_accion']}}</option>
          @endforeach
        </select>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
            <label id="jus" for="jus_evento_no_resuelto">Justificación por evento no resuelto</label>
            <textarea id="jus_evento_no_resuelto" class="form-control" rows="3" name="jus_evento_no_resuelto"></textarea>
            {!! $errors->first('jus_evento_no_resuelto','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm">
            <label id="jusmed"  for="txtDetalleRiesgo">Justificación por medida aplicada</label>
            <textarea class="form-control {{$errors->has('jus_medida_aplicada')?'is-invalid':'' }}" id="jus_medida_aplicada" rows="3" name="jus_medida_aplicada"></textarea>
            {!! $errors->first('jus_medida_aplicada','<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="cbUnidadMedida">Unidad de Medida (Pérdidas anuales)</label>
            <select id="cbUnidadMedida" class="form-control" name="id_unidad_medida">
                 @foreach ($unidadmedidasel as $unidadmed)
                    <option value="{{$unidadmed['id']}}">{{$unidadmed['nom_unidad_medida']}}</option>
                 @endforeach
            </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Pérdida Estimada por el Evento</label>
        <input type="numeric" class="form-control {{$errors->has('num_perdida_estimada')?'is-invalid':'' }}" id="txtClasificacion" placeholder="" name="num_perdida_estimada" >
        </div>
        <div class="col-sm">
            <label for="txtClasificacion">RTO Estimado</label>
            <input type="text" class="form-control {{$errors->has('rto')?'is-invalid':'' }}" id="rto" placeholder="" name="rto">
            {!! $errors->first('rto','<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    </br>
    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Lecciones aprendidas</label>
            <textarea class="form-control {{$errors->has('des_lecciones_aprend')?'is-invalid':'' }}" id="des_lecciones_aprend" rows="3" name="des_lecciones_aprend"></textarea>
            {!! $errors->first('des_lecciones_aprend','<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
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
    <div class="row">
   

        <div class="col-sm">

            <button type="submit" class="btn btn-primary my-1">Registrar Evento</button>
        </div>  
    </div>
    
    <div class="row">
    <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                        <th>ID Evento</th>
                            <th>Nombre evento</th>
                            <th>Riesgo asociado</th>
                            <th>Fecha del evento</th>
                            <th>Descripción de situación presentada</th>
                            <th>Estado de resolución</th>
                            <th>Acción</th>
                            <th>Unidad Medida</th>
                            <th>Justificación evento no resuelto</th>
                            <th>Justificación medida aplicada</th>
                            <th>Perdida estimada por el evento</th>
                            <th>Descripción de lecciones aprendidas</th>
                            <th>Número RTO</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creador</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificador</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Evento</th>
                            <th>Nombre evento</th>
                            <th>Riesgo asociado</th>
                            <th>Fecha del evento</th>
                            <th>Descripción de situación presentada</th>
                            <th>Estado de resolución</th>
                            <th>Acción</th>
                            <th>Unidad Medida</th>
                            <th>Justificación evento no resuelto</th>
                            <th>Justificación medida aplicada</th>
                            <th>Perdida estimada por el evento</th>
                            <th>Descripción de lecciones aprendidas</th>
                            <th>Número RTO</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creador</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificador</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($Eventos as $evento)
                             <tr>
								<td>{{$evento->id_evento}}</td>
								<td>{{$evento->nom_evento}}</td>
								<td>{{$evento->riesgo->id_riesgos}}</td>
                                <td>{{$evento->fec_evento}}</td>
                                <td>{{$evento->des_situacion_pre}}</td>
                                <td>{{$evento->estadoresolucion->nom_estado_resolucion}}</td>
                                <td>{{$evento->accions->nombre_accion}}</td>
                                <td>{{$evento->unidadmedida->nom_unidad_medida}}</td>
                                <td>{{$evento->jus_evento_no_resuelto}}</td>
                                <td>{{$evento->jus_medida_aplicada}}</td>
                                <td>{{$evento->num_perdida_estimada}}</td>
                                <td>{{$evento->des_lecciones_aprend}}</td>
                                <td>{{$evento->num_rto}}</td>
                                <td>{{$evento->created_at}}</td>
                                <td>{{$evento->usuarioc->usr_nombre}} {{$evento->usuarioc->usr_apellidos}}</td>
                                <td>{{$evento->updated_at}}</td>
                                <td>{{$evento->usuarioc->usr_nombre}} {{$evento->usuariom->usr_apellidos}}</td>
                                <td>{{$evento->estado->nom_estado}}</td>
                                <td>  <a href="/evento/{{$evento->id}}">Modificar</a></td>
							 </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
    </div>


</div>
<label id="lblname"></label>
<?php 
        $host= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];

        $urlfinal= $host.$url;
        $urlfinal2= explode("=", $urlfinal);

         $consulta = DB::table('riesgos')->select('id_accion')->where('id',$urlfinal2[1])->value('id_accion');
                 
                 echo '<script>document.getElementById("id_accion").value = '.$consulta.' </script>';
                 echo '<label id="lblaccion">'.$consulta.' </label>';
               
        
        ?>

<script scr="funcion.js"></script>
<script type="text/javascript">
        //ocultar justificacion por evento no resuelto
         $('#jus_evento_no_resuelto').hide();
         $('#jus').hide();
        ////ocultar justificacion por cambio medida
         $('#jusmed').hide();
         $('#jus_medida_aplicada').hide();
         $('#lblaccion').hide();

         function detectChange(id_accion){
          var cod= document.getElementById("id_accion");
          var selected= cod.options[cod.selectedIndex].value;
          var datoaccion = document.getElementById("lblaccion").innerText;
          if(datoaccion == selected ){
            $('#jus_medida_aplicada').hide();
             $('#jusmed').hide(); 
            
           }else if(datoaccion != selected){
            $('#jus_medida_aplicada').show();
               $('#jusmed').show();
               
           }
        }

          function cambio() {
            var cod= document.getElementById("id_estado_resolucion");
            var selected= cod.options[cod.selectedIndex].text;
            if(selected == "Cerrado/No Resuelto"){
                $('#jus_evento_no_resuelto').show();
                $('#jus').show();
            }else{
                $('#jus_evento_no_resuelto').hide();
                $('#jus').hide();
            }
          }

          function selecNombre(){
            var cod= document.getElementById("id_riesgos");
            var selected= cod.options[cod.selectedIndex].value;
            document.querySelector('#lbl').innerText=selected;
            try
            {
                let vrid = document.getElementById("lbl").innerText;
                window.location.href = "/evento/?id="+vrid;
            }catch(error)
            {

            }
          }
         
          const valores2 = window.location.search;
          const urlParams2 = new URLSearchParams(valores2);
          let idriesgo = urlParams2.get('id');
          document.getElementById("id_riesgos").value = idriesgo;
  
          window.onload=function(){
var pos=window.name || 0;
window.scrollTo(0,pos);
}
window.onunload=function(){
window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
}


let ltName = sessionStorage.getItem("evento");
document.getElementById("txtEvento").value = ltName;
document.getElementsByName('fec_evento')[0].value = sessionStorage.getItem("fecha");
document.getElementsByName('des_situacion_pre')[0].value = sessionStorage.getItem("situacion");
document.getElementsByName('des_detalle_medidas')[0].value = sessionStorage.getItem("detalleM");
document.getElementsByName('id_estado_resolucion')[0].value = sessionStorage.getItem("estRes");
document.getElementsByName('id_unidad_medida')[0].value = sessionStorage.getItem("Unidad");
document.getElementsByName('num_perdida_estimada')[0].value = sessionStorage.getItem("Perdida");
document.getElementsByName('rto')[0].value = sessionStorage.getItem("rto");
document.getElementsByName('des_lecciones_aprend')[0].value = sessionStorage.getItem("lecciones");
window.onbeforeunload = function() 
{
sessionStorage.setItem("evento", document.getElementById('txtEvento').value);
sessionStorage.setItem("fecha", document.getElementsByName('fec_evento')[0].value);
sessionStorage.setItem("situacion", document.getElementsByName('des_situacion_pre')[0].value);
sessionStorage.setItem("detalleM", document.getElementsByName('des_detalle_medidas')[0].value);
sessionStorage.setItem("estRes", document.getElementsByName('id_estado_resolucion')[0].value);
sessionStorage.setItem("Unidad", document.getElementsByName('id_unidad_medida')[0].value);
sessionStorage.setItem("Perdida", document.getElementsByName('num_perdida_estimada')[0].value);
sessionStorage.setItem("rto", document.getElementsByName('rto')[0].value);
sessionStorage.setItem("lecciones", document.getElementsByName('des_lecciones_aprend')[0].value);
}


</script>
</body>
</html>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Agregar')=='ok')
        <script>
             Swal.fire('Evento registrado con exito!', '', 'success')

             sessionStorage.setItem("evento", "");
    document.getElementById("txtEvento").value = "";

    sessionStorage.setItem("fecha", "");
sessionStorage.setItem("situacion", "");
sessionStorage.setItem("detalleM", "");
sessionStorage.setItem("estRes", "");
sessionStorage.setItem("Unidad", "");
sessionStorage.setItem("Perdida", "");
sessionStorage.setItem("rto", "");
sessionStorage.setItem("lecciones", "");

document.getElementsByName('fec_evento')[0].value = "";
document.getElementsByName('des_situacion_pre')[0].value = "";
document.getElementsByName('des_detalle_medidas')[0].value = "";
document.getElementsByName('id_estado_resolucion')[0].value = "1";
document.getElementsByName('id_unidad_medida')[0].value = "1";
document.getElementsByName('num_perdida_estimada')[0].value = "";
document.getElementsByName('rto')[0].value = "";
document.getElementsByName('des_lecciones_aprend')[0].value = "";

        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/>El nombre del evento ya existe', '', 'error')
        </script>
    @endif
  
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
    @if (session('Modifica')=='info')
        
        <script>
             Swal.fire('No ha realizado ningun cambio al evento seleccionada', '', 'info')
        </script>
    @endif
@endsection