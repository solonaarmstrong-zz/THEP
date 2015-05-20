<h1>Reports</h1>
<p>Below is a list of informational reports that are available from the Trail Health & Environment Program. For more information or to obtain a printed copy, please <a href="/pages/contact/">contact us</a>.</p>
<?php foreach ($resources as $row):
	   
    $content = $row['Resources']['description'];
?>
<div class="factBox">
	<h2><?php echo $row['Resources']['title']; ?></h2>
		<p><?php echo $content; ?></p>
                <?php 
        	if ($row['Resources']['resource_file_name'] != ""){
                    $file_name = $row['Resources']['resource_file_name'];
                    if (strpos($file_name, ".") > 0){
                        $file_name = substr($file_name,0,strpos($file_name, "."))."_original".substr($file_name,strpos($file_name, "."), strlen($file_name)-strpos($file_name, "."));
                    }
                    $resourcefile = '/upload/resources/'.$row['Resources']['id'].'/'.$file_name;
                    echo $html->link('Download PDF', $resourcefile , array('target'=>'resource_window'));

            }
            
            if ($row['Resources']['url'] != ""){
                    ?>
                    <a href='<?php echo $row['Resources']['url']; ?>' target='url_window'>View Page</a>
                    <?php

            }
            
            ?>
</div>
<?php endforeach; ?>