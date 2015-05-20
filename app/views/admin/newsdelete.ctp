
<h1>Delete Article</h1>

<?php echo $form->create('News', array('url' => array('controller' => 'admin', 'action' =>'newsdelete'))); ?> 
<? echo $form->hidden('deletenews',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$news["News"]["id"])); ?> 
<p>
Please confirm that you would like to delete this Article:
</p>
<P>
<?php echo $form->end(array('label' => 'Delete Article', 'class'=>'adminbutton')); ?>
</P>
<div style="clear:both"></div>
<p>
<? 
if ($news["News"]["photo_file_name"] != ""){
echo $upload->image($news, 'News.photo', array('style' => 'default'), array('align' => 'right')); 
}
?>
<h1><?=$news["News"]["title"]?></h1>
<div id="text-date"><?=displayDate($news["News"]["date"], 'F j, Y')?></div>
<?=nl2br($news["News"]["text"])?>
</p>
