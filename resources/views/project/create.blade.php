@extends('layouts.layout4')

@section('title', 'Create Project')

@section('content')


<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTAINER -->
<div class="container-widget" style="min-height: 500px;">

    <div class="container-padding">

        <!-- Start Row -->
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="panel-body table-responsive">

                        <div class="row w-100">
                            <form action="{{route('project.store')}}" method="post" class="w-100" enctype="multipart/form-data">
                                @csrf

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Title</label>
                                    <input type="text" placeholder="Project Title" name="project_title" class="form-control h-40px font-13" value="{{old('project_title')}}">
                                    <span class="text-danger">@error('project_title') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Slug</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="project_slug" class="form-control" id="input002" placeholder="Project Slug" value="{{old('project_slug')}}">
                                        <span class="text-danger">@error('project_slug') {{$message}} @enderror</span>
                                    </div>
                                </div>


                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Meta Tags</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="meta_tags" class="form-control" id="input002" placeholder="Meta Tags" value="{{old('meta_tags')}}">
                                        <span class="text-danger">@error('meta_tags') {{$message}} @enderror</span>
                                    </div>
                                </div>


                                <div class="col-sm-12 form-group">
                                    <label for="Title">Description</label>
                                    <input type="text" placeholder="Project Description" name="project_desc" class="form-control h-40px font-13" value="{{old('project_desc')}}">
                                    <span class="text-danger">@error('project_desc') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Content</label>

                                    <div class="col-sm-12">
                                        <textarea id="summernote" style="min-height: 400px" placeholder="Project Content" name="project_content" class="w-100 form-control font-13">{{old('project_content')}}</textarea>
                                        <span class="text-danger">@error('project_content') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Technology Used</label>
                                    <input type="text" placeholder="Project Technology" name="project_tech" class="form-control h-40px font-13" value="{{old('project_tech')}}">
                                    <span class="text-danger">@error('project_tech') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Project Img</label>
                                    <input type="file" name="project_img" class="form-control h-40px font-13">
                                    <span class="text-danger">@error('project_img') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Github Source</label>
                                    <input type="text" placeholder="Github Source" name="project_git_src" class="form-control h-40px font-13" value="{{old('project_git_src')}}">
                                    <span class="text-danger">@error('project_git_src') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Demo Source</label>
                                    <input type="text" placeholder="Demo Source" name="project_demo_src" class="form-control h-40px font-13" value="{{old('project_demo_src')}}">
                                    <span class="text-danger">@error('project_demo_src') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Status</label>
                                    <input type="number" placeholder="Status" name="project_status" class="form-control h-40px font-13" value="{{old('project_status')}}">
                                    <span class="text-danger">@error('project_status') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="project_date">Created Date</label>
                                    <input type="date" name="project_date" class="form-control h-40px font-13" value="{{old('project_date')}}">
                                    <span class="text-danger">@error('project_date') {{$message}} @enderror</span>
                                </div>


                                <div class="col-sm-12 form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Create Project</button>
                                    </div>
                                </div>


                            </form>


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