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
                text-align: center;
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
        <div class="flex-center position-ref full-height">

            <div class="content">
                <form action="{{ route('question1.store') }}" method="POST" class="form">
                    <div class="form-group">
                        <label>Input Text here</label> &nbsp;
                        <textarea  name="textline" class="form-control"></textarea>
                        @if( $errors->has('textline') )
                            <br>
                            <span class="text-danger tooltip-field"><span>{{ $errors->first('textline') }}</span>
                        @endif
                    </div>
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="submit" value="Submit">
                        <a href="{{ route('question1.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
