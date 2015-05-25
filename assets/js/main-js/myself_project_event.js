$(function() {
	//================================================================================================
	// Lazy loading project list
	var end_load_project = false;
	var _nextpage = 2;

	// Load more project
	$('body').on('click', '.load_more_project_list_button', function(e){
		e.preventDefault();
		lazy_load_more_project_list();
	});


	function lazy_load_more_project_list_origin()
	{
		if (!end_load_project) 
     	{
		  	$.ajax({
				type 		: 'post',
				url  		: 'index.php/home/load_more_project_list',
				dataType	: 'html',
				data 		: 
				{
					next_page : _nextpage,
				},
				success: function(data){
					if(data.trim != '' && data.trim != null)
	    			{
	    				$('#frontend_project_list').append(data);
						_nextpage++;
					}
					else
					{
						alert('There is no more project available for loading');
						end_load_project = true;
					}
				},
				error: function(){						
					alert('Error while request...');
				}
			});
		}
	};
	
	var $container = $('#frontend_project_list');
	$container.isotope({
	    itemSelector: '.lightbox-wrapper .item',
	    layoutMode: 'fitRows'
	});

	function lazy_load_more_project_list()
	{
		if (!end_load_project) 
     	{
		  	$.ajax({
				type 		: 'post',
				url  		: 'index.php/home/load_more_project_list',
				dataType	: 'json',
				data 		: 
				{
					next_page : _nextpage,
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
		    				alert('There is no more project available for loading');
							end_load_project = true;
						}
						else
						{
							var obj = data.project_list; 
							for(var i = 0; i < obj.length; i++) {

								var $elems = myself_project_instance.load_template_project_list(obj[i]);

		    					// append elements to container
							    $container.append( $elems )
							      // add and lay out newly appended elements
							      .isotope( 'appended', $elems  );
							}
		    				_nextpage++;
						}
		            }
				},
				error: function(){						
					alert('Error while request...');
				}
			});
		}
	};

	

})
