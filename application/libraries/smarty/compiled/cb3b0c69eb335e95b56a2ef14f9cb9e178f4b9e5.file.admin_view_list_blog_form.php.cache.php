<?php /* Smarty version Smarty-3.1.18, created on 2015-11-07 15:09:30
         compiled from "application\views\admin_blog\admin_view_list_blog_form.php" */ ?>
<?php /*%%SmartyHeaderCode:16455563db1ba355226-56738262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb3b0c69eb335e95b56a2ef14f9cb9e178f4b9e5' => 
    array (
      0 => 'application\\views\\admin_blog\\admin_view_list_blog_form.php',
      1 => 1427475987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16455563db1ba355226-56738262',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total_rows' => 0,
    'blogList' => 0,
    'value' => 0,
    'no' => 0,
    'baseURL' => 0,
    'pagination_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563db1ba407e25_36816635',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563db1ba407e25_36816635')) {function content_563db1ba407e25_36816635($_smarty_tpl) {?><!-- <label id="lt-danger" style="color:red;"></label>
 -->
 <div id="total_blog_rows_selected">
	<?php if ((isset($_smarty_tpl->tpl_vars['total_rows']->value))) {?>
		<?php if (($_smarty_tpl->tpl_vars['total_rows']->value>0)) {?>
			<strong>Found <?php echo $_smarty_tpl->tpl_vars['total_rows']->value;?>
 result(s)</strong>
		<?php } else { ?> 
			<center>
				<div class='jumbotron'>
					<h3>Found no result</h3>
				</div>
			</center>
		<?php }?>
	<?php }?>
</div>

<?php if ((isset($_smarty_tpl->tpl_vars['blogList']->value)==true)) {?>
	<div id="blogList-container">
		<table class="table table-bordered table-condensed table-striped" id="blog-list">
			<thead style="font-weight: bold;">
				<td>No</td>
				<td>Blog ID</td>
				<td>Blog title</td>
				<td>Blog brief</td>
				<td>Category ID</td>
				<td>Category title</td>
				<td>Date Created</td>
				<td>Figure</td>
				<td>Status</td>
				<td>Action</td>
			</thead>
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['no'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blogList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['no']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr class="recordBLOG" record-id="<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['no']->value+1;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->blog_title;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->blog_brief;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->blog_date;?>
</td>
					<td>
					
						<img id="p_img_<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
" style="width:150px; height:75px" 
							src="<?php if (($_smarty_tpl->tpl_vars['value']->value->blog_avatar_name!=null&&$_smarty_tpl->tpl_vars['value']->value->blog_avatar_name!='')) {?> <?php echo $_smarty_tpl->tpl_vars['baseURL']->value;?>
userfiles/blog/<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_avatar_name;?>
 <?php } else { ?> assets/style/images/art/nofound.jpg <?php }?>" alt="" />
					
					</td>
					<td><?php if ((($_smarty_tpl->tpl_vars['value']->value->blog_status)==1)) {?>
								On
							<?php } else { ?>
								Off
						<?php }?>
					</td>
					<td>
						<a href="index.php/admin_blog/view_detail_blog/<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
" 
							id="<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
" 
							class="edit_blog_button btn btn-orange"
							title="Edit">
							<i class="icon-pencil"></i>
						</a>
						<a href="javascript:void(0)" 
							id="<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
" 
							name="<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_title;?>
" 
							class="remove_blog_button btn btn-red"
							title="Remove">
							<i class="icon-cancel-circled"></i>
						</a>
						<?php if ((($_smarty_tpl->tpl_vars['value']->value->blog_status)==1)) {?>
							<a href="javascript:void(0)" 
								id="<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
" 
								class="ed_blog_button btn btn-navy" 
								title="Diable"
								action="disable"> 
								<i class="icon-lock-1"></i> 
							</a>
							<?php } else { ?>
							<a href="javascript:void(0)" 
								id="<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
" 
								class="ed_blog_button btn btn-gray"
								title="Enable"
								action="enable"> 
								<i class="icon-lock-open-1"></i>
							</a>
						<?php }?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['pagination_link']->value))) {?>
	<center>
		<?php echo $_smarty_tpl->tpl_vars['pagination_link']->value;?>

	</center>
<?php }?><?php }} ?>
