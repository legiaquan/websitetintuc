function loginAjax(){
	var username = $('#login_username').val();
	var password = $('#login_password').val();
	if(username == ""){
		$('#username-error').html('<font color="red"><b><i>Vui lòng nhập tên tài khoản</i><b></font>').show().fadeOut(3000);
	}
	else if(password == ""){
		$('#password-error').html('<font color="red"><b><i>Vui lòng nhập mật khẩu</i><b></font>').show().fadeOut(3000);
	}else{
		$.ajax({
			url: 		'login',
			method : 	'POST',
			data : 		{
				'username' : username,
				'password' : password,
			},
			success: function(data){
				var notice = JSON.parse(data);
				if(notice.error){
					$('#error').html('<font color="red"><b><i>'+notice.error+'</i><b></font>').show().fadeOut(6000);
				}else{
					window.location.reload();
				}
			}
		});
	}}