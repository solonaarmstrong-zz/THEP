<h1>New Event</h1>

<?php echo $form->create('Events',array('url' => array('controller' => 'admin', 'action' =>'eventsnew'),'type' => 'file'));?>
	
 		<table>
 			<tr>
 				<td>Title</td>
 				<td><?php echo $form->input('title', array('label'=>false)); ?></td>
 			</tr>
 			<tr>
 				<td>Date</td>
 				<td><?php echo $form->input('date', array('label'=>false)); ?></td>
 			</tr>
 			<tr>
 				<td>Content</td>
 				<td><?php echo $form->input('text', array('type'=>'textara','label'=>false,'rows'=> 5, 'cols'=>80)); ?></td>
 			</tr>
 			
 			<tr>
 				<td>Image</td>
 				<td>
                <?php echo $form->file('Events.photo') ?>
                </td>
 			</tr>
 			<tr>
				<td></td>
				<td>
                                    <?php echo $form->end(array('label' => 'Create Event', 'class'=>'adminbutton')); ?>
                                </td>
			</tr>
 			
 		</table>