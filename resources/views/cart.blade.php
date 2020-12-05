@extends('layout')

@section('content')

<div class = "container">
<br/>
<div class="breadcrumbs">
        <div class="container">
            <a href="/">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="/">Store</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Medicine List</span>
        </div>
</div> <!-- end breadcrumbs -->
<br/>
<h1 style = "text-align: center;">Medicine List</h1>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (Cart::count() > 0)

            <h5 style = "color: grey;text-align: center;">{{ Cart::count() }} item(s) in Medicine List</h5>
            <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Item</th>
                <th scope="col">Supplier</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            
            @foreach(Cart::content() as $item)
            <tr>
                <th scope="row">{{$item->model->name }}</th>
                <td>{{$item->model->supplier }}</td>
                <td>{{$item->model->price * $item->qty}}</td>
                <td>{{$item->qty}}</td>
                <td>
                <form action = "{{ route('list.destroy', $item->rowId) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type = "submit" class = "btn btn-danger">Remove</button>

                </form>
            </td>
            </tr>
           @endforeach
           <tr>
                <td>Subtotal: {{ Cart::total() }}</td>
                <td><a class = "btn btn-warning" style = "color: black;" href = "{{route('medicines') }}">Continue Shopping</a></td>
                <td><a class = "btn btn-success" style = "color: black;" href = "{{route('checkout') }}">Place the order</a></td>
           </tr>
            </tbody>
            </table>

            @else
            <div style = "text-align: center;">
            <h3 style = "align: center;color: gray;">It's empty here </h3>
            <br/>
            <a class = "btn btn-warning"  href = "{{route('medicines') }}" >Continue Shopping</a>
            </div>
            @endif


<!-- <div style = "text-align: center">
<img class = "img-fluid" style = "height:320px;width:470px;" src = "{{ URL::asset('images/covid-19.png') }}">
</div> -->
<!-- <p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.

Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.

The best way to prevent and slow down transmission is to be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face. 
</p> -->
</div>
@stop