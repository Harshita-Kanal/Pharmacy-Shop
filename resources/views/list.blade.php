@extends('layout')

@section('content')
<br/>
<div class = "container">
<div class="breadcrumbs">
        <div class="container">
            <a href="/home">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Medicines</span>
        </div>
 </div>
<br/>
</div>
<div class = "container">
  <div style = "text-align: center">
    <h1 style = "text-align: center;" class="h1">Medicine Shop</h1>
    <img class = "img-fluid" style = "height:220px;width:220px;" src = "{{ URL::asset('images/cart.svg') }}">
  </div>
  <br/>
    <div class="row">
    @foreach($medicines as $medicine )
    <div class =  "col-12 col-sm-4">
    <div class="card ml-3 mb-5">
        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
        <h5 class="card-title">{{ $medicine->name }}</h5>
        <p class="card-text"> Rs. {{ $medicine->price }}</p>
        <p class="card-text">Manufactured By: {{ $medicine->supplier }}</p>
        <form action = "{{ route('list.index') }}" method = "POST">
            {{ csrf_field() }}
            <input type = "hidden" name = "id" value = "{{ $medicine->id }}">
            <input type = "hidden" name = "name" value = "{{ $medicine->name }}">
            <input type = "hidden" name = "price" value = "{{ $medicine->price }}">
            <button class = "btn btn-warning">Add to list</button>
        </form>
    </div>
</div>
    </div>      
    @endforeach
    </div>
    <br/>
@stop