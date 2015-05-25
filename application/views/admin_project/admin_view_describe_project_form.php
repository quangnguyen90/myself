<div class="light-wrapper offset">
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
    <legend>Project Description - <b>{$form_name}</b></legend>
  
    <!-- Text input-->
    <div class="control-group">
      <label id="project_danger" style="color:red;"></label>
      <input id="ad-project-id" name="ad_project_id" class="text-input defaultText" value="{if isset($project_info)} {$project_info.id}{/if}" type="hidden">
        
      <label class="control-label" for="ad-project-title">Project Title</label>
      <div class="controls">
        <input id="ad-project-title" name="ad_project_title" placeholder="Enter Project Title here" class="text-input defaultText required" value="{if isset($project_info)} {$project_info.title}{/if}" required="" type="text">
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
        {if isset($project_info)} {$project_info.brief}{else}Initial value.{/if}
        </textarea>
      </div>
    </div>

    <!-- Select Basic -->
    <div class="control-group">
      <label class="control-label" for="ad-project-categlog">Project Catalog</label>
      <div class="controls">
        <!-- USER FOR EDIT -->
        {if isset($project_info)}
          <select id="ad-project-catalog" name="ad_project_catalog_id" class="input-xlarge">
            <option value="{$project_info.category_id}">{$project_info.category_title}</option>
            {foreach from=$category_list item=value}
              <option value="{$value->category_id}">{$value->category_title}</option>
            {/foreach}
          </select>
        <!-- USE FOR CREATE NEW PROJECT -->
        {else}
          <select id="ad-project-catalog" name="ad_project_catalog_id" class="input-xlarge">
            {foreach from=$category_list item=value}
            <option value="{$value->category_id}">{$value->category_title}</option>
          {/foreach}
          </select>
        {/if}      
      </div>
    </div>

    <!-- Textarea -->
    <div class="control-group">
      <label class="control-label" for="ad-project-description">Project Description</label>
      <div class="controls">                     
        <!-- <textarea id="ad-project-description" name="ad-project-description"  class="text-area required"></textarea> -->
        <textarea id="ad-project-description" name="ad_project_description"  class="text-area required">
          {if isset($project_info)} {$project_info.description}{else} &lt;p&gt;Initial value.&lt;/p&gt; {/if}
        </textarea>
      </div>
    </div>

    <!-- File Button --> 
    <div class="control-group">
      <label class="control-label" for="ad-avatar">Avatar</label>
      <div class="controls">
        <img id="ad-project-img" src="{if isset($project_info) AND ($project_info.avatar_name != null && $project_info.avatar_name != "") } {$baseURL}/userfiles/project/{$project_info.avatar_name} {else} assets/style/images/art/nofound.jpg {/if}" alt="" /> <br>
        <input id="ad-project-avatar" accept='image/*' name="ad_project_avatar" class="input-file" type="file" value="{if isset($project_info)} {$project_info.avatar_name} {/if}">
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
          'span{!font-family};' +
          'span{!color};' +
          'span(!marker);' + 'del ins', 
        basicEntities: false
      }); 
  }
</script>