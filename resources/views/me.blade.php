@extends('layouts.layout1')

@section('title', 'About me | Roshan Jha')


@section('about_us', 'inactive')
@section('projects', 'inactive')
@section('me', 'active')


@section('content')
<section class="w-100 h-auto">
    <div class="container w-75 h-auto px-5 article_page">

        <div class="w-100 h-auto mt-40px mb-40px">

            <div class="w-100 h-auto article_page_heading">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <h1 style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">About me.</h1>
                    </div>
                    <div class="col-12 mt-10px">
                        <p><span style="font-weight: 400;">Hi I'm Roshan Jha a full stack developer, an open-sorcerer and an expert Googler.</span></p>
                        <p><span style="font-weight: 400;"> This website is my spot on the internet where I post about my work and learnings. I post articles about the topics that I have learnt and currently working on and try to write them in easy to understand manner. I also share the projects that I have built with different stacks and tech and give updates about their progress. So enjoy the site and subscribe the newsletter by clicking on the link down below if you wants constant updates from my site.</span></p>
                        <p style="font-family: 'Roboto Slab', serif; letter-spacing: 1px; text-decoration: underline; font-weight: bold" class="font-30">Important Links</p>
                        <ul class="ml-20px">
                            <li>
                                <form action="/dwnld_cv" method="post" class="w-100 h-100">
                                    @csrf
                                    <button type="submit" style="border: none; background-color: transparent;">
                                        <p><span style="font-weight: 400; text-decoration: underline;">
                                                Download Resume/CV
                                            </span></p>
                                    </button>
                                </form>
                            </li>
                            <li>
                                <p><a href="https://github.com/roshanjha490/" target="_blank" style="font-weight: 400; text-decoration: underline; color: black;">Github</a></p>
                            </li>
                            <li>
                                <p><span style="font-weight: 400;">
                                        <button type="button" style="border: none; background-color: transparent;" data-toggle="modal" data-target="#exampleModalCenter">
                                            <p><span style="font-weight: 400; text-decoration: underline;">
                                                    Get the newsletter
                                                </span></p>
                                        </button>
                                    </span></p>
                            </li>
                        </ul>
                        <p>You can contact me by email at <strong>hello@roshanjha490.com</strong> to say hi! I always appreciate meeting new people.</p>
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
            <div class="modal-body h-100px d-flex justify-content-center align-items-center">
                <div class="input-group my-3">
                    <input id="news_email" style="box-shadow: none;" type="text" class="form-control" placeholder="Recipient's Email Address" aria-label="Recipient's Email Address" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button style="box-shadow: none;" class="btn btn-outline-secondary button-addon2" type="button" id="button-addon">Submit</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

@endsection('content')