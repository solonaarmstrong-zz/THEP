<h1>FAQs</h1>

<?php foreach ($faqs as $id=> $row): 

?>
<div id="faq">
	<div id="question_<?php echo $id; ?>" onclick="showhide('<?php echo $id; ?>')" style="cursor:pointer;"><h2><?php echo $row['Faqs']['question']; ?></h2></div>
        <div id="answer_<?php echo $id; ?>" style="display:none;"><p><?php echo $row['Faqs']['answer']; ?></p></div>

</div>
<?php endforeach; ?>

<script language="javascript">
function showhide(id){
    $('#answer_'+id).toggle('slow');
}
</script>    