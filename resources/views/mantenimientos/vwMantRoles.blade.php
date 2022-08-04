@extends('vwMainTemplate')
@section('contenido')
<html>
</br>

<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Roles</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
     <form action="/MantRoles/store" method="POST">
		@csrf
            <div class="row">
                <div class="col-sm">
                <label for="txtRiesgo">Nombre del rol</label>
                    <input type="text" class="form-control" id="txtNomRol" name="NOM_ROL" placeholder="">
                </div>
        
            </div>
            </br>
           
           
            <div class="row">
                
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary my-1">Registrar Rol</button>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rols as $rol)
							<tr>
								<td>{{$rol->id}}</td>
								<td>{{$rol->NOM_ROL}}</td>
								<td>
                                    <a href="/MantRoles/{{$rol->id}}">Modificar</a></td>
                                		
							 </tr>
					@endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>

</html>
@endsection