<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>
    .cart-badge {
        position: relative;
        display: inline-block;
    }

    .cart-icon {
        display: inline-block;
        width: 45px;
        height: 20px;
    }

    .cart-count {
        position: absolute;
        top: -10px;
        right: 1px;
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        background-color: #DD5903;
        color: white;
        border-radius: 50%;
    }

    .carousel-item {
        height: 400px;
        margin: 5px;
        object-fit: cover;
    }
</style>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('product')}}">Products</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">

                            </a>
                        </li>
                    </ul>
                    <div class="cart-badge me-2">
                        <a href="{{route('cart')}}">
                            <span class="cart-icon"> Cart</i></span>
                        </a>
                        <span id="cartTotal" class="cart-count">5</span>
                    </div>

                    @if (Auth::check())

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link href="javascript:void(0)" onclick="event.preventDefault();this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                    @else
                    <a class="me-2" style="color: #DD5903;" href="{{route("login")}}">Login</a>
                    <a style="color: #DD5903;" href="{{route("register")}}">Register</a>
                    @endif
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('assets/photo-1505740420928-5e560c06d30e.jpg')}}" class="img-fluid d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/images.jpg')}}" class="img-fluid d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/photo-1523275335684-37898b6baf30.jpg')}}" class="img-fluid d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        @yield('content')
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets/cart.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <script>
        var cart = new Cart();

        $("#cartTotal").html(cart.totalItems());

        $(".cart").click(function() {

            var productId = $(this).data("product-id");
            // alert(productId);

            let id = null;
            let name = null;
            let price = null;


            $.getJSON("{{url('cartapi')}}/" + productId, function(data) {
                // console.log(data);

                id = data.id;
                name = data.name;
                price = data.price;


                let product = {
                    'id': id,
                    'name': name,
                    'price': price,

                };

                // console.log(product);
                cart.addItem(product);

                $("#cartTotal").html(cart.totalItems());

            })

        })



        $(document).ready(function() {

            let showCart = new Cart();
            console.log(showCart.getItems());
            let cartInfo = showCart.getItems();
            let html = "";
            cartInfo.forEach(e => {
                html += `<tr >
                            <td>${e.name}</td>
                            <td class="price">${e.price}</td>
                        </tr>`;

                return html;

            });
            $('#dyn_tr').html(html);
        })
    </script>

    @yield('js')
</body>

</html>