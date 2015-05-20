
<h1>Edit CMS Page</h1>

<?php echo $form->create('Content', array('url' => array('controller' => 'admin', 'action' =>'contentadminedit'))); ?> 
<? echo $form->hidden('id'); ?>      
<table width="600">
    <tr>
        <td align="right" valign="top" width="200"><span class="error-message">*</span> Section</td>
        <td width="400"><?php echo $form->input('Content.section', array("label"=>false)); ?></td>
    </tr><tr>
        <td align="right" valign="top"><span class="error-message">*</span> Page</td>
        <td><?php echo $form->input('Content.page', array("label"=>false)); ?></td>
    </tr><tr>
        <td align="right" valign="top"><span class="error-message">*</span> View File</td>
        <td><?php echo $form->input('Content.file', array("label"=>false)); ?></td>
    </tr><tr>
        <td></td>
        <td><?php echo $form->end(array('label' => 'Update Page', 'class'=>'adminbutton')); ?></td>
    </tr>

</table>