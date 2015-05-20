<a href="/admin/forum/">User Forum</a> &raquo; New Forum<br />
<br />
<h1>New Forum</h1>

<?php echo $form->create('Documents',array('url' => array('controller' => 'admin', 'action' =>'forumnew'),'type' => 'file'));?>
	
 		<table>
 			<tr>
 				<td>Title</td>
 				<td><?php echo $form->input('title', array('label'=>false)); ?></td>
 			</tr>
 			<tr>
 				<td>Desciption</td>
 				<td><?php echo $form->input('description', array('type'=>'textara','label'=>false,'rows'=> 5, 'cols'=>80)); ?></td>
 			</tr>
                        
 			<tr>
 				<td>Category</td>
 				<td><?php echo $form->input('category', array('options'=>$categories,'label'=>false,'empty'=>false,'default'=>'Fact Sheet')); ?></td>
 			</tr>
                        <tr>
 				<td>Date</td>
 				<td><?php echo $form->input('date', array('label'=>false)); ?></td>
 			</tr>
 			<tr>
				<td></td>
				<td>
                                    <?php echo $form->end(array('label' => 'Create Forum', 'class'=>'adminbutton')); ?>   
                                </td>
			</tr>
 			
 		</table>