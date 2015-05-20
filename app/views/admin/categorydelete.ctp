<a href="/admin/forum/">User Forum</a> &raquo <a href="/admin/categories/">Categories</a> &raquo Delete Category<br />
<br />
<h1>Delete Category</h1>

<?php echo $form->create('Categories', array('url' => array('controller' => 'admin', 'action' =>'categorydelete'))); ?> 
<? echo $form->hidden('deletecategory',array('value'=>'true')); ?> 
<? echo $form->hidden('id',array('value'=>$category["Categories"]["id"])); ?> 
<p>
Please confirm that you would like to delete this category:
</p>     
<table width="600">
    <tr>
        <td align="right" valign="top" width="200">Category</td>
        <td width="400"><?=$category["Categories"]["category"]?></td>
    </tr><tr>
        <td>Put any Documents in that Category into this category:</td>
        <td><?php echo $form->input('category', array('options'=>$categories,'label'=>false,'empty'=>false)); ?></td>
</tr><tr>
        <td></td>
        <td><?php echo $this->Form->submit('Delete Category', array('class' => 'adminbutton', 'title' => 'Delete Category')); ?></td>
    </tr>

</table>