$(document).ready(function(){
	/**
	* SPRAWDZENIE DANYCH DO LOGOWANIA W FORMULARZU LOGOWANIA DO CMS
	**/
	$("#zmcms_users_frm_login button").on('click', function(e){
		var backend_prefix = $('meta[name="backend-prefix"]').attr('content');
			e.preventDefault();e.stopPropagation();
			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
			$.ajax({
					type: 'POST',
					url: "/"+backend_prefix+"/zmcms_backend_user_login",
					data: new FormData(document.getElementById('zmcms_users_frm_login')),
					processData: false,
					contentType: false,
					success: function(data){
						if(data == 'ok'){
							// location.href = "/sdf_sdfsdfs";
							location.href = "/"+backend_prefix+"/account";
						}
						
					},
					statusCode: {
						500: function(xhr) {$('#zmcms_users_frm_login .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');},
						419: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error"><pre>'+xhr.responseText+'</pre></div>');},
						404: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error">Nie znaleziono skryptu</div>');},
						405: function(xhr){$('#zmcms_users_frm_login .msg').html('<div class="msg error">'+xhr.status+'<br>'+xhr.responseText+'</div>');}
					}
				});
		return false;
	});	
});
