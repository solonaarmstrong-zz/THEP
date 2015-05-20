<h1>Resources</h1>

<input type="button" onclick="window.location='/admin/resourcesnew/'" class="adminbutton" value="New Resource" />
<br />
<br />
<table cellpadding="0" cellspacing="0" id="tabledata">
<tr>
    <th><?php echo $paginator->sort('sortorder');?></th>
    <th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('type');?></th>
        <th>File</th>
        <th>URL</th>
	<th>Update</th>
    <th>Delete</th>
</tr>
<?php
$i = 0;

foreach ($rows as $row):
	   
    $content = substr($row['Resources']['description'],0,200);
?>
	<tr>
            <td><?php echo $row['Resources']['sortorder']; ?></td>
            <td><?php echo $row['Resources']['title']; ?></td>
		<td><?php echo $content; ?></td>
                <td><?php echo $row['Resources']['type']; ?></td>
                <td><?php 
        	if ($row['Resources']['resource_file_name'] != ""){
                    $file_name = $row['Resources']['resource_file_name'];
                    if (strpos($file_name, ".") > 0){
                        $file_name = substr($file_name,0,strpos($file_name, "."))."_original".substr($file_name,strpos($file_name, "."), strlen($file_name)-strpos($file_name, "."));
                    }
                    $resourcefile = '/upload/resources/'.$row['Resources']['id'].'/'.$file_name;
                    echo $html->link('View File', $resourcefile , array('target'=>'resource_window'));

            }else{
            	echo '&nbsp;';
            }
            
            ?></td>
                <td><a href="<?php echo $row['Resources']['url']; ?>" target="url_window"><?php echo $row['Resources']['url']; ?></a></td>
		<td><?php echo $html->link('Update', array('action'=>'resourcesedit/'.$row['Resources']['id'])); ?></td>
        <td><?php echo $html->link('Delete', array('action'=>'resourcesdelete/'.$row['Resources']['id'])); ?></td>
	</tr>
<?php endforeach; ?>
</table>

<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>