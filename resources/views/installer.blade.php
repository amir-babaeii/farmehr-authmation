<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font/font.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" ></script>

    <title>{{ config('app.name')}}</title>
</head>
<body>
    <div class="container py-5 text-center ">
        <div class="root " dir="rtl">
                 <h3>اطلاعات سازمان</h3>
                {!! Form::open(['url' => '/installer', 'method' => 'post']) !!}
                {!! Form::text("app_name", '', ['class'=>'form-control my-3','placeholder' => 'لطفا اسم سازمان را وارد کنید']) !!}
                <br><br><br>
                <h3>اطلاعات دیتابیس</h3>
                {!! Form::text("database_name", '', ['class'=>'form-control my-3','placeholder' => 'لطفا اسم دیتابیس را وارد کنید']) !!}
                {!! Form::text("database_username", '', ['class'=>'form-control my-3','placeholder' => 'لطفا یوزرنیم دیتابیس را وارد کنید']) !!}
                {!! Form::text("database_password", '', ['class'=>'form-control my-3','placeholder' => 'لطفا پسورد دیتابیس را وارد کنید']) !!}
                {!! Form::submit("آغاز راه اندازی",['class' => 'btn btn-primary mt-5']) !!}
                {!! Form::close() !!}
                
            </form>
        </div>
    </div>
</body>
</html>