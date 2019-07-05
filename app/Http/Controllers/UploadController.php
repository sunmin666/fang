<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{

	/**
	 * summernote编辑器上传图片
	 *
	 * @param Request $request
	 *
	 * @return int|string
	 */
	public function mupload( Request $request )
	{
		$file = $_FILES["file"];
		$month = date('Ymd',time());
		$dir = "./uploads/".$month."/";

		if(!is_dir($dir))//判断目录是否存在
		{
			mkdir ($dir,0777,true);//如果目录不存在则创建目录
		};
		$res = move_uploaded_file($file["tmp_name"],$dir. $file["name"]);
		if($res){
			return "/fang/public/uploads/".$month."/".$file["name"];
			//			return "/uploads/".$month."/".$file["name"];
		}else{
			return 2; //上传失败
		}
	}

	/**
	 *
	 * layui上传图片
	 *
	 * @param Request $request
	 *
	 * @return array
	 */
	public function lupload( Request $request )
	{
		$file = $_FILES["file"];
		$month = date('Ymd',time());
		$dir = "./uploads/".$month."/";
		$a = "/fang/public/uploads/".$month."/".$file["name"];
		//		$a = "/uploads/".$month."/".$file["name"];
		$arr = array(
			'code' => 1,
			'msg'=> '',
			'data' =>array(
				'src' => $a
			),
		);
		if(!is_dir($dir))//判断目录是否存在
		{
			mkdir ($dir,0777,true);//如果目录不存在则创建目录
		};
		$res = move_uploaded_file($file["tmp_name"],$dir. $file["name"]);
		if($res){
			$arr['msg'] = '上傳成功';
		}else{
			$arr['code'] = 2;
			$arr['msg'] = '上傳失敗';
			$arr['data']['src'] = '';
		}
		return $arr;
	}



}
