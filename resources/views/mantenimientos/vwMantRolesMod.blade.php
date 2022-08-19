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
                    <input type="text" class="form-control {{$errors->has('nombre_rol')?'is-invalid':'' }}" id="txtNomRol"  name="nombre_rol" value="{{$rol->nombre_rol}}">
                    {!! $errors->first('nombre_rol','<div class="invalid-feedback">:message</div>') !!}
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
								<td>{{$rol->nombre_rol}}</td>
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
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Agregar')=='ok')
        <script>
             Swal.fire('Rol registrado con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/> El nombre del rol ya existe', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el nombre del rol', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
@endsection