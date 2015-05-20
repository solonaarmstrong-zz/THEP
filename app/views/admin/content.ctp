<h1>Page Content</h1>
<p align="right"><a href="contentadmin">Available CMS pages</a></p>
<table cellpadding="0" cellspacing="0" id="tabledata" width="600">
<tr>
	<th>Section</th>
	<th>Page</th>
    <th>Edit</th>
</tr>
<?php
$i = 0;
foreach ($rows as $row):
	  
?>
	<tr>
		<td><?php echo $row['Content']['section']; ?></td>
		<td><?php echo $row['Content']['page']; ?></td>
		<td><?php echo $html->link('Edit', array('action'=>'contentedit/'.$row['Content']['id'])); ?></td>
	</tr>
<?php endforeach; ?>
</table>