@extends('layouts.layout2')

@section('title', 'Emaillist')

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
                        <a href="{{route('email')}}" style="color: white;" class="btn btn-primary">Create Mail</a>
                    </div>
                    <div class="panel-body table-responsive">

                        <table id="example0" class="table display">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date Subscribed</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                $i = 0;

                                @endphp

                                @foreach ($emaillists as $emailist)
                                <tr>
                                    <td>{{$i+=1}}</td>
                                    <td>{{$emailist->email}}</td>
                                    @if($emailist->status == 1)
                                    <td style="color: green;">Subscribed</td>
                                    @elseif($emailist->status == 0)
                                    <td style="color: red;">Unsubscribed</td>
                                    @endif
                                    <td>{{$emailist->created_at->format('M d Y')}}</td>
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