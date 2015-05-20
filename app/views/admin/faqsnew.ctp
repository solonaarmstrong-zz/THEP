<h1>New FAQ</h1>

<?php echo $form->create('Faqs',array('url' => array('controller' => 'admin', 'action' =>'faqsnew')));?>
	
 		<table>
 			
                    <tr>
 				<td>Sort Order</td>
 				<td><?php echo $form->input('sortorder', array('type'=>'text','label'=>false)); ?></td>
 			</tr><tr>
 				<td>Question</td>
 				<td><?php echo $form->input('question', array('type'=>'textara','label'=>false,'rows'=> 5, 'cols'=>80)); ?></td>
 			</tr><tr>
 				<td>Answer</td>
 				<td><?php echo $form->input('answer', array('type'=>'textara','label'=>false,'rows'=> 5, 'cols'=>80)); ?></td>
 			</tr>
 			
 			<tr>
				<td></td>
				<td>
                                <?php echo $form->end(array('label' => 'Create FAQ', 'class'=>'adminbutton')); ?>
                                </td>
			</tr>
 			
 		</table>