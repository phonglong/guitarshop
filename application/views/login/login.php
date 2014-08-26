<!DOCTYPE html>
<!-- saved from url=(0050)http://wbpreview.com/previews/WB0PHMG9K/login.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Perfectum Dashboard - Perfect Bootstrap Admin Template</title>	
	<link  href="<?php  echo base_url();?>admin/css/stylelogin.css" rel="stylesheet" type="text/css">

<body>

		<div id="wrapper">
			<div id="login-box" style="margin:156px auto;">
					<h2  >Login to your account</h2>
					<?php  if (validation_errors()) {?>        
					<div id="welcome_message" class="top_message_error">                
					<?php  echo validation_errors(); ?>        
					</div>        
					<?php  } ?>  
					 <?php  echo form_open('login') ?>
						
							
							<div class="input-prepend" >
								<span class="add-on"><i id="icon-user"></i></span>
								 <?php  echo form_input(array(                                
									'name'=>'username',                                
									'value'=> 'admin',                                
									'size'=>'20',
									'id'=>'username'
								)); ?> 
							</div>
							<div class="clear"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i id="icon-lock"></i></span>
								
								<?php  echo form_password(array(                                
									'name'=>'password',                                
									'value'=>'12345678',                                
									'size'=>'20',
									'class'=>'input-large span10',
									'id'=>'password'
									)
									); ?>    
							</div>
							<div class="clear"></div>
							
							

							<div class="button-login">	
								<button type="submit" class="btn btn-primary"><i class="icon-off-submit "></i> Login</button>
								<button type="reset" class="btn btn-primary"><i class="icon-off" ></i> Reset</button>
							</div>
							<div class="clearfix"></div>		
				<?php  echo form_close(); ?>  
				</div><!--/span-->
			
			
				
				
	</div><!--/.fluid-container-->

</body></html>