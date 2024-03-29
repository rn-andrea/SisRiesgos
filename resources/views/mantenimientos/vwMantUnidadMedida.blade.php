@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<body>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Unidad de Medida</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantUnidadMedida/store" method="POST">
     @csrf
    <div class="row">
        <div class="col-sm">
        <label for="txtUnidadMedida">Descripción de la Unidad de Medida</label>
            <input type="text" class="form-control {{$errors->has('nom_unidad_medida')?'is-invalid':'' }}" id="txtUnidadMedida" placeholder="Digite el nombre descriptivo de la unidad de medida" name="nom_unidad_medida" value="{{old('nom_unidad_medida')}}">
            {!! $errors->first('nom_unidad_medida','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm">
        <label for="txtObservacion">Observación</label>
            <textarea class="form-control {{$errors->has('observacion')?'is-invalid':'' }}" id="txtObservacion" rows="3" name="observacion" placeholder="Digite las observaciones necesarias" value="{{old('observacion')}}"></textarea>
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
    <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRCREACION"  name="usuario_creador" value="305050002"> 
            </div>
            <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="usuario_modificador" value="305050002">
            </div>
    
    </br>
    </form>
    <div class="row">
    <div class="col-sm"></div>
        <div class="col-sm">
            <button type="submit" id="btnUnidadMedida" class="btn btn-primary my-1">Registrar Unidad</button>
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
                            <th>Descripción Unidad Medida</th>
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
                            <th>Descripción Unidad Medida</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($UnidadMedidas as $UnidadMedida)
                             <tr>
								<td>{{$UnidadMedida->id}}</td>
								<td>{{$UnidadMedida->nom_unidad_medida}}</td>
								<td>{{$UnidadMedida->des_observacion}}</td>
                                <td>{{$UnidadMedida->created_at}}</td>
                                <td>{{$UnidadMedida->usuario->usr_nombre}} {{$UnidadMedida->usuario->usr_apellidos}}</td>
                                <td>{{$UnidadMedida->updated_at}}</td>
                                <td>{{$UnidadMedida->usuario1->usr_nombre}} {{$UnidadMedida->usuario1->usr_apellidos}}</td>
                                <td>{{$UnidadMedida->estado->nom_estado}}</td>
                                <td><a href="/MantUnidadMedida/{{$UnidadMedida->id}}">Modificar</a></td>
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
             Swal.fire('Unidad de medida registrado con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/> El nombre de la unidad de medida ya existe', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el nombre de la unidad de medida', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
@endsection