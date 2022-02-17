<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="{{ route('user') }}" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_info" style="margin-left: 15px">
          <span>Welcome,</span>
          <h2>{{Session::get('admin')['name']}}</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-users"></i> User Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('user') }}"> Admin Management</a></li>
                <li><a href="{{ route('seller') }}"> Seller Management</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-tasks"></i> Product Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('add_product') }}">Add Product Order</a></li>
                <li><a href="{{ route('available-product') }}">Add Available Product</a></li>
                <li><a href="{{ route('unverified_product') }}">Unverified Product Orders</a></li>
                <li><a href="{{ route('product') }}">Product Details</a></li>
              </ul>
            </li>
            <li><a href="{{ route('enquiry-show') }}"><i class="fa fa-bullhorn"></i> Enquiry Details</a></li>
            <li><a><i class="fa fa-money"></i> Wallet Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('wallet') }}">Credit/Debit Wallet Point</a></li>
                <li><a href="{{ route('esewa') }}">eSewa Payment Details</a></li>
                <li><a href="{{ route('wallet_details') }}">Wallet Details</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-shopping-cart"></i> Order Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('buyer') }}">Order Details</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-list"></i> Leads Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('seller-leads') }}">Leads Details</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-image"></i> Banner Management <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('homepage_banner') }}">Homepage Banner</a></li>
                <li><a href="{{ route('user_dashboard_banner') }}">User Dashboard Banner</a></li>
              </ul>
            </li>
            <li><a href="{{ route('category') }}"><i class="fa fa-filter"></i> Category Management</a></li>
            <li><a href="{{ route('embed-facebook') }}"><i class="fa fa-facebook"></i> Embed Facebook</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
          <li class="nav-item dropdown open" style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
              {{ $admin->name }}
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="{{ route('get-admin-change-password',Crypt::encryptString($admin->id)) }}"> Change Password</a>
              <a class="dropdown-item"  href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- /top navigation -->