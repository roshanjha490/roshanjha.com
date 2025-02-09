<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <?php

    if (isset($metatags)) {
        echo $metatags;
    }

    ?>

    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@900&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="w-100 h-auto py-24px">
        <div class="container rk_cont w-75 h-100 px-5">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 col-12 w-100 h-auto d-flex justify-content-start align-items-center">
                    <div class="logodiv">
                        <a href="/" class="logo">
                            <img src="{{asset('img/favicon-32x32.png')}}" width="35px" height="30px">
                            Roshan Jha
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-7 col-12 w-100 h-auto d-flex justify-content-between align-items-center">
                    <!-- <div class="w-auto h-auto float-right"> -->
                    <!-- <ul class="p-0"> -->
                    <li><a class="p-15px @yield('about_us')" href="{{route('article.index')}}">Articles</a></li>
                    <li><a class="p-15px @yield('projects')" href="{{route('project.index')}}">Projects</a></li>
                    <li><a class="p-15px @yield('me')" href="/about-me">About me</a></li>
                    <!-- </ul> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="w-100 h-100px">

        <div class="w-100 h-100 d-flex justify-content-center align-items-center">
            <ul class="m-0">
                <li class="w-auto h-auto float-left mx-20px"><a class="px-15px rounded py-5px" target="_blank" href="https://www.instagram.com/roshanjha.490/"><i class="icn1 fab fa-instagram"></i></a></li>
                <li class="w-auto h-auto float-left mx-20px"><a class="px-15px rounded py-5px" target="_blank" href="https://github.com/roshanjha490/"><i class="icn2 fab fa-github"></i></a></li>
                <li class="w-auto h-auto float-left mx-20px"><a class="px-15px rounded py-5px" target="_blank" href="https://www.linkedin.com/in/roshan-jha-2855a4177/"><i class="icn3 fab fa-linkedin"></i></a></li>
                <li class="w-auto h-auto float-left mx-20px"><a class="px-15px rounded py-5px" target="_blank" href="https://twitter.com/roshanjha490"><i class="icn4 fab fa-twitter"></i></a></li>
            </ul>

        </div>

    </footer>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        $(document).ready(function() {

            $(".button-addon2").click(function() {
                let email_id = $("#news_email").val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email_id)) {

                    $.ajax({
                        url: "{{route('emailajax.post')}}",
                        type: 'POST',
                        data: {
                            email: email_id
                        },
                        beforeSend: function() {
                            $('.modal-body').html();
                            let loader = `<div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                        <img src="{{asset('img/loader.gif')}}" class="w-50px" alt="">
                                      </div>`;

                            $('.modal-body').html(loader);
                        },
                        success: function(data) {


                            if (data == 'false') {

                                let message = `<div class="w-100 h-100">
                                                    <div class="mb-10px d-flex justify-content-center align-items-center">
                                                        <i class="far fa-check-circle font-30 text-success"></i>
                                                    </div>

                                                    <div class="w-100 d-flex justify-content-center align-items-center">
                                                        <h4 class="font-20 text-dark">Email Already Subscribed</h4>
                                                    </div>
                                                </div>`;

                                $('.modal-body').html(message);

                            } else if (data == 'saved') {
                                $('.input-group').hide();
                                let success = `<div class="w-100 h-100">
                                                    <div class="mb-10px d-flex justify-content-center align-items-center">
                                                        <i class="far fa-check-circle font-30 text-success"></i>
                                                    </div>

                                                    <div class="w-100 d-flex justify-content-center align-items-center">
                                                        <h4 class="font-20 text-dark">Subscribed Successfully</h4>
                                                    </div>
                                                </div>`;

                                $('.modal-body').html(success);
                            } else {
                                let failure = `<div class="w-100 h-100">
                                                    <div class="w-100 d-flex justify-content-center align-items-center">
                                                        <h4 class="font-20 text-dark">Something Went Wrong Try Again !</h4>
                                                    </div>
                                                </div>`;

                                $('.modal-body').html(failure);
                            }

                        }
                    });

                } else {
                    $('#show_error').text("Email is not Valid!");
                    $('#news_email').val('');
                }
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/9be48188df.js" crossorigin="anonymous"></script>
</body>

</html>