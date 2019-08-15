<?php

namespace App\Http\Controllers\Admin\Field;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionController;
use App\Models\admin\Field;
use Illuminate\Support\Facades\Validator;

class FieldController extends SessionController
{

	/**
	 *
	 * 字段信息展示页面
	 *
	 * @param $perid
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($perid){
			$data = $this -> session();
			$data['per_menu'] = $this -> get_per();
			$data['page_name'] = trans( 'field.page_name' );
			$data['page_detail'] = trans( 'field.page_detail' );
			$data['page_tips'] = trans( 'index.page_tips' );
			$data['page_note'] = trans( 'index.page_note' );
			$arrl = Field::get_all_field();
			foreach($arrl as $k => $v){
				if($v['names'] == ''){
					$arrl[$k]['names'] = '顶级';
				}
				$arrl[$k]['created_at'] = date('Y-m-d H:s:i',$v['created_at']);
				if($v['updated_at'] == ''){
					$arrl[$k]['updated_at'] = '暂无更新时间';
				}else{
					$arrl[$k]['updated_at'] = date('Y-m-d H:s:i',$v['updated_at']);
				}
			}
			$arr['code'] = 0;
			$arr['msg'] = 'ok';
			$arr['data'] = $arrl;
			$arr['count'] = count($arrl);
			$data1 = json_encode($arr,JSON_UNESCAPED_UNICODE);
			$file = fopen('./fieldinfo/json/data.json','w');
			fwrite($file,$data1);
			$data['ids'] = $perid;
			return view('Admin.Field.Field.index') -> with($data);
		}

	/**
	 *
	 * 新增页面
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
		public function create(){
    	$arr = Field::get_all_field();
			$id = 0;
			$level = 0;
			$data = json_encode(wuxian($arr,$id,$level),JSON_UNESCAPED_UNICODE);
			$file = fopen('./data/data3.json','w');
			fwrite($file,$data);
    	return view('Admin.Field.Field.create');
		}

	/**
	 * 字段信息新增数据库
	 *
	 * @param Request $query
	 *
	 * @return array
	 */
		public function store(Request $query){
			$validator = Validator::make($query ->all(),[
				'name'  => 'max:20|min:2'
			]);

			if($validator -> errors() -> get('name')){
				return [
					'code'  => config('myconfig.field.name_code'),
					'msg'   => config('myconfig.field.name_msg')
				];
			}
			$data['name'] = $query -> input('name');
			$data['parent_field_id'] = $query -> input('parent_field_id');
			$data['created_at'] = time();
			$data['pathlist'] = $query -> input('pathlist');
			$store = Field::store_field($data);

			if($store){
				return [
					'code'  => config('myconfig.field.field_success_store_code'),
					'msg'   => config('myconfig.field.field_success_store_msg')
				];
			}else{
				return [
					'code'  => config('myconfig.field.field_error_store_code'),
					'msg'   => config('myconfig.field.field_error_store_msg')
				];
			}
		}

		//修改页面展示
		public function edit($field_id){
			$arr = Field::get_all_field();
			$id = 0;
			$level = 0;
			$data = json_encode(wuxian($arr,$id,$level),JSON_UNESCAPED_UNICODE);
			$file = fopen('./data/data3.json','w');
			fwrite($file,$data);
			$data1['field'] = Field::get_d_field($field_id);
			if($data1['field'] -> names == ''){
				$data1['field'] -> names = '--请选择--';
			}
			return view('Admin.Field.Field.edit') -> with($data1);
		}


		//字段更新更新
		public function update(Request $query){
			$validator = Validator::make($query ->all(),[
				'name'  => 'max:20|min:2'
			]);

			if($validator -> errors() -> get('name')){
				return [
					'code'  => config('myconfig.field.name_code'),
					'msg'   => config('myconfig.field.name_msg')
				];
			}

			$field_id = $query -> input('field_id');

			$data['name'] = $query -> input('name');
			$data['parent_field_id'] = $query -> input('parent_field_id');
			$data['updated_at'] = time();
			$data['pathlist'] = $query -> input('pathlist');

			$update = Field::update_field($field_id,$data);

			if($update){
				return [
					'code'  => config('myconfig.field.field_success_update_code'),
					'msg'   => config('myconfig.field.field_success_update_msg')
				];
			}else{
				return [
					'code'  => config('myconfig.field.field_error_update_code'),
					'msg'   => config('myconfig.field.field_error_update_msg')
				];
			}
		}

		//删除字段信息数局
		public function destroy(Request $query){
			$field_id = $query -> input('field_id');

			//先查询此数据下有无下级数据
			$subclass = Field::get_all_sub($field_id);

			if($subclass != 0){
				return [
					'code'   => config('myconfig.field.subclass_code'),
					'msg'    => config('myconfig.field.subclass_msg')
				];
			}else{
				$delete = Field::delete_field($field_id);
				if($delete){
					return [
						'code'     => config('myconfig.field.delete_success_field_code'),
						'msg'      => config('myconfig.field.delete_success_field_msg')
					];
				}else{
					return [
						'code'      => config('myconfig.field.delete_error_field_code'),
						'msg'       => config('myconfig.field.delete_error_field_msg')
					];
				}
			}


		}
}
