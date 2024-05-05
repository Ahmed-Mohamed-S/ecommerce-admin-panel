<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>
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
        /* Invoice Table Style */
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f2f2f2;
            color: #333;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .details-table th,
        .details-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .details-table th {
            background-color: #f9f9f9;
        }

        .product-image {
            max-width: 100px;
            height: auto;
        }

        /* Action Buttons Style */
        .actions-btns {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 50px; /* Add some margin at the bottom */
        }

        .actions-btns a {
            display: inline-block;
            margin-right: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .actions-btns a:hover {
            background-color: #0056b3;
        }

        .actions-btns .btn-danger {
            background-color: #dc3545;
        }

        .actions-btns .btn-danger:hover {
            background-color: #c82333;
        }

        /* Footer Style */
        .footer {
            margin-top: 50px;
            padding: 20px 0;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            text-align: center;
        }

        .footer span {
            font-size: 14px;
            color: #6c757d;
        }

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

    <!-- Main content -->
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Title -->
            <div class="page-header">
                <h3 class="page-title">Invoice</h3>

            </div>

            <div class="row">
                @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif





                <div class="col-lg-12">
                    <div align="center" style="padding-top: 50px;">
                        @foreach ($bills as $bill)
                            <table class="invoice-table">
                                <!-- Your invoice table content goes here -->
                                <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $bill->created_at }}</td>
                                    <td>{{ $bill->name }}</td>
                                    <td>{{ $bill->email }}</td>
                                    <td>{{ $bill->address }}</td>
                                    <td>{{ $bill->phone }}</td>
                                    <td>{{ $bill->note }}</td>
                                </tr>
                                <tr class="details-row">
                                    <td colspan="6">
                                        <div class="table-responsive">
                                            <table class="details-table">
                                                <thead>
                                                <tr>
                                                    <th>Product Image</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $totalPrice = 0; ?>
                                                @foreach ($bill->orderdetails as $detail)
                                                    <tr>
                                                        <td><img src="{{ asset($detail->product->imagepath) }}" alt="" class="product-image"></td>
                                                        <td>{{ $detail->product->name }}</a></td>
                                                        <td>{{ $detail->product->price }}</td>
                                                        <td>{{ $detail->quantity }}</td>
                                                        <td>{{ $detail->quantity * $detail->product->price }} $</td>
                                                        <?php $totalPrice += $detail->quantity * $detail->product->price; ?>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        <div class="actions-btns">
                            <a onclick="return confirm('Are you sure to delete this ?')" href="{{url('cancelled',$bill->id)}}" class="btn btn-danger">Cancelled</a>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>

        </div>

    </div>

