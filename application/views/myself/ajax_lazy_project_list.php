<?php if (isset($code) && $code ==1) {
  foreach ($project_list as $value): ?>
  <li class="item thumb <?php echo $value->category_id?>"> 
    <a href="index.php/home/view_project_detail/<?php echo $value->id?>" title="<?php echo $value->title?>">
    <div class="overlay">
      <div class="info">
        <h4><?php echo $value->title?></h4>
        <span><?php echo $value->brief?></span> </div>
      <!-- /.info --> 
    </div>
    <!-- /.overlay --> 
    <img src="<?php echo $baseURL?>userfiles/project/<?php echo $value->avatar_name?>" alt="" />
    </a> 
    <br> <h5><?php echo $value->title?></h5><br>
  </li>
<?php endforeach; 
}// end if
else { ?>

<!-- nothing to show -->

<?php } ?>