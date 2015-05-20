<h1>New Resource</h1>

<?php echo $form->create('Resources',array('url' => array('controller' => 'admin', 'action' =>'resourcesnew'),'type' => 'file'));?>
	
 		<table>
 			<tr>
 				<td>Sort Order</td>
 				<td><?php echo $form->input('sortorder', array('label'=>false)); ?></td>
 			</tr><tr>
 				<td>Title</td>
 				<td><?php echo $form->input('title', array('label'=>false)); ?></td>
 			</tr>
 			<tr>
 				<td>Desciption</td>
 				<td><?php echo $form->input('description', array('type'=>'textara','label'=>false,'rows'=> 5, 'cols'=>80)); ?></td>
 			</tr>
                        
 			<tr>
 				<td>Type</td>
 				<td><?php echo $form->input('type', array('options'=>$types,'label'=>false,'empty'=>false,'default'=>'Fact Sheet')); ?></td>
 			</tr>
                        <tr>
 				<td>Section</td>
 				<td>Parents: <?php echo $form->input('parents', array('options'=>array('Yes'=>'Yes', 'No'=>'No'),'label'=>false,'empty'=>false,'default'=>'Yes', 'div'=>false)); ?>
                                    <br/>Home Owners: <?php echo $form->input('home_owners', array('options'=>array('Yes'=>'Yes', 'No'=>'No'),'label'=>false,'empty'=>false,'default'=>'Yes', 'div'=>false)); ?>
                                    <br/>Potential Residents: <?php echo $form->input('potential_residents', array('options'=>array('Yes'=>'Yes', 'No'=>'No'),'label'=>false,'empty'=>false,'default'=>'Yes', 'div'=>false)); ?>
                                </td>
 			</tr>
 			
 			<tr>
 				<td>File</td>
 				<td>
                <?php echo $form->file('Resources.resource') ?>
                </td>
 			</tr>
                        <tr>
 				<td>URL</td>
 				<td><?php echo $form->input('url', array('class' => 'inputlong', 'label'=>false)); ?></td>
 			</tr>
 			<tr>
				<td></td>
				<td>
                                    <?php echo $form->end(array('label' => 'Create Resource', 'class'=>'adminbutton')); ?>   
                                </td>
			</tr>
 			
 		</table>