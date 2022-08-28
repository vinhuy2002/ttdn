<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Website Scrapper</title>

	<link href="{{ URL('css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet"/>

	<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<script src="{{ URL('js/jquery.dataTables.min.js') }}"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</head>
<body id="page-top">
	<div id="wrapper">

		@include('dashboard.app.menu')

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				@include('dashboard.app.header')

				<div class="container-fluid">

					@yield('dashboard-content')

				</div>
			</div>

			@include('dashboard.app.footer')
		</div>
	</div>


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
	<script src="{{ URL('js/sb-admin-2.min.js') }}"></script>

	<script src="{{ URL('js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
