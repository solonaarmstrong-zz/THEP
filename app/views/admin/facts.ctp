<h1>Lead Facts</h1>

<input type="button" onclick="window.location='/admin/factsnew/'" class="adminbutton" value="New Lead Fact" />
<br />
<br />
<table cellpadding="0" cellspacing="0" id="tabledata">
<tr>
    <th><?php echo $paginator->sort('fact');?></th>
	<th>Update</th>
    <th>Delete</th>
</tr>
<?php
$i = 0;

foreach ($rows as $row):
?>
	<tr>
            <td><?php echo $row['Facts']['fact']; ?></td>	
            <td><?php echo $html->link('Update', array('action'=>'factsedit/'.$row['Facts']['id'])); ?></td>
            <td><?php echo $html->link('Delete', array('action'=>'factsdelete/'.$row['Facts']['id'])); ?></td>
	</tr>
<?php endforeach; ?>
</table>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>