@extends('layouts.app') 
@section('content')

        <div class="d-flex justify-content-end" >
                <a class="btn btn-success" href="/product/create" > Crear producto</a>
        </div>
        
      
        <div>
                <h1 class="text-center mt-3">Todos los productos</h1>
                <table class="table table-bordered">
                        <thead>
                                <th scope="col"> Nombre del producto </th>
                                <th scope="col"> Valor del producto</th>
                                <th scope="col"> Estado del producto</th>  
                                <th scope="col"> Descripcion</th>       
                        </thead>
                        
                        <tbody> 
                               @foreach ($products as $prod)
                                        <tr>
                                             <td>{{$prod->name}}</td>   
                                             <td>{{$prod->value}}</td>   
                                             <td>{{$prod->status}}</td> 
                                             <td>{{$prod->description}}</td>   
                                             <td>
                                                        <a type="button" class="btn btn-success" href="/product/{{$prod->id}}"> 
                                                        <span class="material-icons"> visibility
                                                        /span></a>
                                                        <a type="button" class="btn btn-primary" href="/product/{{$prod->id}}/edit"> 
                                                        <span class="material-icons"> create
                                                        /span></a>
                                                        
                                                                         
                                                                                       
                                                         <form type="button" class="btn btn-danger" action="{{route('product.destroy',$prod->id)}}" method="post">
                                                                        @csrf 
                                                                        @method("DELETE")
                                                                        
                                                                        <button class="material-icons" type="submit" > 
                                                                        </button>
                                                                       
                                                         </form>
                                                 </td>
                                        </tr>
                                @endforeach
                        </tbody>

                </table>        
       
        </div>

@endsection



