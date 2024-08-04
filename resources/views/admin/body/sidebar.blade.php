 <div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
    

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
    
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-handshake"></i>
                        <span>Manage Suppliers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.supplier')}}">All Suppliers</a></li>
                        <li><a href="{{ route('add.supplier') }}">Add Suppliers</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span>Manage Customers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.customer')}}">All Customers</a></li>
                        <li><a href="{{ route('all.customer')}}">Add Customers</a></li>
                        <li><a href="{{ route('credit.customer')}}">Credit Customers</a></li>
                        <li><a href="{{ route('paid.customer')}}">Paid Customers</a></li>
                    </ul>
                </li>
 
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-hand-lizard"></i>
                        <span>Manage Units</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.units')}}">All Units</a></li>
                        <li><a href="{{ route('add.units')}}">All Units</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-layer-group"></i>
                        <span>Manage Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.category')}}">All Category</a></li>
                        <li><a href="{{ route('add.category')}}">Add Category</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-layer-group"></i>
                        <span>Manage Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.product')}}">All Product</a></li>
                        <li><a href="{{ route('add.product')}}">Add Product</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-layer-group"></i>
                        <span>Manage Purchase</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.purchase')}}">All Purchase</a></li>
                        <li><a href="{{ route('add.purchase')}}">Add Purchase</a></li>
                        <li><a href="{{ route('pending.purchase')}}">Approval Purchase</a></li>
                        <li><a href="{{ route('daily.purchase.report')}}">Daily Purchase Report</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-layer-group"></i>
                        <span>Manage Invoice</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.invoice')}}">All Invoice</a></li>
                        <li><a href="{{ route('add.invoice')}}">Add Invoice</a></li>
                        <li><a href="{{ route('pending.invoice')}}">Pending Invoice</a></li>
                        <li><a href="{{ route('print.invoice.list')}}">Print Invoice List</a></li>
                        <li><a href="{{ route('daily.invoice.report')}}">Daily Invoice Report</a></li>
                    </ul>
                </li>



                

                <li class="menu-title">Stock</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Manage Stock</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('stock.report')}}">Stock Report</a></li>
                        <li><a href="{{ route('stock.supplier.wise')}}">Supplier/Product Wise</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Utility</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html">Starter Page</a></li>
                        <li><a href="pages-timeline.html">Timeline</a></li>
                        <li><a href="pages-directory.html">Directory</a></li>
                        <li><a href="pages-invoice.html">Invoice</a></li>
                        <li><a href="pages-404.html">Error 404</a></li>
                        <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                </li>

               

                
             

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>