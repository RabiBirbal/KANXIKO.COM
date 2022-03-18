<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard</title>

    @include('layout/admin/css')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        {{-- sidenav and top nav --}}
        @include('layout/admin/sidenav')
        {{-- sidenav and top nav ends --}}

        <!-- page content -->
        <div class="right_col" role="main">

          {{-- alert message --}}
          @include('admin/alert-message')
          
          <!-- top tiles -->
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Admin Details</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">Name</th>
                              <th scope="col">Mobile</th>
                              <th scope="col">Email</th>
                              <th scope="col">Address</th>
                              <th scope="col">Roles</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody id="myTable">
                            @foreach($user as $data)
                            <tr>
                              <td>{{$data->name}}</td>
                              <td>{{$data->mobile}}</td>
                              <td>{{$data->email}}</td>
                              <td>{{$data->address}}</td>
                              @if($data->is_admin == 1)
                              <td>Super Admin</td>
                              @elseif ($data->is_admin == 0)
                              <td>Buyer Department</td>
                              @elseif ($data->is_admin == 2)
                              <td>Seller Department</td>
                              @endif
                              <td>
                                <input type="hidden" value="{{$data->id}}" id="order_id" name="order_id">
                                <select class="form-control" uid='{{$data->id}}' name="status" id="status">
                                  @if($data->status == 1)
                                    <option value="1" selected>Active</option>
                                  @else
                                  <option value="0" selected>Deactive</option>
                                  @endif
                                  <option value="1">Active</option>
                                  <option value="0">Deactive</option>
                                </select>
                              </td>
                              <td>
                                <form action="{{ route('edit-admin') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="admin_id" value="{{ $data['id'] }}">
                                  <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                                <form action="{{ route('delete_admin') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="user_id" value="{{ $data['id'] }}">
                                  <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-danger">Remove</button>
                                </form>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('layout/admin/footer')
        <!-- /footer content -->
      </div>

    {{-- footer --}}
    @include('layout/admin/js')
      </div>
    </div>
	
    {{-- alert script --}}
    @include('admin/alert-script')

    <script type="text/javascript">
      $('select').change(function () {
       var optionSelected = $(this).find("option:selected");
       var valueSelected  = optionSelected.val();
       var textSelected   = optionSelected.text();
        var adminid = $(this).attr('uid');
        alert("Are you sure want to change the status??");
        // alert(valueSelected);
        // alert(adminid);
        $.ajax({
        url: "{{route('user-status-change')}}",
        type:"POST",
        data:{
          "_token": "{{ csrf_token() }}",
          value:valueSelected,
          id: adminid,
        },
        success: function (data) {
           alert('Status changed successfully.');
        },
        error: function(data){
           alert('Error occured.');
        }
       });
      });
    </script>

  </body>
</html>
