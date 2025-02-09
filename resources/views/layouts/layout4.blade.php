<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
    <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
    <title>@yield('title')</title>

    <!-- ========== Css Files ========== -->
    <link href="{{asset('css/root.css')}}" rel="stylesheet">
    <link href="{{asset('css/rkj.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Dosis|Candal' rel='stylesheet' type='text/css'>

    <!-- include libraries(jQuery, bootstrap) -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

</head>

<body>

    <!-- Start Page Loading -->
    <div class="loading"><img src="{{asset('img/loading.gif')}}" alt="loading-img"></div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START TOP -->
    <div id="top" class="clearfix">

        <!-- Start App Logo -->
        <div class="applogo">
            <a href="/" class="logo">Roshan Jha</a>
        </div>
        <!-- End App Logo -->

        <!-- Start Sidebar Show Hide Button -->
        <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
        <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
        <!-- End Sidebar Show Hide Button -->

        <!-- Start Searchbox -->
        <form class="searchform">
            <input type="text" class="searchbox" id="searchbox" placeholder="Search">
            <span class="searchbutton"><i class="fa fa-search"></i></span>
        </form>
        <!-- End Searchbox -->

        <!-- Start Top Right -->
        <ul class="top-right m-0px">

            <li class="dropdown link">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="{{asset('img/profileimg.jpg')}}" alt="img"><b>Roshan Jha</b><span class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                    <li role="presentation" class="dropdown-header">Profile</li>
                    <li><a href="#"><i class="fa falist fa-inbox"></i>Inbox<span class="badge label-danger">4</span></a></li>
                    <li><a href="#"><i class="fa falist fa-file-o"></i>Files</a></li>
                    <li><a href="#"><i class="fa falist fa-wrench"></i>Settings</a></li>
                    <li><a href="update-profile"><i class="fa falist fa-edit"></i> Edit Profile</a></li>
                    <li><a href="superadmin/reset-password"><i class="fa falist fa-lock"></i> Change Password</a></li>

                    <li><a href="/logout"><i class="fa falist fa-power-off"></i>Logout</a></li>
                </ul>
            </li>

        </ul>
        <!-- End Top Right -->

    </div>
    <!-- END TOP -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->


    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START SIDEBAR -->
    <div class="sidebar clearfix">

        <ul class="sidebar-panel nav">
            <li class="sidetitle">MAIN</li>

            <li>
                <a href="/dashboard"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard</a>
            </li>


            <li><a href="{{route('manage-articles')}}"><span class="icon color7"><i class="fa fa-file-code-o"></i></span>Manage Article</a></li>
            <!-- <li><a href="{{route('article.create')}}"><span class="icon color7"><i class="fa fa-file-code-o"></i></span>Create Article</a></li> -->

            <li><a href="{{route('project.create')}}"><span class="icon color7"><i class="fa fa-code"></i></span>Create Portfolio</a></li>

            <li><a href="/emails"><span class="icon color7"><i class="fa fa-envelope-o"></i></span>Emails Management</a></li>

            <li><a href="/edit-login-key"><span class="icon color7"><i class="fa fa-edit"></i></span>Edit Login Key</a></li>

            <li><a href="/create-email"><span class="icon color7"><i class="fa fa-envelope-square"></i></span>Create Email</a></li>

        </ul>

    </div>

    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START CONTENT -->
    <div class="content">

        <!-- Start Page Header -->
        <div class="page-header">
            <h1 class="title">@yield('title')</h1>
        </div>
        <!-- End Page Header -->


        @yield('content')

    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $('#summernote').summernote({
            placeholder: 'Start Writing',
            tabsize: 2,
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>

    <!-- ================================================
jQuery Library
================================================ -->
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
    <!-- <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script> -->

    <!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
    <script src="{{asset('js/plugins.js')}}"></script>

    <!-- ================================================
Bootstrap Select
================================================ -->
    <script src="{{asset('js/bootstrap-select/bootstrap-select.js')}}"></script>

    <!-- ================================================
Data Tables
================================================ -->
    <script src="{{asset('js/datatables/datatables.min.js')}}"></script>



    <script>
        $(document).ready(function() {
            $('#example0').DataTable();
        });
    </script>



    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    </script>

    <!-- ================================================
Bootstrap Toggle
================================================ -->
    <script src="{{asset('js/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

    <!-- ================================================
Moment.js
================================================ -->
    <script src="{{asset('js/moment/moment.min.js')}}"></script>

    <!-- ================================================
Bootstrap Date Range Picker
================================================ -->
    <script src="{{asset('js/date-range-picker/daterangepicker.js')}}"></script>


    <!-- Basic Date Range Picker -->
    <script>
        $(document).ready(function() {
            $('#date-range-picker').daterangepicker(null, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>

    <!-- Basic Single Date Picker -->
    <script>
        $(document).ready(function() {
            $('#date-picker').daterangepicker({
                singleDatePicker: true
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>

    <!-- Date Range and Time Picker -->
    <script>
        $(document).ready(function() {
            $('#date-range-and-time-picker').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                format: 'MM/DD/YYYY h:mm A'
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
            });
        });
    </script>


</body>

</html>