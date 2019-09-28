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
                    This is what you buy
                </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail['cart'] as $key => $element)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$element['type']}}</td>
                                <td>${{ $element['price'] }}</td>
                                <td>{{ $element['qty'] }}</td>
                                <td>${{ $element['subtotal'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        @if ($detail['memberDisc'] != 0)
                            <tr>
                                <td colspan="4">Member Discount</td>
                                <td> {{ $detail['memberDisc'] }}% </td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="4">Total</td>
                            <td> ${{$detail['totalGroceries'] + $detail['totalnonGroceries'] }} </td>
                        </tr>
                        @if ($detail['bonusDisc'] != 0)
                            <tr>
                                <td colspan="4">Bonus Discount</td>
                                <td> ${{ $detail['bonusDisc'] }} </td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="4">You must pay</td>
                            <td> ${{ $detail['total'] }} </td>
                        </tr>
                    </tfoot>
                </table>
                <a href="{{ route('question3.index') }}">Back</a>
            </div>
        </div>
    </body>
</html>
