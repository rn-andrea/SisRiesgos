@extends('vwMainTemplate')
@section('contenido')
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<body>
<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Evento</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/evento/update/{{$event->id}}" method="POST" >
    @csrf
        {{method_field('PUT')}}
    <div class="row">
        <div class="col-sm">
        <label for="txtEvento">Nombre del Evento</label>

        <input type="text" class="form-control {{$errors->has('nom_evento')?'is-invalid':'' }}" id="txtEvento" placeholder="Nombre del evento" name="nom_evento" value="{{$event->nom_evento}}">
        {!! $errors->first('nom_evento','<div class="invalid-feedback">:message</div>') !!}   
    </div>

    </div>
    </br>
    <div class="row">
        <div class="col-sm">
        <label id="lbl" type="hidden" name='lbl'></label>
        <label for="txtRiesgo">Nombre del Riesgo</label>
        <select id="id_riesgos" class="form-control" onchange="selecNombre();" name="id_riesgos">
        <option value="{{$event['id_riesgos']}}">{{$event->riesgo->nom_riesgos}}</option>  
          @foreach ($riesgo as $riesg)
                <option value="{{$riesg['id']}}">{{$riesg['nom_riesgos']}}</option>
            @endforeach
        </select>

        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Fecha del Evento</label>
        <input type="date" class="form-control {{$errors->has('fec_evento')?'is-invalid':'' }}" id="txtClasificacion" placeholder="" name="fec_evento" value="{{$event->fec_evento}}">
        {!! $errors->first('fec_evento','<div class="invalid-feedback">:message</div>') !!}
    </div>
    </div>
    
    
    </br>
    
    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Situación Presentada</label>
            <textarea class="form-control {$errors->has('des_situacion_pre')?'is-invalid':'' }}" id="txtDetalleRiesgo" rows="3" name="des_situacion_pre">{{$event->des_situacion_pre}}</textarea>
            {!! $errors->first('des_situacion_pre','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Detalle de medidas o controles aplicados</label>
            <textarea class="form-control {{$errors->has('des_detalle_medidas')?'is-invalid':'' }}" id="txtDetalleRiesgo" rows="3" name="des_detalle_medidas">{{$event->des_detalle_medidas}}</textarea>
            {!! $errors->first('des_detalle_medidas','<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    </br>
    
    <div class="row">
        <div class="col-sm">
        <input class="form-check-input" type="hidden" name="valestado" id="valestado">
        <label for="id_estado_resolucion">Estado de Resolución del Evento</label>
        <select id="id_estado_resolucion" class="form-control"  onchange="cambio();"  name="id_estado_resolucion">
        <option value="{{$event['id_estado_resolucion']}}">{{$event->estadoresolucion->nom_estado_resolucion}}</option>  
        @foreach ($estadoresolucion as $estresolucion)
                <option value="{{$estresolucion['id']}}">{{$estresolucion['nom_estado_resolucion']}}</option>
            @endforeach
        </select>
        </div>
        <div class="col-sm">
        <label for="cbImpacto">Accion Aplicada al evento</label>
        <select id="id_accion" class="form-control" name="id_accion" onchange="detectChange(this)">
        <option value="{{$event['id_accion']}}">{{$event->accions->nombre_accion}}</option>  
          @foreach ($accionsel as $accion)
                <option value="{{$accion['id']}}">{{$accion['nombre_accion']}}</option>
          @endforeach
        </select>
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
            <label  id="jus" for="txtDetalleRiesgo">Justificación por evento no resuelto</label>
            <textarea class="form-control {{$errors->has('jus_evento_no_resuelto')?'is-invalid':'' }}" id="jus_evento_no_resuelto" rows="3" name="jus_evento_no_resuelto">{{$event->jus_evento_no_resuelto}}</textarea>
            {!! $errors->first('jus_evento_no_resuelto','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm">
            <label  id="jusmed" for="txtDetalleRiesgo">Justificación por medida aplicada</label>
            <textarea class="form-control {{$errors->has('jus_medida_aplicada')?'is-invalid':'' }}" id="jus_medida_aplicada" rows="3" name="jus_medida_aplicada">{{$event->jus_medida_aplicada}}</textarea>
            {!! $errors->first('jus_medida_aplicada','<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="cbUnidadMedida">Unidad de Medida (Pérdidas anuales)</label>
        
         <select id="cbUnidadMedida" class="form-control"name="id_unidad_medida">
         <option value="{{$event['id_unidad_medida']}}">{{$event->unidadmedida->nom_unidad_medida}}</option>  
            @foreach ($unidadmedidasel as $unidadmed)
                    <option value="{{$unidadmed['id']}}">{{$unidadmed['nom_unidad_medida']}}</option>
                 @endforeach
            </select>
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Pérdida Estimada por el Evento</label>
        <input type="number" class="form-control {{$errors->has('num_perdida_estimada')?'is-invalid':'' }}" id="txtClasificacion" placeholder="" name="num_perdida_estimada" value="{{$event->num_perdida_estimada}}">
        </div>
        <div class="col-sm">
            <label for="txtClasificacion">RTO Estimado</label>
            <input type="number" class="form-control" id="txtClasificacion" placeholder="" id="rto" name="rto"  value="{{$event->num_rto}}">
            {!! $errors->first('rto','<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>

    </br>
    <div class="row">
        <div class="col-sm">
            <label for="txtDetalleRiesgo">Lecciones aprendidas</label>
            <textarea class="form-control {{$errors->has('des_lecciones_aprend')?'is-invalid':'' }}" id="des_lecciones_aprend" rows="3" name="des_lecciones_aprend">{{$event->des_lecciones_aprend}}</textarea>
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
            <button type="submit" class="btn btn-primary my-1">Actualizar Evento</button>
        </div>  
    </div>
</form>
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
                                
							 </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
    </div>
<label id="lblJustMedidaAplicada" style="color:#FFFFFF">{{$event->jus_medida_aplicada}}</label>
</div>

<label id="lblname"></label>
<?php 
try{
        $host= $_SERVER["HTTP_HOST"];
        $url= $_SERVER["REQUEST_URI"];

        $urlfinal= $host.$url;
        $urlfinal2= explode("=", $urlfinal);

         $consulta = DB::table('riesgos')->select('id_accion')->where('id',$urlfinal2[1])->value('id_accion');
                 
                 echo '<script>document.getElementById("id_accion").value = '.$consulta.' </script>';
                 echo '<label id="lblaccion" style="color:#FFFFFF">'.$consulta.' </label>';
               
}catch(Exception $e){


}
        ?>

<script scr="funcion.js"></script>
<script type="text/javascript">
        //ocultar justificacion por evento no resuelto
         $('#jus_evento_no_resuelto').hide();
         $('#jus').hide();
        ////ocultar justificacion por cambio medida
         //$('#jusmed').hide();
        // $('#jus_medida_aplicada').hide();
        // $('#lblaccion').hide();

         function detectChange(id_accion){
          var cod= document.getElementById("id_accion");
          var selected= cod.options[cod.selectedIndex].value;
          var datoaccion = document.getElementById("lblaccion").innerText;
          let justMedidaAp = document.getElementById("lblJustMedidaAplicada").innerText;
          if(justMedidaAp == "" )
          {
            $('#jus_medida_aplicada').hide();
             $('#jusmed').hide(); 
            
          }else
          {
            $('#jus_medida_aplicada').show();
               $('#jusmed').show();
          }

          if(datoaccion == selected )
            {
            $('#jus_medida_aplicada').hide();
             $('#jusmed').hide(); 
            
            }
           else 
           {
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
                window.location.href = "/evento/{{$event->id}}/?id="+vrid;
            }catch(error)
            {

            }
          }
         
          //const valores2 = window.location.search;
          //const urlParams2 = new URLSearchParams(valores2);
          //let idriesgo = urlParams2.get('id');
         // document.getElementById("id_riesgos").value = idriesgo;
         const fecha = new Date();
      const anoActual = fecha.getFullYear();
      const mesActual = fecha.getMonth() + 1;
      const hoy = fecha.getDate();

        document.getElementsByName('fec_evento')[0].max = "-0"+mesActual+"-"+hoy+"-"+anoActual;



</script>
</body>
</html>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Agregar')=='ok')
        <script>
             Swal.fire('Evento registrado con exito!', '', 'success');
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
             Swal.fire('Datos modificados, con exito!', '', 'success');
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
    @if (session('Modifica')=='info')
        
        <script>
             Swal.fire('No ha realizado ningun cambio al evento seleccionada', '', 'info')
        </script>
    @endif
@endsection