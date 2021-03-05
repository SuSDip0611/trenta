
var treanta = {
	EventCalling:function(){
		$('#isLoggedin').on('click', function(e) {
			e.preventDefault();
			// console.log('baseUrl', baseUrl); return;
			var email = $('#email').val();
			var password = $('#password').val();

			var formData = {
				email : email,
				password : password,
			}

			$.ajax({
                type: "POST",
                dataType : "json",
                url :baseUrl + "logedIn",
                data: formData,
                success: function(response){

                	console.log('response', response.status);
                    if(response.status == true){
                        swal({
                            title: 'TRENTA',
                            text: response.msg,
                            icon: 'success'
                        }).then(function () {
                        	window.location.href = baseUrl + "admin/dashboard";
                        });
                    }else{
                        swal({
                            title: 'TRENTA',
                            text: response.msg,
                            icon: 'error'
                        }).then(function () {
                            
                        });
                    }
                },
                error: function(error){

                    console.log('error', error);
                }
            });

		})
	},
	init : function(){
        treanta.EventCalling();
    }
}
$(document).ready(function(){
	treanta.init();
});