@extends('layout')

@section('content')

<div class = "container">
<br/>
<div class="breadcrumbs">
        <div class="container">
            <a href="/home">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Covid Essentials</span>
        </div>
</div> <!-- end breadcrumbs -->
<br/>
<h1 style = "text-align: center;">Covid Essentials</h1>

<div style = "text-align: center">
<img class = "img-fluid" style = "height:320px;width:470px;" src = "{{ URL::asset('images/covid-19.png') }}">
</div>
<h2><span style = "color:grey;">A</span>bout</h2>
    <hr style = "color: black;"></hr>
<p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.

Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.

The best way to prevent and slow down transmission is to be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face. 
</p>
<h2><span style = "color:grey;">P</span>recautions</h2>
    <hr style = "color: black;"></hr>
<ul class="list-group">
  <li class="list-group-item">Clean your hands often. Use soap and water, or an alcohol-based hand rub.</li>
  <li class="list-group-item">Wear a mask when physical distancing is not possible.</li>
  <li class="list-group-item">Maintain a safe distance from anyone who is coughing or sneezing.</li>
</ul>
<br/>
  <h2><span style = "color:grey;">B</span>rowse Covid Category Products</h2>
    <hr style = "color: black;"></hr>
    <div class="row">
    @foreach($medicines as $medicine)
    <div class =  "col-12 col-sm-4">
    <div class="card ml-3" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
        <h5 class="card-title">{{ $medicine->name }}</h5>
        <p class="card-text"> Rs. {{ $medicine->price }}</p>
        <p class="card-text">Manufactured By: {{ $medicine->supplier }}</p>
        <a href="{{ route('medicine.show', $medicine->slug) }}" class="btn btn-primary">View</a>
    </div>
    </div>
    </div>
    <br/>
    @endforeach
</div>
<br/>
<br/>
@stop