<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>

    <div class="w-100 h-100 position-fixed top-0 left-0" style="background-color: #d2d6de;">
        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
            <div class="w-500px h-auto bg-light p-5">

                <form action="{{ route('auth.check') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="Batch ID">Enter Login Key to Sign In</label>
                        <div class="w-100 h-auto position-relative">
                            <input id="login_key" type="password" placeholder="Enter Login Key Here" name="login_key" class="form-control h-40px font-13 w-100" value="{{old('login_key')}}">
                            <i class="eye1 far fa-eye-slash position-absolute top-50 right-0 translate-center" style="cursor: pointer;"></i>
                            <i class="eye2 far fa-eye position-absolute top-50 right-0 translate-center d-none" style="cursor: pointer;"></i>
                        </div>
                        <span style="color: red;">@error('login_key') {{$message}} @enderror</span>
                        <span style="color: red;">{{session('fail')}}</span>
                    </div>


                    <div class="form-group">
                        <button class="w-100" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="https://kit.fontawesome.com/9be48188df.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let a = true;

            let x = true;

            $('.eye1').click(function() {

                if (a == true) {
                    $('.eye2').removeClass('d-none');
                    $(this).addClass('d-none');
                } else {
                    $('.eye2').addClass('d-none');
                    $(this).removeClass('d-none');
                }

                a = !a;

                $('#login_key').attr('type', 'text');
            });

            $('.eye2').click(function() {

                if (x == true) {
                    $('.eye1').removeClass('d-none');
                    $(this).addClass('d-none');
                } else {
                    $('.eye1').addClass('d-none');
                    $(this).removeClass('d-none');
                }

                x = !x;

                $('#login_key').attr('type', 'password');
            });
        });
    </script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>