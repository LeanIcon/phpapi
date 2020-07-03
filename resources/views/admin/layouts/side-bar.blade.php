<style>
.left-sidenav-menu{
    color:#141336;
}
.bg-dark {
    background-color: #04031F !important;
}
.left-sidenav-menu li ul li > a {
    padding: 10px 22px;
    color: #e5e8eb;
    font-size: 13.5px;
    border-left: none;
}
.left-sidenav-menu li > a {
    display: block;
    padding: 12px 24px;
    color: #eceff1;
    -webkit-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;
}
.left-sidenav-menu li > a i {
    width: 25px;
    display: inline-block;
    font-size: 16px;
    opacity: 0.8;
    color: #f3f6f8;
}
</style>
<!-- Left Sidenav -->
<div class="left-sidenav bg-dark">
    @auth
        <ul class="metismenu left-sidenav-menu">
            @role('Admin')
            <!--<li>
                <a href="javascript: void(0);"><i class="ti-bar-chart"></i><span>Analytics</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard.index')}}"><i class="ti-control-record"></i>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Customers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Reports</a></li> 
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard.wholesalers')}}"><i class="ti-control-record"></i>Wholesalers</a></li> 
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard.retailers')}}"><i class="ti-control-record"></i>Retailers</a></li> 
                </ul>
            </li>-->
            <li class="nav-item"><a href="{{route('dashboard.index')}}"></i>Dashboard</a></li>
                    <!--<li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Customers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Reports</a></li> 
                    --><li><a href="{{route('dashboard.wholesalers')}}"></i>Wholesalers</a></li> 
                    <li><a href="{{route('dashboard.retailers')}}"></i>Retailers</a></li> 
                
            @endrole
            @role('Wholesaler')
            <li class="nav-item">
                <li><a href="{{route('wholesaler.dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('wholesaler.retailer')}}">Retailers</a></li>
                <li><a href="{{route('wholesaler_products.index')}}">Products</a></li>
                <li><a href="{{route('wholesaler.purchaseorderlist')}}">Purchase Order</a></li>
                <li><a href="{{ route('wholesaler.invoice') }}">Invoices</a></li>
                <!--<a class="nav-link" href="#"><i class="dripicons-mail"></i><span class="w-100">Wholesaler</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('wholesaler.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('wholesaler.retailer')}}">Retailers</a></li>
                    <li><a href="{{route('wholesaler_products.index')}}">Products</a></li>
                    <li><a href="#">Transactions</a></li>
                    <li><a href="#">Inventory</a></li>
                </ul>-->
                <!-- -->
            </li><!--end nav-item-->
            @endrole
            @role('Retailer')
           <li class="nav-item">
            <li><a href="{{route('retailer.dashboard')}}">Dashboard</a></li>
            <li><a href="{{route('retailer.wholesaler')}}">Wholesalers</a></li>
            <li><a href="{{route('retailer.purchase_order')}}">Purchase Order</a></li>
            <li><a href="{{route('create.shortagelist')}}">Shortage List</a></li>
            <li><a href="{{ route('invoice.list') }}">Invoices</a></li>
            <li><a href="{{route('retailer.search.index') }}">Price comparison</a></li>
               <!-- <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Retailers</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('retailer.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('retailer.wholesaler')}}">Wholesalers</a></li>
                    <li><a href="#">Customers</a></li>
                    <li><a href="#">POS-Portal</a></li>
                    <li><a href="#">Transactions</a></li>
                    <li><a href="#">Inventory</a></li>
                    {{--  <li><a href="{{route('retailer.purchase_order')}}">Create Purchase Order</a></li>
                    <li><a href="{{route('retailer.shortagelist')}}">Create Shortage List</a></li>  --}}
                </ul>-->
            </li><!--end nav-item-->
            @endrole
            @role('Admin')
            <li class="nav-item">
                <li><a  href="{{route('product.index')}}">Products</span><span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <!--<li><a href="{{route('product.index')}}">Products</a></li>-->
                    {{--  <li><a href="{{route('product_category.index')}}">Product Category</a></li>  --}}
                </ul>
            </li><!--end nav-item-->
            <!--<li class="nav-item">
                <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Equipment</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('equipment.index')}}">Equipment List</a></li>
                    <li><a href="#">Equipment Update</a></li>
                </ul>
            </li>-->
            <!--<li class="nav-item">
                <a class="nav-link" href="{{route('product_category.index')}}"><i class="dripicons-view-list-large"></i><span class="w-100">Product Category</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('product_category.index')}}">Category List</a></li>
                    <li><a href="#">Category Update</a></li>
                </ul>
            </li>--><!--end nav-item-->
            <li class="nav-item">
               <!-- <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Drugs</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('drug.index')}}">Drugs List</a></li>
                    <li><a href="#">Drugs Category</a></li>
                </ul>-->
            </li><!--end nav-item-->
            <li class="nav-item">
                <a class="nav-link" href="#">News / Articles</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('post.index')}}">News Post</a></li>
                    <li><a href="{{route('post_category.index')}}">Post Category</a></li>
                </ul>
            </li>
            <li class="nav-item">
               <li> <a href="#">Data Entry</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('manufacture.index')}}">Manufacturers</a></li>
                    <li><a href="{{route('product_category.index')}}">Product Category</a></li>
                    <li><a href="{{route('product_category_types.index')}}">Drug Legal Status</a></li>
                    <li><a href="{{route('drug_class.index')}}">Drug Class</a></li>
                    <li><a href="{{route('dosage_form.index')}}">Drug Dosage Form</a></li>
                    <li><a href="{{route('region.index')}}">Region</a></li>
                    {{-- <li><a href="{{route('town.index')}}">Town</a></li> --}}
                    <li><a href="{{route('location.index')}}">Location</a></li>
                </ul>
            </li><!--end nav-item-->
           <!-- <li class="nav-item">
                <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Web Front Settings</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('home.banner')}}">Banners</a></li>
                </ul>
            </li>--><!--end nav-item-->
            @endrole
           <!-- <li>
                <a href="javascript: void(0);"><i class="ti-briefcase"></i>
                    <span>Projects</span>
                    <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                    <span class="badge badge-pink float-right mr-2">New</span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Clients</a></li>
                </ul>
            </li>-->
            @hasanyrole('Wholesaler|Retailer')
                <li><a href="{{route('profile.index')}}">Profile</a></li>
            @endhasanyrole
        </ul>
    @endauth
</div>
<!-- end left-sidenav-->