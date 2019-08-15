<!doctype html>
<html lang="en">
<head>
	@include('Public.weekly_css')
</head>
<body>
<div class="modal-body">
	<div class="box box-warning">
		<div class="box-body">
			{{ csrf_field() }}
			<form role="form" action="#" method="post" name="reg_memberinfo" id="reg_memberinfo">
				<div class="form-group">
					<label>{{ trans('cha.ch_nsme') }}：</label>
					<input type="text" class="form-control" name="ch_nsme" id="ch_nsme" maxlength="10">
				</div>
				<div class="form-group">
					<label>{{ trans('cha.ch_text') }}：</label>
					<input type="text" class="form-control" maxlength="30"
					       name="ch_text" id="ch_text">
				</div>
				<div class="form-group">
					<label>{{ trans('cha.ch_per') }}：</label><br>
					<div style="padding-left: 30px">
						@foreach($pers as $k => $v)
							<input type="checkbox" class="i-checks" name="groupCheckbox[]"
							       value="{{$v -> perid}}" > {{$v -> pername}} &nbsp;&nbsp;&nbsp;

							@foreach($v -> xsuperior as $k1 => $v1)
								<input type="checkbox" class="i-checks fuxuan{{$v -> perid}}" id="groupCheckbox" name="groupCheckbox[]"
								       value="{{$v1 -> perid}}" disabled status="{{$v -> perid}}" > {{$v1 -> pername}}
							@endforeach
							<br><br>
						@endforeach
					</div>
				</div>
				{{ csrf_field()}}
			</form>
		</div>
	</div>
	<div class="add_button">
		<button type="button" class="btn btn-dropbox" id="store1">{{ trans('cha.save') }}</button>
	</div>
</div>
</body>
@include('Public.weekly_js')
<script>
	//复选框样式
	$( ".i-checks" ).iCheck( {
		checkboxClass : "{{config('myconfig.config.checkbox_skin')}}" ,
	} );

	$('input[type="checkbox"]').on('ifChecked', function() {
		var perid = $(this).val();
		var perid_z = $('.fuxuan'+ perid).attr('status');
		if(perid == perid_z){
			$('.fuxuan'+ perid).iCheck('check');
			$('.fuxuan'+ perid).attr('disabled',false);
		}
	});


	$('input[type="checkbox"]').on('ifUnchecked', function() {
		var perid = $(this).val();
		$('.fuxuan'+ perid).iCheck('uncheck');
		$('.fuxuan'+ perid).attr('disabled',true);
	});

</script>
<script>

	//添加到数据库

	$( '#store1' ).click( function () {

		$( "#store1" ).attr( 'disabled' , true );

		var ch_nsme = $( '#ch_nsme' ).val();

		var ch_text = $( '#ch_text' ).val();
		var vote = [];
		for ( var i = 0 ; i < $( ".i-checks" ).length ; i++ ) {
			if ( $( ".i-checks" ).eq( i ).prop( "checked" ) ) {
				vote.push( $( ".i-checks" ).eq( i ).val() )
			}
		}
		var token = $( '[name=_token]' ).val();

		var realname_pattern = {{ config('myconfig.config.role_name_pattern') }};    //中文验证

		if ( ch_nsme == '' || !realname_pattern.test( ch_nsme ) ) {
			layer.msg( '{{trans('cha.ch_nsmes')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if ( ch_text == '' || !realname_pattern.test( ch_text ) ) {
			layer.msg( '{{trans('cha.ch_texts')}}' , { time : 1500 } );
			$( "#store1" ).attr( 'disabled' , false );
			return false;
		}

		if ( vote.length == 0 ) {
			layer.msg( '{{trans('cha.delete_data')}}' , { time : 1000 } );
			return false;
		}

		$.ajax( {
			url : "{{URL('cha/store')}}" ,
			type : 'post' ,
			data : {
				ch_nsme : ch_nsme ,
				ch_text : ch_text ,
				ch_per : vote ,
				_token : token
			} ,
			success : function ( data ) {
				console.log( data );

				if ( data.code == {{config('myconfig.cha.ch_text_success_code')}}) {
					layer.msg( data.msg , { time : 2000 } , function () {
						window.parent.location.reload();
					} );
				}

				if ( data.code == {{config('myconfig.cha.ch_nsme_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.cha.ch_text_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}

				if ( data.code == {{config('myconfig.cha.ch_text_error_code')}}) {
					layer.msg( data.msg , { time : 2000 } );
					$( "#store1" ).attr( 'disabled' , false );
				}
			}
		} )
	} )
</script>
</html>
