@extends('vwMainTemplate')
@section('contenido')

<html>
</br>

<div class="container-fluid px-4">
	<h1 class="mt-4">Modificar Usuario</h1>
	<ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
	<form action="/MantUsuarios/update/{{$usuario->id}}" method="POST">
				@csrf
                {{method_field('PUT')}}

            
				<div class="row">
					<div class="col-sm">
						<label for="txtCodUsu">Código de usuario</label>
							<input type="text" class="form-control {{$errors->has('id_usuario')?'is-invalid':'' }}" id="txtCodigo" name="id_usuario" value="{{$usuario->id_usuario}}" readOnly="true">
                       
						</div>
					<div class="col-sm">
					<label for="txtContrasena">Contraseña</label>
							<input type="password" class="form-control {{$errors->has('contraseña')?'is-invalid':'' }}" id="txtContra" name="contraseña" value="{{$usuario->usr_password}}" >
                            {!! $errors->first('contraseña','<div class="invalid-feedback">:message</div>') !!}
						
					</div>
				</div>
                
                
				<div class="row">
                <div class="col-sm">
                <label for="txtCodUsu">Nombre</label>
                    <input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':'' }}" id="txtNombre"  name="nombre" value="{{$usuario->usr_nombre}}">
                    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}                
                </div>
                <div class="col-sm">
                <label for="txtCodUsu">Apellidos</label>
                    <input type="text" class="form-control {{$errors->has('apellidos')?'is-invalid':'' }}" id="txtApellidos" name="apellidos" value="{{$usuario->usr_apellidos}}" >
                    {!! $errors->first('apellidos','<div class="invalid-feedback">:message</div>') !!}    
                </div>
            </div>

           

        <div class="row">
            <div class="col-sm">
            <label for="txtClasificacion">Rol del usuario</label>
                <select id="cbRol" class="form-control" name="rol" value="{{$usuario->rol->nombre_rol}}">
                   @foreach ($rols as $rol)
                        <option value="{{$rol['id']}}">{{$rol['nombre_rol']}}</option>
                   @endforeach
                </select>
               
            </div>
            <div class="col-sm">
            <label for="txtCorreo">Correo eléctronico</label>
                <input type="text" class="form-control {{$errors->has('correo')?'is-invalid':'' }}" id="txtCorreo" name="correo"  value="{{$usuario->usr_email}}">
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
                    <button type="submit" class="btn btn-primary my-1">Actualizar Usuario</button>
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
                                
								
							 </tr>
					@endforeach
                    </tbody>
                </table>
            </div>
    </div>
    </div>   

</div>
		
	
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