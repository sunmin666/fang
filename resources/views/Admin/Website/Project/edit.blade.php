<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
	<link rel="stylesheet" href="{{asset('summernote/dist/summernote-lite.css')}}">
	<link rel="stylesheet" href="{{asset('summernote/dist/summernote-bs4.css')}}">
	<style>
		#img {
			background : #fff;
			width      : 36px;
			height     : 36px;
		}

		.zzz {
			display     : flex;
			align-items : center;
		}

		#test1 {
			margin-right : 20px;
		}

		#imgs {
			width  : 36px;
			height : 36px;
		}
	</style>
</head>

<body>
<div class="modal-body">
	<div class="box box-warning">
		<div class="box-body">
			{{ csrf_field() }}
			<form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo" onkeydown="if(event.keyCode==13){return false;}">
				<div class="form-group">
					<label>{{ trans('pro.n_title') }}：</label>
					<input type="text" class="form-control" value="{{$news -> n_title}}" name="n_title" id="n_title" maxlength="50">
				</div>
				<div class="form-group">
					<label>{{ trans('pro.n_img') }}：</label> <br>
					<div class="zzz">
						<button type="button" class="btn" id="test1">
							<i class="layui-icon">&#xe67c;</i>上传图片
						</button>
						<input type="hidden" value="{{$news -> n_img}}" id="n_img" name="n_img">
						<div id="img">
							<img src="{{$news -> n_img}}" alt="" id="imgs">
						</div>
					</div>
				</div>
				<input type="hidden" value="{{$news -> nid}}" id="nid">
				<div class="form-group">
					<label>{{trans('pro.content')}}：</label>
					<div>
						<textarea id="summernote">{{$news -> content}}</textarea>
					</div>
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
<script src="{{URL::asset('summernote/dist/summernote.min.js')}}"></script>
<script src="{{URL::asset('summernote/dist/lang/summernote-zh-CN.min.js')}}"></script>
<script>
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


	layui.use( 'upload' , function () {
		var upload = layui.upload;
		var token = $( '[name=_token]' ).val();
		var uploadInst = upload.render( {
			elem : '#test1' //绑定元素
			, url : '{{URL('lupload')}}' //上传接口
			, data : {
				_token : token ,
			}
			, done : function ( res ) {

				console.log(res);
				if ( res.code == 1 ) {
					// $( '#imgs' ).attr( 'src' , res.data.src );
					$( '#n_img' ).val( res.data.src );
					$( '#imgs' ).attr( 'src' , "{{URL::asset("")}}" + res.data.src );
					layer.msg( '上傳成功' , { time : 1000 } )
				}
				else {
					layer.msg( '上傳失敗' , { time : 1000 } )
				}
			}
			, error : function () {
				//请求异常回调
			}
		} );
	} );
	//添加到数据库

	$( '#store1' ).click( function () {

		$( "#store1" ).attr( 'disabled' , true );

		var regEn = {{config('myconfig.config.regEn')}};  //正则匹配英文特殊字符，
		var regCn = {{config('myconfig.config.regCn')}};  //正则匹配中文特殊字符,

		var n_title = $( '#n_title' ).val();
		var n_img = $( '#n_img' ).val();
		var nid = $('#nid').val();
		var content = $( '#summernote' ).summernote( 'code' );       //获取编辑器内容
		var token = $( '[name=_token]' ).val();

		if ( n_title == '' || regEn.test(n_title) || regCn.test(n_title) ) {
			layer.msg( '{{trans('pro.name_n_title')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if( content == '<p><br></p>'){
			layer.msg('新闻内容不能为空',{time:1234});
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		$.ajax( {
			url : "{{URL('por/update')}}" ,
			type : 'post' ,
			data : {
				nid:nid,
				n_title : n_title ,
				content : content ,
				n_img:n_img,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.pro.tnews_update_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}
				if ( data.code == {{config('myconfig.pro.n_title_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
				if ( data.code == {{config('myconfig.pro.tnews_update_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )


</script>
</html>
