var ALERT_TITLE = "";
var ALERT_BUTTON_TEXT = "Ok";

if(document.getElementById) {
    window.alert = function(txt) {
        createCustomAlert(txt);
    }
}

function createCustomAlert(txt) {
    d = document;
	txt = txt.replace(/\n/g,'<br>');
    if(d.getElementById("modalContainer")) return;
    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
    mObj.style.height = d.documentElement.scrollHeight + "px";

    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";
    if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
    alertObj.style.left = "30%";
    alertObj.style.visiblity="visible";
	
	tmpDivObj = alertObj.appendChild(d.createElement("div"));
	tmpDivObj.innerHTML = '! ';
	tmpDivObj.style.borderBottom = '2px solid #FF9900';
	tmpDivObj.style.backgroundColor = '#FF9900';
	tmpDivObj.style.color = '#FFFFFF';
	
	tmpDivObj = alertObj.appendChild(d.createElement("div"));
	tmpSpan = tmpDivObj.appendChild(d.createElement("div")); 
	tmpSpan.style.width = '20%';
	tmpSpan.style.float = 'left';
	tmpimg = tmpSpan.appendChild(d.createElement("img"));
	tmpimg.src = "/img/11.png";
	tmpimg.style.width = "100%";
	tmpimg.style.padding = "5px";
	tmpSpan = tmpDivObj.appendChild(d.createElement("div")); 
	tmpSpan.style.width = '80%';
	tmpSpan.style.display = 'inline-block';
	
    msg = tmpSpan.appendChild(d.createElement("p"));
	
    msg.innerHTML = txt;
	tmpDivObj = alertObj.appendChild(d.createElement("div"));
	tmpDivObj.style.textAlign = 'right';
    btn = tmpDivObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = "#";
    btn.focus();
    btn.onclick = function() { removeCustomAlert(); return false; }

    alertObj.style.display = "block";

}

function removeCustomAlert() {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}
 <!-- alert変更するため修正した部分　end -->
 <!------------------------------------------------------------------------------------------------------------------->
 <!-- confirm変更するため修正した部分　start -->
var confirm_TITLE = "";
var confirm_BUTTON_TEXT = "OK";
var confirm_BUTTON_TEXT2 = "キャンセル";
var confirm = false;

if(document.getElementById) {
    window.confirm = function(txt, url, checkId){
		d = document;
		txt = txt.replace(/\n/g,'<br>');
		if(d.getElementById("modalContainer2")) return;
		//ret = false;
		mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
		mObj.id = "modalContainer2";
		mObj.style.height = d.documentElement.scrollHeight + "px";
	
		confirmObj = mObj.appendChild(d.createElement("div"));
		confirmObj.id = "confirmBox2";
		if(d.all && !window.opera) confirmObj.style.top = document.documentElement.scrollTop + "px";
		confirmObj.style.left = "30%";
		confirmObj.style.visiblity="visible";
		
		tmpDivObj = confirmObj.appendChild(d.createElement("div"));
		tmpDivObj.innerHTML = '!';
		tmpDivObj.style.borderBottom = '2px solid #FF9900';
		tmpDivObj.style.backgroundColor = '#FF9900';
		tmpDivObj.style.color = '#FFFFFF';
		
		tmpDivObj = confirmObj.appendChild(d.createElement("div"));
		tmp1Span = tmpDivObj.appendChild(d.createElement("div")); 
		tmp1Span.style.width = '20%';
		tmp1Span.style.float = 'left';
		tmpimg = tmp1Span.appendChild(d.createElement("img"));
		tmpimg.src = "/img/11.png";
		tmpimg.style.width = "100%";
		tmpimg.style.padding = "5px";
		tmp1Span = tmpDivObj.appendChild(d.createElement("div")); 
		tmp1Span.style.width = '80%';
		tmp1Span.style.display = 'inline-block';
		msg = tmp1Span.appendChild(d.createElement("p"));
		msg.innerHTML = txt;
		
		tmpDivObj = confirmObj.appendChild(d.createElement("div"));
		tmpDivObj.style.textAlign = 'right';
	
		btn1 = tmpDivObj.appendChild(d.createElement("a"));
		btn1.id = "closeBtncno";
		btn1.appendChild(d.createTextNode(confirm_BUTTON_TEXT));
		btn1.href = "#";
		btn1.focus();
		if(checkId != ""){
			$('#'+checkId).val('sn');
		}
		btn1.onclick = function() { removeCustomconfirm(); if(url == 'submit'){$('form').submit();}else{location.href = url;} }
		btn2 = tmpDivObj.appendChild(d.createElement("a"));
		btn2.id = "closeBtncyes";
		btn2.appendChild(d.createTextNode(confirm_BUTTON_TEXT2));
		btn2.href = "#";
		btn2.focus();
		btn2.onclick = function() { removeCustomconfirm(); $('input').attr('disabled',false); return false;  }
		confirmObj.style.display = "block";
	};
}

function removeCustomconfirm() {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer2"));
}
