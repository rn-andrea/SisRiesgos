@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<body>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Proceso Afecta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantProcesoAfecta/store" method="POST">
     @csrf
     <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Nomenclatura del Proceso que Afecta</label>
            <input type="text" class="form-control {{$errors->has('id_nomenclatura')?'is-invalid':'' }}" id="txtClasificacion" placeholder="Digite tres letras que representen el proceso" name="id_nomenclatura" value="{{old('id_nomenclatura')}}">
            {!! $errors->first('id_nomenclatura','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Proceso que Afecta</label>
            <input type="text" class="form-control {{$errors->has('nombre_proceso_afecta')?'is-invalid':'' }}" id="txtClasificacion" placeholder="Nombre descriptivo del proceso que afecta" name="nombre_proceso_afecta" value="{{old('nombre_proceso_afecta')}}">
            {!! $errors->first('nombre_proceso_afecta','<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</br>
    <div class="row">
    
        <div class="col-sm">
        <label for="txtClasificacion">Observación</label>
            <textarea class="form-control {{$errors->has('observacion')?'is-invalid':'' }}" id="txtDetalleRiesgo" rows="3" name="observacion" placeholder="Digite las observaciones necesarias" value="{{old('observacion')}}" ></textarea>
            {!! $errors->first('observacion','<div class="invalid-feedback">:message</div>') !!}
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
    
    <div class="row">
    <div class="col-sm"></div>
        <div class="col-sm">
            <button type="submit" class="btn btn-primary my-1">Registrar Proceso</button>
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
                            <th>Codigo</th>
                            <th>Nombre Proceso</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID </th>
                            <th>Codigo</th>
                            <th>Nombre Categoria</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <td>Estado</td>
                            <th>Modificar</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($ProcesoAfectas as $ProcesoAfecta)
                             <tr>
                                <td>{{$ProcesoAfecta->id}}</td>
								<td>{{$ProcesoAfecta->id_nomenclatura}}</td>
								<td>{{$ProcesoAfecta->nom_proceso_afecta}}</td>
								<td>{{$ProcesoAfecta->des_observacion}}</td>
                                <td>{{$ProcesoAfecta->created_at}}</td>
                                <td>{{$ProcesoAfecta->usuario->usr_nombre}} {{$ProcesoAfecta->usuario->usr_apellidos}}</td>
                                <td>{{$ProcesoAfecta->updated_at}}</td>
                                <td>{{$ProcesoAfecta->usuario1->usr_nombre}} {{$ProcesoAfecta->usuario1->usr_apellidos}}</td>
                                <td>{{$ProcesoAfecta->estado->nom_estado}}</td>
                                <td>  <a href="/MantProcesoAfecta/{{$ProcesoAfecta->id}}">Modificar</a></td>
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
             Swal.fire('El proceso afecta fue registrado con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/> La nomenclatura del proceso afecta ya existe', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe la nomenclatura del proceso afecta', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
@endsection