@extends('layouts.layout4')

@section('title', 'Create Article')

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
                            <form action="{{route('article.store')}}" method="post" class="w-100">
                                @csrf

                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Title</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="blog_title" class="form-control" id="input002" placeholder="Title" value="{{old('blog_title')}}">
                                        <span class="text-danger">@error('blog_title') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                
                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Slug</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="blog_slug" class="form-control" id="input002" placeholder="Blog Slug" value="{{old('blog_slug')}}">
                                        <span class="text-danger">@error('blog_slug') {{$message}} @enderror</span>
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
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Content</label>

                                    <div class="col-sm-12">
                                        <textarea id="summernote" style="min-height: 400px" placeholder="Blog Content" name="blog_content" class="w-100 form-control font-13">{{old('blog_content')}}</textarea>
                                        <span class="text-danger">@error('blog_content') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Author:</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="blog_author" class="form-control" id="input002" placeholder="Author" value="{{old('blog_author')}}">
                                        <span class="text-danger">@error('blog_author') {{$message}} @enderror</span>
                                    </div>
                                </div>



                                <div class="col-sm-6 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Created Date:</label>

                                    <div class="col-sm-10">
                                        <input type="date" name="blog_date" class="form-control" value="{{date('Y-m-d', strtotime(old('blog_date')))}}">
                                        <span class="text-danger">@error('blog_date') {{$message}} @enderror</span>
                                    </div>
                                </div>



                                <div class="col-sm-12 form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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