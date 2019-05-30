
function like(type, user_id, topic_id, token, element){/*1: Topics 2:coments*/
	var formData = new FormData();
	var URLproto = window.location.protocol;
	console.log(element);
	var URLdomain = window.location.host;
	console.log(URLdomain);
	var path = URLproto+URLdomain;
	console.log(path);
	formData.append("user_id", user_id);	
	formData.append("id", topic_id);	
	console.log(element.firstChild.id);
	var xhr = new XMLHttpRequest();
	if(element.firstChild.id == 'like'){
		if(type==1){
			xhr.open("POST", "/sayit/public/likesTopics")
		}else if(type==2){
			xhr.open("POST", "/sayit/public/likesComents")
		}
		element.firstChild.id = 'withlike';
	}else{
		if(type==1){
			xhr.open("POST", "/sayit/public/likesTopicsErase")
		}else if(type==2){
			xhr.open("POST", "/sayit/public/likesComentsErase")
		}
		element.firstChild.id = 'like';
	}
	xhr.setRequestHeader("X-CSRF-Token", token);
	xhr.send(formData);
}
