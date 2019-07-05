$( document ).ready( function () {
		layui.use( 'laydate' , function () {
				layui.use( 'laydate' , function () {
						$( ".layui-input" ).each( function () {
								var laydate = layui.laydate;
								laydate.render( {
										elem : this , //指定元素  表示当前的元素
										showBottom : false ,
										lang : 'cn' ,//语言类型：String，默认值：cn--内置了两种语言版本：cn（中文版）、en（国际版，即英文版）
										theme : '#4476A7'//主题-类型：String，默认值：default，theme的可选值有：default（默认简约）、molv（墨绿背景）、#ff2d56颜色值（自定义颜色背景）、grid（格子主题）
								} );
						} );
				} );
		} );
} );
