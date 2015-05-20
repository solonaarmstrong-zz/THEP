
<h1>Delete Lead Fact</h1>

<?php echo $form->create('Facts', array('url' => array('controller' => 'admin', 'action' =>'factsdelete'))); ?> 
<? echo $form->hidden('deletefacts',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$facts["Facts"]["id"])); ?> 
<p>
Please confirm that you would like to delete this Fact:
</p>
<P>   
    <?php echo $form->end(array('label' => 'Delete Lead Fact', 'class'=>'adminbutton')); ?>
</P>
<div style="clear:both"></div>
<p>
<h1><?=$facts["Facts"]["fact"]?></h1>

</p>
