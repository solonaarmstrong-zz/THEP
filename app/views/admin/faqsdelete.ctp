
<h1>Delete FAQ</h1>

<?php echo $form->create('Faqs', array('url' => array('controller' => 'admin', 'action' =>'faqsdelete'))); ?> 
<? echo $form->hidden('deletefaqs',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$faqs["Faqs"]["id"])); ?> 
<p>
Please confirm that you would like to delete this Fact:
</p>
<P>   
    <?php echo $form->end(array('label' => 'Delete FAQ', 'class'=>'adminbutton')); ?>
</P>
<div style="clear:both"></div>

<h1><?=$faqs["Faqs"]["question"]?></h1>
<p>
<?=$faqs["Faqs"]["answer"]?>
</p>
