<h1>News Articles</h1>

<?php foreach ($news as $row):
$content = substr($row['News']['text'],0,200);
 ?>

<div style="padding:10px; border-bottom:#333333 solid 1px; min-height:150px;">
    <div style="float:right; width:124px;">
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