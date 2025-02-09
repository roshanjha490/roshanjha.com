@extends('layouts.layout4')

@section('title', 'Edit Project')

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
                            <form action="{{route('project.update', $project->id)}}" method="post" class="w-100" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Title</label>
                                    <input type="text" placeholder="Project Title" name="project_title" class="form-control h-40px font-13" value="{{$project->title}}">
                                    <span class="text-danger">@error('project_title') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Slug</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="project_slug" class="form-control" id="input002" placeholder="Project Slug" value="{{$project->slug}}">
                                        <span class="text-danger">@error('project_slug') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                
                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Meta Tags</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="meta_tags" class="form-control" id="input002" placeholder="Meta Tags" value="{{$project->metatags}}">
                                        <span class="text-danger">@error('meta_tags') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Description</label>
                                    <input type="text" placeholder="Project Description" name="project_desc" class="form-control h-40px font-13" value="{{$project->desc}}">
                                    <span class="text-danger">@error('project_desc') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Content</label>

                                    <div class="col-sm-12">
                                        <textarea id="summernote" style="min-height: 400px" placeholder="Project Content" name="project_content" class="w-100 form-control font-13">{{$project->content}}</textarea>
                                        <span class="text-danger">@error('project_content') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Technology Used</label>
                                    <input type="text" placeholder="Project Technology" name="project_tech" class="form-control h-40px font-13" value="{{$project->tech}}">
                                    <span class="text-danger">@error('project_tech') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="Title">Project Img</label>
                                    <input readonly type="text" placeholder="Project Image" class="form-control bg-light h-40px font-13" value="{{$project->img}}">
                                    <input type="file" name="project_img" class="form-control h-40px font-13">
                                    <span class="text-danger">@error('project_img') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label for="Title">Github Source</label>
                                    <input type="text" placeholder="Github Source" name="project_git_src" class="form-control h-40px font-13" value="{{$project->github_sauce}}">
                                    <span class="text-danger">@error('project_git_src') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label for="Title">Demo Source</label>
                                    <input type="text" placeholder="Demo Source" name="project_demo_src" class="form-control h-40px font-13" value="{{$project->demo_sauce}}">
                                    <span class="text-danger">@error('project_demo_src') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label class="w-100 col-sm-2 control-label form-label">Status:</label>
                                    <div class="col-sm-10">
                                        <select name="project_status" class="selectpicker">
                                            <?php if ($project->status == 1) : ?>
                                                <option selected value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            <?php elseif ($project->status == 0) : ?>
                                                <option value="1">Active</option>
                                                <option selected value="0">Inactive</option>
                                            <?php endif; ?>
                                        </select>
                                        <span class="text-danger">@error('project_status') {{$message}} @enderror</span>

                                    </div>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label for="project_date">Created Date</label>
                                    <input type="date" name="project_date" class="form-control h-40px font-13" value="{{$project->created_at->format('Y-m-d')}}">
                                    <span class="text-danger">@error('project_date') {{$message}} @enderror</span>
                                </div>


                                <div class="col-sm-12 form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Edit Project</button>
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