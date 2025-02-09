@extends('layouts.layout4')

@section('title', 'Edit Article')

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
                            <form action="{{route('article.update', $article->id)}}" method="post" class="w-100">
                                @csrf
                                @method('PUT')


                                <input name="blog_id" type="hidden" value="{{$article->id}}">

                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Title</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="blog_title" class="form-control" id="input002" placeholder="Title" value="{{$article->title}}">
                                        <span class="text-danger">@error('blog_title') {{$message}} @enderror</span>
                                    </div>
                                </div>


                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Slug</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="blog_slug" class="form-control" id="input002" placeholder="Blog Slug" value="{{$article->slug}}">
                                        <span class="text-danger">@error('blog_slug') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                
                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Meta Tags</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="meta_tags" class="form-control" id="input002" placeholder="Meta Tags" value="{{$article->metatags}}">
                                        <span class="text-danger">@error('meta_tags') {{$message}} @enderror</span>
                                    </div>
                                </div>


                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Content</label>

                                    <div class="col-sm-12">
                                        <textarea id="summernote" style="min-height: 400px" placeholder="Blog Content" name="blog_content" class="w-100 form-control font-13">{{$article->content}}</textarea>
                                        <span class="text-danger">@error('blog_content') {{$message}} @enderror</span>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Author:</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="blog_author" class="form-control" id="input002" placeholder="Title" value="{{$article->author}}">
                                        <span class="text-danger">@error('blog_author') {{$message}} @enderror</span>
                                    </div>
                                </div>


                                <div class="col-sm-6 form-group">
                                    <label class="w-100 col-sm-2 control-label form-label">Status:</label>
                                    <div class="col-sm-10">
                                        <select name="blog_status" class="selectpicker">
                                            <?php if ($article->status == 1) : ?>
                                                <option selected value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            <?php elseif ($article->status == 0) : ?>
                                                <option value="1">Active</option>
                                                <option selected value="0">Inactive</option>
                                            <?php endif; ?>
                                        </select>
                                        <span class="text-danger">@error('blog_status') {{$message}} @enderror</span>

                                    </div>
                                </div>


                                <div class="col-sm-6 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Created Date:</label>

                                    <div class="col-sm-10">
                                        <input type="date" name="blog_date" class="form-control" value="{{$article->created_at->format('Y-m-d')}}">
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