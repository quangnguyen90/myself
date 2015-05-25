 <!--/#blogs-->
<div class="light-wrapper offset">
<div class="section-head">
  <div class="container">
    <h1>Blog list</h1>
  </div>
  <!-- /.container --> 
</div>
{if (isset($code_blog) AND $code_blog == 1) }
<!-- /.section-head -->
<div class="container lightbox-wrapper">
  <div class="inner">
    <legend> <a href="index.php/home/view_blog_list" style="color:black">All my blog(s) <em class="all-my-blog-list">({$total_rows})</em> </a></legend>
    <div class="controls">
        <span for="fre-blog-brief" class="text-muted pull-left">
          <p class="lead">Scroll your mouse to bottom to see more blog...</p>
        </span>
        <span id="fre-search-blog-brief" class="text-muted pull-right span6">
          <input id="fre-blog-title" name="fre_blog_title" placeholder="Enter Blog Title here" value="{if isset($blog_info)} {$blog_info.blog_title}{/if}" class="text-input defaultText" type="text">
        </span>
    </div>
    <div class="span8 content wide">
       <div class="sidebox widget">
        <ul class="post-list" id="frontend_blog_list">
          <!-- Show list of blog -->
          {foreach from=$blog_list key=no item=value }
          <li>
            <figure class="overlay"> <a href="index.php/home/view_blog_detail/{$value->blog_id}">
              <!-- If no blog avatr is add, show default img  -->
              <img src="{if ($value->blog_avatar_name != null && $value->blog_avatar_name != "") } {$baseURL}userfiles/blog/{$value->blog_avatar_name}  {else} assets/style/images/art/nofound.jpg {/if}" alt="" />
              <div></div>
              </a> </figure>
            <div class="meta">
            <h6><a href="index.php/home/view_blog_detail/{$value->blog_id}">{$value->blog_title}</a></h6>
            <em>{$value->category_title}</em> - <em>{$value->blog_date|truncate:10:""}</em>
            </div>
          </li>

          <aside class="span8 sidebar lp30">
            <div class="sidebox widget" id="blog_brief_container">
              <!-- If blog brief > 400, only alow 300 first character -->
              <p class="recordBLOG_BRIEF" record-blog-id="{$value->blog_id}">{if ({$value->blog_brief|count_characters:true} gt 400) } {$value->blog_brief|truncate:300} {else} {$value->blog_brief} {/if}</p>
              <!-- If blog brief > 400, just show View more button-->
              {if ({$value->blog_brief|count_characters:true} gt 400) }
                <em> <a href="javascript:void(0)" class="view_more_blog_brief_button" blogID="{$value->blog_id}"> <i class="icon-down-1"></i>View more</a> </em>
              {/if}
              <em> <a href="index.php/home/view_blog_detail/{$value->blog_id}"> <i class="icon-flash-1"></i> View detail</a> </em>
              <hr>
            </div>
          </aside>
          {/foreach}
        </ul>
      </div>
    </div>
    <aside class="span3 sidebar 1p30" style="float:right">
      <div class="sidebox widget">
        <h3>Top Categories</h3>
        <ul class="bullet">
          {foreach from=$blog_category_list key=no item=value }
          <li><a href="javascript:void(0)" class="view_blog_by_category" categoryID="{$value->category_id}"><b>{$value->category_title}</b></a></li>
          {/foreach}
        </ul>
      </div>
    </aside>
  </div>
</div>
{else}
  <center>
    <div class='jumbotron'>
      <br>
        <h3>No Blogs Posted</h3>
      <br>
    </div>
  </center>
{/if}

</div>
