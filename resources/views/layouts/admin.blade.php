<head>
	<link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
	<script src="{{ asset('js/admin.js')}}" type="text/javascript"></script>

  <!-- Bootstrap core JavaScript-->

  <script src="{{ asset('js/json/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/json/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/json/jquery.easing.min.js') }}" type="text/javascript"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/json/sb-admin-2.min.js') }}" type="text/javascript"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('js/json/Chart.min.js') }}" type="text/javascript"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/json/chart-area-demo.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/json/chart-pie-demo.js') }}" type="text/javascript"></script>

</head>
<body id="page-top">

	@section('sidebar')

<!--<div class='sidebar side-nav fixed' style="margin: -7px">-->
	<div class="wrapper" style="display:flex">
	  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
		<!--<ul class="custom-scrollbar" style="margin-left: -20px">-->
			<li>
				<div class='sidebar-logo'>Dashboard</div>
			</li>

      <hr class="sidebar-divider my-0">

		<li class="nav-item active">
        	<a class="nav-link" href="{{ route('dashboard')}}">
          	<i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      	</li>
      <!-- Divider -->
      <hr class="sidebar-divider">
  	<!-- Heading -->
      <div class="sidebar-heading">
        Activities
      </div>
        <!-- Nav Item - Pages Sales Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#Sales" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <span>Sales</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="{{ route('orders')}}">Orders</a>
          </div>
        </div>
      </li>
        <!-- Nav Item - Utilities Products Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#Products" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
          <span>Products</span>
        </a>
        <div id="collapseProducts" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="{{ route('stocks')}}"">Stocks</a>
            <a class="collapse-item" href="{{ route('categories')}}">Categories</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Products Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#Reports" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
          <span>Reports</span>
        </a>
        <div id="collapseReports" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="{{ route('salesReport')}}">Sales Report</a>
            <a class="collapse-item" href="{{ route('productsReport')}}">Products Report</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Products Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#Data" data-toggle="collapse" data-target="#collapseDatas" aria-expanded="true" aria-controls="collapseDatas">
          <span>Data</span>
        </a>
        <div id="collapseDatas" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="{{ route('customerInfo')}}">Customer Info</a>

          </div>
        </div>
      </li>
	</ul>

<!-- End of Sidebar -->
@endsection
<!--Main Layout>-->
@section('topNavbar')
	  <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="width: 100%;">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>-

            <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        
	  <!-- Scroll to Top Button-->
	  <a class="scroll-to-top rounded" href="#page-top">
	    <i class="fas fa-angle-up"></i>
	  </a>

        <!-- Logout Modal-->
	  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
	          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">×</span>
	          </button>
	        </div>
	        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
	        <div class="modal-footer">
	          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          <a class="btn btn-primary" href="/adminLogin">Logout</a>
	        </div>
	      </div>
	    </div>
	  </div>
@endsection
@section('footer')
<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center">© 2018 Copyright:
    AiSim
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
@endsection

@yield('sidebar')
@yield('topNavbar')
@yield('content')
@yield('footer')
</body>