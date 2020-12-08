@extends('layout')

@section('content')
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <!-- <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li> -->
            <a href="{{ route('medicines') }}" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-medkit fa-fw mr-3"></span>
                    <span class="menu-collapsed">All Items</span>
                </div>
            </a>
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Categories</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu2' class="collapse sidebar-submenu">
            @foreach ($categories as $category)
                <a href="{{ route('medicines', ['category' => $category->slug]) }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed">{{ $category->name }}</span>
                </a>
            
            @endforeach   
            </div>
       
            <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
<br/>
<div class = "col p-4">
<div class = "container">
<div class="breadcrumbs">
        <div class="container">
            <a href="/home">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Pharmacy</span>
        </div>
 </div>
<br/>
</div>
<div class = "container">
  <div style = "text-align: center">
    <h1 style = "text-align: center;" class="h1">Pharmacy Shop</h1>
    <img class = "img-fluid" style = "height:220px;width:220px;" src = "{{ URL::asset('images/cart.svg') }}">
  </div>
  <br/>
    <h3 style = "color:grey;">{{ $categoryName  }}</h3>
    <hr style = "color: black;"></hr>
    <br />

    <div class="row">
    @forelse($medicines as $medicine )
    <div class =  "col-12 col-sm-4">
    <div class="card ml-3 mb-5" style = "box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
        <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-body">
        <h5 class="card-title"><a style = "color: black;" href="{{ route('medicine.show', $medicine->slug) }}">{{ $medicine->name }}</a></h5>
        <p class="card-text"> Rs. {{ $medicine->price }}</p>
        <p class="card-text">Manufactured By: {{ $medicine->supplier }}</p>
       @if( $medicine->quantity == 0)
            <form>
            <button  disabled class = "btn btn-danger">Out of Stock</button>
            <br/>
            </form>
            
       @else
            <form action = "{{ route('list.index') }}" method = "POST">
            {{ csrf_field() }}
            <input type = "hidden" name = "id" value = "{{ $medicine->id }}">
            <input type = "hidden" name = "name" value = "{{ $medicine->name }}">
            <input type = "hidden" name = "price" value = "{{ $medicine->price }}">
            <button class = "btn btn-warning">Add to list</button>
        </form>
        @endif 
    </div>
</div>
    </div> 
    @empty
        <div><p>No Items Found</p></div>     
    @endforelse
    </div>
    </div>
    <br/>
    <script>
    // Hide submenus
$('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    SidebarCollapse();
});

function SidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
    
    // Treating d-flex/d-none on separators with title
    var SeparatorTitle = $('.sidebar-separator-title');
    if ( SeparatorTitle.hasClass('d-flex') ) {
        SeparatorTitle.removeClass('d-flex');
    } else {
        SeparatorTitle.addClass('d-flex');
    }
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}
    </script>
@stop