@extends('layouts.layout1')

@section('title', 'Articles | Roshan Jha')

@section('about_us', 'active')
@section('projects', 'inactive')
@section('me', 'inactive')

@section('content')


<section class="w-100 h-auto">
    <div class="container rk_cont w-75 h-auto px-5 article_page">

        <div class="w-100 h-auto mt-40px mb-10px">

            <div class="w-100 h-auto article_page_heading">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <h1 style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;">Article.</h1>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 mt-10px">
                        <p>Posts, tutorials, snippets, musings, notes, and everything else. The archive of everything I've written</p>
                    </div>
                </div>
            </div>

            <!-- <div class="w-100 h-auto mt-10px article_page_search">
                <div class="row">
                    <div class="col-12">
                        <input type="text" style="max-width: 450px;" class="w-100 h-50px px-20px" placeholder="Search for anything...">
                    </div>
                </div>
            </div> -->

        </div>

        <div class="w-100 h-auto pb-5 article_section">

            @php
            $i = 0;

            $year = 2022;

            @endphp
            
                @foreach ($articles as $article)

                @php

                if($year > $article->created_at->format('Y')){

                $year = $article->created_at->format('Y');

                $year_head = '<div class="w-100 h-50px mt-2 mb-2 article_heading"><div class="row"><div class="col-8 w-100 h-100 d-flex justify-content-start align-items-center p-0"><p class="p-0 year_head m-0">'.$year.'.</p></div></div></div>';

                echo $year_head;

                }
                @endphp

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
</section>

@endsection('content')