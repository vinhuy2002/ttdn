<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		<i class="fa fa-bars"></i>
	</button>

	<!-- Topbar Search -->
	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
		<div class="input-group">
			<input type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<button class="btn btn-primary" type="button">
					<i class="fas fa-search fa-sm"></i>
				</button>
			</div>
		</div>
	</form>

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
						<input type="text" class="form-control bg-light border-0 small" placeholder="Tìm kiếm..." aria-label="Search" aria-describedby="basic-addon2">
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

		<li class="dropdown nav-item">
			<a class="nav-link dropdown-toggle" type="button" id="userDropdown" data-mdb-toggle="dropdown" aria-expanded="false" >
				<span>
					Xin chào
				</span>&ensp;
				<span class="badge bg-primary">
					@if (session()->get('dangnhap'))
                        {{ session()->get('dangnhap') }}
                    @endif
				</span>
			</a>
			<ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="userDropdown">
				{{-- <form method="POST" action="{{ route('logout') }}"> --}}
					{{-- @csrf --}}
                    <li><a class="dropdown-item" href="/">Cào Báo</a></li>
					<li><a class="dropdown-item" href="{{ route('dashboard') }}">Thông tin</a></li>
					<li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
				{{-- </form> --}}
			</ul>
		</li>

	</ul>

</nav>
<!-- End of Topbar -->
