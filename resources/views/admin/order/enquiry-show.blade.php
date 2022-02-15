<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Enquiry</title>

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
                <h2>Enquiry Details</h2>
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
                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">SN</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Buyer Name</th>
                                <th scope="col">Buyer Email</th>
                                <th scope="col">Buyer Address</th>
                                <th scope="col">Buyer Phone</th>
                                <th scope="col">Enquiry Date</th>
                                <th scope="col">#Action</th>
                            </tr>
                          </thead>
                          <tbody id="myTable">
                              <p hidden>{{ $n=1; }}</p>
                            @foreach ($enquiry as $data)
                            <tr>
                              <td>{{ $n }}</td>
                              <td>{{ $data->product_name }}</td>
                              <td><img src="{{ asset('upload/images/'.$data['product_image']) }}" width="100px" alt=""></td>
                              <td><textarea name="description" id="description" cols="15" rows="5" readonly>{{ $data->description }}</textarea></td>
                              <td>{{ $data->customer_name }}</td>
                              <td>{{ $data->customer_email }}</td>
                              <td>{{ $data->customer_address }}</td>
                              <td>{{ $data->customer_phone }}</td>
                              <td>{{ $data->created_at->format('M d,Y H:m:s A') }}</td>
                              <td>
                                  <form action="{{ url('enquiry/delete/'.$data['id']) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                                    <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-danger">Remove</button>
                                  </form>
                              </td>
                            </tr>
                            <p hidden>{{ $n++; }}</p>
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
    
      </div>
    </div>
    @include('layout/admin/js')
    {{-- alert script --}}
    @include('admin/alert-script');
  </body>
</html>
