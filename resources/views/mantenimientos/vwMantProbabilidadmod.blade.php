@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<body>
<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Probabilidad Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
        <form action="/MantProbabilidad/update/{{$probabilidad->id}}" method="POST">
		@csrf
        {{method_field('PUT')}}
            <div class="row">
                <div class="col-sm">
                <label for="txtRiesgo">Descripción Probabilidad</label>
                    <input type="text" class="form-control {{$errors->has('nom_probabilidad')?'is-invalid':'' }}" id="txtRiesgo" placeholder=""  value="{{$probabilidad->nom_probabilidad}}" name="nom_probabilidad" readonly>
                    {!! $errors->first('nom_probabilidad','<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm">
                <label for="txtObservacion">Observación</label>
                    <textarea class="form-control {{$errors->has('observacion')?'is-invalid':'' }}" id="xtObservacion" rows="3" name="observacion" >{{$probabilidad->des_observacion}}</textarea>
                    {!! $errors->first('observacion','<div class="invalid-feedback">:message</div>') !!}
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
    
    <div class="row">
    <div class="col-sm"></div>
        <div class="col-sm">
            <button type="submit" class="btn btn-primary my-1">Actualizar Probabilidad</button>
        </div>    
        <div class="col-sm"></div>
    </div>
    </form>
    </br>
    
    <div class="row">
    <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Descripción Probabilidad</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                           
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Consecutivo</th>
                            <th>Descripción Probabilidad</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                         
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($probabilidads as $probabilidad)
                             <tr>
								<td>{{$probabilidad->id}}</td>
								<td>{{$probabilidad->nom_probabilidad}}</td>
								<td>{{$probabilidad->des_observacion}}</td>
                                <td>{{$probabilidad->created_at}}</td>
                                <td>{{$probabilidad->usuario->usr_nombre}} {{$probabilidad->usuario->usr_apellidos}}</td>
                                <td>{{$probabilidad->updated_at}}</td>
                                <td>{{$probabilidad->usuario1->usr_nombre}} {{$probabilidad->usuario1->usr_apellidos}}</td>
                                <td>{{$probabilidad->estado->nom_estado}}</td>
                              </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>

<form action="/logout" method="POST">
                        @csrf
    <a id="apresionar" onclick="this.closest('form').submit()" href="#!">Cerrar Sesión</a>
 <?php
        try {
         $correo = auth()->user()->email;
         $consulta = DB::table('usuarios')->select('ID_ROL')->where('USR_EMAIL',$correo)->value('ID_ROL');
        if($consulta=='2')
        {
            echo '<script>document.body.style.display = "none";</script>';
            echo '<script>alert("Usted no tiene permisos para acceder a esta página, debe loguearse como un usuario Administrativo");</script>';
            echo '<script>document.getElementById("apresionar").click();</script>';
        }
        } catch (Exception $e) {

        }
        ?>
        </form>
</body>
</html>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/> Debe seleccionar una probabilidad en la tabla, para ser actualizado', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el nombre de la probabilidad', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
    @if (session('Modifica')=='info')
        
        <script>
             Swal.fire('No ha realizado ningun cambio a la probabilidad seleccionado', '', 'info')
        </script>
    @endif
@endsection