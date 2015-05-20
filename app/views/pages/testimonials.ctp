<h1>Testimonials</h1>

<?php foreach ($testimonials as $row): ?>
<div style="padding:10px; border-bottom:#333333 solid 1px; min-height:150px;">
    <div style="float:right; width:112px;">
        <?php 
        if ($row['Testimonials']['photo_file_name'] != ""){
                echo '<a href="/pages/testimonial/'.$row['Testimonials']['id'].'/">';
                echo $upload->image($row, 'Testimonials.photo', array('style' => 'thumb'));
                echo '</a>';
        }
        ?>
    </div>
    <div style="width:400px;">
        <?=$row['Testimonials']['text'];?>
        <p align="right"><strong>- <?=$row['Testimonials']['title'];?></strong></p>
    </div>

</div>    

               
<?php endforeach; ?>