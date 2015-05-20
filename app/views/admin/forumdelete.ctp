
<h1>Delete Forum</h1>

<?php echo $form->create('Documents', array('url' => array('controller' => 'admin', 'action' =>'forumdelete'))); ?> 
<? echo $form->hidden('deleteforum',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$documents["Documents"]["id"])); ?> 
<p>
Please confirm that you would like to delete this Forum:
</p>     
<table width="600">
    <tr>
        <td align="right" valign="top" width="200">Category</td>
        <td width="400"><?=$documents['Documents']['category']?></td>
    </tr><tr>
        <td align="right" valign="top">Title</td>
        <td><?=$documents['Documents']['title']?></td>
    </tr><tr>
        <td></td>
        <td><?php echo $this->Form->submit('Delete Forum', array('class' => 'adminbutton', 'title' => 'Delete Forum')); ?></td>
    </tr>

</table>