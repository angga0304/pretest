<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: left;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">

            <div class="content">
                <h3>
                    Welcome to Shop
                </h3>
                <form>
                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="4">What do you want to buy</td>
                            </tr>
                            <tr>
                                <th>Product</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$product['type']}}</td>
                                    <td>${{ $product['price'] }}</td>
                                    <td><input type="number" name="chart[{{$key}}]" value="0" /></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="links">
                        <a href="{{ route('question1.form-store') }}">Buy</a>
                        <a href="{{ route('home') }}">Leave</a>
                    </div>
                </form>
                {{ dd($products) }}
            </div>
        </div>
    </body>
</html>
