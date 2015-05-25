<?php /* Smarty version Smarty-3.1.18, created on 2015-03-28 19:44:44
         compiled from "application\views\admin_blog\admin_view_describe_blog_form.php" */ ?>
<?php /*%%SmartyHeaderCode:97685516a23cbfc7e1-88810665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '066863061e677b68383d758e07863de4200e4089' => 
    array (
      0 => 'application\\views\\admin_blog\\admin_view_describe_blog_form.php',
      1 => 1427133640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97685516a23cbfc7e1-88810665',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form_name' => 0,
    'blog_info' => 0,
    'category_list' => 0,
    'value' => 0,
    'baseURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5516a23cc7b0a1_73806188',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5516a23cc7b0a1_73806188')) {function content_5516a23cc7b0a1_73806188($_smarty_tpl) {?><div class="light-wrapper offset">
<form enctype="multipart/form-data" id="upload-blog-form">
  <div class="section-head">
    <div class="container">
      <h1>Blog Management</h1>
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.section-head -->
  <div class="container inner">
    <fieldset>

    <!-- Form Name -->
    <legend>Blog Description - <b><?php echo $_smarty_tpl->tpl_vars['form_name']->value;?>
</b></legend>
  
    <!-- Text input-->
    <div class="control-group">
      <label id="blog_danger" style="color:red;"></label>
      <input id="ad-blog-id" name="ad_blog_id" class="text-input defaultText" value="<?php if (isset($_smarty_tpl->tpl_vars['blog_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['blog_info']->value['blog_id'];?>
<?php }?>" type="hidden">
      
      <label class="control-label" for="ad-blog-title">Blog Title</label>
      <div class="controls">
        <input id="ad-blog-title" name="ad_blog_title" placeholder="Enter Blog Title here" value="<?php if (isset($_smarty_tpl->tpl_vars['blog_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['blog_info']->value['blog_title'];?>
<?php }?>" class="text-input defaultText required" required="" type="text">
        <p class="help-block">Ex: I and my dream, my ambitious...</p>
      </div>
    </div>
    
    <!-- Textarea -->
    <div class="control-group">
      <div class="controls">
        <span for="ad-blog-brief" class="text-muted pull-left">Blog brief</span>
        <span id="count-ad-blog-brief-content" class="text-muted pull-right">0/500</span>
      </div>

      <div class="controls">                     
        <!-- <textarea id="ad-blog-brief" name="ad-blog-brief"  class="text-area required"></textarea> -->
        <textarea id="ad-blog-brief" name="ad_blog_brief"  class="text-area required" maxlength="500" rows="2">
          <?php if (isset($_smarty_tpl->tpl_vars['blog_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['blog_info']->value['blog_brief'];?>
<?php } else { ?>Initial value.<?php }?>
        </textarea>
      
      </div>
    </div>

    <!-- Select Basic -->
    <div class="control-group">
      <label class="control-label" for="ad-blog-categlog">Blog Catalog</label>
      <div class="controls">
         <!-- USER FOR EDIT -->
        <?php if (isset($_smarty_tpl->tpl_vars['blog_info']->value)) {?>
          <select id="ad-blog-catalog" name="ad_blog_catalog_id" class="input-xlarge">
            <option value="<?php echo $_smarty_tpl->tpl_vars['blog_info']->value['category_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['blog_info']->value['category_title'];?>
</option>
            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
</option>
            <?php } ?>
          </select>
        <?php } else { ?>
          <select id="ad-blog-catalog" name="ad_blog_catalog_id" class="input-xlarge">
            <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value->category_id;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->category_title;?>
</option>
            <?php } ?>
          </select>
        <?php }?>
      </div>
    </div>

    <!-- Textarea -->
    <div class="control-group">
      <label class="control-label" for="ad-blog-description">Blog Description</label>
      <div class="controls">                     
        <!-- <textarea id="ad-blog-description" name="ad-blog-description"  class="text-area required"></textarea> -->
        <textarea id="ad-blog-description" name="ad_blog_description"  class="text-area required">
          <?php if (isset($_smarty_tpl->tpl_vars['blog_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['blog_info']->value['blog_description'];?>
<?php } else { ?> &lt;p&gt;Initial value.&lt;/p&gt; <?php }?>
        </textarea>
      </div>
    </div>

    <!-- File Button --> 
    <div class="control-group">
      <label class="control-label" for="ad-avatar">Avatar</label>
      <div class="controls">
        <img id="ad-blog-img" src="<?php if (isset($_smarty_tpl->tpl_vars['blog_info']->value)&&($_smarty_tpl->tpl_vars['blog_info']->value['blog_avatar_name']!=null&&$_smarty_tpl->tpl_vars['blog_info']->value['blog_avatar_name']!='')) {?><?php echo $_smarty_tpl->tpl_vars['baseURL']->value;?>
/userfiles/blog/<?php echo $_smarty_tpl->tpl_vars['blog_info']->value['blog_avatar_name'];?>
 <?php } else { ?> assets/style/images/art/nofound.jpg <?php }?>" alt="" /> <br>
        <input id="ad-blog-avatar" accept='image/*' name="ad_blog_avatar" class="input-file" type="file" value="<?php if (isset($_smarty_tpl->tpl_vars['blog_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['blog_info']->value['blog_avatar_name'];?>
 <?php }?>">
      </div>
    </div>
    
    <div class="control-group">
      <div id="progress-div">
      <progress id="progressBar" value="0" max="100" style="width:500px;" ></progress>
      <span id="loaded_n_total"></span> 
      &nbsp;
      <span id="status_upload"></span>
      </div>
      
      <div id="blog-loading-div" hidden>
        <img src="assets/style/images/loading.gif">
      </div>
    </div>

    <!-- Button (Double) -->
    <div class="control-group">
      <label class="control-label" for="ad-blog-ok"></label>
      <div class="controls">
        <input type="submit" id="ad-blog-ok" name="ad-blog-ok" class="btn btn-primary" value="Submit"/>
        <button id="ad-blog-clean" name="ad-blog-clean" class="btn btn-default">Clean</button>
        <a id="ad-blog-cancel" href="index.php/admin_blog/view_blog_list" name="ad-blog-cancel" class="btn btn-default">Back</a>
      </div>
    </div>

    </fieldset>
  </div>
</form>
</div>

<script type="text/javascript" src='assets/js/ckeditor/ckeditor.js'></script>
<script type="text/javascript" src='assets/js/ckfinder/ckfinder.js'></script>
<script type="text/javascript">
  window.onload = function()
  {
    // Used for click submit again
    if(CKEDITOR.instances['ad-blog-description']) { 
        CKEDITOR.remove(CKEDITOR.instances['ad-blog-description']); 
    } 

    CKEDITOR.config.width = 1170; 
    CKEDITOR.config.height = 450; 
     //Whether to convert all remaining characters not included in the ASCII character table to their relative 
    //decimal numeric representation of HTML entity. When set to force, it will convert all entities into this format. 
    //For example : &#27721;&#35821;."
    CKEDITOR.config.entities_processNumerical = 'force'; // used for UTF-8
    CKEDITOR.replace('ad-blog-description',
      { uiColor: '#C2D6FF',
        // for save data, Allow everything (disable ACF)
        allowedContent: 
          'h1 h2 h3 p blockquote strong em;' +
          'a[!href];' +
          'img(left,right)[!src,alt,width,height];' +
          'table tr th td caption;' +
          'span<?php echo !'font'-'family';?>
;' +
          'span<?php echo !'color';?>
;' +
          'span(!marker);' + 'del ins', 
        basicEntities: false
      }); 
  }
</script><?php }} ?>
