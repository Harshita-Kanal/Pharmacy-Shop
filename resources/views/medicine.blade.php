@extends('layout')

@section('content')

<div class = "container">
<br/>
<div class="breadcrumbs">
        <div class="container">
            <a href="/">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="/">Medicines</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Medicine Name</span>
        </div>
</div> <!-- end breadcrumbs -->
<br/>
<h1 style = "text-align: center;">{{ $medicines->name }}</h1>

<div style = "text-align: center">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{ $medicines->details }}</h5>
    <p class="card-text">Manufactured By: {{ $medicines->supplier }}</p>
    <!-- <p class="card-text">Amount: {{ $medicines->price }}</p> -->
    <table  class="table table-hover">
    <tr>
    <td>
    Amount: {{ $medicines->price }}
    </td>
    <td>
    <a href="{{ route('medicines') }}" class="btn btn-success" >Go to shop</a>
    </td>
    <td>
    <form action = "{{ route('list.index') }}" method = "POST">
            {{ csrf_field() }}
            <input type = "hidden" name = "id" value = "{{ $medicines->id }}">
            <input type = "hidden" name = "name" value = "{{ $medicines->name }}">
            <input type = "hidden" name = "price" value = "{{ $medicines->price }}">
            <button class = "btn btn-warning ml-5">Add to list</button>
        </form>
    </td>
    </tr>
    </table>
  </div>
</div>
</div>
@stop