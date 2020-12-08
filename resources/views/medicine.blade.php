@extends('layout')

@section('content')

<div class = "container">
<br/>
<div class="breadcrumbs">
        <div class="container">
            <a href="/">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="/medicines">Pharmacy</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>{{ $medicines->name }}</span>
        </div>
</div> <!-- end breadcrumbs -->
<br/>
<h1 style = "text-align: center;">{{ $medicines->name }}</h1>
<div>
<div class="card" >
  <div class="card-body">
    <h4 style = "color: gray;" class="card-title">About</h4>
    <p class="card-text">{{ $medicines->details }}</p>
    <h4 style = "color: gray;" class="card-title">Availability</h4>
    <p class="card-text">{!! $stockLevel !!}</p>
    <!-- <h4 style = "color: gray;" class="card-title">Manufacturer</h4>
    <p class="card-text">Manufactured By: {{ $medicines->supplier }}</p> -->
    <!-- <p class="card-text">Amount: {{ $medicines->price }}</p> -->
    <h4 style = "color: gray;" class="card-title">Manufacturer</h4>
    <p class="card-text">Manufactured By: {{ $medicines->supplier }}</p>
    <h4 style = "color: gray;" class="card-title">Amount</h4>
    <p class="card-text">Rs. {{ $medicines->price }} per packet.</p>
   <div style = "text-align: center;">
    <a href="{{ route('medicines') }}" class="btn btn-success" >Go to shop</a>
    @if($medicines->quantity > 0)
    <form style = "display: inline-block;" action = "{{ route('list.index') }}" method = "POST">
            {{ csrf_field() }}
            <input type = "hidden" name = "id" value = "{{ $medicines->id }}">
            <input type = "hidden" name = "name" value = "{{ $medicines->name }}">
            <input type = "hidden" name = "price" value = "{{ $medicines->price }}">
            <button class = "btn btn-warning ml-5">Add to list</button>
        </form>
    @endif
  </div>
  </div>
</div>
</div>
<br/>
@stop