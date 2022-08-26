@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<body>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Impacto Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantImpacto/store" method="POST">
     @csrf
        <div class="row">
            <div class="col-sm">
            <label for="txtRiesgo">Descripción Impacto</label>
                <input type="text" class="form-control {{$errors->has('nom_impacto')?'is-invalid':'' }}" id="txtImpacto" placeholder="Descipción del impacto" name="nom_impacto" value="{{old('nom_impacto')}}">
                {!! $errors->first('nom_impacto','<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-sm">
            <label for="txtClasificacion">Observación</label>
                <textarea class="form-control  {{$errors->has('observacion')?'is-invalid':'' }}" id="txtDetalleRiesgo"  placeholder="Digite las observaciones necesarias" rows="3" name="observacion" value="{{old('observacion')}}"></textarea>
                {!! $errors->first('observacion','<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
            <input class="form-check-input" type="hidden" value="2" name="estado" >
                <input class="form-check-input" type="checkbox" value="1" name="estado" id="defaultCheck3" checked>
                <label class="form-check-label" for="defaultCheck2">
                    Estado Activo
                </label>
        </div>
   
        
        </br>
        
        <div class="row">
        <div class="col-sm"></div>
            <div class="col-sm">
                <button type="submit" id="bntImpacto" class="btn btn-primary my-1">Actualizar Impacto</button>
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
                            <th>ID</th>
                            <th>Descripción Impacto</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                            <th></th>
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
                            <td>Estado</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($impactos as $impacto)
                             <tr>
								<td>{{$impacto->id}}</td>
								<td>{{$impacto->nom_impacto}}</td>
								<td>{{$impacto->des_observacion}}</td>
                                <td>{{$impacto->created_at}}</td>
                                <td>{{$impacto->usuario->usr_nombre}} {{$impacto->usuario->usr_apellidos}}</td>
                                <td>{{$impacto->updated_at}}</td>
                                <td>{{$impacto->usuario1->usr_nombre}} {{$impacto->usuario1->usr_apellidos}}</td>
                                <td>{{$impacto->estado->nom_estado}}</td>
                                <td>  <a href="/MantImpacto/{{$impacto->id}}">Modificar</a></td>
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
    @if (session('Agregar')=='ok')
        <script>
             Swal.fire('Impacto registrado con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/> Debe seleccionar un impacto en la tabla, para ser actualizado', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el nombre del impacto de riesgo', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
    @if (session('Modifica')=='info')
        
        <script>
             Swal.fire('No ha realizado ningun cambio al impacto seleccionado', '', 'info')
        </script>
    @endif
@endsection