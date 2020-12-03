@extends('layout')

@section('content')
<br/>
<div class = "container">
<div class="breadcrumbs">
        <div class="container">
            <a href="/home">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>MedEasy</span>
        </div>
</div> <!-- end breadcrumbs -->
<br/>
</div>
<div class = "container">
<div style = "text-align: center; background-color: #fcedf5;padding: 40px;">
  <h1 style = "color: grey" class="display-4">Welcome to MedEasy</h1>
  <div style = "text-align: center">
    <img class = "img-fluid" style = "height:320px;width:470px;" src = "{{ URL::asset('images/introduction.svg') }}">
  </div>
  <p class="lead">Your one Stop health and pharmacy shop</p>
</div>
<br/>
    <h2><span style = "color:grey;">F</span>eatured Products</h2>
    <hr style = "color: black;"></hr>
    <br />
    <div class = "products-section container">

    </div>
    <div class="row">
    @foreach($medicines as $medicine)
    <div class =  "col-12 col-sm-4">
    <div class="card ml-3">
        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
        <h5 class="card-title">{{ $medicine->name }}</h5>
        <p class="card-text"> Rs. {{ $medicine->price }}</p>
        <p class="card-text">Manufactured By: {{ $medicine->supplier }}</p>
        <a href="/medicines" class="btn btn-primary">View</a>
    </div>
</div>
    </div>            <!-- <div class="col-sm-4">
                <a href="#"><div class="product-name">{{ $medicine->name }}</div></a>
                <div class="product-price">{{ $medicine->price }}</div>
            </div> -->
    @endforeach
    </div>
    <br/>
@stop