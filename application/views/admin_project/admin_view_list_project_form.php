<!-- <label id="lt-danger" style="color:red;"></label>
 -->
 <div id="total_project_rows_selected">
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

{if (isset($projectList) eq true)}
	<div id="projectList-container">
		<table class="table table-bordered table-condensed table-striped" id="project-list">
			<thead style="font-weight: bold;">
				<td>No</td>
				<td>Project ID</td>
				<td>Project title</td>
				<td>Prooject brief</td>
				<td>Category ID</td>
				<td>Category title</td>
				<td>Date Created</td>
				<td>Figure</td>
				<td>Status</td>
				<td>Action</td>
			</thead>
			{foreach from=$projectList key=no item=value }
				<tr class="recordPROJ" record-id="{$value->id}">
					<td>{$no+1}</td>
					<td>{$value->id}</td>
					<td>{$value->title}</td>
					<td>{$value->brief}</td>
					<td>{$value->category_id}</td>
					<td>{$value->category_title}</td>
					<td>{$value->date}</td>
					<td><img id="p_img_{$value->id}" style="width:150px; height:75px" src="{if ($value->avatar_name != null AND $value->avatar_name != "")} {$baseURL}userfiles/project/{$value->avatar_name} {else} assets/style/images/art/nofound.jpg {/if}" alt="" /></td>
					<td>{if (($value->status) eq 1) }
								On
							{else}
								Off
						{/if}
					</td>
					<td>
						<a href="index.php/admin_project/view_detail_project/{$value->id}" 
							id="{$value->id}" 
							class="edit_proj_button btn btn-orange"
							title="Edit">
							<i class="icon-pencil"></i>
						</a>
						<a href="javascript:void(0)" 
							id="{$value->id}" 
							name="{$value->title}" 
							class="remove_proj_button btn btn-red"
							title="Remove">
							<i class="icon-cancel-circled"></i>
						</a>
						{if (($value->status) eq 1) }
							<a href="javascript:void(0)" 
								id="{$value->id}" 
								class="ed_proj_button btn btn-navy" 
								title="Disable"
								action="Ddsable"> 
								<i class="icon-lock-1"></i> 
							</a>
							{else}
							<a href="javascript:void(0)" 
								id="{$value->id}" 
								class="ed_proj_button btn btn-gray"
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