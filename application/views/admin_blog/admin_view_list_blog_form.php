<!-- <label id="lt-danger" style="color:red;"></label>
 -->
 <div id="total_blog_rows_selected">
	{if (isset($total_rows)) }
		{if ($total_rows > 0) }
			<strong>Found {$total_rows} result(s)</strong>
		{else} 
			<center>
				<div class='jumbotron'>
					<h3>Found no result</h3>
				</div>
			</center>
		{/if}
	{/if}
</div>

{if (isset($blogList) eq true)}
	<div id="blogList-container">
		<table class="table table-bordered table-condensed table-striped" id="blog-list">
			<thead style="font-weight: bold;">
				<td>No</td>
				<td>Blog ID</td>
				<td>Blog title</td>
				<td>Blog brief</td>
				<td>Category ID</td>
				<td>Category title</td>
				<td>Date Created</td>
				<td>Figure</td>
				<td>Status</td>
				<td>Action</td>
			</thead>
			{foreach from=$blogList key=no item=value }
				<tr class="recordBLOG" record-id="{$value->blog_id}">
					<td>{$no+1}</td>
					<td>{$value->blog_id}</td>
					<td>{$value->blog_title}</td>
					<td>{$value->blog_brief}</td>
					<td>{$value->category_id}</td>
					<td>{$value->category_title}</td>
					<td>{$value->blog_date}</td>
					<td>
					
						<img id="p_img_{$value->blog_id}" style="width:150px; height:75px" 
							src="{if ($value->blog_avatar_name != null AND $value->blog_avatar_name != "")} {$baseURL}userfiles/blog/{$value->blog_avatar_name} {else} assets/style/images/art/nofound.jpg {/if}" alt="" />
					
					</td>
					<td>{if (($value->blog_status) eq 1) }
								On
							{else}
								Off
						{/if}
					</td>
					<td>
						<a href="index.php/admin_blog/view_detail_blog/{$value->blog_id}" 
							id="{$value->blog_id}" 
							class="edit_blog_button btn btn-orange"
							title="Edit">
							<i class="icon-pencil"></i>
						</a>
						<a href="javascript:void(0)" 
							id="{$value->blog_id}" 
							name="{$value->blog_title}" 
							class="remove_blog_button btn btn-red"
							title="Remove">
							<i class="icon-cancel-circled"></i>
						</a>
						{if (($value->blog_status) eq 1) }
							<a href="javascript:void(0)" 
								id="{$value->blog_id}" 
								class="ed_blog_button btn btn-navy" 
								title="Diable"
								action="disable"> 
								<i class="icon-lock-1"></i> 
							</a>
							{else}
							<a href="javascript:void(0)" 
								id="{$value->blog_id}" 
								class="ed_blog_button btn btn-gray"
								title="Enable"
								action="enable"> 
								<i class="icon-lock-open-1"></i>
							</a>
						{/if}
					</td>
				</tr>
			{/foreach}
		</table>
	</div>
{/if}

{if (isset($pagination_link)) }
	<center>
		{$pagination_link}
	</center>
{/if}