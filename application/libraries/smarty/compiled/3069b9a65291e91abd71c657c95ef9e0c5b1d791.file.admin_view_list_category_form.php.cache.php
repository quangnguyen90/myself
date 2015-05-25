<?php /* Smarty version Smarty-3.1.18, created on 2015-05-24 19:13:54
         compiled from "application\views\admin_category\admin_view_list_category_form.php" */ ?>
<?php /*%%SmartyHeaderCode:18175556206d2cf5ef1-42113562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3069b9a65291e91abd71c657c95ef9e0c5b1d791' => 
    array (
      0 => 'application\\views\\admin_category\\admin_view_list_category_form.php',
      1 => 1427475312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18175556206d2cf5ef1-42113562',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total_rows' => 0,
    'categoryList' => 0,
    'value' => 0,
    'no' => 0,
    'pagination_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556206d2d77da3_38446222',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556206d2d77da3_38446222')) {function content_556206d2d77da3_38446222($_smarty_tpl) {?><!-- <label id="lt-danger" style="color:red;"></label>
 -->
 <div id="total_category_rows_selected">
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

<?php if ((isset($_smarty_tpl->tpl_vars['categoryList']->value)==true)) {?>
	<div id="categoryList-container">
		<table class="table table-bordered table-condensed table-striped" id="category-list">
			<thead style="font-weight: bold;">
				<td>No</td>
				<td>Category ID</td>
				<td>Category title</td>
				<td>Category description</td>
				<td>Category type</td>
				<td>Status</td>
				<td>Action</td>
			</thead>
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['no'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categoryList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['no']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr class="recordCATEGORY" record-id="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['no']->value+1;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->category_description;?>
</td>
					<td><?php if ((($_smarty_tpl->tpl_vars['value']->value->category_type)=='p')) {?>
								Project
							<?php } else { ?>
								Blog
						<?php }?>
					</td>
					<td><?php if ((($_smarty_tpl->tpl_vars['value']->value->category_status)==1)) {?>
								On
							<?php } else { ?>
								Off
						<?php }?>
					</td>
					<td>
						<a href="javascript:void(0)"  
							categoryid ="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
"
							categoryname="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
" 
							categorydescription="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_description;?>
"
							categorytype="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_type;?>
"
							class="edit_category_button btn btn-orange"
							title="Edit">
							<i class="icon-pencil"></i>
						</a>
						<!-- <a href="javascript:void(0)" 
							id="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
" 
							name="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
" 
							class="remove_category_button btn btn-red"
							title="Remove">
							<i class="icon-cancel-circled"></i>
						</a> -->
						<?php if ((($_smarty_tpl->tpl_vars['value']->value->category_status)==1)) {?>
								<a href="javascript:void(0)" 
									id="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
" 
									class="ed_cat_button btn btn-navy"
									title="Disable"
									action="disable"> 
									<i class="icon-lock-1"></i>
								</a>
							<?php } else { ?>
								<a href="javascript:void(0)" 
									id="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
" 
									class="ed_cat_button btn btn-gray"
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
