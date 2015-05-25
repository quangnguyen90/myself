<!-- =============================================================================================================================================================== -->
<!--/#blog -->
<div class="section-head">
  <div class="container">
    <h1>Lastest Blogs</h1>
  </div>
  <!-- /.container --> 
</div>
<!-- /.section-head -->
{if (isset($code_blog) AND $code_blog == 1) }
<div class="container inner">
  <div class="row grid-blog">

      {foreach from=$blog_list item=value}
        <div class="post span4">
          <figure class="overlay"><a href="index.php/home/view_blog_detail/{$value->blog_id}"> 
            <img src="{if ($value->blog_avatar_name != null && $value->blog_avatar_name != "") } {$baseURL}userfiles/blog/{$value->blog_avatar_name}  {else} assets/style/images/art/nofound.jpg {/if}" alt="" /> </a> 
          </figure>
          <div class="meta">
            <div class="pull-left">
              <div class="date">{$value->blog_date|truncate:10:""}</div>
              <div class="sep">|</div>
              <div class="categories">{$value->category_title}</div>
            </div>
          </div>
          <!-- /.meta -->
          <div class="post-content">
            <h4 class="post-title"><a href="index.php/home/view_blog_detail/{$value->blog_id}">{$value->blog_title}</a></h4>
            <p>{$value->blog_brief}</p>
          </div>
          <!-- /.post-content -->
        </div>
      {/foreach}
  </div>
  <!--/.row -->
    <div class="text-center"> <a href="index.php/home/view_blog_list" class="btn btn-blue"><i class="icon-layout"></i> View all</a> </div>
 
  <!-- /.pagination --> 
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
<!--END /#blog -->