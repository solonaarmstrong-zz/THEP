
<h1>Admin Users</h1>

<input type="button" onclick="window.location='/admin/usernew/'" class="adminbutton" value="New User" />
<br />
<br />
<table cellspacing="0" border="0" id="tabledata">
<thead>
	<tr>
    	<th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>User Type</th>
        <th>Forum Notifications</th>
        <th>Document Notifications</th>
        <th>Comment Notifications</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
<?php foreach ($users as $user): ?>
    <tr>
        <td><?=$user["User"]["firstname"]?></td>
        <td><?=$user["User"]["lastname"]?></td>
        <td><?=$user["User"]["email"]?></td>
        <td><?=$user["User"]["usertype"]?></td>
        <td><?=$user["User"]["notificationdocument"]?></td>
        <td><?=$user["User"]["notificationrevision"]?></td>
        <td><?=$user["User"]["notificationcomment"]?></td> 
        <td><?php echo $html->link('Update', array('action'=>'useredit/'.$user['User']['id'])); ?></td>
        <td><?php echo $html->link('Delete', array('action'=>'userdelete/'.$user['User']['id'])); ?></td>
    </tr>  	
               
<?php endforeach; ?>
</tbody>
</table>
