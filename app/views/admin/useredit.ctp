
<h1>Edit User</h1>

<?php echo $form->create('User', array('url' => array('controller' => 'admin', 'action' =>'useredit'))); ?> 
<? echo $form->hidden('id'); ?>      
<table width="600">
    <tr>
        <td align="right" valign="top" width="200"><span class="error-message">*</span> First Name</td>
        <td width="400"><?php echo $form->input('User.firstname', array("label"=>false)); ?></td>
    </tr><tr>
        <td align="right" valign="top"><span class="error-message">*</span> Last Name</td>
        <td><?php echo $form->input('User.lastname', array("label"=>false)); ?></td>
    </tr><tr>
        <td align="right" valign="top"><span class="error-message">*</span> Email Address</td>
        <td><?php echo $form->input('User.email', array("label"=>false)); ?></td>
    </tr><tr>
        <td align="right" valign="top">Re-set Password</td>
        <td><?php echo $form->input('User.passwordplain', array("label"=>false, 'type'=>'password', 'value'=>'')); ?></td>
    </tr><tr>
        <td align="right" valign="top">User Type</td>
        <td><?php echo $form->input('User.usertype', array("label"=>false, 'type'=>'select', 'options'=>array('Admin'=>'Admin','Forum'=>'Forum'))); ?></td>
</tr><tr>
    <td align="right" valign="top">Forum Notifications</td>
    <td><?php echo $form->input('User.notificationdocument', array("label"=>false, 'type'=>'select', 'options'=>array('yes'=>'yes','no'=>'no'))); ?></td>
</tr><tr>
    <td align="right" valign="top">Document Notifications</td>
    <td><?php echo $form->input('User.notificationrevision', array("label"=>false, 'type'=>'select', 'options'=>array('yes'=>'yes','no'=>'no'))); ?></td>
</tr><tr>
    <td align="right" valign="top">Comment Notifications</td>
    <td><?php echo $form->input('User.notificationcomment', array("label"=>false, 'type'=>'select', 'options'=>array('yes'=>'yes','no'=>'no'))); ?></td>
</tr><tr>
        <td></td>
        <td><?php echo $this->Form->submit('Update User', array('class' => 'adminbutton', 'title' => 'Update User')); ?></td>
    </tr>

</table>