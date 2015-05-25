function Myself_blog() {
	 this.base_url = window.location.origin+"/quangnguyen/";
	 this.unscroll_allow = false;
}

Myself_blog.prototype = {
	// View more blog brief
	view_more_blog_brief : function(blogID)
    {
		$.ajax({
			type 		: 'POST',
			url  		: 'index.php/home/view_more_blog_brief',
			dataType	: 'json',
			data 		: {
				blog_id : blogID,
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
	                   if(typeof data.info === 'undefined')
	                    {
	                        alert('Error happens. The request is undefined. Please try again.');
	                    }
	                    if(typeof data.info === 'object')
	                    {
	                        alert(data.info);  
	                    } 
	                    else 
	                    {
	                    	alert("Error happens. \n"+ "Info: "+ data.info+ " Please try again.");  
	                    }
	                }
	                // Successfully
	                else 
	                {
	                  	$(".recordBLOG_BRIEF[record-blog-id=" + blogID + "]").html(data.blog_brief_content);
						$(".view_more_blog_brief_button[blogID=" + blogID + "]").fadeOut(500, function(){
							$(this).remove();
						});
	                }
	            }
			},
			error: function(){						
				alert('Error while request...');
			}
		});
	},
	//================================================================================================
	// Search blog function
	search_blog_by_title : function(blog_title){
		$.ajax({
	      	url: 'index.php/home/search_blog',
	      	type: "POST",
	      	data: {
	      		blog_title: blog_title,
	      	},
	      	dataType: "html",
	      	success: function(data){
	      		try {
					var result = JSON.parse(data);
					alert(result.info);
				} 
				catch (e) {
					$('#frontend_blog_list').html(data);
					$('.all-my-blog-list').fadeOut(500, function(){
						$(this).remove();
					});
				}
	      	},
	      	error: function(){
	      		alert("Error happens. Please try again.");
	      	},
	    });
	},

	//================================================================================================
	// Search blog function - TEMPLATE VERSION - NOT COOL
	search_blog_by_title_2 : function(blog_title){
		$.ajax({
	      	url: 'index.php/home/search_blog',
	      	type: "POST",
	      	data: {
	      		blog_title: blog_title,
	      	},
	      	dataType: "json",
	      	success: function(data, status){
				if(status != "success"){
            		alert("Error happens. The request is not successful. Please try again.").fadeIn();
            	}
            	else
                {
					 if(data.code == 0) 
                    {
                    	if(typeof data.info === 'undefined')
                        {
                            alert('Error happens. The request is undefined. Please try again.').fadeIn();
                        }
                        if(typeof data.info === 'object'){
                            var output = '<ul>';
                            // Loop
                            for (var key in data.info){

                             output += '<li>' + data.info[key]  + '</li>';
                            }
                            output += '</ul>';
                           	alert(output);
                        } 
                        else 
                        {
                           alert("Error happens. \n"+ "Info: "+ data.info+ "\n The object info is undefined. Please try again.");
                        }
                    }
                    // Successfully
                    else 
                    {
                    	//alert(data['blog_list'][1].blog_id);
						var obj = data.blog_list; // data['blog_list'];
						for(var i = 0; i < obj.length; i++) {
	    					$('#frontend_blog_list').html(myself_blog_instance.load_template_blog_list(obj[i]));	
	    				}
	    				$('.all-my-blog-list').html("("+data.total_rows+")");
                    }
                }
			},
			error: function(){						
				alert('Error while request...');
			}
	    });
	},

	//================================================================================================
	// Get blog list by category id function
	get_blog_list_by_category_id : function(category_id){
		$.ajax({
	      	url: 'index.php/home/view_blog_list_by_category_id',
	      	type: "POST",
	      	data: {
	      		category_id: category_id,
	      	},
	      	dataType: "html",
	      	success: function(data){
	      		try {
					var result = JSON.parse(data);
					alert(result.info);
				} 
				catch (e) {
					$('#frontend_blog_list').html(data);
					$('.all-my-blog-list').fadeOut(500, function(){
						$(this).remove();
					});
				}
	      	},
	      	error: function(){
	      		alert("Error happens. Please try again.");
	      	},
	    });
	},
	
	//================================================================================================
	// Get blog list by category id function - TEMPLATE VERSION - NOT COOL
	get_blog_list_by_category_id_2 : function(category_id){
		$.ajax({
	      	url: 'index.php/home/view_blog_list_by_category_id',
	      	type: "POST",
	      	data: {
	      		category_id: category_id,
	      	},
	      	dataType: "json",
	      	success: function(data, status){
				if(status != "success"){
            		alert("Error happens. The request is not successful. Please try again.").fadeIn();
            	}
            	else
                {
					 if(data.code == 0) 
                    {
                    	if(typeof data.info === 'undefined')
                        {
                            alert('Error happens. The request is undefined. Please try again.').fadeIn();
                        }
                        if(typeof data.info === 'object'){
                            var output = '<ul>';
                            // Loop
                            for (var key in data.info){

                             output += '<li>' + data.info[key]  + '</li>';
                            }
                            output += '</ul>';
                           	alert(output);
                        } 
                        else 
                        {
                           alert("Error happens. \n"+ "Info: "+ data.info+ "\n The object info is undefined. Please try again.");
                        }
                    }
                    // Successfully
                    else 
                    {
                    	var obj = data.blog_list;
						for(var i = 0; i < obj.length; i++) {
	    					$('#frontend_blog_list').prepend(myself_blog_instance.load_template_blog_list(obj[i]));	
	    				}
	    				$('.all-my-blog-list').html("("+data.total_rows+")");
                    }
                }
			},
			error: function(){						
				alert('Error while request...');
			}
	    });
	},
	//================================================================================================
	// Template blog list
	load_template_blog_list : function (obj){
   		var output='';
    	output+= '<li>';
		output+= '	<figure class="overlay"> <a href="index.php/home/view_blog_detail/'+obj.blog_id+'">';
		// If no blog avatr is add, show default img
		output+= ((obj.blog_avatar_name != null && obj.blog_avatar_name != "" )  ? ('<img src="'+baseUrlQ+'userfiles/blog/'+obj.blog_avatar_name+'" alt="" />') : ('<img src="assets/style/images/art/nofound.jpg" alt="" />')) ;
		output+= '		<div></div>';
		output+= '		</a>';
		output+= '	</figure>';
		output+= '	<div class="meta">';
		output+= '	<h6><a href="index.php/home/view_blog_detail/'+obj.blog_id+'">'+obj.blog_title+'</a></h6>';
		output+= '	<em>'+obj.category_title+'</em> - ';
		output+= '	<em>'+obj.blog_date.substring(0,10)+'</em>';
		output+= '</div>';
		output+= '</li>';
		output+= '<aside class="span8 sidebar lp30">';
		output+= '	<div class="sidebox widget" id="blog_brief_container">';
		// if blog brief > 400, just show 300 first character
		output+= ((obj.blog_brief.length >400)  ? ('<p class="recordBLOG_BRIEF" record-blog-id="'+obj.blog_id+'">'+obj.blog_brief.slice(0, 300)+'...</p>') : ('<p class="recordBLOG_BRIEF" record-blog-id="'+obj.blog_id+'">'+obj.blog_brief+'</p>')) ;
		//If blog brief > 400, just show View more button
		output+= ((obj.blog_brief.length >400)  ? ('<em> <a href="javascript:void(0)" class="view_more_blog_brief_button" blogID="'+obj.blog_id+'"> <i class="icon-down-1"></i>View more</a> </em>') : ('<em></em>')) ;
		output+= '		<em> <a href="index.php/home/view_blog_detail/'+obj.blog_id+'"> <i class="icon-flash-1"></i> View detail</a> </em>';
		output+= '		<hr>';
		output+= '	</div>';
		output+= '</aside>';

    	return output;
    },

    timeSince : function(date) {
    	var timeStamp = new Date(date);
	    var now = new Date(),
	        secondsPast = (now.getTime() - timeStamp.getTime() ) / 1000;
	    if(secondsPast < 60){
	        return parseInt(secondsPast) + 's';
	    }
	    if(secondsPast < 3600){
	        return parseInt(secondsPast/60) + 'm';
	    }
	    if(secondsPast <= 86400){
	        return parseInt(secondsPast/3600) + 'h';
	    }
	    if(secondsPast > 86400){
	          day = timeStamp.getDate();
	          month = timeStamp.toDateString().match(/ [a-zA-Z]*/)[0].replace(" ","");
	          year = timeStamp.getFullYear() == now.getFullYear() ? "" :  " "+timeStamp.getFullYear();
	          return day + " " + month + year;
	    }
	},

	timeSinceAgo : function(date) {

	    var seconds = Math.floor((new Date() - date) / 1000);

	    var interval = Math.floor(seconds / 31536000);

	    if (interval > 1) {
	        return interval + " years";
	    }
	    interval = Math.floor(seconds / 2592000);
	    if (interval > 1) {
	        return interval + " months";
	    }
	    interval = Math.floor(seconds / 86400);
	    if (interval > 1) {
	        return interval + " days";
	    }
	    interval = Math.floor(seconds / 3600);
	    if (interval > 1) {
	        return interval + " hours";
	    }
	    interval = Math.floor(seconds / 60);
	    if (interval > 1) {
	        return interval + " minutes";
	    }
	    return Math.floor(seconds) + " seconds";
	},

};

myself_blog_instance = new Myself_blog();