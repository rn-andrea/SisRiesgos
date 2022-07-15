@extends('vwMainTemplate')
@section('contenido')

</br>
<form>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Usuarios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Prototipo (Mockup) Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>

    <div class="row">
        <div class="col-sm">
        <label for="txtCodUsu">Código de usuario</label>
            <input type="text" class="form-control" id="txtCodigo" placeholder="">
        </div>
        <div class="col-sm">
        <label for="txtCodUsu">Contraseña</label>
        <input type="password" class="form-control" id="txtContra" placeholder="">
        </div>
    </div>

    </br>

    <div class="row">
        <div class="col-sm">
        <label for="txtCodUsu">Nombre</label>
            <input type="text" class="form-control" id="txtNombre" placeholder="">
        </div>
        <div class="col-sm">
        <label for="txtCodUsu">Apellidos</label>
            <input type="text" class="form-control" id="txtApellidos" placeholder="">
        </div>
    </div>

    </br>

<div class="row">
    <div class="col-sm">
    <label for="txtClasificacion">Rol del usuario</label>
        <select id="cbRol" class="form-control">
            <option selected>Seleccione...</option>
            <option>Administrador</option>
            <option>Usuario General</option>
        </select>
    </div>
    <div class="col-sm">
    <label for="txtCorreo">Correo eléctronico</label>
        <input type="text" class="form-control" id="txtCorreo" placeholder="">
    </div>
</div>

</br>

    <div class="row">
        <div class="col-sm">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" checked>
            <label class="form-check-label" for="defaultCheck2">
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
                            <th>Modificar</th>
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
                            <th>Modificar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>301050109</td>
                            <td>Ana</td>
                            <td>Contreras Jiménez</td>
                            <td>ana_contrj@gmail.com</td>
                            <td>Administrador</td>
                            <td>Activo</td>
                            <td><a href="#" class="link-primary">Modificar</a></td>
                            
                        </tr>
                        <tr>
                            <td>102050987</td>
                            <td>Carlos</td>
                            <td>Salas Diaz</td>
                            <td>csalas18@gmail.com</td>
                            <td>Usuario General</td>
                            <td>Activo</td>
                            <td><a href="#" class="link-primary">Modificar</a></td>
                            
                        </tr>
                        <tr>
                            <td>502870322</td>
                            <td>Daniela</td>
                            <td>Flores Cantillo</td>
                            <td>floresdd@gmail.com</td>
                            <td>Usuario General</td>
                            <td>Activo</td>
                            <td><a href="#" class="link-primary">Modificar</a></td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    </div>   
   
    
</div>
</form>

@endsection