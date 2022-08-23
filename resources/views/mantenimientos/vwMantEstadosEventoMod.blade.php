@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Estados de Evento</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantEstadosEvento/update/{{$estadoresolucion->id}}" method="POST">
	@csrf
    {{method_field('PUT')}}
    <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Descripción Estado</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="" name="nom_estado_resolucion" readonly value="{{$estadoresolucion->nom_estado_resolucion}}">
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Observación</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="des_observacion">{{$estadoresolucion->des_observacion}}</textarea>
        </div>
    </div>

    <div class="row">
    <div class="col-sm">
			<input class="form-check-input" type="hidden" value="2" name="estado" >
            <input class="form-check-input" type="checkbox" value="1" name="estado" id="defaultCheck3" checked>
            <label class="form-check-label" for="Activo">
                Estado Activo
            </label>
    </div>
    
    
    </br>
    
    <div class="row">
    <div class="col-sm"></div>
        <div class="col-sm">
            <button type="submit" id="btnEstadoResolucion2" class="btn btn-primary my-1">Actualizar  Estado</button>
        </div>    
        <div class="col-sm"></div>
    </div>
   
    </br>
</form>
    <div class="row">
    <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción Estado</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tbody>
                    @foreach($estadoresolucions as $estadoresolucion)
                             <tr>
								<td>{{$estadoresolucion->id}}</td>
								<td>{{$estadoresolucion->nom_estado_resolucion}}</td>
								<td>{{$estadoresolucion->des_observacion}}</td>
                                <td>{{$estadoresolucion->created_at}}</td>
                                <td>{{$estadoresolucion->usuario->usr_nombre}} {{$estadoresolucion->usuario->usr_apellidos}}</td>
                                <td>{{$estadoresolucion->updated_at}}</td>
                                <td>{{$estadoresolucion->usuario1->usr_nombre}} {{$estadoresolucion->usuario1->usr_apellidos}}</td>
                                <td>{{$estadoresolucion->estado->nom_estado}}</td>
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
             Swal.fire('Estado de evento registrado con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/> El nombre del estado de evento ya existe', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el estado de evento', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
    
@endsection
