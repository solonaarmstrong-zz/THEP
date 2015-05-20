<div class="block">
        <div class="heading">
                <a href="/pages/news-articles/">more news &amp; events &raquo;</a>
                <h2>News &amp; Events</h2>
        </div>



<?php
foreach ($widget_news as $row):
if (strlen($row['News']['text'])> 200){
    if (strpos($row['News']['text'],' ',200) === false){
        $content = $row['News']['text'];
    }else{
        $x = strpos($row['News']['text'],' ',200);
        $content = substr($row['News']['text'],0,$x);
    }
}else{
    $content = $row['News']['text'];
}
?>
        <div class="item">
                <a href="/pages/news-article/<?=$row['News']['id']?>"><?php 
        	if ($row['News']['photo_file_name'] != ""){
        		echo $upload->image($row, 'News.photo', array('style' => 'thumb'));
            }
            ?></a>
                <div class="description">
                        <h3><?=$row['News']['title'];?></h3>
                        <p><?=$content?> <a href="/pages/news-article/<?=$row['News']['id']?>">more info</a></p>
                </div>
        </div>
<?php endforeach; ?>
</div>