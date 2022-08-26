@extends('vwMainTemplate')
@section('contenido')

<html>
</br>
<body>
<div class="container-fluid px-4">
	<h1 class="mt-4">Mantenimiento Usuarios</h1>
	<ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
	<form action="/MantUsuarios/store" method="POST">
	@csrf
				<div class="row">
					<div class="col-sm">
						<label for="id_usuario">Código de usuario</label>
						<input type="text" class="form-control {{$errors->has('id_usuario')?'is-invalid':'' }}" id="id_usuario" name="id_usuario"  placeholder="Digite un códgo de usuario único" value="{{old('id_usuario')}}">
                        {!! $errors->first('id_usuario','<div class="invalid-feedback">:message</div>') !!}
						</div>
					<div class="col-sm">
					    <label for="usr_password">Contraseña</label>
						<input type="password" class="form-control {{$errors->has('contraseña')?'is-invalid':'' }}" id="usr_password" name="contraseña"  placeholder="Digite una contraseña de mínimo 8 carácteres" value="{{old('contraseña')}}" >
                        {!! $errors->first('contraseña','<div class="invalid-feedback">:message</div>') !!}
						
					</div>
                   
                    
				</div>
                
                
				<div class="row">
                <div class="col-sm">
                <label for="txtCodUsu">Nombre</label>
                    <input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':'' }}" id="txtNombre"  name="nombre" placeholder="Digite el nombre del usuario"  value="{{old('nombre')}}">
                    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="col-sm">
                <label for="txtCodUsu">Apellidos</label>
                    <input type="text" class="form-control {{$errors->has('apellidos')?'is-invalid':'' }}" id="txtApellidos" name="apellidos" placeholder="Digite los apellidos del usuario" value="{{old('apellidos')}}" >
                    {!! $errors->first('apellidos','<div class="invalid-feedback">:message</div>') !!}                
                </div>
            </div>

           

        <div class="row">
            <div class="col-sm">
            <label for="txtClasificacion">Rol del usuario</label>
                <select id="cbRol" class="form-control" name="rol" placeholder="Seleccione">
                   @foreach ($rolr as $rol)
                        <option value="{{$rol['id']}}">{{$rol['nombre_rol']}}</option>
                   @endforeach
                </select>
               
            </div>
            <div class="col-sm">
            <label for="txtCorreo">Correo eléctronico</label>
                <input type="text" class="form-control {{$errors->has('correo')?'is-invalid':'' }}" id="txtCorreo" name="correo"  placeholder="Digite un correo eléctronico" value="{{old('correo')}}">
                {!! $errors->first('correo','<div class="invalid-feedback">:message</div>') !!}   
            </div>
        </div>

        </br>

            <div class="row">
                <div class="col-sm">
				<input class="form-check-input" type="hidden" value="2" name="estado" >
                <input class="form-check-input" type="checkbox" value="1" name="estado" id="defaultCheck2" checked>
                    <label class="form-check-label" for="Activo">
                        Estado Activo
                    </label>
                   

            </div>
            
            
            </br>
            </br>
            
            <div class="row">
            <div class="col-sm"></div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary my-1">Registrar Usuario</button>
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
                            <th>Código de Usuario</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo eléctronico</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th></th>
                          
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Código de Usuario</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo eléctronico</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th></th>
							
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($usuarios as $usuario)
							<tr>
								<td>{{$usuario->id_usuario}}</td>
								<td>{{$usuario->usr_nombre}}</td>
								<td>{{$usuario->usr_apellidos}}</td>
								<td>{{$usuario->usr_email}}</td>
								<td>{{$usuario->rol->nombre_rol}}</td>
								<td>{{$usuario->estado->nom_estado}}</td>
                                <td>
                                    <a href="/MantUsuarios/{{$usuario->id}}">Modificar</a></td>
								
							 </tr>
					@endforeach
                    </tbody>
                </table>
            </div>
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
             Swal.fire('Usuario registrado con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/> El codigo de usuario ya existe', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el codigo del usuario', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
@endsection