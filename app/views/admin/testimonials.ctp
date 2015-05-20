<h1>Testimonials</h1>

<input type="button" onclick="window.location='/admin/testimonialsnew/'" class="adminbutton" value="New Testimonial" />
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
	   
    $content = substr($row['Testimonials']['text'],0,200);
?>
	<tr>
		<td><?php 
        	if ($row['Testimonials']['photo_file_name'] != ""){
        		echo $upload->image($row, 'Testimonials.photo', array('style' => 'thumb'));
            }else{
            	echo '&nbsp;';
            }
            
            ?></td>
        <td><?php echo $row['Testimonials']['title']; ?></td>
		<td><?php echo displayDate($row['Testimonials']['date'], 'F j, Y'); ?></td>
		<td><?php echo $content; ?></td>
		<td><?php echo $html->link('Update', array('action'=>'testimonialsedit/'.$row['Testimonials']['id'])); ?></td>
        <td><?php echo $html->link('Delete', array('action'=>'testimonialsdelete/'.$row['Testimonials']['id'])); ?></td>
	</tr>
<?php endforeach; ?>
</table>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>