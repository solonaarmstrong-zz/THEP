<a href="/admin/forum/">User Forum</a> &raquo <a href="/admin/categories/">Categories</a> &raquo New Category<br />
<br />
<h1>New Category</h1>

<?php echo $form->create('Categories',array('url' => array('controller' => 'admin', 'action' =>'categorynew')));?>
	
 		<table>
 			<tr>
 				<td>Category</td>
 				<td><?php echo $form->input('category', array('label'=>false)); ?></td>
 			</tr>
 			<tr>
				<td></td>
				<td>
                                    <?php echo $form->end(array('label' => 'Create Category', 'class'=>'adminbutton')); ?>
                                </td>
			</tr>
 			
 		</table>