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
<p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.

Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.

The best way to prevent and slow down transmission is to be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face. 
</p>
</div>
@stop