@extends('layouts.app')
@section('content')
<div class="card border-primary mb-3" >
    <div class="card-header">
    <h1 class="text-center">Modificar producto</h1>
    </div>
    
    <div class="card-body text-primary">

    <form method="POST" class="needs-validations" action="/product/{{ $product->id }}"
    enctype="multipart/form-data" novalidate >
        {{ csrf_field() }}       
        @csrf
        @method('put')

        <div class="form-row mt-4 row">
            <div class="col-12 col-sm-4 col-md-4">
                <label>Image</label>
                <input type="file" name="productcover" class="form-cotrol">
            </div>  
            <div class="col-12 col-md-6 col-sm-6">
                <img src="{{ url(Storage::url($product->image)) }}" width="80" class="img-fluid">
            </div>     
        </div>
        
        <div class="form-row mt-4 row">
            <div class="col-12 col-sm-4 col-md-4">
                <label>Nombre del producto</label>
                <input type="text" id="name" name="name" class="form-control  @error ('name') is-invalid @enderror   " value="{{ old('name') }} {{ $product->name }}" />
                @error('name')
                    <span class="invalid-feedback" role="alert">
                      <b> {{$message}} </b>
                    </span>
                @enderror
            </div>

            <div class="col-12 col-sm-4 col-md-4">
                <label>Valor del producto</label>
                <input type="text" id="value" name="value" class="form-control @error ('value') is-invalid @enderror  "  value="{{ old('value') }} {{ $product->value }}"  />
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
        </div>      
           
            <div class="form-row mt-4 row">         

            <div class="col-12" >
                <label>Descripción</label>
                <textarea id="description" name="description" class="form-control
                @error('value') is-invalid @enderror " >{{ $product->description }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <b> {{ $message}} </b>
                    </span>
                @enderror
            
              
            </div>    
                      
        </div>
        <div class="form-row mt-4 row">         
            <div class="col-12 text-center" >
                <button class="btn btn-success">Enviar</button>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection