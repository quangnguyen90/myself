<?php /* Smarty version Smarty-3.1.18, created on 2015-11-07 15:18:38
         compiled from "application\views\admin_project\admin_view_describe_project_form.php" */ ?>
<?php /*%%SmartyHeaderCode:12266563db3de5a36b9-70400769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10c788aea52699fb5044ddc64f484a1e47766efc' => 
    array (
      0 => 'application\\views\\admin_project\\admin_view_describe_project_form.php',
      1 => 1427166033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12266563db3de5a36b9-70400769',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'form_name' => 0,
    'project_info' => 0,
    'category_list' => 0,
    'value' => 0,
    'baseURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563db3de66c8b7_92529949',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563db3de66c8b7_92529949')) {function content_563db3de66c8b7_92529949($_smarty_tpl) {?><div class="light-wrapper offset">
<form enctype="multipart/form-data" method="post" id="upload-project-form" name="upload_project_form">
  <div class="section-head">
    <div class="container">
      <h1>Project Management</h1>
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.section-head -->
  <div class="container inner">
    <fieldset>

    <!-- Form Name -->
    <legend>Project Description - <b><?php echo $_smarty_tpl->tpl_vars['form_name']->value;?>
</b></legend>
  
    <!-- Text input-->
    <div class="control-group">
      <label id="project_danger" style="color:red;"></label>
      <input id="ad-project-id" name="ad_project_id" class="text-input defaultText" value="<?php if (isset($_smarty_tpl->tpl_vars['project_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['project_info']->value['id'];?>
<?php }?>" type="hidden">
        
      <label class="control-label" for="ad-project-title">Project Title</label>
      <div class="controls">
        <input id="ad-project-title" name="ad_project_title" placeholder="Enter Project Title here" class="text-input defaultText required" value="<?php if (isset($_smarty_tpl->tpl_vars['project_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['project_info']->value['title'];?>
<?php }?>" required="" type="text">
        <p class="help-block">Ex: Mobile office, City wifi...</p>
      </div>
    </div>
    
    <!-- Textarea -->
    <div class="control-group">
      <div class="controls">
        <span for="ad-project-brief" class="text-muted pull-left">Project brief</span>
        <span id="count-ad-project-brief-content" class="text-muted pull-right">0/500</span>
      </div>

      <div class="controls">
        <textarea id="ad-project-brief" name="ad_project_brief" class="text-area required" maxlength="500" rows="2">
        <?php if (isset($_smarty_tpl->tpl_vars['project_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['project_info']->value['brief'];?>
<?php } else { ?>Initial value.<?php }?>
        </textarea>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="control-group">
      <label class="control-label" for="ad-project-categlog">Project Catalog</label>
      <div class="controls">
        <!-- USER FOR EDIT -->
        <?php if (isset($_smarty_tpl->tpl_vars['project_info']->value)) {?>
          <select id="ad-project-catalog" name="ad_project_catalog_id" class="input-xlarge">
            <option value="<?php echo $_smarty_tpl->tpl_vars['project_info']->value['category_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['project_info']->value['category_title'];?>
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
        <!-- USE FOR CREATE NEW PROJECT -->
        <?php } else { ?>
          <select id="ad-project-catalog" name="ad_project_catalog_id" class="input-xlarge">
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
      <label class="control-label" for="ad-project-description">Project Description</label>
      <div class="controls">                     
        <!-- <textarea id="ad-project-description" name="ad-project-description"  class="text-area required"></textarea> -->
        <textarea id="ad-project-description" name="ad_project_description"  class="text-area required">
          <?php if (isset($_smarty_tpl->tpl_vars['project_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['project_info']->value['description'];?>
<?php } else { ?> &lt;p&gt;Initial value.&lt;/p&gt; <?php }?>
        </textarea>
      </div>
    </div>

    <!-- File Button --> 
    <div class="control-group">
      <label class="control-label" for="ad-avatar">Avatar</label>
      <div class="controls">
        <img id="ad-project-img" src="<?php if (isset($_smarty_tpl->tpl_vars['project_info']->value)&&($_smarty_tpl->tpl_vars['project_info']->value['avatar_name']!=null&&$_smarty_tpl->tpl_vars['project_info']->value['avatar_name']!='')) {?> <?php echo $_smarty_tpl->tpl_vars['baseURL']->value;?>
/userfiles/project/<?php echo $_smarty_tpl->tpl_vars['project_info']->value['avatar_name'];?>
 <?php } else { ?> assets/style/images/art/nofound.jpg <?php }?>" alt="" /> <br>
        <input id="ad-project-avatar" accept='image/*' name="ad_project_avatar" class="input-file" type="file" value="<?php if (isset($_smarty_tpl->tpl_vars['project_info']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['project_info']->value['avatar_name'];?>
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

      <div id="project-loading-div" hidden>
        <img src="assets/style/images/loading.gif">
      </div>
    </div>

    <!-- Button (Double) -->
    <div class="control-group">
      <label class="control-label" for="ad-project-ok"></label>
      <div class="controls">
        <input type="submit" id="ad-project-ok" name="ad-project-ok" class="btn btn-primary" value="Submit"/>
        <button id="ad-project-clean" name="ad-project-clean" class="btn btn-default">Clean</button>
        <a id="ad-project-cancel" href="index.php/admin_project/view_project_list" name="ad-project-cancel" class="btn btn-default">Back</a>
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
    if(CKEDITOR.instances['ad-project-description']) { 
        CKEDITOR.remove(CKEDITOR.instances['ad-project-description']); 
    } 
  
    CKEDITOR.config.width = 1170; 
    CKEDITOR.config.height = 450; 
    //Whether to convert all remaining characters not included in the ASCII character table to their relative 
    //decimal numeric representation of HTML entity. When set to force, it will convert all entities into this format. 
    //For example : &#27721;&#35821;."
    CKEDITOR.config.entities_processNumerical = 'force'; // used for UTF-8
    CKEDITOR.replace('ad-project-description',
      { uiColor: '#9AB8F3',
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
