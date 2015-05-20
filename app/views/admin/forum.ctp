<a href="/admin/forum/">User Forum</a><br />
<br />

<h1>User Forums</h1>

<div style="float:left"><input type="button" onclick="window.location='/admin/forumnew/'" class="adminbutton" value="New Forum" /></div>
<div style="padding:0 0 0 20px; float:left"><input type="button" onclick="window.location='/admin/categories/'" class="adminbutton" value="Manage Categories" /></div>
<div style="clear:both"></div>
<script language="javascript">
function submitform(){
    document.getElementById('DocumentsForumForm').submit();
}
</script>
<br />
<?php echo $form->create('Documents',array('url' => array('controller' => 'admin', 'action' =>'forum')));?>
<?php echo $form->input('category', array('options'=>$categories,'label'=>'Category Filter: ','empty'=>false,'onchange' => "javascript:submitform();")); ?>
<?php echo $form->end(); ?> 
<div style="clear:both"></div>
<table cellpadding="0" cellspacing="0" id="tabledata">
<tr>
    <th><?php echo $paginator->sort('title');?></th>
    <th><?php echo $paginator->sort('description');?></th>
    <th><?php echo $paginator->sort('category');?></th>
    <th><?php echo $paginator->sort('Last Revision');?></th>
    <th><?php echo $paginator->sort('Last Contributor');?></th>
    <th><?php echo $paginator->sort('File');?></th>
</tr>
<?php
$i = 0;

foreach ($rows as $row):
	   
    $content = substr($row['Documents']['description'],0,200);

    $comments = $row['activedocument']['Documentrevisions']['comments'];
    $contributor = $row['lastuser']['User']['firstname'].' '.$row['lastuser']['User']['lastname'];
    $filename = $row['activedocument']['Documentrevisions']['documentrevisions_file_name'];
    
?>
	<tr>
            <td><?php echo $html->link($row['Documents']['title'], '/admin/forumview/'.$row['Documents']['id']); ?></td>
            <td><?php echo $content; ?></td>
            <td><?php echo $row['Documents']['category']; ?></td>
            <td><?php echo $comments; ?></td>
            <td><?php echo $contributor; ?></td>
            <td><?php 
        	if ($filename != ""){
                    $file_name = $filename;
                    if (strpos($file_name, ".") > 0){
                        $file_name = substr($file_name,0,strpos($file_name, "."))."_original".substr($file_name,strpos($file_name, "."), strlen($file_name)-strpos($file_name, "."));
                    }
                    $resourcefile = '/upload/documentrevisions/'.$row['activedocument']['Documentrevisions']['id'].'/'.$file_name;
                    echo $html->link($filename, $resourcefile , array('target'=>'document_window'));

            }else{
            	echo '&nbsp;';
            }
            
            ?></td>
	</tr>
<?php endforeach; ?>
</table>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>