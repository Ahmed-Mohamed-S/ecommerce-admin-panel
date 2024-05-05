<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="admin/assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <!-- Profile content -->
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <!-- Add Product -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('addproduct')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">{{__('strings.AddProduct')}}</span>
            </a>
        </li>
        <!-- All Products -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('AllProducts')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">{{__('strings.allproducts')}}</span>
            </a>
        </li>
        <!-- Products Sales -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('charts')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">{{__('strings.ProductsSales')}}</span>
            </a>
        </li>
        <!-- Bills -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('bills')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">{{__('strings.bills')}}</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('reviews')}}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">{{__('strings.custom')}}</span>
            </a>
        </li>
    </ul>
</nav>






