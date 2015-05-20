<?php

foreach ($testimonial as $row):
$content = $row['text'];
$content = nl2br($content);
?>
        <div class="item">
                <a href="#"><?php 
        	if ($row['photo_file_name'] != ""){
        		echo $upload->image($row, 'Testimonials.photo', array('style' => 'default'));
            }
            ?></a>
                <div class="description">
                        <h2><?=$row['title'];?></h2>
                        <p><?=$content?></p>
                </div>
        </div>
<?php endforeach; ?>

<a href="/pages/testimonials/">More Testimonials</a>