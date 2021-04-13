<!DOCTYPE html>
<html>
<head>
   @include('elements.style_backend')   
</head>
<body class="hold-transition skin-blue sidebar-mini ">
<div class="wrapper">

    @include('elements.main-header')   
    <!-- Left side column. contains the logo and sidebar -->
    @include('elements.main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <!--  <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
 -->
        <!-- Main content -->
        <section class="content">
            @yield("content")
         </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('elements.footer')
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- script -->
@include('elements.script_backend')
</body>
</html>
