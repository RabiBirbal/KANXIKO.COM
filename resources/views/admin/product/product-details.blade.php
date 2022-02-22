<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Products</title>

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
                <h2>Product Details</h2>
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
                                <th scope="col">Image</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Size</th>
                                <th scope="col">color</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Leads Category</th>
                                <th scope="col">Points</th>
                                <th scope="col">Availability</th>
                                {{-- <th scope="col">Buyer Detail</th> --}}
                                <th scope="col">#Action</th>
                            </tr>
                          </thead>
                          <tbody id="myTable">
                            <p hidden>{{ $n=1; }}</p>
                            @foreach ($product as $data)
                            <tr>
                              <td>{{ $n }}</td>
                              <td>{{ $data->id }}</td>
                              <td>{{ $data->name }}</td>
                              <td class="text-center">
                                @if($data->product_image == null)
                                <img src="{{ asset('frontend/image/no-image.jpg') }}" width="150px" height="150px" alt="product_image">
                                @else
                                <img src="{{ asset('upload/images/'.$data['product_image']) }}" width="150px" height="150px" alt="product_image">
                                @endif
                              </td>
                              <td>{{ $data->quantity }}</td>
                              <td>{{ $data->size }}</td>
                              <td>{{ $data->color }}</td>
                              <td>{{ $data->budget }}</td>
                              <td>{{ $data->leads_category }}</td>
                              <td>{{ $data->points }}</td>
                              <td>{{ $data->availability }}</td>
                              {{-- <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                View
                              </button></td> --}}
                              {{-- <!-- Modal -->
                              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Buyer Details</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-md-3 mb-3">
                                          <label>Name :</label>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                          <input type="text" name="buyer_name" value="{{ $productlist['buyer_name'] }}" class="form-control" readonly/>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                          <label>Email :</label>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                          <input type="text" name="buyer_email" value="{{ $productlist['buyer_email'] }}" class="form-control" readonly/>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                          <label>Contact No. :</label>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                          <input type="text" name="buyer_contact" value="{{ $productlist['buyer_contact'] }}" class="form-control" readonly/>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                          <label>Address :</label>
                                        </div>
                                        <div class="col-md-9 mb-3">
                                          <input type="text" name="buyer_address" value="{{ $productlist['buyer_address'] }}" class="form-control" readonly/>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div> --}}
                              <td>
                                <form action="{{ route('edit_product') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="product_id" value="{{ $data['id'] }}">
                                  <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                                <form action="{{ route('product_details') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="product_id" value="{{ $data['id'] }}">
                                  <button type="submit" class="btn btn-success">View</button>
                                </form>
                                <form action="{{ route('delete_product') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="product_id" value="{{ $data['id'] }}">
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
    @include('layout/admin/js')
      </div>
    </div>
	
    {{-- alert script --}}
    @include('admin/alert-script');
  </body>
</html>
