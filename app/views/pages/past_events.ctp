<h1>Past Events</h1>
<?php foreach ($events as $row):
 ?>

<div style="padding:10px; border-bottom:#333333 solid 1px; min-height:150px;">
    <div>
        <h2><?=$row['Events']['title'];?></h2>
        <p><?=date('F j, Y',strtotime($row['Events']['date']));?></p>
        <p><?=$row['Events']['text'];?></p>
    </div>

</div>    

               
<?php endforeach; ?>