
<h1>Edit Resource</h1>
<?php echo $form->create('Resources',array('url' => array('controller' => 'admin', 'action' =>'resourcesedit'),'type' => 'file'));  ?>
<? echo $form->hidden('id'); ?>

               
<table>
	<tr>
        <td>Sort Order</td>
        <td><?php echo $form->input('sortorder', array('label'=>false)); ?></td>
    </tr><tr>
        <td>Title</td>
        <td><?php echo $form->input('title', array('label'=>false)); ?></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><?php echo $form->textarea('description', array('label'=>false,'rows'=> 5, 'cols'=>80)); ?></td>
    </tr>
    <tr>
        <td>Type</td>
        <td><?php echo $form->select('type', $types, array('default'=>'Fact Sheet')); ?></td>
    </tr>
    <tr>
        <td>File</td>
        <td>
        <?php echo $form->file('Resources.resource') ?>
        </td>
    </tr>
    <tr>
        <td>URL</td>
        <td><?php echo $form->input('url', array('label'=>false)); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $form->end('Update Resource', array('label'=>false));?></td>
    </tr>

</table>