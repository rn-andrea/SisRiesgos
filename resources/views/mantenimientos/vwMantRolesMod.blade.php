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
                    <input type="text" class="form-control" id="txtNomRol"  name="NOM_ROL" value="{{$rol->NOM_ROL}}">
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
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rols as $rol)
							<tr>
								<td>{{$rol->id}}</td>
								<td>{{$rol->NOM_ROL}}</td>
									
							 </tr>
					@endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</html>

@endsection