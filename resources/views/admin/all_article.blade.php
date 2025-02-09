@extends('layouts.layout2')

@section('title', 'Manage Article')

@section('content')

<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTAINER -->
<div class="container-widget" style="min-height: 500px;">

    <div class="container-padding">

        <!-- Start Row -->
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-title">
                        <a href="{{route('article.create')}}" style="color: white;" class="btn btn-primary">Create Article</a>
                    </div>
                    <div class="panel-body table-responsive">

                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>View</th>
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
                                    @if($article->status == 1)
                                    <td style="color: green;">Active</td>
                                    @elseif($article->status == 0)
                                    <td style="color: red;">In Active</td>
                                    @endif
                                    <td>
                                        <a target="_blank" href="{{route('article.edit', $article->id)}}" class="btn btn-primary">
                                            Edit Article
                                        </a>
                                    </td>
                                    
                                    <td>
                                        <a target="_blank" href="{{route('blog', $article->slug)}}" class="btn btn-info">
                                            View Article
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

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