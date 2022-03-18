<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Orders</title>

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
                <h2>Buyer Orders Details</h2>
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
                              <th scope="col">Enquiry ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact No.</th>
                                <th scope="col">District</th>
                                <th scope="col">Address</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Budget</th>
                                <th scope="col">size</th>
                                <th scope="col">color</th>
                                <th scope="col">Ordered Date</th>
                                {{-- <th scope="col">Buyer Detail</th> --}}
                                {{-- <th scope="col">#Action</th> --}}
                            </tr>
                          </thead>
                          <tbody id="myTable">
                            <p hidden>{{ $n=1; }}</p>
                            @foreach ($product as $data)
                            <tr>
                              <td>{{ $n }}</td>
                              <td>{{ $data->id }}</td>
                              <td>{{ $data->buyer_name }}</td>
                              <td>{{ $data->buyer_email }}</td>
                              <td>{{ $data->buyer_contact }}</td>
                              <td>{{ $data->buyer_district }}</td>
                              <td>{{ $data->buyer_address }}</td>
                              <td>{{ $data->name }}</td>
                              <td>{{ $data->quantity }}</td>
                              <td>{{ $data->budget }}</td>
                              <td>{{ $data->size }}</td>
                              <td>{{ $data->color }}</td>
                              <td>{{ $data->created_at->format('M d, Y H:m:s A') }}</td>

                              {{-- <td>
                                <a href="{{ url('products/details/edit/'.$data['id']) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('products/details/'.$data['id']) }}" class="btn btn-success">View</a>
                                <a href="{{ url('products/details/delete/'.$data['id']) }}" onclick="return confirm('Are you sure want to continue?')" class="btn btn-danger">Remove</a>
                              </td> --}}

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
    @include('admin/alert-script')
  </body>
</html>
