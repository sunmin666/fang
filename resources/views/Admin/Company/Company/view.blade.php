<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		div{
			margin-bottom: 10px;
		}
		span{
			display:inline-block;
			width: 50%;
			text-align: right;
			padding-right: 10px;
		}
	</style>
</head>
<body>
		<div><span>公司中文名称：</span>{{$company -> comp_cname}}</div>
		<div><span>公司英文名称：</span>{{$company -> comp_ename}}</div>
		<div><span>公司法人代表信息：</span>{{$company -> corporation}}</div>
		<div><span>公司法人身份证信息：</span>{{$company -> corp_idcard}}</div>
		<div><span>公司法人代表手机号：</span>{{$company -> corp_mobile}}</div>
		<div><span>公司营业执照图片：</span><a href="{{$company-> license}}" target="_blank">点击查看</a></div>
		<div><span>公司/企业社会信用码：</span>{{$company -> credit_code}}</div>
		<div><span>公司注册地址：</span>{{$company -> address}}</div>
		<div><span>公司座机：</span>{{$company -> telphone}}</div>
		<div><span>公司类型：</span>
			@if($company -> comp_type == 1)
				个人独资
			@elseif($company -> comp_type == 2)
				合伙企业
			@elseif($company -> comp_type == 3)
				有限责任公司
			@elseif($company -> comp_type == 4)
				股份制公司
			@elseif($company -> comp_type == 5)
				集团公司
			@elseif($company -> comp_type == 6)
				一人制公司
			@endif
		</div>
		<div><span>公司注册资金：</span>{{$company -> reg_capital}}万</div>
		<div><span>使用iHOUSER联系人信息：</span>{{$company -> contacts}}</div>
		<div><span>使用iHOUSER联系人手机号：</span>{{$company -> cont_mobile}}</div>
		<div><span>使用iHOUSER联系人身份证信息：</span>{{$company -> cont_idcard}}</div>
		<div><span>公司注册日期：</span>{{date('Y-m-d',$company-> created_date)}}</div>
		<div><span>公司营业开始时间：</span>{{date('Y-m-d',$company -> business_date)}}</div>
		<div><span>公司营业结束时间：</span>{{date('Y-m-d',$company -> expire_date)}}</div>
		<div><span>公司在iHOUSER注册日期：</span>{{date('Y-m-d H:i',$company -> created_at)}}</div>
		<div><span>公司在iHOUSER修改日期：</span>{{date('Y-m-d H:i',$company -> updated_at)}}</div>
</body>
</html>