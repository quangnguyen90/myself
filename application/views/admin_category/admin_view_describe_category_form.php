<div id="upload-category-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myCategoryModalLabel"></h4>
      </div>
    <!-- ==================================================== -->
      <div class="modal-body" style="height:auto; width:auto; overflow:auto;">
        <div class="category_fieldlist form-vertical" style="position: relative;">
          <!-- Text input -->
          <div class="control-group">
            <label id="category_danger" style="color:red;"></label>
            <input id="ad-category-id" name="ad_category_id" class="text-input defaultText" type="hidden">
            <label class="control-label" for="ad-category-title">Category Title</label>
            <div class="controls">
              <input id="ad-category-title" name="ad_category_title" placeholder="Enter Category Title here" class="text-input defaultText required" required="" type="text">
              <p class="help-block">Ex: Flower, Sun...</p>
            </div>
          </div>
          
          <!-- Textarea -->
          <div class="control-group">
            <div class="controls">
              <span for="ad-category-description" class="text-muted pull-left"> Category Description</span>
              <span id="count-ad-category-description-content" class="text-muted pull-right">0/500</span>
            </div>
            <div class="controls">                     
              <textarea id="ad-category-description" name="ad-category-description"  class="text-area required" rows="2" maxlength="500"></textarea>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="control-group">
            <label class="control-label" for="ad-category-for">Category For</label>
            <div class="controls">
              <select id="ad-category-for" name="ad_category_for" class="input-xlarge">
                <option value="p">Project</option>
                <option value="b">Blog</option>
              </select>
            </div>
          </div>

        </div>
      </div>
      <!-- ==================================================== -->
      <div class="modal-footer">
        <button id="ad-category-ok"         name="ad-category-ok"         class="btn btn-primary"> Submit </button>
        <button id="ad-category-update"     name="ad-category-update"     class="btn btn-red hide"> Save changes </button>
        <button id="ad-category-clean"      name="ad-category-clean"      class="btn btn-pink">Clean</button>
        <button id="ad-category-close"      name="ad-category-cancel"     class="btn btn-purple" data-dismiss="modal">Close</button>
        <button id="ad-category-update-close"      name="ad-category-close"     class="btn btn-purple hide" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>