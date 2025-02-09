@extends('layouts.layout2')

@section('title', 'Dashboard')

@section('content')



<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTAINER -->
<div class="container-widget" style="min-height: 500px;">

    <div class="container-padding">

        <!-- Start Row -->
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="row">


                            <div class="w-100 h-auto py-5 px-4">

                                <h2 class="text-success w-100 h-auto pt-5 px-4">{{session()->get('success')}}</h2>

                                <section class="w-100 h-auto d-none">
                                    <div class="container rk_cont w-100 h-auto px-5">
                                        <div class="w-100 h-auto py-5 article_section">

                                            <div class="w-100 h-50px article_heading">
                                                <div class="row">
                                                    <div class="col-8 w-100 h-100 d-flex justify-content-start align-items-center p-0">
                                                        <p style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;" class="p-0 m-0">Latest Articles.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="w-100 h-auto py-2 px-2 d-flex justify-content-center align-items-center">
                                                <table class="w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Title</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @php
                                                        $i = 0;

                                                        @endphp

                                                        @foreach ($articles as $article)
                                                        <tr>
                                                            <td>{{$i+=1}}</td>
                                                            <td>{{$article->created_at->format('M d Y')}}</td>
                                                            <td>{{$article->title}}</td>
                                                            <td>{{$article->status}}</td>
                                                            <td>
                                                                <a href="{{route('article.edit', $article->id)}}">
                                                                    <h4 class="btn btn-info text-light">Edit Article</h4>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="container rk_cont w-100 h-auto px-5">
                                        <div class="w-100 h-auto py-5 article_section">

                                            <div class="w-100 h-50px article_heading">
                                                <div class="row">
                                                    <div class="col-8 w-100 h-100 d-flex justify-content-start align-items-center p-0">
                                                        <p style="font-family: 'Roboto Slab', serif; letter-spacing: 1px;" class="p-0 m-0">Latest Projects.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="w-100 h-auto py-2 px-2 d-flex justify-content-center align-items-center">
                                                <table class="w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Title</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @php
                                                        $i = 0;
                                                        @endphp

                                                        @foreach ($projects as $project)
                                                        <tr>
                                                            <td>{{$i+=1}}</td>
                                                            <td>{{$project->created_at->format('M d')}}</td>
                                                            <td>{{$project->title}}</td>
                                                            <td>{{$project->status}}</td>
                                                            <td>
                                                                <a href="{{route('project.edit', $project->id)}}">
                                                                    <h4 class="btn btn-info text-light">Edit Project</h4>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </section>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End Row -->


    </div>


</div>
<!-- END CONTAINER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->


@endsection('content')