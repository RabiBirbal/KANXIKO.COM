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
                <h2>Redeem Product Details</h2>
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
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Points</th>
                                <th scope="col">Status</th>
                                <th scope="col">#Action</th>
                            </tr>
                          </thead>
                          <tbody id="myTable">
                            <p hidden>{{ $n=1; }}</p>
                            @foreach ($products as $data)
                            <tr>
                              <td>{{ $n }}</td>
                              <td>{{ $data->name }}</td>
                              <td>
                                @if($data->product_image == null)
                                <img src="{{ asset('frontend/image/no-image.jpg') }}" width="150px" alt="product_image">
                                @else
                                <img src="{{ asset('upload/images/'.$data['thumbnail']) }}" width="150px" alt="product_image">
                                @endif
                              </td>
                              <td>{{ $data->quantity }}</td>
                              <td>{{ $data->brand }}</td>
                              <td>{{ $data->point }}</td>
                              
                              <td>{{ $data->status }}</td>
                              
                              <td>
                                  <a href="{{ route('redeem.product.edit',$data['id']) }}"><button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit</button></a>
                                <form action="{{ route('redeem.product.destroy') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="id" value="{{ $data['id'] }}">
                                  <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>
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
    @include('admin/alert-script')

  </body>
</html>
