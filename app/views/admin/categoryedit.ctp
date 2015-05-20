<a href="/admin/forum/">User Forum</a> &raquo <a href="/admin/categories/">Categories</a> &raquo Edit Category<br />
<br />
<h1>Edit Category</h1>
<?php echo $form->create('Categories',array('url' => array('controller' => 'admin', 'action' =>'categoryedit')));  ?>
<? echo $form->hidden('id'); ?>

               
<table>
	<tr>
        <td>Category</td>
        <td><?php echo $form->input('category', array('type'=>'text','label'=>false)); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php echo $form->end(array('label' => 'Update Category', 'class'=>'adminbutton')); ?>
        </td>
    </tr>

</table>