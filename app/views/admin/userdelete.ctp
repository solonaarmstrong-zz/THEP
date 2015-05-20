
<h1>Delete User</h1>

<?php echo $form->create('User', array('url' => array('controller' => 'admin', 'action' =>'userdelete'))); ?> 
<? echo $form->hidden('deleteuser',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$user["User"]["id"])); ?> 
<p>
Please confirm that you would like to delete this user:
</p>     
<table width="600">
    <tr>
        <td align="right" valign="top" width="200">First Name</td>
        <td width="400"><?=$user["User"]["firstname"]?></td>
    </tr><tr>
        <td align="right" valign="top">Last Name</td>
        <td><?=$user["User"]["lastname"]?></td>
    </tr><tr>
        <td align="right" valign="top">Email Address</td>
        <td><?=$user["User"]["email"]?></td>
    </tr><tr>
        <td></td>
        <td><?php echo $this->Form->submit('Delete User', array('class' => 'adminbutton', 'title' => 'Delete User')); ?></td>
    </tr>

</table>