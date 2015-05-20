
<h1>Delete Resource</h1>

<?php echo $form->create('Resources', array('url' => array('controller' => 'admin', 'action' =>'resourcesdelete'))); ?> 
<? echo $form->hidden('deleteresources',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$resources["Resources"]["id"])); ?> 
<p>
Please confirm that you would like to delete this Article:
</p>
<P>
<?php echo $form->end(array('label' => 'Delete Resource', 'class'=>'adminbutton')); ?>     
</P>
<div style="clear:both"></div>
<p>

<h1><?=$resources["Resources"]["title"]?></h1>
<?=nl2br($resources["Resources"]["description"])?>
<br />
<br />
<a href="<?=$resources["Resources"]["url"]?>" target="url_window"><?=$resources["Resources"]["url"]?></a>
</p>
