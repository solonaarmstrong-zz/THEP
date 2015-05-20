<div class="testimonials">
<?php
foreach ($widget_testimonials as $row):

if (strlen($row['Testimonials']['text']) > 150){
    if (strpos($row['Testimonials']['text'],' ',150) === false){
        $content = $row['Testimonials']['text'];
    }else{
        $x = strpos($row['Testimonials']['text'],' ',150);
        $content = substr($row['Testimonials']['text'],0,$x);
    }
}else{
    $content = $row['Testimonials']['text'];
}
?>
        <div class="holder">
                <?php 
        	if ($row['Testimonials']['photo_file_name'] != ""){
                    echo '<a href="/pages/testimonial/'.$row['Testimonials']['id'].'/">';
                    echo $upload->image($row, 'Testimonials.photo', array('style' => 'thumb'));
                    echo '</a>';
                }
                ?>
                <blockquote>
                        <div>
                                <q><?=$content?>...<a href="/pages/testimonial/<?=$row['Testimonials']['id'];?>/">read more</a></q>
                                <cite>- <?=$row['Testimonials']['title'];?></cite>
                        </div>
                </blockquote>
        </div>
<?php endforeach; ?>
        <div class="more">
                <a href="/pages/testimonials/">more testimonials &raquo;</a>
        </div>
</div>