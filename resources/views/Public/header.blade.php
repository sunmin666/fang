
<header class="main-header">
	<a href="{{url('main')}}" class="logo">
		<span class="logo-mini">{!! config('myconfig.config.en_shortname') !!}</span>
		<span class="logo-lg">{!! config('myconfig.config.en_appname') !!}</span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">

		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown messages-menu">
				{{--<!-- Menu toggle button -->--}}
				{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
				{{--<i class="fa fa-envelope-o"></i>--}}
				{{--<span class="label label-success">4</span>--}}
				{{--</a>--}}
				{{--<ul class="dropdown-menu">--}}
				{{--<li class="header">You have 4 messages</li>--}}
				{{--<li>--}}
				{{--<!-- inner menu: contains the messages -->--}}
				{{--<ul class="menu">--}}
				{{--<li><!-- start message -->--}}
				{{--<a href="#">--}}
				{{--<div class="pull-left">--}}
				{{--<!-- User Image -->--}}
				{{--<img src="{{URL::asset('img/avatars/white_default_avatar.png')}}"--}}
				{{--class="img-circle" alt="User Image">--}}
				{{--</div>--}}
				{{--<!-- Message title and timestamp -->--}}
				{{--<h4>--}}
				{{--Support Team--}}
				{{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
				{{--</h4>--}}
				{{--<!-- The message -->--}}
				{{--<p>Why not buy a new awesome theme?</p>--}}
				{{--</a>--}}
				{{--</li>--}}
				{{--<!-- end message -->--}}
				{{--</ul>--}}
				{{--<!-- /.menu -->--}}
				{{--</li>--}}
				{{--<li class="footer"><a href="#">See All Messages</a></li>--}}
				{{--</ul>--}}
				{{--</li>--}}
				{{--<!-- /.messages-menu -->--}}

				{{--<!-- Notifications Menu -->--}}
				{{--<li class="dropdown notifications-menu">--}}
				{{--<!-- Menu toggle button -->--}}
				{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
				{{--<i class="fa fa-bell-o"></i>--}}
				{{--<span class="label label-warning">10</span>--}}
				{{--</a>--}}
				{{--<ul class="dropdown-menu">--}}
				{{--<li class="header">You have 10 notifications</li>--}}
				{{--<li>--}}
				{{--<!-- Inner Menu: contains the notifications -->--}}
				{{--<ul class="menu">--}}
				{{--<li><!-- start notification -->--}}
				{{--<a href="#">--}}
				{{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
				{{--</a>--}}
				{{--</li>--}}
				{{--<!-- end notification -->--}}
				{{--</ul>--}}
				{{--</li>--}}
				{{--<li class="footer"><a href="#">View all</a></li>--}}
				{{--</ul>--}}
				{{--</li>--}}
				{{--<!-- Tasks Menu -->--}}
				{{--<li class="dropdown tasks-menu">--}}
				{{--<!-- Menu Toggle Button -->--}}
				{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
				{{--<i class="fa fa-flag-o"></i>--}}
				{{--<span class="label label-danger">9</span>--}}
				{{--</a>--}}
				{{--<ul class="dropdown-menu">--}}
				{{--<li class="header">You have 9 tasks</li>--}}
				{{--<li>--}}
				{{--<!-- Inner menu: contains the tasks -->--}}
				{{--<ul class="menu">--}}
				{{--<li><!-- Task item -->--}}
				{{--<a href="#">--}}
				{{--<!-- Task title and progress text -->--}}
				{{--<h3>--}}
				{{--Design some buttons--}}
				{{--<small class="pull-right">20%</small>--}}
				{{--</h3>--}}
				{{--<!-- The progress bar -->--}}
				{{--<div class="progress xs">--}}
				{{--<!-- Change the css width attribute to simulate progress -->--}}
				{{--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"--}}
				{{--aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
				{{--<span class="sr-only">20% Complete</span>--}}
				{{--</div>--}}
				{{--</div>--}}
				{{--</a>--}}
				{{--</li>--}}
				{{--<!-- end task item -->--}}
				{{--</ul>--}}
				{{--</li>--}}
				{{--<li class="footer">--}}
				{{--<a href="#">View all tasks</a>--}}
				{{--</li>--}}
				{{--</ul>--}}
				{{--</li>--}}
				{{--<!-- User Account Menu -->--}}
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						{{--右上角头像--}}
						<img src=" @if(Session::get('session_member.avatars') == '') {{URL::asset('img/avatars/white_default_avatar.png')}} @else {{Session::get('session_member.avatars')}} @endif" class="user-image"
						     alt="User Image">
						<span class="hidden-xs">{{ Session::get('session_member.username') }}</span>
					</a>
					<ul class="dropdown-menu">

						<li class="user-header">
							<img src="@if(Session::get('session_member.avatars') == '') {{URL::asset('img/avatars/white_default_avatar.png')}} @else {{Session::get('session_member.avatars')}} @endif" class="img-circle"
							     alt="User Image">

							{{--退出的头像--}}
							<p>
								{{ Session::get('session_member.username') }} - {{ Session::get('session_member.cha_name') }}
								<small>Email : {{ Session::get('session_member.email') }}</small>
								<small>Mobile : {{ Session::get('session_member.mobile') }}</small>
							</p>
						</li>
					{{--<!-- Menu Body -->--}}
					{{--<li class="user-body">--}}
					{{--<div class="row">--}}
					{{--<div class="col-xs-4 text-center">--}}
					{{--<a href="#">Followers</a>--}}
					{{--</div>--}}
					{{--<div class="col-xs-4 text-center">--}}
					{{--<a href="#">Sales</a>--}}
					{{--</div>--}}
					{{--<div class="col-xs-4 text-center">--}}
					{{--<a href="#">Friends</a>--}}
					{{--</div>--}}
					{{--</div>--}}
					{{--<!-- /.row -->--}}
					{{--</li>--}}
					<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<button href="#" class="btn btn-default btn-flat" id="change_password" value="{{ Session::get('session_member.id') }}">{{ trans('login.change_password') }}</button>
							</div>
							<div class="pull-right">
								<button href="#" class="btn btn-default btn-flat" value="{{$status}}" id="logout">{{ trans('login.drop_out') }}</button>
							</div>
						</li>
					</ul>
				</li>
				{{--<li>--}}
				{{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
				{{--</li>--}}
			</ul>
		</div>
	</nav>
</header>
@push('include-js')
	<script>
		$( function () {
			//退出提示
			$( "#logout" ).click( function () {

				var status = $(this).val();

				//询问框
				layer.confirm( "{{trans('login.layer_confirm_title')}}" , {
					title : "{{trans('login.is_logout')}}" ,
					btn : ["{{trans('login.yes')}}" , "{{trans('login.cancel')}}"] //按钮
				} , function () {
					location.href = "{{URL('logout')}}/" + status;
				} , function () {
					layer.msg("{{trans('login.cancels')}}" ,{time:1325});
				} );
			} );


			$("#change_password").click(function () {

				var status = $('#logout').val();

				layer.open( {
					type : 2 ,
					title : '{{ trans('login.change_password') }}' ,
					moveType : 0 , //拖拽模式，0或者1
					skin : 'layui-layer-demo' , //样式类名
					closeBtn : 1 , //不显示关闭按钮
					shadeClose : false , //开启遮罩关闭
					area : ['40%' , '53%'] ,
					shade: 0.5,
					content : ['{{URL('change_password')}}/'+ status, 'yes'] , //iframe的url，no代表不显示滚动条
				} );
			})

		} )
	</script>
@endpush
