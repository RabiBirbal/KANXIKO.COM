@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible alert-block" role="alert">
        <button type="button" class="close" data-dismiss="alert">X</button>
        <strong><i class="fa fa-check-circle"></i> Success!! {{Session('success')}}</strong>
          {{ Session::forget('success'); }}
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger alert-dismissible alert-block" role="alert">
        <button type="button" class="close" data-dismiss="alert">X</button>
        <strong><i class="fa fa-times-circle"></i> Error!! {{Session('error')}}</strong>
          {{ Session::forget('error'); }}
    </div>
@endif 