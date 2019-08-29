<?php

	namespace App\Http\Controllers\Api\V1_0;


	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use App\Models\Api\V1_0\login;
	use Illuminate\Support\Facades\Hash;


	class LoginController extends Controller {


		public function login( Request $api )
		{

			//		return 132;
			$iphone = $api->input( 'iphone' );
			$password = $api->input( 'mima' );


			$username = login::get_d_hous( $iphone );

			if (!$username) {
				return response()->json( [ 'code' => '1' ,
																	 'msg'  => '用户不存在',
				] );
			}

			if($username -> is_ipad == 1){
				return response()->json( [ 'code' => '2' ,
																	 'msg'  => '此人不能登陆ipad',
				] );
			}

			if(Hash::check($password,$username -> password)){
				return response()->json( [ 'code' => '3' ,
																	 'msg'  => '可以登录',
																	 'result' => $username,
				] );
			}
		}
	}
