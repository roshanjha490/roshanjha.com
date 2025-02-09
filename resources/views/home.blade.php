@extends('layouts.layout1')

@section('title', 'Roshan Jha')

@section('content')

<div class="myintro w-100 h-450px d-flex justify-content-center align-items-center">
    <div class="container rk_cont w-75 h-450px px-5">
        <div class="row">
            <div class="mb-20px col-xl-7 col-lg-7 col-md-7 col-sm-12 w-100 h-auto d-flex justify-content-center align-items-center">
                <div class="w-auto h-auto">
                    <h1 class="mb-20px" style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">I'm Roshan Jha.</h1>
                    <h4 class="m-0">I'm a Full Stack Developer. This website is my digital garden — a compendium of the things I've learned and created over the years.</h4>
                    <div class="w-auto h-50px mt-20px intro_btn d-none">
                        <div class="row">
                            <div class="col-6 w-100 h-100 d-flex justify-content-center align-items-center">
                                <form action="/dwnld_cv" method="post" class="w-100 h-100">
                                    @csrf
                                    <button type="submit" class="w-100 h-100 btn btn-primary" style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">Download Resume / CV</button>
                                </form>
                            </div>
                            <div class="col-6 w-100 h-100 d-flex justify-content-center align-items-center">
                                <!-- Place this tag where you want the button to render. -->
                                <a class="github-button" href="https://github.com/ntkme" data-size="large" aria-label="Follow @ntkme on GitHub">Follow @roshanjha490</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 w-100 h-auto p-0 d-flex justify-content-center align-items-center">
                <div class="profile-pic  w-80 h-80 overflow-hidden d-flex justify-content-center align-items-center">
                    <img src="{{asset('img/IMG.jpg')}}" class="w-100 h-auto" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<section class="w-100 h-auto">
    <div class="container rk_cont w-75 h-auto px-5">

        <div class="w-100 h-auto py-5 article_section">
            <div class="w-100 h-50px article_heading">
                <div class="row">
                    <div class="col-8 w-100 h-100 d-flex justify-content-start align-items-center p-0">
                        <p style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;" class="p-0 m-0">Latest Articles.</p>
                    </div>
                    <div class="col-4 w-100 h-100 d-flex justify-content-end align-items-center p-0">
                        <a class="px-15px rounded py-5px" href="{{route('article.index')}}" style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">View All</a>
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto py-2">

                @foreach ($articles as $article)

                <div class="w-100 h-auto py-3 article_content px-3">
                    <a href="{{route('blog', $article->slug)}}">
                        <div class="row">
                            <div class="col-xl-1 col-lg-1 w-100 h-100 d-flex justify-content-start align-items-center p-0">
                                <h4 class="p-0 mt-7px mb-0" style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">
                                    {{$article->created_at->format('M d')}}
                                </h4>
                            </div>
                            <div class="col-xl-11 col-lg-11 w-100 h-100 d-flex justify-content-start align-items-center p-0">
                                <p class="p-0 m-0">{{$article->title}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                <hr class="m-0 rkhr">
                @endforeach

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

            <div class="w-100 h-auto py-2">


                @foreach ($projects as $project)
                <div class="w-100 h-auto py-3 project_content">
                    <div class="row">
                        <div class="p-0 col-xl-8 col-lg-8 col-md-8 col-12 w-100 h-100 d-flex justify-content-start align-items-center">

                            <h4 class="p-0 mr-2" style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">
                                <img src="{{asset('storage/'.$project->img)}}" width="35px" height="30">
                            </h4>
                            <a target="_blank" style="color: black !important;" href="{{$project->demo_sauce}}" class="w-auto h-auto">
                                <p class="p-0 m-0" style="color: black !important;">{{$project->title}}:
                                    <a>
                                        <i>{{$project->tech}}</i>
                                </p>
                        </div>

                        <div class="p-0 col-xl-4 col-lg-4 col-md-4 col-12 w-100 h-100 mt-10px d-flex justify-content-end align-items-center" id="prj_btn">
                            <ul class="list-style-type-none m-0">
                                <li class="float-left mx-5px"><a target="_blank" class="px-15px rounded py-5px" href="{{$project->github_sauce}}"><i class="fab fa-github"></i></a></li>
                                <li class="float-left mx-5px"><a target="_blank" class="px-15px rounded py-5px" href="{{$project->demo_sauce}}">View</a></li>
                                @if ($project->content == '')
                                @elseif ($project->content != '')
                                <li class="float-left mx-5px"><a target="_blank" class="px-15px rounded py-5px" target="_blank" href="projects/{{$project->slug}}">Write-up</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="m-0 rkhr">
                @endforeach
            </div>
        </div>

        <div class="w-100 h-auto pb-5 news_section">
            <div class="w-100 h-50px news_heading">
                <div class="row">
                    <div class="col-12 w-100 h-100 d-flex justify-content-start align-items-center p-0">
                        <p style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;" class="p-0 m-0">Newsletter.</p>
                    </div>
                </div>
            </div>

            <div class="w-100 h-auto py-3">
                <div class="w-100 h-auto news_content">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-12 w-100 h-100 d-flex justify-content-start align-items-center p-0">
                            <p class="m-0 p-0">I send out an email when I create something new. I'm never going to spam you, and you can unsubscribe any time.
                            </p>
                        </div>
                        <div class="btn_head mt-5px col-xl-4 col-lg-4 col-md-4 col-12 w-100 h-100 d-flex justify-content-center align-items-center">
                            <button type="button" class="w-100 h-50px btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter" style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Newsletter Subscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body h-auto">
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <div class="input-group my-3">
                        <input id="news_email" style="box-shadow: none;" type="text" class="form-control" placeholder="Recipient's Email Address" aria-label="Recipient's Email Address" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button style="box-shadow: none;" class="btn btn-outline-secondary button-addon2" type="button" id="button-addon">Submit</button>
                        </div>
                    </div>
                </div>
                <span id="show_error" class="w-100 text-danger d-inline-block my-2"></span>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
@endsection('content')