<div>
    <section class="details-card" wire:loading.delay.class="opacity-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 mb-3 name">
                    <h2 class="name1">{{ $name }}</h2>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 mb-3 text-right back" style="margin-top: -30px;">
                    <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
                </div>
                @foreach ($product as $data)
              <div class="col-md-3 mb-3" @if($loop->last) id="last_record" @endif>
                <div class="card-content">
                    <h4 class="text-center pt-2">{{ $data->name }}</h4>
                    <div class="card-img">
                        <img src="{{ asset('upload/images/'.$data['product_image']) }}" alt="" height="400px" width="300px">
                    </div>
                    <div class="card-desc">
                        <div class="text-center" >
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{ $data->id }}">Order Now</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Send Enquiry</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">X</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('post-enquiry') }}" method="post">
                                  @csrf
                                  <input type="hidden" name="product_image" value="{{ $data->product_image }}">
                                  <input type="hidden" name="category" value="{{ $data->category }}">
                                  <input type="hidden" name="subcategory" value="{{ $data->subcategory }}">
                                  <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                      </div>
                                  <input name="product_name" class="form-control" value="{{ $data['name'] }}" placeholder="Product name" type="text" readonly>
                                  </div> <!-- form-group// -->
                                  <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                      <!--  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span> -->
                                      </div>
                                  <textarea name="description" class="form-control" placeholder="Description field" required></textarea>
                                  </div> <!-- form-group// -->
                                  <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                      </div>
                                      <input name="buyer_name" class="form-control" placeholder="Customer name" type="text" 
                                      @if (Session::has('buyer'))
                                        value="{{ $buyer->first_name }} {{ $buyer->last_name }}" readonly
                                      @endif required>
                                  </div> <!-- form-group// -->
                          
                                  <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                      </div>
                                      <input name="buyer_email" class="form-control" placeholder="Email address" type="email" 
                                      @if (Session::has('buyer'))
                                        value="{{ $buyer->email }}" readonly
                                      @endif required>
                                  </div> <!-- form-group// -->
                          
                                  <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"> <i class="fa fa-map-marker"></i> </span>
                                      </div>
                                      <input name="buyer_address" class="form-control" placeholder="Address" type="text"
                                      @if (Session::has('buyer'))
                                        value="{{ $buyer->address }}" readonly
                                      @endif required>
                                  </div>
                                  <div class="form-group input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                      </div>
                                      @if (Session::has('buyer'))
                                        <input type="text" class="form-control" name="phone" value="{{ $buyer->contact }}" readonly>  
                                      @else
                                        <select class="custom-select" name="phone_code" style="max-width: 120px;">
                                          <option>+977</option>
                                      <!--   <option value="1">+972</option>
                                          <option value="2">+198</option>
                                          <option value="3">+701</option> -->
                                      </select>
                                      <div class="col-md-9 phone">
                                      <input name="phone" id="phone" class="form-control" placeholder="Phone number" type="text" required>
                                      </div>
                                      @endif
                                      <br>
                                      <div id="showErrorPhone"></div>
                                      @error('phone')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror                      
                                  </div> <!-- form-group// -->  
                                  <div class="form-group ml-4">
                                    <input class="form-check-input" type="checkbox" name="terms" value="" id="flexCheckDefault" required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                      I agree all the terms and conditions.
                                    </label>
                                </div> <!-- form-group// -->                               
                                  <div class="form-group">
                                      <button type="submit" onclick="return confirm('Are you sure want to continue?')" id="submit" value="submit" class="btn btn-primary btn-block"> Send </button>
                                  </div> <!-- form-group// -->                                                                       
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- modal ends --}}
                      </div>
                </div>
              </div>
              @endforeach 
            </div>
            {{-- <div class="mb-3">
              {{ $product->links() }}
            </div> --}}
            
        </div>
    </section>
    @if ($loadAmount >= $totalRecords)
    <p class="text-gray-800 font-bold text-2xl text-center my-10">No More Records</p>
    @else
    <div class="text-center">
      <img src="{{ asset('frontend/image/loading.gif') }}" alt="loading" height="100px">
    </div>
    @endif

    <script>
      const lastRecord = document.getElementById('last_record');
      const options = {
          root: null,
          threshold: 1,
          rootMargin: '0px'
      }
      const observer = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
              if (entry.isIntersecting) {
                  @this.loadMore()
              }
          });
      });
      observer.observe(lastRecord);
  </script>
</div>
