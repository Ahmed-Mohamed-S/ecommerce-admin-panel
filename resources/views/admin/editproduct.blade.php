<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>صفحة تعديل المنتجات</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" />
</head>
<body>
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                <div class="ps-lg-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                        <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                    <button id="bannerClose" class="btn border-0 p-0">
                        <i class="mdi mdi-close text-white me-0"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')
    <!-- partial -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Edit</span> Products</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="form-title">
                    </div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" enctype="multipart/form-data" action="{{ url('storeproduct') }}" id="fruitkha-contact" onSubmit="return valid_datas(this);" style="text-align: right" dir="rtl">
                            @csrf()
                            @method('post')
                            <p>
                                <input type="hidden" required style="width: 100%" placeholder="" name="id" id="id" value="{{ $product ? $product->id : '' }}">
                                <input type="text" required style="width: 100%" placeholder="الاسم" name="name" id="name" value="{{ $product ? $product->name : '' }}">
                                <span class="text-danger">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </span>
                            </p>
                            <p style="display: flex;" >
                                <input type="number" required style="width: 50%" class="ml-4" placeholder="السعر" name="price" id="price" value="{{ $product ? $product->price : '' }}">
                                <span class="text-danger">
                                    @error('price')
                                    {{$message}}
                                    @enderror
                                </span>
                                <input type="number" required style="width: 50%" placeholder="الكمية" name="quantity" id="quantity" value="{{ $product ? $product->quantity : '' }}">
                                <span class="text-danger">
                                    @error('quantity')
                                    {{$message}}
                                    @enderror
                                </span>
                            </p>
                            <p><textarea name="description" required id="description" cols="30" rows="10" placeholder="الوصف">{{ $product ? $product->description : '' }}</textarea></p>
                            <span class="text-danger">
                                @error('description')
                                {{$message}}
                                @enderror
                            </span>
                            <p>
                                <select class="form-control" required name="category_id" id="category_id">
                                    @foreach ($AllCategories as $item)
                                    @if (isset($product) && $item->id == $product->category_id)
                                    <option value="{{ $item->id }}" selected> {{ $item->name }}</option>
                                    @else
                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('category_id')
                                    {{$message}}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                <input type="file" class="form-control" name="photo" id="photo">
                                <span class="text-danger">
                                    @error('photo')
                                    {{$message}}
                                    @enderror
                                </span>
                            </p>
                            <p>
                                @if($product && $product->imagepath)
                                <img src="{{ asset($product->imagepath) }}" width="200" height="200">
                                @endif
                            </p>
                            <p><input type="submit" value="حفظ"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/assets/js/misc.js') }}"></script>
<script src="{{ asset('admin/assets/js/settings.js') }}"></script>
<script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page -->
</body>
</html>
