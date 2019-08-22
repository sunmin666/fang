<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
	<link rel="stylesheet" href="{{asset('summernote/dist/summernote-lite.css')}}">
	<link rel="stylesheet" href="{{asset('summernote/dist/summernote-bs4.css')}}">
	<style>
		.none{
			display: none;
		}
	</style>
</head>
<body>
<div class="modal-body">
	<div class="box box-warning">
		<div class="box-body">
			{{ csrf_field() }}
			<form id="fileForm" style="display: none;">
				<input type="file"  id="uphoto" style="display: none;" name="car_image">
			</form>
			<form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">
				{{--楼号--}}
				<div class="form-group">
					<label>{{ trans('knowledge.title') }}：</label>
					<input type="text" class="form-control" name="title"
					       placeholder="请输入标题" id="title"
					       maxlength="15">
				</div>
				{{--单元号--}}
				<div class="form-group">
					<label>{{ trans('knowledge.class_id') }}：</label>
					<select name="class_id" id="class_id" class="form-control">
						<option value="">--请选择--</option>
						@foreach($Knowledge as $k => $v)
							<option value="{{$v ->field_id}}">{{$v -> name}}</option>
						@endforeach
					</select>
				</div>
				{{--房号--}}
				<div class="form-group">
					<label>{{ trans('knowledge.video') }}：</label>
					<button type="button" class="btn" id="sahngchaun">
						<i class="layui-icon">&#xe67c;</i>上传视频
					</button>
				</div>
				<video src="" controls="controls" id="myvideo" class="none" style="width: 50%;height:300px" ></video>

				<input type="hidden" id="video" value="">

				{{--楼层--}}
				<div class="form-group">
					<label>{{ trans('knowledge.content') }}：</label>
					<div>
						<textarea id="summernote"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label>{{ trans('knowledge.class_ids') }}：</label>
					<select name="is_public" id="is_public" class="form-control">
						<option value="">--请选择--</option>
						<option value="0">公开</option>
						<option value="1">不公开</option>

					</select>
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
<script src="{{URL::asset('summernote/dist/summernote.min.js')}}"></script>
<script src="{{URL::asset('summernote/dist/lang/summernote-zh-CN.min.js')}}"></script>
<script>
	//复选框样式
	$( ".i-checks" ).iCheck( {
		checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,   //复选框样式
		radioClass : "{{config('myconfig.config.checkbox_skin')}}"   //单选框样式
	} );

	$( document ).ready( function () {                   //实例化编辑器
		$( '#summernote' ).summernote( {
			height : 200 ,                    //编辑器高
			minHeight : 100 ,                 //最小高度
			maxHeight : 300 ,                 //最大高度
			lang : 'zh-CN' ,                   //设置语言
			focus : true ,
			//调用图片上传
			callbacks : {                    //图片上传方法重写
				onImageUpload : function ( files ) {
					sendFile( files[0] );
				}
			}
		} );
		function sendFile( file ) {              //图片上传方法
			var formData = new FormData();
			formData.append( "file" , file );
			$.ajax( {
				url : "{{URL('mupload')}}" ,//路径是你控制器中上传图片的方法，
				data : formData ,
				cache : false ,
				contentType : false ,
				processData : false ,
				type : 'POST' ,
				success : function ( data ) {
					console.log( data );
					if ( data == 2 ) {
						alert( '上传失败' );
					}
					else {
						$( '#summernote' ).summernote( 'insertImage' , data , function ( $image ) {
							$image.attr( 'src' , data );
						} );
					}
				}
			} );
		}
	} );

	$('#sahngchaun').click(function(){
		var counter = $('#counter').val();
		$('#uphoto').click();
		$('#uphoto').unbind('change').bind('change',function(){
			var fileData = new FormData(document.getElementById("fileForm"));

			$.ajax({
				url:"{{URL('video')}}",
				type:"post",
				async:false,
				data:fileData,
				contentType: false,
				processData: false,
				success:function(data){
					console.log(data);
					if(data.code == 789){
						layer.msg(data.msg,{time:1234},function(){
							$('#video').val(data.data);
							$('#myvideo').removeClass('none');
							$('#myvideo').attr('src',"{{URL::asset('')}}" + 'uploads/shipin/' +data.data);
						});
					}else{
						layer.msg('上传失败，请从试',{time:1234})
					}
				},
				error:function(data){
					console.log(data);
				}
			});
		})
	})
</script>
<script>

	function htmlEncodeJQ ( str ) {
		return $('<span/>').text( str ).html();
	}


	//添加到数据库
	$( '#store1' ).click( function () {
		// $( "#store1" ).attr( 'disabled' , true );
		var title = $( '#title' ).val();          //标题
		var class_id = $( '#class_id' ).val();            //分类id
		var video = $( '#video' ).val();            //视频
		var content = htmlEncodeJQ($( '#summernote' ).summernote( 'code' ));  //内容
		var is_public = $('#is_public').val();

		// console.log(content);

		var regEn = {{config('myconfig.config.regEn')}};
		var regCn = {{config('myconfig.config.regCn')}};

		if ( title == ''|| class_id == '' || video== '' || is_public=='') {
			layer.msg( '{{trans('company.text_content1')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}
		if(regEn.test( title )){
			layer.msg( '{{trans('home.text_content1')}}' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}
		if(regCn.test( title )){
			layer.msg( '111' , { time : 1235 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}
		if( content == '<p><br></p>'){
			layer.msg('新闻内容不能为空',{time:1234});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		$.ajax( {
			url : "{{URL('knowledgeinfo/store')}}" ,
			type : 'post' ,
			data : {
				title : title ,
				class_id : class_id ,
				video : video ,
				content : content ,
				is_public:is_public,
				_token : "{{csrf_token()}}"
			} ,
			success : function ( data ) {
				console.log( data );
				if ( data.code == {{config('myconfig.knowledge.store_k_error_code')}}) {
					layer.msg( data.msg , { time : 2151 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

				if ( data.code == {{config('myconfig.knowledge.store_k_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.knowledge.title_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
					return false;
				}

			}
		} )
	} )
</script>
</html>
