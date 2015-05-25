function Myself_project() {
	this.base_url = window.location.origin+"/quangnguyen/";
}

Myself_project.prototype = {
	load_template_project_list : function(obj){
		var output='';
		output+='<li class="item thumb '+obj.id+'">';
	    output+='<a href="index.php/home/view_project_detail/'+obj.id+'" title="'+obj.title+'">';
	    output+='<div class="overlay">';
	    output+='<div class="info">';
	    output+='<h4>'+obj.title+'</h4>';
	    output+='<span>'+obj.brief+'</span> </div>';
	    output+='</div>';
	    output+='<img src="'+baseUrlQ+'userfiles/project/'+obj.avatar_name+'" alt="" />';
	    output+='</a>';
	    output+='<br> <h5>'+obj.title+'</h5><br>';
	  	output+='</li>';

	  	var $item = $(output);
  		return $item;
	},
};

myself_project_instance = new Myself_project();