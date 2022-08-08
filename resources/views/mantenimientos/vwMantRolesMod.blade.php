@extends('vwMainTemplate')
@section('contenido')
<html>
</br>

<div class="container-fluid px-4">
    <h1 class="mt-4">Modificación de Roles</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
        <form action="/MantRoles/update/{{$rol->id}}" method="POST">
		@csrf
        {{method_field('PUT')}}
            <div class="row">
            <div class="col-sm">
                <label for="txtRiesgo">ID del rol</label>
                    <input type="text" class="form-control" id="txtidrol" placeholder="" value="{{$rol->id}}"  readOnly="true">
                </div>
                <div class="col-sm">
                <label for="txtRiesgo">Nombre del rol</label>
                    <input type="text" class="form-control" id="txtNomRol"  name="NOM_ROL" value="{{$rol->nom_rol}}">
                </div>
                <div class="row">
                <div class="col-sm">
				<input class="form-check-input" type="hidden" value="2" name="IND_ESTADO" >
                <input class="form-check-input" type="checkbox" value="1" name="IND_ESTADO" id="defaultCheck3" checked>
                    <label class="form-check-label" for="Activo">
                        Estado Activo
                    </label>
                   
        </div>
            </div>
            </br>
            <div class="row">
               
            </div>
            
            
            </br>
            </br>
            <div class="row">
                
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary my-1">Guardar Datos</button>
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
                            <th>Código Rol</th>
                            <th>Nombre del Rol</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rols as $rol)
							<tr>
								<td>{{$rol->id}}</td>
								<td>{{$rol->nom_rol}}</td>
                                <td>{{$rol->estado->nom_estado}}</td>
							 </tr>
					@endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</html>

@endsection