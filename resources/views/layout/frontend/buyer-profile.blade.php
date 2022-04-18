<div class="col-md-6 dropdown text-right">
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         {{ $buyer->first_name }} {{ $buyer->last_name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <small>
            <a class="dropdown-item">Points: {{ $buyer->points }}</a>
            <a class="dropdown-item" href="{{ route('buyer-profile-detail') }}">My profile</a>
            <a class="dropdown-item" href="{{ route('my-order') }}">My Orders</a>
            <a class="dropdown-item" href="{{ route('buyer-invite') }}">Invite Friend</a>
            <a class="dropdown-item" href="{{ route('buyer-changes-password',Crypt::encryptString($buyer->id)) }}">Change Password</a>
            <a class="dropdown-item" href="{{ route('buyer_logout') }}">Logout</a>
          </small>
        </div>
    </div>
</div>