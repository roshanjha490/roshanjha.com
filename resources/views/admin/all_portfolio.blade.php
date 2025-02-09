@extends('layouts.layout2')

@section('title', 'Manage Project')

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
                        <a href="{{route('project.create')}}" style="color: white;" class="btn btn-primary">Create Project</a>
                    </div>
                    <div class="panel-body table-responsive">

                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Tech</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $i = 0;

                                @endphp

                                @foreach ($projects as $project)
                                <tr>
                                    <td>{{$i+=1}}</td>
                                    <td>{{$project->created_at->format('M d Y')}}</td>
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->tech}}</td>
                                    @if($project->status == 1)
                                    <td style="color: green;">Active</td>
                                    @elseif($project->status == 0)
                                    <td style="color: red;">Inactive</td>
                                    @endif
                                    <td>
                                        <a target="_blank" href="{{route('project.edit', $project->id)}}" class="btn btn-primary">
                                            Edit Project
                                        </a>
                                    </td>

                                    <td>
                                        <a target="_blank" href="{{route('projects', $project->slug)}}" class="btn btn-info">
                                            View Project
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