@extends('vwMainTemplate')
@section('contenido')

<html>
</br>

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
						<label for="txtCodUsu">Código de usuario</label>
							<input type="text" class="form-control" id="txtCodigo" name="ID_USUARIO"  placeholder="Digite un códgo de usuario único">
					
						</div>
					<div class="col-sm">
					<label for="txtContrasena">Contraseña</label>
							<input type="password" class="form-control" id="txtContra" name="USR_PASSWORD"  placeholder="Digite una contraseña de mínimo 8 carácteres">
						
						
					</div>
				</div>
                
                
				<div class="row">
                <div class="col-sm">
                <label for="txtCodUsu">Nombre</label>
                    <input type="text" class="form-control" id="txtNombre"  name="USR_NOMBRE" placeholder="Digite el nombre del usuario">
                </div>
                <div class="col-sm">
                <label for="txtCodUsu">Apellidos</label>
                    <input type="text" class="form-control" id="txtApellidos" name="USR_APELLIDOS" placeholder="Digite los apellidos del usuario">
                </div>
            </div>

           

        <div class="row">
            <div class="col-sm">
            <label for="txtClasificacion">Rol del usuario</label>
                <select id="cbRol" class="form-control" name="ID_ROL" placeholder="Seleccione">
                   @foreach ($rolr as $rol)
                        <option value="{{$rol['id']}}">{{$rol['nom_rol']}}</option>
                   @endforeach
                </select>
               
            </div>
            <div class="col-sm">
            <label for="txtCorreo">Correo eléctronico</label>
                <input type="text" class="form-control" id="txtCorreo" name="USR_EMAIL"  placeholder="Digite un correo eléctronico">
            </div>
        </div>

        </br>

            <div class="row">
                <div class="col-sm">
				<input class="form-check-input" type="hidden" value="2" name="IND_ESTADO" >
                <input class="form-check-input" type="checkbox" value="1" name="IND_ESTADO" id="defaultCheck2" checked>
                    <label class="form-check-label" for="Activo">
                        Estado Activo
                    </label>
                   

            </div>
            
            
            </br>
            </br>
            
            <div class="row">

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
								<td>{{$usuario->rol->nom_rol}}</td>
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
		
	
</html>

@endsection