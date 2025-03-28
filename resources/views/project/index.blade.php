@extends('layouts.layout1')

@section('title', 'Projects | Roshan Jha')

@section('about_us', 'inactive')
@section('projects', 'active')
@section('me', 'inactive')


@section('content')


<section class="w-100 h-auto">
    <div class="container rk_cont w-75 h-auto px-5 article_page">

        <div class="w-100 h-auto mt-40px mb-40px">
            <div class="w-100 h-auto article_page_heading">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <h1 style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">Projects.</h1>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-10px">
                        <p>A few highlights of my projects that I have created so far. View them all <a class="text-dark" href="https://github.com/roshanjha490/" target="_blank" rel="noopener noreferrer"><b>on GitHub.</b></a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 h-auto pb-5 project_section">
            <div class="w-100 h-50px project_heading">
                <div class="row">
                    <div class="col-12 w-100 h-100 d-flex justify-content-start align-items-center p-0">
                        <p style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;" class="p-0 m-0">Projects.</p>
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto py-4">
                <div class="row">

                    @foreach ($projects as $project)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-6 w-100 h-auto project_content_2 mb-5">
                        <div style="border: 1px solid black; border-radius: 10px;" class="w-100 h-auto p-3">
                            <div class="w-100 h-30px">
                                <div class="w-100 h-30px text-center">
                                    <b style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;" class="w-100 p-0 d-inline-block mb-0 text-center font-24">{{$project->title}}</b>
                                </div>
                            </div>

                            <div class="w-100 h-50px my-20px text-center overflow-hidden">
                                <small class="text-center w-100 h-100">
                                    {{$project->desc}}
                                </small>
                            </div>

                            <div class="w-100 h-50px d-flex justify-content-center align-items-center">
                                <!-- <ul class="list-style-type-none m-0"> -->
                                <div class="w-auto h">
                                    @if ($project->content == '')
                                    @elseif ($project->content != '')
                                    <a target="_blank" href="projects/{{$project->slug}}" type="button" class="w-75px h-30px border-dark btn btn-light mx-3px font-16px p-0px" style="font-family: 'Roboto Slab', serif;">Write-up</a>
                                    @endif
                                    <a target="_blank" href="{{$project->github_sauce}}" type="button" class="w-70px h-30px border-dark btn btn-light mx-3px font-16px p-0px" style="font-family: 'Roboto Slab', serif;">Source</a>
                                    <a target="_blank" href="{{$project->demo_sauce}}" type="button" class="w-70px h-30px border-dark btn btn-light mx-3px font-16px p-0px" style="font-family: 'Roboto Slab', serif;">Demo</a>
                                </div>
                                <!-- </ul> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    </div>
</section>

@endsection('content')