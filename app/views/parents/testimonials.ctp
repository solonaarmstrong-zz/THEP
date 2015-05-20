<h1>I'm a parent > Testimonials</h1>

<?php foreach ($testimonials as $row): ?>
<div style="padding:10px; border-bottom:#333333 solid 1px; min-height:150px;">
    <div style="float:right; width:112px;">
        <?php 
        if ($row['Testimonials']['photo_file_name'] != ""){
                echo $upload->image($row, 'Testimonials.photo', array('style' => 'thumb'));
        }
        ?>
    </div>
    <div style="width:400px;">
        <?=$row['Testimonials']['text'];?>
        <p align="right"><strong>- <?=$row['Testimonials']['title'];?></strong></p>
    </div>

</div>    

               
<?php endforeach; ?>