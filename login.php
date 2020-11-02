<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bootstrap 4 Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-6 offset-md-3">
					<form class="a_form">
						<div class="form-group">
							<label for="email">Email address:</label>
							<input type="email" class="form-control form-control-sm" placeholder="Enter email" id="email">
						</div>
						<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control form-control-sm" placeholder="Enter password" id="pwd">
						</div>
						<div class="form-group form-check">
							<label class="form-check-label">
							<input class="form-check-input" type="checkbox"> Remember me
							</label>
						</div>
						<button type="submit" class="btn btn-sm btn-success">Submit</button>
					</form>
				</div>
			</div>
			<?php
				//echo $_SERVER['HTTP_HOST'];
				//echo $_SERVER['SERVER_NAME'];
			?>
			
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script>
			//1.Check if the page is loaded successfully
			jQuery(function($){
				//alert('ok1');
				//$(selector).action();
				$('.a_form').submit(function(e){
					//alert('okkk');
					e.preventDefault();
					//alert ('In form alert');
					var email = $('#email').val();
					let pwd = $('#pwd').val();
					//alert(email);
					//alert(pwd);
					//$ajax({name:value, name:value, ...})
					$.ajax({
						url:'http://localhost/mahima/login_ajax/ajax.php',
						data:{
							action:'login',
							eml:email,
							pw:pwd
						},
						success:function(result,status,xhr){
							console.log(result);
							
							//JSON String -> JS Object
							
							result = JSON.parse(result);
							
							console.log(result);
							
							
							if(result.status == 200){
								//alert('Welcome');
								//window.load('dashboard.php');
								window.location ="http://<?php echo $_SERVER['HTTP_HOST'];?>/mahima/login_ajax/dashboard.php";
							}else{
								//alert('Invalid Credentials');
								swal({
									title: "Are you sure?",
									text: "Once deleted, you will not be able to recover this imaginary file!",
									icon: "warning",
									buttons: true,
									dangerMode: true,
								})
								.then((willDelete) => {
									if (willDelete) {
										
										$('#email').focus();
									} else {
										
										//swal("Your imaginary file is safe!");
									}
								});

							}
						}
					});
				});
			});
			
			/*
			$(document).ready(function(){
				alert('ok2');
			});
			(function)(){
				alert('ok3');
			}) (jQuery);
			*/
		
		</script>
	</body>
</html>