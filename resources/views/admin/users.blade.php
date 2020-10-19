@extends('admin/layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">    
@section('content')

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="http://127.0.0.1:8000/admin/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Tweety</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://127.0.0.1:8000/admin/images/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ashish Rana</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('admin/home') }}" class="nav-link">
              <i class="fa fa-tachometer nav-icon"></i>
              <p>
                Home
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{ url('admin/happenings') }}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>All Hapenings</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{ url('admin/users') }}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">
 
              
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Users</h3>

                <div class="card-tools">  
                <form method="post" action="{{ action('admin\HomeController@getSearchusers') }}">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="searchkey">
<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <div class="input-group-append">
                      <input type="submit" name="submit" class="btn btn-default" id="frmcl" >
                    </div>
                  </div>
                </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                        <th>Unique ID</th>
                      <th>User ID</th>
                      <th>User Name</th>
                      <th>Name</th>
                      <th>Avatar</th>
                      <th>Cover Image</th>
                      <th>Email</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="messages">
                     <?php $count = 1; ?>
                      @foreach ($users  as $user)
                    <tr id="myTableRow<?php echo $user->id; ?>">
                      <td><?php echo $count; ?></td>
                      <td>{{ $user->id }}</td>
                      <td>{{ ucfirst($user->username) }}</td>
                      <td>{{ $user->name }}</td>
                      <td>
                        @if($user->avatar == 'http://127.0.0.1:8000/storage' || $user->avatar == "")
                          <img src="http://127.0.0.1:8000/storage/avatars/twitter.png" width="40" class="rounded-full mr-2">
                        @else
                          <img src="http://127.0.0.1:8000/storage/{{$user->avatar}}" width="40" class="rounded-full mr-2">
                        @endif
                        </td>
                        
                      <td>
                       @if($user->cover_image == 'http://127.0.0.1:8000/storage' || $user->cover_image == "")   
                    <img src="http://127.0.0.1:8000/storage/avatars/twitter.png" width="40" class="rounded-full mr-2">    
                          @else
                    <img src="http://127.0.0.1:8000/storage/{{$user->cover_image}}" width="40" class="rounded-full mr-2">
                          @endif
                          
                        </td>
                      <td>{{ $user->email }}</td>
                      <td><span class="tag tag-success">{{ date("Y-m-d",strtotime($user->created_at)) }}</span></td>
<td>
    <!--<button type="button" class="btn btn-block btn-warning btn-xs"  data-toggle="modal" data-target="#myModal">Edit</button>-->
                        <button type="button" class="btn btn-block btn-secondary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $count; ?>">View</button>
                        <button class="btn btn-block btn-danger btn-xs dllee" data-attr="{{ $user->id }}">Delete</button>
                       
                        </td>
                      </tr> 
                     <?php  $count++; ?>
                      @endforeach
                  </tbody>
                  
                </table>
              </div>
                  
              <!-- /.card-body -->
            </div>
              
                {{ $users->links() }}
              
              
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
</div>
<!-- ./wrapper -->


@endsection
    
      <?php $count = 1; ?>
                      @foreach ($users  as $user)
       <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $count; ?>" role="dialog" style="display: none;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<h4 class="modal-title">Modal Header</h4>-->
        </div>
        <div class="modal-body">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Detail</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">

                  <tbody>
                    <tr>
                      <td><strong>User Name</strong></td>
                      <td>-</td>
                      <td>{{ $user->username }}
                      </td>
                    </tr>
                        <tr>
                      <td><strong>Name</strong></td>
                      <td>-</td>
                      <td>{{ $user->name }}
                      </td>
                    </tr>
                         <tr>
                      <td><strong>Email</strong></td>
                      <td>-</td>
                      <td>{{ $user->email }}
                      </td>
                    </tr>
                          <tr>
                      <td><strong>Bio</strong></td>
                      <td>-</td>
                      <td>{{ $user->bio }}
                      </td>
                    </tr>
                        <tr>
                      <td><strong>Avatar</strong></td>
                      <td>-</td>
                      <td>
                              @if($user->avatar == 'http://127.0.0.1:8000/storage' || $user->avatar == "")   
                    <img src="http://127.0.0.1:8000/storage/avatars/twitter.png" width="40" class="rounded-full mr-2">    
                          @else
                    <img src="http://127.0.0.1:8000/storage/{{$user->avatar}}" width="40" class="rounded-full mr-2">
                          @endif
                      </td>
                    </tr>
                           <tr>
                      <td><strong>Cover Image</strong></td>
                      <td>-</td>
                      <td>
                              @if($user->cover_image == 'http://127.0.0.1:8000/storage' || $user->cover_image == "")   
                    <img src="http://127.0.0.1:8000/storage/avatars/twitter.png" width="40" class="rounded-full mr-2">    
                          @else
                    <img src="http://127.0.0.1:8000/storage/{{$user->cover_image}}" width="40" class="rounded-full mr-2">
                          @endif
                          
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<?php $count++; ?>
    @endforeach
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

    <script>
        $(document).ready(function(){
/*           $("#searchkey").keyup(function(){
            var searchk = $(this).val();

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: 'get_searchresult',
                      type: "POST",
                     data: { searchk: searchk,_token: CSRF_TOKEN },   
                    success: function ( response ) {  
                      //  alert(response);
                    $('#messages').html(response);
               }
                    
                });
           }); */
            $(".dllee").click(function(){
                var ud = $(this).attr("data-attr"); 
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var checkstr =  confirm('Are you sure you want to delete this?');
                if(checkstr == true){
                $.ajax({
                   type: "POST", 
                    url: 'deleteUser',
                    data: { userd: ud,_token: CSRF_TOKEN },
                    success: function (response) {
                        alert(response);
                        $('#myTableRow'+ud).remove();
                    }   
                });
                }
            });    
        });
    </script>
    