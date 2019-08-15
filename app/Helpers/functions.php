<?php

	function wuxian($arr,$id,$level){
		$list =array();
		foreach ($arr as $k=>$v){
			if ($v["parent_field_id"] == $id){
				$v["level"]=$level;
				$v["id"] = $v["field_id"];
				$v["children"] = wuxian($arr,$v["field_id"],$level+1);
				if( count($v["children"]) == 0 ){
					unset($v['children']);
				}
				$v['checked'] = true;
				$list[] = $v;
			}
		}
		return $list;
	}