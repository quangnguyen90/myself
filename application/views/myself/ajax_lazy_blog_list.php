<?php if(isset($total_rows) && $total_rows > 0) {?>
  <em class="num-result"><b>Total <?php echo $total_rows;?> result(s) </b></em> <br> <br>
  <?php if (!is_null($blog_list)) {
    foreach ($blog_list as $value): ?>
    <li>
      <figure class="overlay"> 
        <a href="index.php/home/view_blog_detail/<?php echo $value->blog_id?>">
          <img src="<?php if($value->blog_avatar_name != null && $value->blog_avatar_name != ""){?><?php echo base_url(); ?>userfiles/blog/<?php echo $value->blog_avatar_name;} else {?> <?php echo 'assets/style/images/art/nofound.jpg'; }?>" 
            alt="" />

          <div></div>
        </a> 
      </figure>
      <div class="meta">
      <h6><a href="index.php/home/view_blog_detail/<?php echo $value->blog_id?>"><?php echo $value->blog_title?></a></h6>
        <em><?php echo $value->category_title?></em> - <em><?php echo substr($value->blog_date,0,10)?></em>
      </div>
    </li>

    <aside class="span8 sidebar lp30">
     <div class="sidebox widget" id="blog_brief_container">
        <p class="recordBLOG_BRIEF" record-blog-id="<?php echo $value->blog_id?>"><?php if(strlen($value->blog_brief) >400) {?><?php echo substr($value->blog_brief,0,300)."..." ;} else {?> <?php echo $value->blog_brief; }?></p>
        <?php if(strlen($value->blog_brief) >400) {?>
        <em> <a href="javascript:void(0)" class="view_more_blog_brief_button" blogID="<?php echo $value->blog_id?>"> <i class="icon-down-1"></i>View more</a> </em>
        <?php }?>
        <em> <a href="index.php/home/view_blog_detail/<?php echo $value->blog_id?>"> <i class="icon-flash-1"></i> View detail</a> </em>
        <hr>
      </div>
    </aside>
  <?php endforeach; 
  }
}
else { ?>
  <center>
    <div class='jumbotron'>
      <br>
        <h3>No Blogs Found</h3>
      <br>
    </div>
  </center>
<?php } ?>


