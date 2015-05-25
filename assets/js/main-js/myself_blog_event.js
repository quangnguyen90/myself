$(function() {
	// Lazy loading blog list
	var end_load_blog = false;
	var nextpage = 2;

	
		$(window).scroll(function(e) {
			e.preventDefault();
			// Obly allow scroll when user not view blog by title or category
			if(myself_blog_instance.unscroll_allow === false){ 
			    if ($(window).scrollTop() == ( $(document).height() - $(window).height())) {
			    	lazy_load_more_blog_list();
			    }
			}
		});
	
    function lazy_load_more_blog_list(){
     	if (!end_load_blog) 
     	{
		  	$.ajax({
				type 		: 'post',
				url  		: 'index.php/home/load_more_blog_list',
				dataType	: 'json',
				data 		: 
				{
					next_page : nextpage,
				},
				success: function(data, status){
					if(status != "success")
					{
		                alert("Error happens. The request is not successful. Please try again.");
		            }
		            else
		            {
						if(data.code == 0)
		    			{
		    				alert('There is no more blog available for loading');
							end_load_blog = true;
						}
						else
						{
							//alert(data['blog_list'][1].blog_id);
							var obj = data.blog_list; // data['blog_list'];
							for(var i = 0; i < obj.length; i++) {
		    					$('#frontend_blog_list').append(myself_blog_instance.load_template_blog_list(obj[i]));						
							}
							
		    				nextpage++;
						}
		            }
				},
				error: function(){						
					alert('Error while request...');
				}
			});
		}
    };

    //================================================================================================
    // View more blog brief
    $("body").on('click', '.view_more_blog_brief_button', function(e){
    	e.preventDefault();
    	var blogID = $(this).attr("blogID");
    	myself_blog_instance.view_more_blog_brief(blogID);
    });

	//================================================================================================
	// Search blog
	$("#fre-blog-title").keyup(function(e){
		e.preventDefault();
		if(event.keyCode == 13)
		{
			myself_blog_instance.search_blog_by_title($('#fre-blog-title').val());
			myself_blog_instance.unscroll_allow = true;
		}
	});

	//================================================================================================
    // View blog by category id
    $("body").on('click', '.view_blog_by_category', function(e){
    	e.preventDefault();
    	var categoryID = $(this).attr("categoryID");
    	myself_blog_instance.get_blog_list_by_category_id(categoryID);
    	myself_blog_instance.unscroll_allow = true;
    });

	
})