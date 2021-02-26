@extends('layouts.app') 
@section('content')

<div class="text-center width=181 class=img-fluid mx-auto py-5">
<h1>Carros disponibles</h1>
</div>
<div class="card-group">
@foreach ($products as $prod)
    <div class="card">
        <img src="{{ asset('storage/'.$prod->image) }}" class="card-img-top" alt="...">
    <div class="card-body">
    
      <h5 class="card-title"><td>{{$prod->name}}</td></h5>
      <p class="card-text"><td>{{$prod->status}}</td></p>
      <p class="card-text"><td>{{$prod->value}}</td></p>
      <p class="card-text"><td>{{$prod->description}}</td></p>
     
          </div>
  </div>
  @endforeach

<div class="table table-bordered container text-right width=181 class=img-fluid mx-auto py-5" >

  <form action="mailto:2021acceso01@gmail.com" method="post">
      <h1>Contactenos</h1>

<p>Nombre: <input type="text" name="nombre" size="40" required placeholder="escriba su nombre"></p>
<p>Coreo electronico: <input type="text" name="correo" size="32"></p>
<p>Clase del vehiculo :

  <input type="radio" name="hm" value="h"> Clasico
  <input type="radio" name="hm" value="m"> Nuevo
</p>
<p>
  Quiere recibir informacion via ?

  <select name="menu">

    <option>Telefono</option>
    <option>Correo</option>
    <option>Mensaje de texto</option>

  </select>
</p>

<p>
<H3>Datos adicionales</H3>
  <textarea name="texto" cols="40" rows="4"></textarea>

  <input type="submit" value="Enviar" onclick="hizoClick()" value="Enviar" >
  <input type="reset" value="Borrar" />
  <script>
function hizoClick() {
  alert("Enviado");
}
</script>
</p>



</form>
   
</div>

@endsection