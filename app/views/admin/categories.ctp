<a href="/admin/forum/">User Forum</a> &raquo <a href="/admin/categories/">Categories</a><br />
<br />
<h1>Categories</h1>

<input type="button" onclick="window.location='/admin/categorynew/'" class="adminbutton" value="New Category" />
<br />
<br />
<table cellpadding="0" cellspacing="0" id="tabledata">
<tr>
    <th>Category</th>
    <th>Update</th>
    <th>Delete</th>
</tr>
<?php
$i = 0;

foreach ($rows as $row):
	   
?>
	<tr>
        <td><?php echo $row['Categories']['category']; ?></td>
	<td><?php echo $html->link('Update', array('action'=>'categoryedit/'.$row['Categories']['id'])); ?></td>
        <td><?php echo $html->link('Delete', array('action'=>'categorydelete/'.$row['Categories']['id'])); ?></td>
	</tr>
<?php endforeach; ?>
</table>