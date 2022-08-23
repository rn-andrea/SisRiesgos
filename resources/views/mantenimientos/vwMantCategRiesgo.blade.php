@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Categoría Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantCategoria/store" method="POST">
     @csrf
    <div class="row">
        <div class="col-sm">
        <label for="txtCategoria">Nombre de la Categoría</label>
            <input type="text" class="form-control {{$errors->has('nombre_categoria')?'is-invalid':'' }}" id="txtCategoria" placeholder="Digite el nombre descriptivo de la categoría" name="nombre_categoria" placeholder="Nombre de la categoría" value="{{old('nombre_categoria')}}">
            {!! $errors->first('nombre_categoria','<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-sm">
        <label for="txtObservacion">Observación</label>
            <textarea class="form-control {{$errors->has('observacion')?'is-invalid':'' }}" id="txtObservacion" rows="3"  placeholder="Digite las observaciones necesarias" name="observacion" value="{{old('observacion')}}"></textarea>
            {!! $errors->first('observacion','<div class="invalid-feedback">:message</div>') !!}
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
            <button type="submit" class="btn btn-primary my-1">Registrar Categoría</button>
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
                            <th>ID </th>
                            <th>Nombre Categoria</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Consecutivo</th>
                            <th>Nombre Categoria</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <td>Estado</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($categoriariesgos as $CatRiesgo)
                             <tr>
								<td>{{$CatRiesgo->id}}</td>
								<td>{{$CatRiesgo->nombre_categoria}}</td>
								<td>{{$CatRiesgo->des_observacion}}</td>
                                <td>{{$CatRiesgo->created_at}}</td>
                                <td>{{$CatRiesgo->usuario->usr_nombre}} {{$CatRiesgo->usuario->usr_apellidos}}</td>
                                <td>{{$CatRiesgo->updated_at}}</td>
                                <td>{{$CatRiesgo->usuario1->usr_nombre}} {{$CatRiesgo->usuario1->usr_apellidos}}</td>
                                <td>{{$CatRiesgo->estado->nom_estado}}</td>
                                <td>  <a href="/MantCategoria/{{$CatRiesgo->id}}">Modificar</a></td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</form>
</html>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('Agregar')=='ok')
        <script>
             Swal.fire('Categoría del riesgo registrada con exito!', '', 'success')
        </script>
    @endif
    @if (session('Error')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el nombre de la categoría del riesgo', '', 'error')
        </script>
    @endif
    @if (session('Error2')=='error')
        <script>
             Swal.fire('Error<br/>No se pude modificar, debido a que ya existe el nombre de la categoría del riesgo', '', 'error')
        </script>
    @endif
    @if (session('Modificar')=='ok')
        
        <script>
             Swal.fire('Datos modificados, con exito!', '', 'success')
        </script>
    @endif
    @if (session('Modifica')=='info')
        
        <script>
             Swal.fire('No ha realizado ningun cambio a la categoría del riesgo seleccionada', '', 'info')
        </script>
    @endif
@endsection