<div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     {{ $seller->first_name }} {{ $seller->last_name }}
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <p class="dropdown-item">Expires on: <br> {{ date('Y-m-d', strtotime($seller->expiry_date)) }}</p>
      <a class="dropdown-item" href="{{ route('view-balance') }}">My Balance  ({{ $seller->wallet_points }})</a>
      <a class="dropdown-item" href="{{ route('recharge-points') }}">Recharge Points</a>
      <a class="dropdown-item" href="{{ route('product-list') }}">Products</a>
      <a class="dropdown-item" href="{{ route('profile-details') }}">My profile</a>
      <a class="dropdown-item" href="{{ route('invite') }}">Invite Friend</a>
      <a class="dropdown-item" href="{{ route('view-lead-manager') }}">Lead Manager</a>
      <a class="dropdown-item" href="{{ route('get-change-password',Crypt::encryptString($seller->id)) }}">Change Password</a>
      <a class="dropdown-item" href="{{ route('seller-logout') }}">Logout</a>
    </div>
</div>