
<h1>Delete CMS page</h1>

<?php echo $form->create('Content', array('url' => array('controller' => 'admin', 'action' =>'contentadmindelete'))); ?> 
<? echo $form->hidden('deletecontent',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$content["Content"]["id"])); ?> 
<p>
Please confirm that you would like to delete this CMS Page:
</p>     
<table width="600">
    <tr>
        <td align="right" valign="top" width="200">Section</td>
        <td width="400"><?=$content["Content"]["section"]?></td>
    </tr><tr>
        <td align="right" valign="top">Page</td>
        <td><?=$content["Content"]["page"]?></td>
    </tr><tr>
        <td align="right" valign="top">View File</td>
        <td><?=$content["Content"]["file"]?></td>
    </tr><tr>
        <td></td>
        <td><?php echo $form->end(array('label' => 'Delete CMS Page', 'class'=>'adminbutton')); ?></td>
    </tr>

</table>