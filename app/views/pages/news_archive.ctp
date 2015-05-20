<h1>News Archive</h1>

<?php foreach ($news as $row):
$content = strip_tags($row['News']['text']);
$content = substr($content,0,200);
 ?>

<div id="faq">
    <div style="float:right; width:124px;display: block;">
        <?php 
        if ($row['News']['photo_file_name'] != ""){
                echo $upload->image($row, 'News.photo', array('style' => 'thumb'));
        }
        ?>
    </div>
    <div style="width:400px;">
        <h2><?=$row['News']['title'];?></h2>
        <p><?=$content?> <a href="/pages/news-article/<?=$row['News']['id']?>">Read More</a></p>
    </div>

</div>    

               
<?php endforeach; ?>