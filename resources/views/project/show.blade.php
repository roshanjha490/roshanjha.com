@extends('layouts.layout1')

@section('title', $title)

@section('content')

<section class="w-100 h-auto">
    <div class="container rk_cont w-75 h-auto px-5 article_page">
        <div class="w-100 h-auto mt-40px mb-40px">
            <div class="w-100 h-auto article_page_heading">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <h1 style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">{{$title}}</h1>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-10px">
                        <p class="p-0 m-0">By <b><a style="color: black !important;" href="/about-me">Roshan Jha</a></b> on {{date('M d, Y', strtotime($created_at))}}</p>
                    </div>
                    <div class="w-100 col-12">
                        <div class="w-100" style="border-bottom: 3px solid black;">
                        </div>

                        <div class="w-100 my-5">
                            @php echo $content @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection('content')