<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>  {{__('strings.addproduct')}}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>
        .form-control {
            color: #495057; /* Text color for form elements */
            background-color: #fff; /* Background color for form elements */
            border: 1px solid #ced4da; /* Border color */
            padding: 0.375rem 0.75rem; /* Padding */
            font-size: 1rem; /* Font size */
            line-height: 1.5; /* Line height */
            border-radius: 0.25rem; /* Border radius */
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; /* Transition */
        }

        .form-control:focus {
            border-color: #80bdff; /* Border color on focus */
            outline: 0; /* Remove outline */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Box shadow on focus */
        }

        .text-danger {
            color: #ff0000; /* Red color for error messages */
        }

        .product-section {
       margin-top: 75px; /* تحديد المسافة بين العناصر من الأعلى */
       margin-bottom: 75px; /* تحديد المسافة بين العناصر من الأسفل */
        }

        .form-group {
      margin-bottom: 45px; /* تحديد المسافة بين العناصر داخل الفورم */
     }
     /* CSS Styles for the close button */
.alert {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}

.btn-close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 0.75rem 1.25rem;
    color: inherit;
}



    </style>
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
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{__('strings.add')}}</span> {{__('strings.products')}}</h3>
                    </div>
                </div>
            </div>

            <div class="container">
                <!-- في العرض (View) -->
                @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="form-title"></div>
                    <div id="form_status"></div>
                    <div class="contact-form">
                        <form method="POST" enctype="multipart/form-data" action="storeproduct" id="fruitkha-contact" onSubmit="return valid_datas( this );" style="text-align: right" dir="rtl">
                            @csrf()
                            <div class="form-group">
                                <input type="text" required style=" color: #96cf0f; width: 100%" class="form-control" placeholder="{{__('strings.name')}}" name="name" id="name" value="{{old('name')}}">
                                <span class="text-danger">
                                    @error('name')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group" style="display: flex;">
                                <input type="number" required style=" color: #96cf0f; width: 50%; margin-right: 5px;" class="form-control" placeholder="{{__('strings.price')}}" name="price" id="price" value="{{old('price')}}">
                                <span class="text-danger" style="flex: 1;">
                                    @error('price')
                                        {{$message}}
                                    @enderror
                                </span>
                                <input type="number" required style="color: #96cf0f; width: 50%; margin-left: 5px;" class="form-control" placeholder="{{__('strings.quantity')}}" name="quantity" id="quantity" value="{{old('quantity')}}">
                                <span class="text-danger" style="flex: 1;">
                                    @error('quantity')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <textarea name="description" required style="color: #96cf0f;" id="description" cols="30" rows="10" class="form-control" placeholder="{{__('strings.description')}}">{{old('description')}}</textarea>
                                <span class="text-danger">
                                    @error('description')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <select class="form-control" required name="category_id" id="category_id" style="color: #495057; background-color: #fff; border: 1px solid #ced4da; padding: 0.375rem 0.75rem; font-size: 1rem; line-height: 1.5; border-radius: 0.25rem; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                    <option value="" selected disabled style="color: #6c757d;">{{__('strings.---select---')}}</option>
                                    @foreach ($AllCategories as $item)
                                        <option value="{{ $item->id }}" style="color: #495057;">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('category_id')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control" name="imagepath" id="imagepath">
                                <span class="text-danger">
                                    @error('imagepath')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="{{__('strings.save')}}" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
<script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="admin/assets/js/off-canvas.js"></script>
<script src="admin/assets/js/hoverable-collapse.js"></script>
<script src="admin/assets/js/misc.js"></script>
<script src="admin/assets/js/settings.js"></script>
<script src="admin/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="admin/assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
</body>
</html>
