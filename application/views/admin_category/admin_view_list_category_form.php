<!-- <label id="lt-danger" style="color:red;"></label>
 -->
 <div id="total_category_rows_selected">
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

{if (isset($categoryList) eq true)}
	<div id="categoryList-container">
		<table class="table table-bordered table-condensed table-striped" id="category-list">
			<thead style="font-weight: bold;">
				<td>No</td>
				<td>Category ID</td>
				<td>Category title</td>
				<td>Category description</td>
				<td>Category type</td>
				<td>Status</td>
				<td>Action</td>
			</thead>
			{foreach from=$categoryList key=no item=value }
				<tr class="recordCATEGORY" record-id="{$value->category_id}">
					<td>{$no+1}</td>
					<td>{$value->category_id}</td>
					<td>{$value->category_title}</td>
					<td>{$value->category_description}</td>
					<td>{if (($value->category_type) == 'p') }
								Project
							{else}
								Blog
						{/if}
					</td>
					<td>{if (($value->category_status) eq 1) }
								On
							{else}
								Off
						{/if}
					</td>
					<td>
						<a href="javascript:void(0)"  
							categoryid ="{$value->category_id}"
							categoryname="{$value->category_title}" 
							categorydescription="{$value->category_description}"
							categorytype="{$value->category_type}"
							class="edit_category_button btn btn-orange"
							title="Edit">
							<i class="icon-pencil"></i>
						</a>
						<!-- <a href="javascript:void(0)" 
							id="{$value->category_id}" 
							name="{$value->category_title}" 
							class="remove_category_button btn btn-red"
							title="Remove">
							<i class="icon-cancel-circled"></i>
						</a> -->
						{if (($value->category_status) eq 1) }
								<a href="javascript:void(0)" 
									id="{$value->category_id}" 
									class="ed_cat_button btn btn-navy"
									title="Disable"
									action="disable"> 
									<i class="icon-lock-1"></i>
								</a>
							{else}
								<a href="javascript:void(0)" 
									id="{$value->category_id}" 
									class="ed_cat_button btn btn-gray"
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