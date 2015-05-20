
<h1>Delete Event</h1>

<?php echo $form->create('Events', array('url' => array('controller' => 'admin', 'action' =>'eventsdelete'))); ?> 
<? echo $form->hidden('deleteevents',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$events["Events"]["id"])); ?> 
<p>
Please confirm that you would like to delete this Event:
</p>
<P>
    <?php echo $form->end(array('label' => 'Delete Event', 'class'=>'adminbutton')); ?>
</P>
<div style="clear:both"></div>
<p>
<? 
if ($events["Events"]["photo_file_name"] != ""){
echo $upload->image($events, 'Events.photo', array('style' => 'default'), array('align' => 'right')); 
}
?>
<h1><?=$events["Events"]["title"]?></h1>
<div id="text-date"><?=displayDate($events["Events"]["date"], 'F j, Y')?></div>
<?=nl2br($events["Events"]["text"])?>
</p>
