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
                {{-- {!! Form::open(['url' => '/installer', 'method' => 'post']) !!} --}}
                {!! Form::text("app_name", '', ['id' => 'app_name','class'=>'form-control my-3','placeholder' => 'لطفا اسم سازمان را وارد کنید']) !!}
                <br><br><br>
                <h3>اطلاعات دیتابیس</h3>
                {!! Form::text("database_name", '', ['id' => 'database_name','class'=>'form-control my-3','placeholder' => 'لطفا اسم دیتابیس را وارد کنید']) !!}
                {!! Form::text("database_username", '', ['id' => 'database_username','class'=>'form-control my-3','placeholder' => 'لطفا یوزرنیم دیتابیس را وارد کنید']) !!}
                {!! Form::text("database_password", '', ['id' => 'database_password','class'=>'form-control my-3','placeholder' => 'لطفا پسورد دیتابیس را وارد کنید']) !!}
                {!! Form::button("آغاز راه اندازی",['id' => 'btn','class' => 'btn btn-primary mt-5']) !!}
                {{-- {!! Form::close() !!} --}}
                
            </form>
        </div>
        <div class="py-4">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100" style="width:0%">
                0%
                </div>
            </div>
        </div>
    </div>
</body>
<script>


$('#btn').click(function(){
var data=[];
data['_token']='{{ csrf_token() }}'
data['app_name']=$('#app_name').val()
data['database_name']=$('#database_name').val()
data['database_username']=$('#database_username').val()
data['database_password']=$('#database_password').val()
console.log(data);
    $.ajax({
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                alert("aa");    
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    console.log(percentComplete);
                    $('.progress-bar').css({
                        width: percentComplete * 100 + '%'
                    });
                    if (percentComplete === 1) {
                        $('.progress-bar').addClass('hide');
                    }
                }
            }, false);
            xhr.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    console.log(percentComplete);
                    $('.progress-bar').css({
                        width: percentComplete * 100 + '%'
                    });
                }
            }, false);
            return xhr;
        },
        type: 'POST',
        url: "/installer",
        data: data,
        success: function (data) {}
    });

});

</script>
</html>