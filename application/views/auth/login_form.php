<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<base href="<?php echo base_url();?>">
    <meta charset="utf-8" />
    <title>Quang Nguyen Phu's site</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/style/images/favicon.png" />
    <link href="assets/style/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/style/css/settings.css" rel="stylesheet" />
    <link href="assets/style/js/google-code-prettify/prettify.css" rel="stylesheet" />
    <link href="assets/style.css" rel="stylesheet" />
    <link href="assets/style/css/color/green.css" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />
    <link href="assets/style/type/fontello.css" rel="stylesheet" />

    <link href="assets/style/css/timeline.css" rel="stylesheet" />
    <link href="assets/style/css/parallax.css" rel="stylesheet" />
 
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="assets/style/css/ie8.css" media="all" />
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="assets/style/js/html5shiv.js"></script>
    <![endif]-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body data-spy="scroll" data-target=".nav-collapse" data-offset="100">
    <div class="body-wrapper">
	    <?php
		    $login = array(
		    	'name'  => 'login',
		    	'id'  => 'login',
		    	'value' => set_value('login'),
		    	'maxlength' => 80,
		    	'size'  => 30,
		    );
		    if ($login_by_username AND $login_by_email) {
		    	$login_label = 'Email or login';
		    } else if ($login_by_username) {
		    	$login_label = 'Login';
		    } else {
		    	$login_label = 'Email';
		    }
		    $password = array(
		    	'name'  => 'password',
		    	'id'  => 'password',
		    	'size'  => 30,
		    );
		    $remember = array(
		    	'name'  => 'remember',
		    	'id'  => 'remember',
		    	'value' => 1,
		    	'checked' => set_value('remember'),
		    	'style' => 'margin:0;padding:0',
		    );
		    $captcha = array(
		    	'name'  => 'captcha',
		    	'id'  => 'captcha',
		    	'maxlength' => 8,
		    );
		?>
		<!-- ======================================== HEADER ========================================-->
		<div id="header" class="navbar navbar-fixed-top">
			<div class="navbar-inner">
			  <div class="container"> <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".nav-collapse"><i class='icon-menu-1'></i></a> <a class="brand" href="#"><img src="assets/style/images/logo.png" alt="" /></a>
			    <div class="nav-collapse pull-right collapse">
			      <ul class="nav">
			        <li><a href="#home">Home</a></li>
			        <li class="dropdown"> <a href="#about" class="dropdown-toggle js-activated">About</a>
			        </li>
			        <li class="dropdown"> <a href="#accomplishment" class="dropdown-toggle js-activated">Resume</a>
			          <ul class="dropdown-menu">
			           <li><a href="#accomplishment">Accomplishment</a></li>
			            <li><a href="#skill-set">Skills set</a></li>
			            <li><a href="#projects">Projects</a></li>
			          </ul>
			        </li>
			        <li><a href="#blog">Blog</a></li>
			        <li><a href="#contact">Contact</a></li>
			      
			       	<?php if($this->tank_auth->is_logged_in()) { ?>
			        <li class="dropdown"> <a href="#" class="dropdown-toggle js-activated">Admin - <?php echo $this->tank_auth->get_username()?></a>
			          <ul class="dropdown-menu">
			            <li><a href="index.php/admin_project/view_project_list">Project</a></li>
			            <li><a href="index.php/admin_blog/view_blog_list">Blog</a></li>
			            <li><a href="index.php/admin_category/view_category_list">Category</a></li>
			            <li><a href="index.php/auth/logout">Logout</a></li>
			          </ul>
			        </li>
			        <?php }?>
			      </ul>
			    </div>
			  </div>
			</div>
   		</div>

   		<!-- ======================================== CONTENT ========================================-->
   		<div class="myself-content">
			<div class="light-wrapper offset">
			  	<div class="section-head">
			    	<div class="container">
			      		<h1>Login</h1>
			    	</div>
			  	</div>

			  	<div id="bodyLogin" style=" background-color: #444; background: url(assets/style/images/art/pick8_1.jpg);">
			    	<div class="container">
			      		<div class="row vertical-offset-100">
			        		<div class="col-md-4 col-md-offset-4">
			          			<div class="panel panel-default">
			            			<div class="panel-heading">                                
			              				<div class="row-fluid user-row">
			                				<img src="assets/style/images/art/NPQ.png" class="img-responsive" alt="Conxole Admin"/>
			              				</div>
			            			</div>
			            			<div class="panel-body">
			              				<form accept-charset="UTF-8" role="form" class="form-signin" action="<?php echo base_url('auth/login'); ?>" method="post">
			                				<fieldset>
							                  	<!-- USERNAME -->
			                  					<label>
			                  						<?php echo form_label($login_label, $login['id']); ?>
			                  					</label>
			                  					<?php echo form_input($login); ?>
			                  					<label style="color: red;">
			                  						<?php echo form_error($login['name']); ?>
			                  						<?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
			                  					</label>

			                  					<!-- PASSWORD -->
			                  					<label>
			                  						<?php echo form_label('Password', $password['id']); ?>
			                  					</label>
			                  					<?php echo form_password($password); ?>
			                  					<label style="color: red;">
			                  						<?php echo form_error($password['name']); ?>
			                  						<?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
			                  					</label>
			                  					
			                  					<div></div>
			                  					<?php 
			                  					if ($show_captcha) 
			                  					{
			                    					if ($use_recaptcha) { ?>
									                    <table>
									                      	<tr>
									                        	<td colspan="2">
									                          		<div id="recaptcha_image"></div>
									                        	</td>
									                        	<td>
									                          		<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
									                          		<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
									                          		<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
									                        	</td>
									                      	</tr>
									                      	<tr>
									                        	<td>
									                          		<div class="recaptcha_only_if_image">Enter the words above</div>
									                          		<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
									                        	</td>
									                        	<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
									                        	<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
									                        	<?php echo $recaptcha_html; ?>
									                      	</tr>
									                    	<?php } else { ?>
									                      	<tr>
									                        	<td colspan="3">
									                          		<p>Enter the code exactly as it appears:</p>
									                          		<?php echo $captcha_html; ?>
									                        	</td>
									                      	</tr>
									                      	<tr>
									                        	<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
									                        	<td><?php echo form_input($captcha); ?></td>
									                        	<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
									                      	</tr>
									                    </table>
									                    	<?php }
			                  					} ?>
			                  					<center>
				                  					<table>
														<tr>
															<td><?php echo form_checkbox($remember);?></td>
															<td><?php echo form_label('Remember me', $remember['id']); ?></td>
															<td></td>
														</tr>
													</table>
			                  					</center>
			                  					<input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »">
			                				</fieldset>
			              				</form>
			            			</div>
			          			</div>
			        		</div>
			      		</div>
			    	</div>
			  	</div>
		 	</div>
		</div>

		<!-- ======================================== FOOTER ========================================-->
		<footer class="light-wrapper text-center">
    		<?php $this->load->view("layout/footer"); ?>
    	</footer>
    </div>   

    <!-- Placed js at the end of the document so the pages load faster -->
    <!--Core js-->
    <!--/.body-wrapper--> 
    <script src="assets/style/js/jquery.js"></script> 
    <script src="assets/style/js/bootstrap.min.js"></script> 
    <script src="assets/style/js/twitter-bootstrap-hover-dropdown.min.js"></script> 
    <script src="assets/style/js/jquery.themepunch.plugins.min.js"></script> 
    <script src="assets/style/js/jquery.themepunch.revolution.min.js"></script> 
    <script src="assets/style/js/jquery.themepunch.showbizpro.min.js"></script> 
    <script src="assets/style/js/jquery.fitvids.js"></script> 
    <script src="assets/style/js/jquery.slickforms.js"></script> 
    <script src="assets/style/js/jquery.isotope.min.js"></script> 
    <script src="assets/style/js/google-code-prettify/prettify.js"></script> 
    <script src="assets/style/js/jquery.easytabs.min.js"></script> 
    <script src="assets/style/js/jquery.jribbble-0.11.0.ugly.js"></script> 
    <script src="assets/style/js/view.min.js?auto"></script> 
    <script src="assets/style/js/scripts.js"></script>
    <script type="text/javascript" src="assets/js/TweenLite.min.js"></script>
  	<script type="text/javascript" src="assets/js/parallax.js"></script>
</body>
</html>