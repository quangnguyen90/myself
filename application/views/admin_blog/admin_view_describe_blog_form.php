<div class="light-wrapper offset">
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
    <legend>Blog Description - <b>{$form_name}</b></legend>
  
    <!-- Text input-->
    <div class="control-group">
      <label id="blog_danger" style="color:red;"></label>
      <input id="ad-blog-id" name="ad_blog_id" class="text-input defaultText" value="{if isset($blog_info)} {$blog_info.blog_id}{/if}" type="hidden">
      
      <label class="control-label" for="ad-blog-title">Blog Title</label>
      <div class="controls">
        <input id="ad-blog-title" name="ad_blog_title" placeholder="Enter Blog Title here" value="{if isset($blog_info)} {$blog_info.blog_title}{/if}" class="text-input defaultText required" required="" type="text">
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
          {if isset($blog_info)} {$blog_info.blog_brief}{else}Initial value.{/if}
        </textarea>
      
      </div>
    </div>

    <!-- Select Basic -->
    <div class="control-group">
      <label class="control-label" for="ad-blog-categlog">Blog Catalog</label>
      <div class="controls">
         <!-- USER FOR EDIT -->
        {if isset($blog_info)}
          <select id="ad-blog-catalog" name="ad_blog_catalog_id" class="input-xlarge">
            <option value="{$blog_info.category_id}">{$blog_info.category_title}</option>
            {foreach from=$category_list item=value}
            <option value="{$value->category_id}">{$value->category_title}</option>
            {/foreach}
          </select>
        {else}
          <select id="ad-blog-catalog" name="ad_blog_catalog_id" class="input-xlarge">
            {foreach from=$category_list item=value}
            <option value="{$value->category_id}">{$value->category_title}</option>
            {/foreach}
          </select>
        {/if}
      </div>
    </div>

    <!-- Textarea -->
    <div class="control-group">
      <label class="control-label" for="ad-blog-description">Blog Description</label>
      <div class="controls">                     
        <!-- <textarea id="ad-blog-description" name="ad-blog-description"  class="text-area required"></textarea> -->
        <textarea id="ad-blog-description" name="ad_blog_description"  class="text-area required">
          {if isset($blog_info)} {$blog_info.blog_description}{else} &lt;p&gt;Initial value.&lt;/p&gt; {/if}
        </textarea>
      </div>
    </div>

    <!-- File Button --> 
    <div class="control-group">
      <label class="control-label" for="ad-avatar">Avatar</label>
      <div class="controls">
        <img id="ad-blog-img" src="{if isset($blog_info) AND ($blog_info.blog_avatar_name != null && $blog_info.blog_avatar_name != "") }{$baseURL}/userfiles/blog/{$blog_info.blog_avatar_name} {else} assets/style/images/art/nofound.jpg {/if}" alt="" /> <br>
        <input id="ad-blog-avatar" accept='image/*' name="ad_blog_avatar" class="input-file" type="file" value="{if isset($blog_info)} {$blog_info.blog_avatar_name} {/if}">
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
          'span{!font-family};' +
          'span{!color};' +
          'span(!marker);' + 'del ins', 
        basicEntities: false
      }); 
  }
</script>