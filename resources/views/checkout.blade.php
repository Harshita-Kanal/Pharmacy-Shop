@extends('layout')

@section('content')

<div class = "container">
<br/>
<div class="breadcrumbs">
        <div class="container">
            <a href="/home">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="/medicine-list">Medicine list</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>checkout</span>
        </div>
</div> <!-- end breadcrumbs -->
<br/>
<h2 style = "text-align: center;">Thank you! Please fill the below details</h2>

<br>
<table class="table table-hover">
<tr>
    <td>Your list amounts to: </td>
    <td>Subtotal: {{ Cart::total() }}</td>
</tr>
</table>
<br/>
<form action = "{{ route('checkout.store') }}" method = "POST">
  <div class="form-group">
  {{ csrf_field() }}
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name = "name" class="form-control" id="name" placeholder="Name">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name = "address" class="form-control" id="address" placeholder="Address">
  </div>
  <div class="form-group">
    <label for="doctor">Doctor name</label>
    <input type="text" name = "doctor" class="form-control" id="doctor" placeholder="Enter the doctor name if prescribed by a doctor">
  </div>
  <div style = "text-align: center;">
  <button type="submit"  class="btn btn-primary">Submit</button>
  </siv>
</form>


</div>
@stop