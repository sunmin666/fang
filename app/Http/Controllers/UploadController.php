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
		$a = "uploads/".$month."/".$file["name"];
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


	public function upload(Request $request){
		if($_FILES)
		{
			$car_files = $_FILES;
			//var_dump($car_files); exit;
			$file_size = $car_files['car_image']['size'];              //文件大小(数组)
			$file_name = $car_files['car_image']['name'];              //文件新名称
			$file_type = $car_files['car_image']['type'];              //文件的类型
			//echo $file_type;
			$file_tmp_name = $car_files['car_image']['tmp_name'];      //上传文件的临时路径
			//var_dump($file_tmp_name); exit;
			//保存图片
			$allow_file_type = array('image/jpeg', 'image/jpg', 'image/png');  //允许上传的类型
			$str = "";
			//echo $str;exit;
			//var_dump(coun);

				if($file_size < 2*1024*1024)
				{
					if(in_array($file_type, $allow_file_type))
					{
						$file_name_arr = explode(".",$file_name);
						$ext = end($file_name_arr);
						$new_name = date("Ymds").rand(10000,99999).'.'.$ext;
						$str = $new_name;
						move_uploaded_file($file_tmp_name, './uploads/' . iconv('UTF-8', 'UTF-8', $new_name));
					}else
					{
						return [
							'code'  => 123,
							'msg'   => '图片类型不允许上传'
						];
					}
				}else
				{
					return [
						'code'   => 465,
						'msg'    => '图片大小超出范围',
					];
				}
			return [
				'code'  => 789,
				'msg'   => '上传成功',
				'data'  => $str
			];
		}
	}

//	public function ssss(){
//		return 132;
//	}


	//上传视频
	public function videos(){


		if($_FILES)
		{
			$car_files = $_FILES;
			//var_dump($car_files); exit;
			$file_size = $car_files['car_image']['size'];              //文件大小(数组)
			$file_name = $car_files['car_image']['name'];              //文件新名称
			$file_type = $car_files['car_image']['type'];              //文件的类型
			//echo $file_type;
			$file_tmp_name = $car_files['car_image']['tmp_name'];      //上传文件的临时路径
			//var_dump($file_tmp_name); exit;
			//保存图片
			$allow_file_type = array('video/mp4');  //允许上传的类型
			$str = "";
			if($file_size < 200*1024*1024)
			{
				if(in_array($file_type, $allow_file_type))
				{
					$file_name_arr = explode(".",$file_name);
					$ext = end($file_name_arr);
					$new_name = date("Ymds").rand(10000,99999).'.'.$ext;
					$str = $new_name;
					move_uploaded_file($file_tmp_name, './uploads/shipin/' . iconv('UTF-8', 'UTF-8', $new_name));
				}else
				{
					return [
						'code'  => 123,
						'msg'   => '视频类型不允许'
					];
				}
			}else
			{
				return [
					'code'   => 465,
					'msg'    => '视频大小超出范围',
				];
			}
			return [
				'code'  => 789,
				'msg'   => '上传成功',
				'data'  => $str
			];
		}
	}


}
