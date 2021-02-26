@extends('layouts.app') 
@section('content')
        <h1 class="text-center mt-5"> Crear producto</h1>
    <form method="POST" class="needs-validations" action="/product"enctype="multipart/form-data" novalidate >
        @csrf
        <div class="form-row mt-4">
            <div class="col-6">
                <label>Image</label>
                <input type="file" name="productcover" class="form-cotrol">
            </div>       
        </div>
        <div class="form-row mt-4 row">
            <div class="col-12 col-sm-4 col-md-4">
                <label>Nombre del producto</label>
                <input type="text" id="name" name="name" class="form-control  @error ('name') is-invalid @enderror   " value="{{ old('name') }}" />
                 @error('name')
                    <span class="invalid-feedback" role="alert">
                      <b> {{$message}} </b>
                    </span>
                @enderror
            </div>

            <div class="col-12 col-sm-4 col-md-4">
                <label>Valor del producto</label>
                <input type="text" id="value" name="value" class="form-control @error ('value') is-invalid @enderror  "  value="{{ old('value') }}"  />
                 @error('name')
                    <span class="invalid-feedback" role="alert">
                      <b> {{$message}} </b>
                    </span>
                @enderror
              
            </div>
              
            <div class="col-12 col-sm-4 col-md-4">
                <label>Estado del producto</label>
                <select id="status" name="status" class="form-control">
                <option value="Activo">Activo </option>
                <option value="Inactivo">Inactivo </option>
            </div>    
            
                <div class="form-row mt-4 row">
                </div>    
            <div class="col-12" >
                <label>Descripción</label>
                <textarea id="description" name="description" class="form-control @error('value') is-invalid @enderror " ></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <b> {{ $message }} </b>
                    </span>
                @enderror
                       
            </div>    
                   
        </div>
        <div class="form-row mt-4 row">
            <div class="col-12 text-center">
            <button class="btn btn-success">Enviar</button>
            </div>
        </div>
       
    </form>
@endsection