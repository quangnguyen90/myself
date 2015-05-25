<?php /* Smarty version Smarty-3.1.18, created on 2015-05-24 19:13:54
         compiled from "application\views\admin_category\admin_view_category_index.php" */ ?>
<?php /*%%SmartyHeaderCode:15902556206d2c8b963-54402372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15ce068acef726fe184a62ac14a0a9eac477ed9a' => 
    array (
      0 => 'application\\views\\admin_category\\admin_view_category_index.php',
      1 => 1427872902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15902556206d2c8b963-54402372',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'keyword' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556206d2c9c754_26358331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556206d2c9c754_26358331')) {function content_556206d2c9c754_26358331($_smarty_tpl) {?><div class="light-wrapper offset">
	<div class="section-head">
	  <div class="container">
	    <h1>Category Management</h1>
	  </div>
	  <!-- /.container --> 
	</div>
	<!-- /.section-head -->
	<div class="container inner">
	  	<fieldset>
		  	<div class="row">
		    	<div class="span4">
		      		<ul class="bullet">
		      			<!-- Uncomment if don't want to show dialog  -->
						<!-- <a  href="index.php/admin_category/show_form_to_create_category" class="btn btn-blue" id="create_category_button"> <i class="icon-plus-sign"></i>New category</a> -->
		      			<a href="#upload-category-form" class="btn btn-blue" data-toggle="modal" id="create_category_button"> <i class="icon-plus-sign"></i>New category</a>
		      		</ul>
		    	</div>
		    	<!-- /.span4 -->
		    	<div class="span8">
		      		<ul class="bullet">
						<input type="text" name="keyword" id="search-category-text" class="form-control"  value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" placeholder="Search category">
		      		</ul>
		    	</div>
		    	<!-- /.span4 --> 
		  	</div>
		  	<legend>Category List</legend>
		  	<div class="row">
		  		<div class="span12" id ="category_list_show">
		  			<?php echo $_smarty_tpl->getSubTemplate ("admin_category/admin_view_list_category_form.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

		  		</div>
		  	</div>
	  	</fieldset>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("admin_category/admin_view_describe_category_form.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<!-- /.container --> 
<?php }} ?>
