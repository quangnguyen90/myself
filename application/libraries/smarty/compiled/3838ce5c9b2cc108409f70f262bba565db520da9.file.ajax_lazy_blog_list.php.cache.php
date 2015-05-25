<?php /* Smarty version Smarty-3.1.18, created on 2015-03-18 19:57:59
         compiled from "application\views\myself\ajax_lazy_blog_list.php" */ ?>
<?php /*%%SmartyHeaderCode:8674550976571a6a19-99134139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3838ce5c9b2cc108409f70f262bba565db520da9' => 
    array (
      0 => 'application\\views\\myself\\ajax_lazy_blog_list.php',
      1 => 1425810418,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8674550976571a6a19-99134139',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_550976571c3b71_39353870',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_550976571c3b71_39353870')) {function content_550976571c3b71_39353870($_smarty_tpl) {?><<?php ?>?php if (!is_null($blog_list)) {
  foreach ($blog_list as $value): ?<?php ?>>
  <li>
    <figure class="overlay"> <a href="index.php/home/view_blog_detail/<<?php ?>?php echo $value->blog_id?<?php ?>>"><img src="<<?php ?>?php echo $baseURL?<?php ?>>userfiles/blog/<<?php ?>?php echo $value->blog_avatar_name?<?php ?>>" alt="" />
      <div></div>
      </a> </figure>
    <div class="meta">
    <h6><a href="index.php/home/view_blog_detail/<<?php ?>?php echo $value->blog_id?<?php ?>>"><<?php ?>?php echo $value->blog_title?<?php ?>></a></h6>
    <em><<?php ?>?php echo $value->blog_date?<?php ?>></em>
    </div>
  </li>

  <aside class="span12 sidebar lp30">
   <div class="sidebox widget" id="blog_brief_container">
      <p class="recordBLOG_BRIEF" record-blog-id="<<?php ?>?php echo $value->blog_id?<?php ?>>"><<?php ?>?php echo $value->blog_brief?<?php ?>></p>
      <em> <a href="javascript:void(0)" class="view_more_blog_brief_button" blog-id="<<?php ?>?php echo $value->blog_id?<?php ?>>"> <i class="icon-down-1"></i>View more</a> </em>
      <em> <a href="index.php/home/view_blog_detail/<<?php ?>?php echo $value->blog_id?<?php ?>>"> <i class="icon-flash-1"></i> View detail</a> </em>
      <hr>
    </div>
  </aside>
<<?php ?>?php endforeach; }?<?php ?>><?php }} ?>
