
<h1>Available CMS Pages</h1>

<input type="button" onclick="window.location='contentadminnewpage'" class="adminbutton" value="New Page" />
<br />
<br />
<table cellpadding="0" cellspacing="0" id="tabledata" width="700">
<tr>
	<th>Section</th>
	<th>Page</th>
    <th>View File</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
<?php
$i = 0;
foreach ($rows as $row):
	  
?>
	<tr>
		<td><?php echo $row['Content']['section']; ?></td>
		<td><?php echo $row['Content']['page']; ?></td>
        <td><?php echo $row['Content']['file']; ?></td>
		<td><?php echo $html->link('Change Paramaters', array('action'=>'contentadminedit/'.$row['Content']['id'])); ?></td>
        <td><?php echo $html->link('Delete', array('action'=>'contentadmindelete/'.$row['Content']['id'])); ?></td>
	</tr>
<?php endforeach; ?>
</table>
<br />
<input type="button" onclick="window.location='contentadminnewpage'" class="adminbutton" value="New Page" />
<br />
<br />