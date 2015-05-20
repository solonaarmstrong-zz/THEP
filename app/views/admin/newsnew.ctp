<h1>News Article</h1>

<?php echo $form->create('News',array('url' => array('controller' => 'admin', 'action' =>'newsnew'),'type' => 'file'));?>
	
 		<table>
 			<tr>
 				<td>Title</td>
 				<td><?php echo $form->input('title', array('label'=>false)); ?></td>
 			</tr>
 			<tr>
 				<td>Date</td>
 				<td><?php echo $form->input('date', array('label'=>false)); ?></td>
 			</tr>
 			<tr>
 				<td>Content</td>
 				<td><?php echo $form->input('text', array('type'=>'textara','label'=>false,'rows'=> 15, 'cols'=>100)); ?></td>
 			</tr>
 			
 			<tr>
 				<td>Image</td>
 				<td>
                <?php echo $form->file('News.photo') ?>
                </td>
 			</tr>
 			<tr>
				<td></td>
				<td>
                                    <?php echo $form->end(array('label' => 'Create Article', 'class'=>'adminbutton')); ?>
                                </td>
			</tr>
 			
 		</table>
<script type="text/javascript" src="/js/jquery-1.7.1.min.js" ></script>  
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js" ></script>
<script type="text/javascript" > 
tinyMCE.init({         
mode : "textareas",         
theme : "advanced",  
relative_urls : false,       
plugins : "markettoimages, emotions,spellchecker,advhr,insertdatetime,preview",                           // Theme options - button# indicated the row# only         
theme_advanced_buttons1 : "bold,italic,underline,|,formatselect",         
theme_advanced_buttons2 : "cut,copy,paste,|,bullist,numlist,|,undo,redo,|,link,unlink,markettoimages,image,|,code,preview",         theme_advanced_buttons3 : "",               
theme_advanced_toolbar_location : "top",         
theme_advanced_toolbar_align : "left",         
theme_advanced_statusbar_location : "bottom",         
theme_advanced_resizing : false }); 
</script> 