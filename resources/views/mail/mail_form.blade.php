@extends('layouts.layout2')

@section('title', 'Create Email')

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
                            <form action="{{route('send_mail')}}" method="post" class="w-100">
                                @csrf

                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Subject:</label>
                                    <input class="form-control font-13" type="text" name="mail_subject" id="" placeholder="Enter Your Mail Subject" value="{{old('mail_subject')}}">
                                    <span class="text-danger">@error('mail_subject') {{$message}} @enderror</span>
                                </div>


                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Description:</label>
                                    <input class="form-control font-13" type="text" name="mail_desc" id="" placeholder="Enter Your Mail Description" value="{{old('mail_desc')}}">
                                    <span class="text-danger">@error('mail_desc') {{$message}} @enderror</span>
                                </div>


                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Body:</label>
                                    <textarea style="min-height: 250px" placeholder="Enter Mail" name="mail_content" class="form-control font-13">{{old('mail_content')}}</textarea>
                                    <span class="text-danger">@error('mail_content') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <label for="input002" class="w-100 col-sm-2 control-label form-label">Created Date</label>
                                    <input type="date" name="mail_date" value="{{old('mail_date')}}">
                                    <span class="text-danger">@error('mail_date') {{$message}} @enderror</span>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <button class="w-100" type="submit">Send Mail</button>
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