<h1>Lead Fact</h1>

<?php echo $form->create('Facts',array('url' => array('controller' => 'admin', 'action' =>'factsnew'),'type' => 'file'));?>
	
 		<table>
 			<tr>
 				<td>Fact</td>
 				<td><?php echo $form->input('fact', array('type'=>'textara','label'=>false,'rows'=> 5, 'cols'=>80)); ?></td>
 			</tr>
 			
 			<tr>
				<td></td>
				<td>
                                <?php echo $form->end(array('label' => 'Create Lead Fact', 'class'=>'adminbutton')); ?>
                                </td>
			</tr>
 			
 		</table>