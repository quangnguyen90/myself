$(function() {	
	//======================================================================================================================
	// Clean all character after create new blog
	$("body").on('click','#ad-blog-clean',function(){
		document.getElementById('ad-blog-title').value = '';
		document.getElementById('ad-blog-brief').value = '';
		document.getElementById('ad-blog-catalog').value = '';
		document.getElementById('ad-blog-catalog').selectedIndex = 0;
		document.getElementById('ad-blog-description').value = '';
		document.getElementById('blog_danger').innerHTML="";
		no_found_image();
	});
	
	//======================================================================================================================
	// Show blog image after choose image
	function no_found_image()
	{
		$('#ad-blog-img')
			            	.attr('src', 'assets/style/images/art/nofound.jpg')
			             	.width(400)
		                    .height(300);
		document.getElementById("ad-blog-avatar").value = "";
	}

    function readURL(input) 
    {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        var mimeType=input.files[0].type; // You can get the mime type
			var mimeSize=input.files[0].size;

			if (mimeType == "image/jpeg" || mimeType == "image/jpg" || mimeType == "image/png") {
				if(mimeSize <= 5242880)
				{
					reader.onload = function (e) {
						$('#ad-blog-img')
						            	.attr('src', e.target.result)
						             	.width(400)
					                    .height(300);
					}

        			reader.readAsDataURL(input.files[0]);
				}
				else {
					alert("Please choose image with size <= 5MB");
					no_found_image();
				}
			}
			else {
				alert("Only allow image type: jpg, jpeg, png");
				no_found_image();
			}
	        
	    }
    }
    
    $("#ad-blog-avatar").change(function(){
        readURL(this);
    });
    
    //======================================================================================================================
	// Create new blog
	$('#upload-blog-form').submit(function(e) {
		e.preventDefault();
		var URL = document.URL;
		$('#blog-loading-div').show();
		//====================================================================================
		// Create new blog
		if(URL.indexOf("show_form_to_create_blog") > -1) {
			blog_instance.create_blog();	
		}
		//====================================================================================
		// update the project
		else if (URL.indexOf("view_detail_blog") >-1) {
			// Check img file before send
			var ifiles = $("#ad-blog-avatar")[0].files[0];
			if (ifiles != null)
			{
				var ifilesName = ifiles.name;
				var ifileType = ifiles.type;
				var ifileSize = ifiles.size;
				if(ifileType == "image/png" || ifileType == "image/jpeg" || ifileType == "image/jpg")
				{
					if(ifileSize <= 5242880)
					{
						blog_instance.update_blog_with_avatar();
					}
					else {
						document.getElementById("blog_danger").innerHTML="Image size is larger than 5MB. Please try again";
					}
				}
				else{
					document.getElementById("blog_danger").innerHTML="Only allow image type: jpg, jpeg, png. Please try again";
				}
			}
			else
			{
				blog_instance.update_blog_without_avatar();
			}
		}
		//====================================================================================
		// show error
		else {
			// show_404();
		}
	});
		
	//======================================================================================================================
	// Delete blog
	$("body").on('click','.remove_blog_button',function(e){
	//$(".remove_blog_button").click(function(e){
	//$(".remove_blog_button").live("click",function(){  
		e.preventDefault();
     	var blog_id = $(this).attr("id");
     	var blog_name = $(this).attr("name");

     	var del_confirm = confirm("Are you sure you  want to delete this blog: "+ blog_id+" - "+blog_name +" ?");
    	if (del_confirm) {
    		blog_instance.delete_blog(blog_id);
    	};
    });  

	//======================================================================================================================
	// Enable/Diable blog
    $("body").on('click','.ed_blog_button',function(e){
		e.preventDefault();
		var action = $(this).attr("action");
     	if(action == "enable") {
     		blog_instance.enable_blog($(this).attr("id"), $(this));
     	}
     	else{
     		blog_instance.disable_blog($(this).attr("id"), $(this));
     	}
    });

     //======================================================================================================================
	// Search blog
	$.extend($.expr[':'], 
	    {
	    	'containsi': function(elem, i, match, array) {
	        	return (elem.textContent || elem.innerText || '').toLowerCase()
	                .indexOf((match[3] || "").toLowerCase()) >= 0;
	    }
	});

	$('#search-blog-text').keyup(function() {
	    var query = $(this).val();
	    $("div#blogList-container")
            .hide()
            .filter(':containsi("' + query + '")')
            .show();
	});
	//======================================================================================================================			//count status length
	// count blog brief
	$("#ad-blog-brief").keyup(function(){
		var len = $(this).val().length;
		$("#count-ad-blog-brief-content").text(len + "/500");
	});
})