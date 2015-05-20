
<h1>Edit Resource</h1>
<?php echo $form->create('Resources',array('url' => array('controller' => 'admin', 'action' =>'resourcesedit'),'type' => 'file'));  ?>
<? echo $form->hidden('id'); ?>

               
<table>
	<tr>
        <td>Sort Order</td>
        <td><?php echo $form->input('sortorder', array('label'=>false)); ?></td>
    </tr><tr>
        <td>Title</td>
        <td><?php echo $form->input('title', array('label'=>false)); ?></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><?php echo $form->input('description', array('type'=>'textara','label'=>false,'rows'=> 5, 'cols'=>80)); ?></td>
    </tr>
    <tr>
            <td>Type</td>
            <td><?php echo $form->input('type', array('options'=>$types,'label'=>false,'empty'=>false,'default'=>'Fact Sheet')); ?></td>
    </tr>
    <tr>
            <td>Section</td>
            <td>Parents: <?php echo $form->input('parents', array('options'=>array('Yes'=>'Yes', 'No'=>'No'),'label'=>false,'empty'=>false, 'div'=>false)); ?>
                <br/>Home Owners: <?php echo $form->input('home_owners', array('options'=>array('Yes'=>'Yes', 'No'=>'No'),'label'=>false,'empty'=>false, 'div'=>false)); ?>
                <br/>Potential Residents: <?php echo $form->input('potential_residents', array('options'=>array('Yes'=>'Yes', 'No'=>'No'),'label'=>false,'empty'=>false, 'div'=>false)); ?>
            </td>
    </tr>
    <tr>
        <td>File</td>
        <td>
            <?php 
        	if ($resources['Resources']['resource_file_name'] != ""){
                    $file_name = $resources['Resources']['resource_file_name'];
                    if (strpos($file_name, ".") > 0){
                        $file_name = substr($file_name,0,strpos($file_name, "."))."_original".substr($file_name,strpos($file_name, "."), strlen($file_name)-strpos($file_name, "."));
                    }
                    $resourcefile = '/upload/resources/'.$resources['Resources']['id'].'/'.$file_name;
                    echo $html->link('View File', $resourcefile , array('target'=>'resource_window'));
                    ?>
            <a href="/admin/resourcesedit/<?php echo $resources['Resources']['id']; ?>/deletefile/">Delete File</a>
                    <?php

            }
            ?>
            <br/>
        <?php echo $form->file('Resources.resource') ?>
        </td>
    </tr>
    <tr>
        <td>URL</td>
        <td><?php echo $form->input('url', array('label'=>false, 'class'=>'inputlong')); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php echo $form->end(array('label' => 'Update Resource', 'class'=>'adminbutton')); ?>
        </td>
    </tr>

</table>
