@extends('layout')

@section('content')

<div class = "container">
<br/>
<div class="breadcrumbs">
        <div class="container">
            <a href="/">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Search Results</span>
        </div>
</div> <!-- end breadcrumbs -->
<br/>
<div class = "container">
<h1 style = "text-align: center;">Search Results</h1>
<p style = "color: grey;">{{ $medicines->count() }} result(s) for '{{ request()->input('query') }}'</p>
<br/>
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
<div class="row">
    @forelse($medicines as $medicine )
    <div class =  "col-12 col-sm-4">
    <div class="card ml-3 mb-5" style = "box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
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
            <div style = "display:flex;align-items: center;">
            <button  type = "submit" class = "btn btn-warning">Add to list</button>
            <a href = "{{route('medicine.show', $medicine->name)}}" class = "ml-3 btn btn-success">View</a>
            </div>
        </form>
       
    </div>
</div>
    </div> 
    @empty
        <div><p>No Items Found</p></div>     
    @endforelse
    </div>

{{ $medicines->appends(request()->input())->links()}}
</div>


</div>
@stop