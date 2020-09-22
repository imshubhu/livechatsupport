$(document).ready(function(){

	$('.chatHeader').click(function(){
		$('.chatArea').toggle();
	});

	$('#start').click(function(e){
		e.preventDefault();

		var name = $('#name').val();
		var email = $('#email').val();

		if (name == '' || email == '') {
			alert("Both fields are required....!");
		}
		else{
			$.ajax({
				url: 'registerUser.php',
				method: 'POST',
				data: $('#registerForm').serialize(),
				success: function(data){
					$('#user').html('');
					$('#registerForm').fadeOut();
					$('.chat').fadeIn();
					$('#user').append(data);
					loadUser();
				}
			});
		}
	});

	$('#send').click(function(e){
		e.preventDefault();

		var user_id = $('#user_id').val();
		var message = $('#message').val();

		if (message == '' ) {
			alert("Messgae is required....!");
		}
		else{
			$.ajax({
				url: 'insertChat.php',
				method: 'POST',
				data: $('#chatFrom').serialize(),
				success: function(data){
					if (data == 1) {
						$('#chatFrom')[0].reset();
						loadChat();
					}
					else{
						alert("Messgae not send...");
					}
				}
			});
		}
	});

	function loadUser(){

		$.ajax({
			url: 'loadUser.php',
			method: 'GET',
			data: 'html',
			success: function(data){
				$('#user').append(data);
			}
		});
	}
	loadUser();

	function loadChat(){

		$.ajax({
			url: 'loadChat.php',
			method: 'GET',
			data: 'html',
			success: function(data){

				loadUser();
				$('#loadChat').html(data);
			}
		});
	}
	loadChat();

	setInterval(function(){ loadChat(); }, 5000);
	
});