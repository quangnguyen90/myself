<?php /* Smarty version Smarty-3.1.18, created on 2015-11-07 15:18:46
         compiled from "application\views\admin_project\admin_view_project_index.php" */ ?>
<?php /*%%SmartyHeaderCode:10354563db3e6a29972-36107236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33084ac7f10fbaea5f27e5f463b030bd372f20d7' => 
    array (
      0 => 'application\\views\\admin_project\\admin_view_project_index.php',
      1 => 1423812015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10354563db3e6a29972-36107236',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'keyword' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563db3e6a38810_23375882',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563db3e6a38810_23375882')) {function content_563db3e6a38810_23375882($_smarty_tpl) {?><div class="light-wrapper offset">
	<div class="section-head">
	  <div class="container">
	    <h1>Project Management</h1>
	  </div>
	  <!-- /.container --> 
	</div>
	<!-- /.section-head -->
	<div class="container inner">
	  	<fieldset>
		  	<div class="row">
		    	<div class="span4">
		      		<ul class="bullet">
						<a  href="index.php/admin_project/show_form_to_create_project" class="btn btn-blue" id="create_project_button"> <i class="icon-plus-sign"></i>New Project</a>
		      		</ul>
		    	</div>
		    	<!-- /.span4 -->
		    	<div class="span8">
		      		<ul class="bullet">
						<input type="text" name="keyword" id="search-project-text" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" placeholder="Search project">
		      		</ul>
		    	</div>
		    	<!-- /.span4 --> 
		  	</div>
		  	<legend>Project List</legend>
		  	<div class="row">
		  		<div class="span12" id ="project_list_show">
		  			<?php echo $_smarty_tpl->getSubTemplate ("admin_project/admin_view_list_project_form.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

		  		</div>
		  	</div>
	  	</fieldset>
	</div>
</div>
<!-- /.container --> 
<?php }} ?>
