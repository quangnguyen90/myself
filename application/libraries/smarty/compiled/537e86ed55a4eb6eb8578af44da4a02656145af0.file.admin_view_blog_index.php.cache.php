<?php /* Smarty version Smarty-3.1.18, created on 2015-05-01 21:00:25
         compiled from "application\views\admin_blog\admin_view_blog_index.php" */ ?>
<?php /*%%SmartyHeaderCode:6581554386f98534c1-12085271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '537e86ed55a4eb6eb8578af44da4a02656145af0' => 
    array (
      0 => 'application\\views\\admin_blog\\admin_view_blog_index.php',
      1 => 1423882055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6581554386f98534c1-12085271',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'keyword' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_554386f989b3d3_46651909',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554386f989b3d3_46651909')) {function content_554386f989b3d3_46651909($_smarty_tpl) {?><div class="light-wrapper offset">
	<div class="section-head">
	  <div class="container">
	    <h1>Blog Management</h1>
	  </div>
	  <!-- /.container --> 
	</div>
	<!-- /.section-head -->
	<div class="container inner">
	  	<fieldset>
		  	<div class="row">
		    	<div class="span4">
		      		<ul class="bullet">
						<a  href="index.php/admin_blog/show_form_to_create_blog" class="btn btn-blue" id="create_blog_button"> <i class="icon-plus-sign"></i>New Blog</a>
		      		</ul>
		    	</div>
		    	<!-- /.span4 -->
		    	<div class="span8">
		      		<ul class="bullet">
						<input type="text" name="keyword" id="search-blog-text" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" placeholder="Search blog">
		      		</ul>
		    	</div>
		    	<!-- /.span4 --> 
		  	</div>
		  	<legend>Blog List</legend>
		  	<div class="row">
		  		<div class="span12" id ="blog_list_show">
		  			<?php echo $_smarty_tpl->getSubTemplate ("admin_blog/admin_view_list_blog_form.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

		  		</div>
		  	</div>
	  	</fieldset>
	</div>
</div>
<!-- /.container --> 
<?php }} ?>
