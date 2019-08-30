<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
	<style>
		.add_img{
			margin-top: 30px;
		}
	</style>
</head>

<body>
<div class="modal-body">
	<div class="box box-warning">
		<div class="box-body">
			<form id="fileForm" style="display: none;">
				<input type="file"  id="uphoto" style="display: none;" name="car_image">
			</form>
			<form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo" onkeydown="if(event.keyCode==13){return false;}">
				<div class="form-group">
					<label>{{ trans('pro.n_title') }}：</label>
					<input type="text" class="form-control" value="{{$intr -> i_title}}" name="i_title" id="i_title" maxlength="50">
				</div>
				<input type="hidden" value="{{$intr -> intr_id}}" id="intr_id">
				<div class="form-group" id="imgssss">
					@foreach($intr -> img as $k => $v)
						<div style="width: 100%;display: inline-block;height: 60px;position: relative">
							<div style="float: left;margin-right: 30px">
								<img src="{{URL::asset('uploads')}}/{{$v -> img_title}}" alt="" width="60px" height="60px">
							</div>
							<div class="delte_img" style="position: absolute; top: 0;left:60px;width:12px;cursor:pointer;float:right;border:1px solid white;height:12px;text-align:center;line-height:10px;color:white;background-color:red;font-weight:400;z-index: 100;border-radius: 50%;">x</div>
							<input type="hidden" value="{{$v -> img_title}}" id="path_img{{$k}}">
							<div style="float: left;width: 88%;margin-top: 15px"><input type="text" value="{{$v -> img_text}}" id="text{{$k}}" class="form-control" placeholder="请输入文字描述" style="width: 100%"></div>
						</div>
					@endforeach
				</div>
				<input type="hidden" value="{{count($intr -> img)}}" id="counter">
				<div class="add_img">
					<button type="button" class="btn" id="sahngchaun">
						<i class="layui-icon">&#xe67c;</i>{{trans('pro.upload_image')}}
					</button>
				</div>
				{{ csrf_field()}}
			</form>
		</div>
	</div>
	<div class="add_button">
		<button type="button" class="btn btn-dropbox" id="store1">{{ trans('permission.save') }}</button>
	</div>
</div>
</body>
@include('Public.weekly_js')

<script>
	$('#sahngchaun').click(function(){
		var counter = $('#counter').val();
		$('#uphoto').click();
		$('#uphoto').unbind('change').bind('change',function(){
			var fileData = new FormData(document.getElementById("fileForm"));
			$.ajax({
				url:"{{URL('upload')}}",
				type:"post",
				data:fileData,
				contentType: false,
				processData: false,
				success:function(data){
					if(data.code == 123){                   //图片类型不允许上传
						layer.msg(data.msg,{time:1234});
						return false;
					}
					if(data.code == 465){                   //图片大小超出范围
						layer.msg(data.msg,{time:1564});
						return false;
					}
					if(data.code == 789){                     //上传OK
						layer.msg(data.msg,{time:1236},function(){
							var str = '<div style="width: 100%;display: inline-block;height: 60px;position: relative">\n' +
								'\t\t\t\t\t\t<div style="float: left;margin-right: 30px">\n' +
								'\t\t\t\t\t\t\t<img src="{{URL::asset('uploads')}}/'+ data.data+'" alt="" width="60px" height="60px">\n' +
								'\t\t\t\t\t\t</div>\n' +
								'\t\t\t\t\t\t<div class="delte_img" style="position: absolute; top: 0;left:60px;width:12px;cursor:pointer;float:right;border:1px solid white;height:12px;text-align:center;line-height:10px;color:white;background-color:red;font-weight:400;z-index: 100;border-radius: 50%;">x</div>\n' +
								'\t\t\t\t\t\t<input type="hidden" value="'+ data.data +'" id="path_img'+ counter +'">\n' +
								'\t\t\t\t\t\t<div style="float: left;width: 88%;margin-top: 15px"><input type="text" id="text'+ counter +'" class="form-control" placeholder="请输入文字描述" style="width: 100%"></div>\n' +
								'\t\t\t\t\t</div>';
							$('#imgssss').html($('#imgssss').html() + str);

							var mun = Number(counter) + 1;
							$('#counter').val(mun);

							$('.delte_img').click(function(){
								$(this).parent().remove();
							});
						});
					}
				}
			});
		})
	})

	$('.delte_img').click(function(){
		$(this).parent().remove();
	});
</script>

<script>

	//添加到数据库

	$( '#store1' ).click( function () {

		var regEn = {{config('myconfig.config.regEn')}};
		var regCn = {{config('myconfig.config.regCn')}};

		$( "#store1" ).attr( 'disabled' , true );
		var i_title = $( '#i_title' ).val();
		var intr_id = $('#intr_id').val();
		var num = $('#counter').val();
		var img_text = [];
		for(var a =0 ;a< num;a++){
			var res = {};
			var img = $('#path_img'+ a).val();
			var text = $('#text'+a).val();
			if(img != null){
				res['img']=img;
				res['text']=text;
				img_text.push(res);
			}
		}

		var token = $( '[name=_token]' ).val();
		if ( i_title == '' || regEn.test(i_title) || regCn.test(i_title)) {
			layer.msg( '{{trans('pro.name_n_title')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}
		if(img_text.length == 0){
			layer.msg('{{trans('intr.img_null')}}',{time:1569});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		$.ajax( {
			url : "{{URL('display/update')}}" ,
			type : 'post' ,
			data : {
				intr_id:intr_id,
				i_title : i_title ,
				img_text:img_text,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.intr.intr_update_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}
				if ( data.code == {{config('myconfig.intr.intr_update_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
				if ( data.code == {{config('myconfig.intr.i_title_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )


</script>
</html>
