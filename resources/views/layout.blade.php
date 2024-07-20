
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7f08e8908c.js" crossorigin="anonymous"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}> --}}
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                <div class="dropdown">
                    <button class="btn btn-primary" data-bs-toggle="dropdown">
                        <i class="fa-solid fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge rounded-pill bg-danger">{{ count((array) session('cart')) }}</span>
                    </button>

                    <div class="dropdown-menu">
                        <div class="row total-header-section">
                            @php
                                $total = 0;
                            @endphp

                            @foreach ((array) session('cart') as $id=>$details )
                                @php
                                    $total += $details['quantity'] * $details['price'];
                                @endphp
                            @endforeach

                            <div class="col-lg-12 col-sm-12 col-12 total-section text-end">
                                <p>
                                    Total: <span class="text-info"> $ {{ $total }}</span>
                                </p>
                            </div>
                        </div>

                        @if (session('cart'))
                            
                            @foreach (session('cart') as $id => $details )
                                <div class="row cart-detail mx-2 my-3">
                                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                        <img src="{{ asset('img/'. $details['photo']) }}" width="70" height="70" alt="">
                                    </div>
                                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                        <p>{{ $details['product_name'] }}</p>
                                        <span class="price-text-info fs-6  text-info">{{ $details['price'] }}</span> 
                                        <span class="count">
                                            Quantity: {{ $details['quantity'] }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach

                        @endif

                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ route('cart') }}" class="btn btn-primary block"> View All </a>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @yield('scripts')

</body>
</html>
