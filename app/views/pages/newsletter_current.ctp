<h1>Current Newsletter</h1>
<?php 
if (count($resources)>0){
    //var_dump($resources);
foreach ($resources as $row):
    //var_dump($row);
    $content = $row['description'];
?>
<div class="factBox">
	<h3><?php echo $row['title']; ?></h3>
		<p><?php echo $content; ?></p>
                <?php 
        	if ($row['resource_file_name'] != ""){
                    $file_name = $row['resource_file_name'];
                    if (strpos($file_name, ".") > 0){
                        $file_name = substr($file_name,0,strpos($file_name, "."))."_original".substr($file_name,strpos($file_name, "."), strlen($file_name)-strpos($file_name, "."));
                    }
                    $resourcefile = '/upload/resources/'.$row['id'].'/'.$file_name;
                    echo $html->link('Download PDF', $resourcefile , array('target'=>'resource_window'));

            }
            
            if ($row['url'] != ""){
                    ?>
                    <a href='<?php echo $row['url']; ?>' target='url_window'>View Page</a>
                    <?php

            }
            
            ?>
</div>
<?php endforeach;
}else{
?>
<p>Current Newsletter with PDF download &amp; Online view will appear here.</p>
<p>Please take some time to see what the site has to offer, and if you have any questions please don’t heistate to <a href="#">contact</a> us directly.</p>
<?php
}
?>