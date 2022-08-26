@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<body>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Categoría Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantCategoria/update/{{$CategoriaRiesgo->id}}" method="POST">
	@csrf
    {{method_field('PUT')}}
        <div class="row">
            <div class="col-sm">
            <label for="txtcategoria">Nombre de la Categoría</label>
                <input type="text" class="form-control {{$errors->has('nombre_categoria')?'is-invalid':'' }}"  id="txtCategoria" placeholder="" name="nombre_categoria" value="{{$CategoriaRiesgo->nombre_categoria}}">
                {!! $errors->first('nombre_categoria','<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-sm">
            <label for="txtobservacion">Observación</label>
                <textarea class="form-control {{$errors->has('observacion')?'is-invalid':'' }}"  id="txtobservacion" name="observacion">{{$CategoriaRiesgo->des_observacion}} </textarea>
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
        
        
        <div class="row">
        <div class="col-sm"> </div>
            <div class="col-sm">
                <button type="submit" id="btnActCateg" class="btn btn-primary my-1">Actualizar Categoría</button>
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
                            <th>ID Consecutivo</th>
                            <th>Nombre Categoria</th>
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
                            <th>Nombre Categoria</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <td>Estado</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                    @foreach($categoriariesgos as $CatRiesgo)
                             <tr>
								<td>{{$CatRiesgo->id}}</td>
								<td>{{$CatRiesgo->nombre_categoria}}</td>
								<td>{{$CatRiesgo->des_observacion}}</td>
                                <td>{{$CatRiesgo->created_at}}</td>
                                <td>{{$CatRiesgo->usuario->usr_nombre}} {{$CatRiesgo->usuario->usr_apellidos}}</td>
                                <td>{{$CatRiesgo->updated_at}}</td>
                                <td>{{$CatRiesgo->usuario1->usr_nombre}} {{$CatRiesgo->usuario1->usr_apellidos}}</td>
                                <td>{{$CatRiesgo->estado->nom_estado}}</td>
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