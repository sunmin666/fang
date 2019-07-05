<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ config('myconfig.config.webtitle').config('myconfig.config.version') }}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="{{URL::asset('img/favicon.ico')}}"/>
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/font-awesome/css/font-awesome.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/Ionicons/css/ionicons.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/admin-lte/plugins/iCheck/all.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/admin-lte/dist/css/AdminLTE.css')}}">
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
			page. However, you can choose any other skin. Make sure you
			apply the skin class to the body tag so the changes take effect. -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/admin-lte/dist/css/skins/_all-skins.css')}}">

	<!-- layui UI -->
	<link rel="stylesheet" href="{{URL::asset('bower_components/layui/dist/css/layui.css')}}">

@stack('include-css')

	<script src="{{URL::asset('js/iehtml.js')}}"></script>
	<script src="{{URL::asset('js/ierespond.js')}}"></script>
	<link rel="stylesheet" href="{{URL::asset('css/googlefont.css')}}">
</head>

<body class="hold-transition {{ config('myconfig.config.view_skin') }} sidebar-mini fixed">
<div class="wrapper">
@include('Public.header')
@include('Public.sidebar')

	<div class="content-wrapper">

		<section class="content-header">
			<h4>{{ $page_name }}
				<small>{{ $page_detail }}</small>
			</h4>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> {{ $page_tips }}</a></li>
				<li class="active">{{ $page_note }}</li>
			</ol>
		</section>


		<section class="content container-fluid">

			@yield('content')

		</section>

	</div>

@include('Public.footer')


	<aside class="control-sidebar control-sidebar-dark">

		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
			<li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
			<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		</ul>

		<div class="tab-content">

			<div class="tab-pane active" id="control-sidebar-home-tab">
				<h3 class="control-sidebar-heading">Recent Activity</h3>
				<ul class="control-sidebar-menu">
					<li>
						<a href="javascript:;">
							<i class="menu-icon fa fa-birthday-cake bg-red"></i>

							<div class="menu-info">
								<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

								<p>Will be 23 on April 24th</p>
							</div>
						</a>
					</li>
				</ul>


				<h3 class="control-sidebar-heading">Tasks Progress</h3>
				<ul class="control-sidebar-menu">
					<li>
						<a href="javascript:;">
							<h4 class="control-sidebar-subheading">
								Custom Template Design
								<span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
							</h4>
							<div class="progress progress-xxs">
								<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
			<div class="tab-pane" id="control-sidebar-settings-tab">
				<form method="post">
					<h3 class="control-sidebar-heading">General Settings</h3>

					<div class="form-group">
						<label class="control-sidebar-subheading">
							Report panel usage
							<input type="checkbox" class="pull-right" checked>
						</label>
						<p>
							Some information about this general settings option
						</p>
					</div>

				</form>
			</div>

		</div>
	</aside>

	<div class="control-sidebar-bg"></div>
</div>
<script src="{{URL::asset('bower_components/jquery/dist/jquery.js')}}"></script>
<script src="{{URL::asset('bower_components/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('bower_components/admin-lte/plugins/iCheck/icheck.js')}}"></script>
<script src="{{URL::asset('bower_components/admin-lte/dist/js/adminlte.js')}}"></script>
<script src="{{URL::asset('bower_components/layui/dist/layui.all.js')}}"></script>
@stack('include-js')
</body>
</html>

