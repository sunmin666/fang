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

		<ul id="heiht" class="sidebar-menu" data-widget="tree" >
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
		</ul>
	</section>
</aside>
