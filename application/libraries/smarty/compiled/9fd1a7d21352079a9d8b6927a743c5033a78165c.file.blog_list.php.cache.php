<?php /* Smarty version Smarty-3.1.18, created on 2015-11-07 14:46:54
         compiled from "application\views\myself\blog_list.php" */ ?>
<?php /*%%SmartyHeaderCode:8570563dac6edcaee1-60715460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fd1a7d21352079a9d8b6927a743c5033a78165c' => 
    array (
      0 => 'application\\views\\myself\\blog_list.php',
      1 => 1427390569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8570563dac6edcaee1-60715460',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'code_blog' => 0,
    'total_rows' => 0,
    'blog_info' => 0,
    'blog_list' => 0,
    'value' => 0,
    'baseURL' => 0,
    'blog_category_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563dac6ef324f8_25119237',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563dac6ef324f8_25119237')) {function content_563dac6ef324f8_25119237($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\xampp\\htdocs\\myself\\application\\libraries\\smarty\\libs\\plugins\\modifier.truncate.php';
?> <!--/#blogs-->
<div class="light-wrapper offset">
<div class="section-head">
  <div class="container">
    <h1>Blog list</h1>
  </div>
  <!-- /.container --> 
</div>
<?php if ((isset($_smarty_tpl->tpl_vars['code_blog']->value)&&$_smarty_tpl->tpl_vars['code_blog']->value==1)) {?>
<!-- /.section-head -->
<div class="container lightbox-wrapper">
  <div class="inner">
    <legend> <a href="index.php/home/view_blog_list" style="color:black">All my blog(s) <em class="all-my-blog-list">(<?php echo $_smarty_tpl->tpl_vars['total_rows']->value;?>
)</em> </a></legend>
    <div class="controls">
        <span for="fre-blog-brief" class="text-muted pull-left">
          <p class="lead">Scroll your mouse to bottom to see more blog...</p>
        </span>
        <span id="fre-search-blog-brief" class="text-muted pull-right span6">
          <input id="fre-blog-title" name="fre_blog_title" placeholder="Enter Blog Title here" value="<?php if (isset($_smarty_tpl->tpl_vars['blog_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['blog_info']->value['blog_title'];?>
<?php }?>" class="text-input defaultText" type="text">
        </span>
    </div>
    <div class="span8 content wide">
       <div class="sidebox widget">
        <ul class="post-list" id="frontend_blog_list">
          <!-- Show list of blog -->
          <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['no'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blog_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['no']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
          <li>
            <figure class="overlay"> <a href="index.php/home/view_blog_detail/<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
">
              <!-- If no blog avatr is add, show default img  -->
              <img src="<?php if (($_smarty_tpl->tpl_vars['value']->value->blog_avatar_name!=null&&$_smarty_tpl->tpl_vars['value']->value->blog_avatar_name!='')) {?> <?php echo $_smarty_tpl->tpl_vars['baseURL']->value;?>
userfiles/blog/<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_avatar_name;?>
  <?php } else { ?> assets/style/images/art/nofound.jpg <?php }?>" alt="" />
              <div></div>
              </a> </figure>
            <div class="meta">
            <h6><a href="index.php/home/view_blog_detail/<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->blog_title;?>
</a></h6>
            <em><?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
</em> - <em><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->blog_date,10,'');?>
</em>
            </div>
          </li>

          <aside class="span8 sidebar lp30">
            <div class="sidebox widget" id="blog_brief_container">
              <!-- If blog brief > 400, only alow 300 first character -->
              <p class="recordBLOG_BRIEF" record-blog-id="<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
"><?php ob_start();?><?php echo mb_strlen($_smarty_tpl->tpl_vars['value']->value->blog_brief, 'UTF-8');?>
<?php $_tmp1=ob_get_clean();?><?php if (($_tmp1>400)) {?> <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->blog_brief,300);?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['value']->value->blog_brief;?>
 <?php }?></p>
              <!-- If blog brief > 400, just show View more button-->
              <?php ob_start();?><?php echo mb_strlen($_smarty_tpl->tpl_vars['value']->value->blog_brief, 'UTF-8');?>
<?php $_tmp2=ob_get_clean();?><?php if (($_tmp2>400)) {?>
                <em> <a href="javascript:void(0)" class="view_more_blog_brief_button" blogID="<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
"> <i class="icon-down-1"></i>View more</a> </em>
              <?php }?>
              <em> <a href="index.php/home/view_blog_detail/<?php echo $_smarty_tpl->tpl_vars['value']->value->blog_id;?>
"> <i class="icon-flash-1"></i> View detail</a> </em>
              <hr>
            </div>
          </aside>
          <?php } ?>
        </ul>
      </div>
    </div>
    <aside class="span3 sidebar 1p30" style="float:right">
      <div class="sidebox widget">
        <h3>Top Categories</h3>
        <ul class="bullet">
          <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['no'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blog_category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['no']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
          <li><a href="javascript:void(0)" class="view_blog_by_category" categoryID="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
"><b><?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
</b></a></li>
          <?php } ?>
        </ul>
      </div>
    </aside>
  </div>
</div>
<?php } else { ?>
  <center>
    <div class='jumbotron'>
      <br>
        <h3>No Blogs Posted</h3>
      <br>
    </div>
  </center>
<?php }?>

</div>
<?php }} ?>
