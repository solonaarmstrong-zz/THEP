<h1>Testimonials</h1>

<?php echo $form->create('Testimonials',array('url' => array('controller' => 'admin', 'action' =>'testimonialsnew'),'type' => 'file'));?>
	
 		<table>
 			<tr>
 				<td>Name</td>
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
 				<td>Section</td>
 				<td>Parents: <?php echo $form->input('parents', array('options'=>array('Yes'=>'Yes', 'No'=>'No'),'label'=>false,'empty'=>false,'default'=>'Yes', 'div'=>false)); ?>
                                    <br/>Home Owners: <?php echo $form->input('home_owners', array('options'=>array('Yes'=>'Yes', 'No'=>'No'),'label'=>false,'empty'=>false,'default'=>'Yes', 'div'=>false)); ?>
                                    <br/>Potential Residents: <?php echo $form->input('potential_residents', array('options'=>array('Yes'=>'Yes', 'No'=>'No'),'label'=>false,'empty'=>false,'default'=>'Yes', 'div'=>false)); ?>
                                </td>
 			</tr>
 			<tr>
 				<td>Image</td>
 				<td>
                <?php echo $form->file('Testimonials.photo') ?>
                </td>
 			</tr>
 			<tr>
				<td></td>
				<td>
                                    <?php echo $form->end(array('label' => 'Create Testimonial', 'class'=>'adminbutton')); ?>
                                </td>
			</tr>
 			
 		</table>