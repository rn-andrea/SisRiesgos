@extends('vwMainTemplate')
@section('contenido')
<html>

</div>
<div class="container-fluid px-4">
</br>
</br>
</br>

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
                <label for="txtRol">Nombre del rol</label>
                    <input type="text" class="form-control {{$errors->has('nombre_rol')?'is-invalid':'' }}" id="txtRol" name="nombre_rol" placeholder="Digite un nombre descriptivo para el rol"  value="{{old('nombre_rol')}}"  >
                    {!! $errors->first('nombre_rol','<div class="invalid-feedback">:message</div>') !!}
                </div>

            </div>
            </br>
           <div class="row">
                <div class="col-sm">
				<input class="form-check-input" type="hidden" value="2" name="IND_ESTADO" >
                <input class="form-check-input" type="checkbox" value="1" name="IND_ESTADO" id="defaultCheck3" checked>
                    <label class="form-check-label" for="Activo">
                        Estado Activo
                    </label>
                   
        </div>
        </br>   
        </br>
            <div class="row">
            <div class="col-sm"> </div>
            
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
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($rols as $rol)
							<tr>
								<td>{{$rol->id}}</td>
								<td>{{$rol->nombre_rol}}</td>
                                <td>{{$rol->estado->nom_estado}}</td>
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