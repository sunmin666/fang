<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="@if(Session::get('session_member.avatars') == '') {{URL::asset('img/avatars/white_default_avatar.png')}} @else {{Session::get('session_member.avatars')}} @endif" class="img-circle" alt="User Image">
				{{--左上角头像--}}
			</div>
			<div class="pull-left info">
				<p>{{ Session::get('session_member.account') }}</p>
				<!-- Status -->
				<a href="#"><i class="fa fa-circle text-success"></i>{{ Session::get('session_member.username') }}</a>
			</div>
		</div>
		<!-- search form (Optional) -->
		{{--<form action="#" method="get" class="sidebar-form">--}}
			{{--<div class="input-group">--}}
				{{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
				{{--<span class="input-group-btn">--}}
            {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
            {{--</button>--}}
				{{--</span>--}}
			{{--</div>--}}
		{{--</form>--}}
		<!-- /.search form -->
		<!-- Sidebar Menu -->
		<ul class="sidebar-menu" data-widget="tree">

			<?php if($id == 1){?>
				<?php foreach ($per_menu as $k => $v){?>

				<li class="treeview @if($v -> perid == $ids) menu-open @endif">
					<a href="#"><i class="{{$v -> p_icon}}"></i> <span>{{$v -> pername}}</span>
						<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
					</a>
					<ul class="treeview-menu" @if($v -> perid == $ids) style="display: block;" @endif>
						<?php foreach ($v->xsuperior as $k1 => $v2){?>
						<li><a href="{{URL($v2 ->perurl)}}/{{$v -> perid}}"><i class="{{$v2 -> p_icon}}"></i>{{$v2 -> pername}}</a></li>
						<?php }?>
					</ul>
				</li>
				<?php }?>
			<?php }else{?>
				<?php foreach ($per_menu as $k => $v){?>
					<?php  $array = explode( ',' , $character );
					if(in_array( $v->perid , $array )){
					?>
						<li class="treeview @if($v -> perid == $ids) menu-open @endif">
							<a href="#"><i class="{{$v -> p_icon}}"></i> <span>{{$v -> pername}}</span>
								<span class="pull-right-container">
											<i class="fa fa-angle-left pull-right"></i>
										</span>
							</a>
							<ul class="treeview-menu" @if($v -> perid == $ids) style="display: block;" @endif>
								<?php foreach ($v->xsuperior as $k1 => $v2){?>
									<?php if(in_array( $v2->perid , $array )){?>
									 <li><a href="{{URL($v2 ->perurl)}}/{{$v -> perid}}"><i class="{{$v2 -> p_icon}}"></i>{{$v2 -> pername}}</a></li>
									<?php }?>
								<?php }?>
							</ul>
						</li>
					<?php }?>
				<?php }?>
			<?php }?>
		</ul>
	</section>

</aside>
