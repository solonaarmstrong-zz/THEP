<h1>FAQs</h1>

<input type="button" onclick="window.location='/admin/faqsnew/'" class="adminbutton" value="New FAQ" />
<br />
<br />
<table cellpadding="0" cellspacing="0" id="tabledata">
<tr>
    <th><?php echo $paginator->sort('sortorder');?></th>
    <th><?php echo $paginator->sort('question');?></th>
	<th><?php echo $paginator->sort('answer');?></th>
	<th>Update</th>
    <th>Delete</th>
</tr>
<?php
$i = 0;

foreach ($rows as $row):
	   
    $content = substr($row['Faqs']['answer'],0,200);
?>
	<tr>
        <td><?php echo $row['Faqs']['sortorder']; ?></td>
        <td><?php echo $row['Faqs']['question']; ?></td>
		<td><?php echo $content; ?></td>
		<td><?php echo $html->link('Update', array('action'=>'faqsedit/'.$row['Faqs']['id'])); ?></td>
        <td><?php echo $html->link('Delete', array('action'=>'faqsdelete/'.$row['Faqs']['id'])); ?></td>
	</tr>
<?php endforeach; ?>
</table>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>