<h1>Events</h1>

<input type="button" onclick="window.location='/admin/eventsnew/'" class="adminbutton" value="New Event" />
<br />
<br />
<table cellpadding="0" cellspacing="0" id="tabledata">
<tr>
	<th>&nbsp;</th>
    <th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('date');?></th>
	<th><?php echo $paginator->sort('text');?></th>
	<th>Update</th>
    <th>Delete</th>
</tr>
<?php
$i = 0;

foreach ($rows as $row):
	   
    $content = substr($row['Events']['text'],0,200);
?>
	<tr>
		<td><?php 
        	if ($row['Events']['photo_file_name'] != ""){
        		echo $upload->image($row, 'Events.photo', array('style' => 'thumb'));
            }else{
            	echo '&nbsp;';
            }
            
            ?></td>
        <td><?php echo $row['Events']['title']; ?></td>
		<td><?php echo displayDate($row['Events']['date'], 'F j, Y'); ?></td>
		<td><?php echo $content; ?></td>
		<td><?php echo $html->link('Update', array('action'=>'eventsedit/'.$row['Events']['id'])); ?></td>
        <td><?php echo $html->link('Delete', array('action'=>'eventsdelete/'.$row['Events']['id'])); ?></td>
	</tr>
<?php endforeach; ?>
</table>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>