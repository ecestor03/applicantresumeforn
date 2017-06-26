<!DOCTYPE html>
<html lang="en">
  <head>
	<!-- 
	Title : Application Form for demo purpose only
	Author :  Edgar Sotero Estor
	Description :  Online application form complete with signature and image capture using bootstrap as fronend
	Created :  Jully 26, 2017
	-->
	<title>Application Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/default.css">

    <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
  </head>
		  <body>
					<div class="container">
							
							<h1>Application Form</h1>
							 <p>This is for demo purpose only</p>
								
							<form name="applicationform"   method="post" action="" >
								 							  
								  <div class="form-group col-sm-12 ">
										   <div class="form-group col-sm-4">
													<label for="text_firstname">First Name: </label>
													<input type="text" name="text_firstname" class="form-control " id="text_firstname" placeholder="First Name" required>
										  </div>
										  <div class="form-group col-sm-4">
													<label for="text_middlename">Middle Name: </label>
													<input type="text" name="text_middlename" class="form-control " id="text_firstname" placeholder="Middle Name" >
													
										  </div>
										  <div class="form-group col-sm-4">
													<label for="text_lastname">Last Name: </label>
													<input type="text" name="text_lastname" class="form-control " id="text_firstname" placeholder="Last Name" required>
										  </div>
								  </div>
								  
								  
								  
								  <div class="form-group col-sm-12 ">
										   <div class="form-group col-sm-4">
													<label for="text_emailadd">Email Address: </label>
													<input type="text" name="text_emailadd" class="form-control " id="text_emailadd" placeholder="email@somewhere.com" required>
										  </div>
										  <div class="form-group col-sm-4">
													<label for="text_phone">Phone: </label>
													<input type="text" name="text_phone" class="form-control " id="text_phone" placeholder="00-000-000" >
													
										  </div>
										  <div class="form-group col-sm-4">
													<label for="text_gender">Gender: </label>
													<div class="selectpicker">
														<select name="gender" class="form-control" >
															<option value="Male">Male</option>
															<option value="Female">Female</option>
															<option value="Not Applicable">Not Applicable</option>
														</select>
													</div>
										  </div>
								  </div>
								  
								   <div class="form-group col-sm-12 ">
										   <div class="form-group col-sm-4">
													<label for="text_unitnumber">Unit Number: </label>
													<input type="text" name="text_unitnumber" class="form-control " id="text_unitnumber" placeholder="Unit 00" required>
										  </div>
										  <div class="form-group col-sm-4">
													<label for="text_streetname">Street Name: </label>
													<input type="text" name="text_streetname" class="form-control " id="text_streetname" placeholder="Some Street / Some St." >
										  </div>
										  
										   <div class="form-group col-sm-4">
													<label for="text_postcode">Postal Code: </label>
													<input type="text" name="text_postcode" class="form-control " id="text_postcode" placeholder="17000" >
										  </div> 
										  
										  <div class="form-group col-sm-4">
													<label for="text_country">Country: </label>
													<select class="input-medium bfh-countries form-control" name="text_country" id="text_country"  data-country="US"></select>
										  </div> 
								  </div>
								  
								  
								   <div class="form-group col-sm-12 ">
										<div class="form-group col-sm-4 canv">
													<p>Please afix signature below</p>
													<canvas id="canvas">....Canvas is not supported <img id='image' width='65' height='20' /></canvas>
												   <div>______________________________</div>
										</div> 
								</div>
								  
								  
								  
								  
								   <button type="submit" name="submit_dbcredential" class="btn btn-default">Submit</button>
							</form>

					</div>

					<!-- jQuery first, then Tether, then Bootstrap JS. -->
					<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
					<script src="bootstrap_inc/bootstrap-formhelpers-countries.en_US.js"></script>
					<script src="bootstrap_inc/bootstrap-formhelpers-countries.js"></script>
		 
		 
					<script>
					
						

//*********  DRAW SIGNATURE   ************************//
	var isSign = false;
		var leftMButtonDown = false;
		
		jQuery(function(){
			//Initialize sign pad
			init_Sign_Canvas();
		});
		
		function init_Sign_Close(){
			document.getElementById("myModal").style.display = "none";
		}
		
		function fun_submit() {
			if(isSign) {
				var canvas = $("#canvas").get(0);
				var imgData = canvas.toDataURL();
				
				jQuery('#signed').find('p').remove();
				jQuery('#signed').find('img').remove();
				
				jQuery('#signaturedata').find('img').remove();
				//jQuery('#signed').append(jQuery('<p>I affixed my signature below:</p>'));
				jQuery('#signaturedata').append($('<img/>').attr('src',imgData));
				
				//alert('im here');
				
				jQuery('#signature').append(imgData);
				jQuery('#signed').append(imgData);
				$('#signature').val(imgData);
				document.getElementById('signin').style.display = "none";
				init_Sign_Canvas();
				document.getElementById("signatureblock").style.display = "block";
				//signaturedata
				
				//document.getElementById("myModal").style.display = "none";
				//closePopUp();
				//alert('Signed');
			} else {
				$("#result").html('Please Sign!'); 
				document.getElementById("myModal").style.display = "block";
				//alert('Please sign');
			}
		}
		
		function closePopUp() {
			jQuery('#divPopUpSignContract').popup('close');
			jQuery('#divPopUpSignContract').popup('close');
		}
		
		function init_Sign_Canvas() {
			//alert(isSign);
			//alert('jjjjk');
			isSign = false;
			leftMButtonDown = false;
			
			//Set Canvas width
			var sizedWindowWidth = $(window).width();
			if(sizedWindowWidth > 700)
				sizedWindowWidth = $(window).width() / 3;
			else if(sizedWindowWidth > 400)
				sizedWindowWidth = sizedWindowWidth - 100;
			else
				sizedWindowWidth = sizedWindowWidth - 50;
			 
			 $("#canvas").width(sizedWindowWidth);
			 $("#canvas").height(150);
			
			
			 var canvas = $("#canvas").get(0);
			
			 canvasContext = canvas.getContext('2d');

			 if(canvasContext)
			 {
				 canvasContext.canvas.width  = sizedWindowWidth;
				 canvasContext.canvas.height = 150;

				 canvasContext.fillStyle = "#fff";
				 canvasContext.fillRect(0,0,sizedWindowWidth,150);
				 
				 canvasContext.moveTo(30,150);
				 //canvasContext.lineTo(sizedWindowWidth-50,150);
				 canvasContext.stroke();
				
				 canvasContext.fillStyle = "#ccc";
				 canvasContext.font="20px Arial";
				 canvasContext.fillText("",0,50);
			 }
			 // Bind Mouse events
			 $(canvas).on('mousedown', function (e) {
				 if(e.which === 1) { 
					 leftMButtonDown = true;
					 canvasContext.fillStyle = "#000";
					 var x = e.pageX - $(e.target).offset().left;
					 var y = e.pageY - $(e.target).offset().top;
					 canvasContext.moveTo(x, y);
				 }
				 e.preventDefault();
				 return false;
			 });
			
			 $(canvas).on('mouseup', function (e) {
				 if(leftMButtonDown && e.which === 1) {
					 leftMButtonDown = false;
					 isSign = true;
				 }
				 e.preventDefault();
				 return false;
			 });
			
			 // draw a line from the last point to this one
			 $(canvas).on('mousemove', function (e) {
				 if(leftMButtonDown == true) {
					 canvasContext.fillStyle = "#000";
					 var x = e.pageX - $(e.target).offset().left;
					 var y = e.pageY - $(e.target).offset().top;
					 canvasContext.lineTo(x,y);
					 canvasContext.stroke();
				 }
				 e.preventDefault();
				 return false;
			 });
			 
			 //bind touch events
			 $(canvas).on('touchstart', function (e) {
				leftMButtonDown = true;
				canvasContext.fillStyle = "#000";
				var t = e.originalEvent.touches[0];
				var x = t.pageX - $(e.target).offset().left;
				var y = t.pageY - $(e.target).offset().top;
				canvasContext.moveTo(x, y);
				
				e.preventDefault();
				return false;
			 });
			 
			 $(canvas).on('touchmove', function (e) {
				canvasContext.fillStyle = "#000";
				var t = e.originalEvent.touches[0];
				var x = t.pageX - $(e.target).offset().left;
				var y = t.pageY - $(e.target).offset().top;
				canvasContext.lineTo(x,y);
				canvasContext.stroke();
				
				e.preventDefault();
				return false;
			 });
			 
			 $(canvas).on('touchend', function (e) {
				if(leftMButtonDown) {
					leftMButtonDown = false;
					isSign = true;
				}
			 
			 });
		}
//*********  SIGNATURE  ************************//
</script>
		 
		 </body>
</html>



