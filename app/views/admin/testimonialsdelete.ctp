
<h1>Delete Testimonial</h1>

<?php echo $form->create('Testimonials', array('url' => array('controller' => 'admin', 'action' =>'testimonialsdelete'))); ?> 
<? echo $form->hidden('deletetestimonials',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$testimonials["Testimonials"]["id"])); ?> 
<p>
Please confirm that you would like to delete this Testimonial:
</p>
<P>
<?php echo $form->end(array('label' => 'Delete Testimonial', 'class'=>'adminbutton')); ?>
</P>
<div style="clear:both"></div>
<p>
<? 
if ($testimonials["Testimonials"]["photo_file_name"] != ""){
echo $upload->image($testimonials, 'Testimonials.photo', array('style' => 'default'), array('align' => 'right')); 
}
?>
<h1><?=$testimonials["Testimonials"]["title"]?></h1>
<div id="text-date"><?=displayDate($testimonials["Testimonials"]["date"], 'F j, Y')?></div>
<?=nl2br($testimonials["Testimonials"]["text"])?>
</p>
