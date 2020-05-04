<!-- Left Sidenav -->
<div class="left-sidenav">
    @auth
        <ul class="metismenu left-sidenav-menu">
            @role('Admin')
            <li>
                <a href="javascript: void(0);"><i class="ti-bar-chart"></i><span>Analytics</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard.index')}}"><i class="ti-control-record"></i>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Customers</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Reports</a></li> 
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard.wholesalers')}}"><i class="ti-control-record"></i>Wholesalers</a></li> 
                    <li class="nav-item"><a class="nav-link" href="{{route('dashboard.retailers')}}"><i class="ti-control-record"></i>Retailers</a></li> 
                </ul>
            </li>
            @endrole
            @role('Wholesaler')
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="dripicons-mail"></i><span class="w-100">Wholesaler</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('wholesaler.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('wholesaler.retailer')}}">Retailers</a></li>
                    <li><a href="{{route('wholesaler_products.index')}}">Products</a></li>
                    <li><a href="#">Transactions</a></li>
                    <li><a href="#">Inventory</a></li>
                </ul>
                <!-- -->
            </li><!--end nav-item-->
            @endrole
            @role('Retailer')
           <li class="nav-item">
                <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Retailers</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('retailer.dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('retailer.wholesaler')}}">Wholesalers</a></li>
                    <li><a href="#">Customers</a></li>
                    <li><a href="#">POS-Portal</a></li>
                    <li><a href="#">Transactions</a></li>
                    <li><a href="#">Inventory</a></li>
                    <li><a href="{{route('retailer.purchase_order')}}">Create Purchase Order</a></li>
                    <li><a href="{{route('retailer.shortagelist')}}">Create Shortage List</a></li>
                </ul>
            </li><!--end nav-item-->
            @endrole
            @role('Admin')
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Products</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('product.index')}}">Product List</a></li>
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
                <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Drugs</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('drug.index')}}">Drugs List</a></li>
                    <li><a href="#">Drugs Category</a></li>
                </ul>
            </li><!--end nav-item-->
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">News / Articles</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('post.index')}}">News Post</a></li>
                    <li><a href="{{route('post_category.index')}}">Post Category</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Settings</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('manufacture.index')}}">Manufacturers</a></li>
                    <li><a href="{{route('product_category.index')}}">Product Category</a></li>
                    <li><a href="{{route('product_category_types.index')}}">Product Category Types</a></li>
                    <li><a href="{{route('drug_class.index')}}">Drugs Class</a></li>
                    <li><a href="{{route('dosage_form.index')}}">Drug Dosage Form</a></li>
                    <li><a href="{{route('region.index')}}">Region</a></li>
                    <li><a href="{{route('town.index')}}">Town</a></li>
                </ul>
            </li><!--end nav-item-->
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="dripicons-view-list-large"></i><span class="w-100">Web Front Settings</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{route('home.banner')}}">Banners</a></li>
                </ul>
            </li><!--end nav-item-->
            @endrole
            <li>
                <a href="javascript: void(0);"><i class="ti-briefcase"></i>
                    <span>Projects</span>
                    <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                    <span class="badge badge-pink float-right mr-2">New</span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti-control-record"></i>Clients</a></li>
                </ul>
            </li>
        </ul>
    @endauth
</div>
<!-- end left-sidenav-->