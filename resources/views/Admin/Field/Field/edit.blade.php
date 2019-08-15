<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
	<link rel="stylesheet" href="{{URL::asset('assets/layui/css/layui.css')}}">
	<script src="{{URL::asset('assets/layui/layui.js')}}"></script>
	<script src="{{URL::asset('module/common.js')}}"></script>
</head>
<body>
<div class="modal-body">
	<div class="box box-warning">
		<div class="box-body">
			{{ csrf_field() }}
			<form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">
				<div class="form-group">
					{{--项目中文名称--}}
					<label>{{ trans('field.name') }}：</label>
					<input type="text" class="form-control" name="name" placeholder="请填写项目中文名称" id="name"
					       maxlength="50" value="{{$field -> name}}">
				</div>
				{{--项目英文名称--}}
				<div class="form-group">
					<label>{{ trans('field.parent_field_id') }}：</label> <br>
					<div class="layui-input-block" style="width: 100%;margin-left: 0">
						<input type="text" id="tree2" lay-filter="tree" class="layui-input">
					</div>
					<input type="hidden" value="{{$field -> parent_field_id}}" id="parent_field_id">
					<input type="hidden" value="{{$field -> pathlist}}" id="pathlist">
				</div>
				{{ csrf_field()}}
			</form>
		</div>
	</div>
	<div class="add_button">
		<button type="button" class="btn btn-dropbox" id="store1">{{ trans('company.save') }}</button>
	</div>
</div>
</body>
@include('Public.weekly_js')
<script>
	layui.use(['treeSelect','form'], function () {
		var treeSelect= layui.treeSelect;
		treeSelect.render({
			elem: '#tree2',
			data: '{{URL::asset('data/data3.json')}}',
			type: 'post',
			placeholder: '{{$field -> names}}',
			search: true,
			click: function(d){
				var parent_field_id = d.current.id;
				console.log(d.current.id);
				$('#parent_field_id').val(parent_field_id);
				var pathlist = d.current.pathlist + ','+ parent_field_id;
				$('#pathlist').val(pathlist);
			},
			success: function (d) {
			}
		});

	});
</script>


<script>

	//添加到数据库

	$( '#store1' ).click( function () {
		$( "#store1" ).attr( 'disabled' , true );

		var name = $( '#name' ).val();   //字段名称
		var parent_field_id = $( '#parent_field_id' ).val();   //字段父类名称
		var pathlist = $('#pathlist').val();     //路径
		if ( name == '' || parent_field_id == '') {
			layer.msg( '{{trans('company.text_content1')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}
		$.ajax( {
			url : "{{URL('field/update')}}" ,
			type : 'post' ,
			data : {
				field_id: "{{$field -> field_id}}",
				name : name ,
				pathlist:pathlist,
				parent_field_id : parent_field_id ,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.field.field_success_update_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.field.field_error_update_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.field.name_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )
</script>
</html>
