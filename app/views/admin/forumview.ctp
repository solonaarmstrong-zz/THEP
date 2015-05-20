<script language="javascript">
function expand_layer(layer) {
    if (document.getElementById(layer).style.display == 'none') {
        document.getElementById(layer).style.display = 'block'
        document.getElementById(layer+'_image').src = '/images/subtract-blue-small.png';
    } else {
        document.getElementById(layer).style.display = 'none'
        document.getElementById(layer+'_image').src = '/images/add-blue-small.png';
    }
}

function add_comment(revisionid){
    comment = document.getElementById('comment_'+revisionid).value;
    document.getElementById('DocumentcommentsComment').value = comment;
    document.getElementById('DocumentcommentsRevisionid').value = revisionid;
    document.Documentcomments.submit();
    
    user = '<?=$user_info['firstname']?> <?=$user_info['lastname']?>';
    date = '<?=date('Y-m-d')?>';
 
    html = '<div class="individualcomments"><div class="individualcommentsuser">' + user + ' &raquo; ' + date + '</div><div class="individualcommentscomment">' + comment + '</div></div>';
    
    $('#individual_comments_'+revisionid).append(html);
}
</script>
<a href="/admin/forum/">User Forum</a> &raquo <?=$documents['Documents']['title']?><br />
<br />

<h1><?=$documents['Documents']['category']?> &raquo; <?=$documents['Documents']['title']?></h1>
      
<table width="100%">
    <tr>
        <td>
            <strong><?=$documents['Documents']['date']?></strong><br />
<?=$documents['Documents']['description']?></td>
    </tr>
</table>


<div id="newrevision"><a href="javascript:expand_layer('upload_form');"><img id="upload_form_image" src="/images/add-blue-small.png" border="0" align="absmiddle" /> Upload New Document</a></div>

<div id="upload_form" style="display:none;">
<?php echo $form->create('Documentrevisions',array('url' => array('controller' => 'admin', 'action' =>'forumnewdoc'),'type' => 'file'));?>
<?php echo $form->input('documentid', array('label'=>false,'type'=>'hidden','value'=>$documents['Documents']['id'])); ?>
<table>
    <tr>
            <td>Comments</td>
            <td><?php echo $form->input('comments', array('type'=>'textara','label'=>false,'rows'=> 5, 'cols'=>80)); ?></td>
    </tr><tr>
            <td>File</td>
            <td>
<?php echo $form->file('Documentrevisions.documentrevisions') ?>
</td>
    </tr>
    <tr>
            <td></td>
            <td>
                <?php echo $form->end(array('label' => 'Upload Document', 'class'=>'adminbutton')); ?>   
            </td>
    </tr>

</table>
</div>
<?php

    foreach($documentrevisions as $row){
        //var_dump($row);
        
        ?>
<div class="documentrevisions" id="revision_<?=$row['Documentrevisions']['id']?>">
    <div class="documentlink">
        <div class="documentuser" style="float:right;">
            <?=$row['Users']['firstname'].' '.$row['Users']['lastname']?> &raquo;
            <?=$row['Documentrevisions']['date']?>
        </div>
    <?
        if ($row['Documentrevisions']['documentrevisions_file_name'] != ''){
            $file_name = $row['Documentrevisions']['documentrevisions_file_name'];
            if (strpos($file_name, ".") > 0){
                $file_name = substr($file_name,0,strpos($file_name, "."))."_original".substr($file_name,strpos($file_name, "."), strlen($file_name)-strpos($file_name, "."));
            }
            $resourcefile = '/upload/documentrevisions/'.$row['Documentrevisions']['id'].'/'.$file_name;
            echo $html->link($row['Documentrevisions']['documentrevisions_file_name'], $resourcefile , array('target'=>'document_window'));

        }
    ?>
    </div><br />
    <?=$row['Documentrevisions']['comments']?>
    
    <?
    //find all the comments for this revision
    $comments = array();
    foreach($documentcomments as $comment){
        if ($comment['Documentcomments']['revisionid'] == $row['Documentrevisions']['id']){
            $comments[] = array(
                'user'=>$comment['Users']['firstname'].' '.$comment['Users']['lastname'],
                'date'=>$comment['Documentcomments']['date'],
                'comment'=>$comment['Documentcomments']['comment']
            );
        }
    }
    
    $comments_count = count($comments);
    
    ?>
    <div class="documentrevisioncomments">
    <div><a href="javascript:expand_layer('comments_<?=$row['Documentrevisions']['id']?>_layer');"><img id="comments_<?=$row['Documentrevisions']['id']?>_layer_image" src="/images/add-blue-small.png" border="0" align="absmiddle" /></a>Comments (<?=$comments_count?>)</div>

    <div id="comments_<?=$row['Documentrevisions']['id']?>_layer" style="display:none;">
    <div id="individual_comments_<?=$row['Documentrevisions']['id']?>">
        <?
    
    foreach($comments as $comment){
        ?>
        <div class="individualcomments">
        <div class="individualcommentsuser"><?=$comment['user']?> &raquo; <?=$comment['date']?></div>
        <div class="individualcommentscomment"><?=$comment['comment']?></div>
        </div>
        <?
    }
    ?>
    </div>
       Comment: <textarea id="comment_<?=$row['Documentrevisions']['id']?>" name="comment_<?=$row['Documentrevisions']['id']?>" cols="100" rows="3"></textarea> 
       <input type="button" onclick="add_comment(<?=$row['Documentrevisions']['id']?>)" value="Add Comment" />
    </div>
    </div>
</div>
        <?
    }
    if (count($documentrevisions) == 0){
        ?>
<script language="javascript">
expand_layer('upload_form');
</script>
        <?
    }
?>
<form action="/admin/forumnewcomment"  name="Documentcomments" id="Documentcomments" method="post" target="comment_iframe" accept-charset="utf-8">
<input type="hidden" name="_method" value="POST" />
<input type="hidden" name="data[Documentcomments][revisionid]" value="" id="DocumentcommentsRevisionid" />
<input type="hidden" name="data[Documentcomments][comment]" value="" id="DocumentcommentsComment" />
</form>

<iframe name="comment_iframe" id="comment_iframe" src="/blank.html" frameborder="0" width="1" height="1"></iframe>

<?php
//var_dump($user_info);
if ($user_info['usertype'] == 'Admin'){
?>
<br />
<p align='right'>
<a style="color:#FF0000; font-size:16px; line-height:20px;" href="/admin/forumdelete/<?=$documents['Documents']['id']?>">Delete Forum</a>
</p>
<?
}
?>