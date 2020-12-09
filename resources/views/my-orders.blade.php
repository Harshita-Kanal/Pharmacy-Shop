@extends('layout')

@section('content')

<div class = "row" id = "body-row">
   <!-- Sidebar -->
   <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <!-- <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>MAIN MENU</small>
            </li> -->
            <a href="{{ route('users.edit') }}" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">My Profile</span>
                </div>
            </a>
            <a href="{{ route('orders.index') }}" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-medkit fa-fw mr-3"></span>
                    <span class="menu-collapsed">My orders</span>
                </div>
            </a>
            <!-- <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Categories</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a> -->
            <!-- Submenu content -->
       
            <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Collapse</span>
                </div>
            </a>
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->
    <div class = "col p-4">
    <div class = "container">
<div class="breadcrumbs">
        <div class="container">
            <a href="/home">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="/my-profile">My Account</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>My Orders</span>
            
        </div>
</div> <!-- end breadcrumbs -->
    <h1 style = "text-align: center;">My Orders</h1>
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
    
<table class = "table table-striped">
<thead>
    <tr>
      <th>Order Id</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Address</th>
      <th scope="col">Placed At</th>
      <!-- <th scope="col">Items ordered</th> -->
      <th scope= "col">Action</th>
    </tr>
  </thead>
<tbody>
@foreach($orders as $order)
<tr>
    <td>
        {{ $order->id }}
    </td>
    <td>
        {{ $order->sub_total }}
    </td>
    <td>
        {{ $order->address }}
    </td>
    <td>
        {{ $order->created_at->format('d-m-Y') }}
    </td>
    <td>
        <a href = "{{ route('orders.show', $order->id) }}" class = "btn btn-success">View</a>
    </td>
    <!-- <td>
        @foreach($order->products as $product)
            <p> {{ $product->name }} </p>
        @endforeach
    </td> -->
</tr>
@endforeach
</tbody>
</table>

    </div>
    </div>
</div>
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