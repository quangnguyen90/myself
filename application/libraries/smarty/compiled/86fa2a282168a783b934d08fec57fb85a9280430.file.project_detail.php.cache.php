<?php /* Smarty version Smarty-3.1.18, created on 2015-11-07 15:19:41
         compiled from "application\views\myself\project_detail.php" */ ?>
<?php /*%%SmartyHeaderCode:29977563db41da0dc77-94414504%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86fa2a282168a783b934d08fec57fb85a9280430' => 
    array (
      0 => 'application\\views\\myself\\project_detail.php',
      1 => 1427899447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29977563db41da0dc77-94414504',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'code_project_detail' => 0,
    'project_detail' => 0,
    'baseURL' => 0,
    'project_list' => 0,
    'value' => 0,
    'no' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563db41da87896_66153780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563db41da87896_66153780')) {function content_563db41da87896_66153780($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cal_time_ago')) include 'C:\\xampp\\htdocs\\myself\\application\\libraries\\smarty\\libs\\plugins\\function.cal_time_ago.php';
?><div class="light-wrapper offset">
  <div class="section-head">
    <div class="container">
      <h1>Project brief</h1>
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.section-head -->
  <div class="container inner">
    <div class="row classic-blog">
      <?php if ((isset($_smarty_tpl->tpl_vars['code_project_detail']->value)&&$_smarty_tpl->tpl_vars['code_project_detail']->value==1)) {?>
      <div class="span8 content wide">
        <div class="post">
          <h1 class="post-title"><?php echo $_smarty_tpl->tpl_vars['project_detail']->value['title'];?>
</h1>
          <?php if (isset($_smarty_tpl->tpl_vars['project_detail']->value)&&($_smarty_tpl->tpl_vars['project_detail']->value['avatar_name']!=null&&$_smarty_tpl->tpl_vars['project_detail']->value['avatar_name']!='')) {?>
            <figure class="overlay"><img src="<?php echo $_smarty_tpl->tpl_vars['baseURL']->value;?>
userfiles/project/<?php echo $_smarty_tpl->tpl_vars['project_detail']->value['avatar_name'];?>
" alt=""/></figure>
          <?php }?>
          <div class="meta">
            <div class="pull-right">
              <div class="date"><?php echo smarty_function_cal_time_ago(array('datetimestr'=>$_smarty_tpl->tpl_vars['project_detail']->value['date']),$_smarty_tpl);?>
</div>
              <div class="sep">|</div>
              <div class="categories"><a href="#"><?php echo $_smarty_tpl->tpl_vars['project_detail']->value['category_title'];?>
</a></div>
            </div>
          </div>
          
          <p><b><?php echo $_smarty_tpl->tpl_vars['project_detail']->value['brief'];?>
</b></p>
          <p><?php echo $_smarty_tpl->tpl_vars['project_detail']->value['description'];?>
</p>
        </div>
        <!--/.post-->
        
        <hr />
        <div id="comments">
          <h3 class="section-title">Comments</h3>
          <div class="fb-like" data-href="<?php echo $_smarty_tpl->tpl_vars['baseURL']->value;?>
index.php/home/view_project_brief" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
          <div class="fb-comments" data-href="<?php echo $_smarty_tpl->tpl_vars['baseURL']->value;?>
index.php/home/view_project_brief" data-numposts="5" data-colorscheme="light"></div>
        </div>
        <!-- /#comments -->
        
        <hr />
        <!-- /.comment-form-wrapper --> 
        
      </div>
       <?php } else { ?>
        <center>
          <div class='jumbotron'>
            <br>
              <h3>No Project Found</h3>
            <br>
          </div>
        </center>
      <?php }?>
      <!--/.span8 -->
      
      <aside class="span4 sidebar lp30">
        <div class="sidebox widget">
          <h3>The Lastest Projects</h3>
          <ul class="post-list">
           <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['no'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['project_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['no']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
            <li>
              <!-- <figure class="overlay"> <a href="blog-post.html"><img src="assets/style/images/art/a1.jpg" alt="" />
                <div></div>
                </a> </figure> -->
             <!--  <div class="meta"> -->
                <h6><a href="index.php/home/view_project_detail/<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
"><img src="assets/style/images/favicon.png" alt="" /> <em><?php echo $_smarty_tpl->tpl_vars['no']->value+1;?>
 - </em><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</a></h6>
              <!-- </div> -->
            </li>
           <?php } ?>
          </ul>
          <a href="index.php/home/view_project_list"> <i class="icon-right-hand"></i> View all project</a>
          <!-- /.post-list --> 
        </div>
        <!-- <div class="sidebox widget">
          <h3>Categories</h3>
          <ul class="bullet">
            <li><a href="#">Web Design (21)</a></li>
            <li><a href="#">Photography (19)</a></li>
            <li><a href="#">Graphic Design (16)</a></li>
            <li><a href="#">Manipulation (15)</a></li>
            <li><a href="#">Motion Graphics (12)</a></li>
          </ul>
        </div> -->
      </aside>
      <!-- /.span4 .sidebar --> 
    </div>
    <!--/.row--> 
  </div>
  <!-- /.container --> 
</div><?php }} ?>
