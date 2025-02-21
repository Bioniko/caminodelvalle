<?php 

	$column_width = (int)(80/count($columns));
	
	if(!empty($list)){
?><div class="bDiv" >
		<table cellspacing="0" cellpadding="0" border="0" id="flex1" class="table table-striped">
		<thead>
			<tr class='hDiv'>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !$unset_clone || !empty($actions)){?>
				<th align="left" abbr="tools" axis="col1" class="" width='20%'>
					<div class="text-center">
						<?php echo $this->l('list_actions'); ?>
					</div>
				</th>
				<?php }?>
				<?php foreach($columns as $column){?>
				<th width='<?php echo $column_width?>%'>
					<div class="text-left field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php echo $order_by[1]?><?php }?>" 
						rel='<?php echo $column->field_name?>'>
						<?php echo $column->display_as?>
					</div>
				</th>
				<?php }?>
				
			</tr>
		</thead>		
		<tbody>
<?php foreach($list as $num_row => $row){ ?>        
		<tr  <?php if($num_row % 2 == 1){?>class="erow"<?php }?>>
		<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td align="center" width='0%'>
				<div class='tools'>				
					<?php if(!$unset_delete){?>
						<div class="btn btn-w-m btn-info" style="min-width: 0px;" onclick="window.location.href = '<?php echo $row->delete_url?>';">
							<a  title='<?php echo $this->l('list_delete')?> <?php echo $subject?>' class="delete-row" >
							<i class="fa-sharp fa-solid fa-trash" style="color: #fff"></i>
							</a>
						</div>
                    <?php }?>
                    <?php if(!$unset_edit){?>
						<div class="btn btn-w-m btn-info" style="min-width: 0px;" onclick="window.location.href = '<?php echo $row->edit_url?>';">
							<a  title='<?php echo $this->l('list_edit')?> <?php echo $subject?>' class="edit_button"><i class="fa-solid fa-pen-to-square" style="color: #fff"></i></a>
						</div>
					<?php }?>
                    <?php if(!$unset_clone){?>
						<div class="btn btn-w-m btn-info" style="min-width: 0px;" onclick="window.location.href = '<?php echo $row->clone_url?>';">
                        	<a title='<?php echo $this->l('list_clone')?> <?php echo $subject?>' class="clone_button"><i class="fa-solid fa-copy" style="color: #fff"></i></a>
						</div>
                    <?php }?>
					<?php if(!$unset_read){?>
						<div class="btn btn-w-m btn-info" style="min-width: 0px;" onclick="window.location.href = '<?php echo $row->read_url?>';">
							<a  title='<?php echo $this->l('list_view')?> <?php echo $subject?>' class="edit_button"><span class='fa-solid fa-magnifying-glass' style="color: #fff"></span></a>
						</div>
					<?php }?>
					<?php 
					if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){ 
							$action = $actions[$action_unique_id];
					?>
					<div class="btn btn-w-m btn-success" style="min-width: 0px;" onclick="window.open('<?php echo $action_url; ?>', '_blank');">
						<a  class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>"><?php 
							if(!empty($action->image_url))
							{
								?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label?>" /><?php 	
							}
						?></a>
					</div>		
					<?php }
					}
					?>					
                    <div class='clear'></div>
				</div>
			</td>
			<?php }?>
			<?php foreach($columns as $column){?>
			<td width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?>sorted<?php }?>'>
				<div class='text-left'><?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?></div>
			</td>
			<?php }?>
			
		</tr>
<?php } ?>        
		</tbody>
		</table>
	</div>
<?php }else{?>
	<br/>
	&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $this->l('list_no_items'); ?>
	<br/>
	<br/>
<?php }?>	
