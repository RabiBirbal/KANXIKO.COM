<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard | Product </title>

    @include('layout/admin/css')
    
    <style>
      /* The switch - the box around the slider */
      .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
      }
    
      /* Hide default HTML checkbox */
      .switch input {
      opacity: 0;
      width: 0;
      height: 0;
      }
    
      /* The slider */
      .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
      }
    
      .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
      }
    
      input:checked + .slider {
      background-color: #2196F3;
      }
    
      input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
      }
    
      input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
      }
    
      /* Rounded sliders */
      .slider.round {
      border-radius: 34px;
      }
    
      .slider.round:before {
      border-radius: 50%;
      }

      .badge{
          padding: 5px;
      }
    </style> 
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        {{-- sidenav and top nav --}}
        @include('layout/admin/sidenav')
        {{-- sidenav and top nav ends --}}
        <!-- page content -->
        <div class="right_col" role="main">
          @include('admin/alert-message')
          
          <div class="card-box table-responsive">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th scope="col">SN</th>
                <th scope="col">Title</th>
                  <th scope="col">Image</th>
                  <th scope="col">Link</th>
                  <th scope="col">Status</th>
                  <th scope="col">#Action</th>
              </tr>
            </thead>
            <tbody id="myTable">
              <p hidden>{{ $n=1; }}</p>
              @foreach ($ads as $data)
              <tr>
                <td>{{ $n }}</td>
                <td>{{ $data->title }}</td>
                <td class="text-center"><img src="{{ asset('upload/images/'.$data['image']) }}" alt="product image" width="100px"></td>
                <td>{{ $data->link }}</td>
                <td>{{ $data->status }}</td>
                </td>
                <td>
                  <form action="{{ route('ads.edit') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <button type="submit" class="badge badge-primary">Edit</button>
                  </form>
                  <form action="{{ route('ads.delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="badge badge-danger">Remove</button>
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
