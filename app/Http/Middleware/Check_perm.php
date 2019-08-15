<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class Check_perm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
			// 获取当前路由的 URI
			$route_name = Request::getRequestUri();

			$cc = explode('/',$route_name);
			$acc = array();
			foreach ($cc as $k1 => $v2){
				if(!is_numeric($v2) && $v2 != 'fang' && $v2 != 'public'){
					$acc[] = $v2;
				}
			}
			$name = implode('/',$acc);
			$session = Session::get( 'session_member' );
			if($session['status'] == 1){
				$data = DB::table('houserinfo')
								 -> select('houserinfo.*','projectinfo.pro_cname','user_relationinfo.posi_id','user_relationinfo.role_id','user_relationinfo.perm_id','user_roleinfo.role_name','user_positioninfo.posi_name','user_permissioninfo.perm_name','user_permissioninfo.http_path')
								 -> leftJoin('user_relationinfo','houserinfo.hous_id','=','user_relationinfo.memberid')
								 -> leftJoin('user_roleinfo','user_relationinfo.role_id','=','user_roleinfo.role_id')
								 -> leftJoin('user_positioninfo','user_relationinfo.posi_id','=','user_positioninfo.posi_id')
								 -> leftJoin('user_permissioninfo','user_relationinfo.perm_id','=','user_permissioninfo.perm_id')
								 -> leftJoin('projectinfo','houserinfo.proj_id','=','projectinfo.project_id')
								 -> where('houserinfo.hous_id','=',$session['id'])
								 ->first();
			}else{
				$data = DB::table( 'memberinfo' )
									->select( 'memberinfo.memberid' , 'memberinfo.username' , 'memberinfo.status' , 'relationinfo.rela_id'  , 'positioninfo.posi_id' , 'positioninfo.posi_title' , 'positioninfo.posi_name' , 'roleinfo.role_id' , 'roleinfo.role_title' , 'roleinfo.role_name' , 'permission.perm_id' , 'permission.perm_title' , 'permission.perm_name' , 'permission.http_method' , 'permission.http_path' )
									->leftJoin( 'relationinfo' , 'memberinfo.memberid' , '=' , 'relationinfo.memberid' )
									->leftJoin( 'positioninfo' , 'relationinfo.posi_id' , '=' , 'positioninfo.posi_id' )
									->leftJoin( 'roleinfo' , 'relationinfo.role_id' , '=' , 'roleinfo.role_id' )
									->leftJoin( 'permission' , 'relationinfo.perm_id' , '=' , 'permission.perm_id' )
									->where( 'memberinfo.memberid' , '=' , $session['id'] )
									->first();
			}
			$where = explode('|',$data -> http_path);
			$path = DB::table('urlinfo') -> select('url_path') -> whereIn('url_id',$where) -> get() -> map(function($value){return (array)$value;}) -> toArray();
			$ayy = array();
			foreach ($path as $k =>$v){
					$ayy[] = $v['url_path'];
			}
			$reslut = in_array( $name , $ayy );
			if ( $reslut == FALSE ) {
				if ( $data->http_path != '*' ) {
					return redirect( '/permi');
				}
			}


			return $next( $request );
    }
}
