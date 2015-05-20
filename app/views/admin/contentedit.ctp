 




<h1>Edit Content - <?=$content["Content"]["section"]?> > <?=$content["Content"]["page"]?></h1>

<?

$file = $content["Content"]["file"];
$directory = $_SERVER['DOCUMENT_ROOT'].'/app/views/';
$file_path = $directory.$file.".ctp";

$file_text = file_get_contents($file_path);

?>
<form name="form1" method="post" action="/admin/contentedit/<?=$content["Content"]["id"]?>">
<input type="hidden" name="data[Content][id]" value="<?=$content["Content"]["id"]?>">
<textarea name="data[Content][pagecontent]" cols="130" rows="35" >
<?=$file_text?>
</textarea>
<br>
<input type="submit" value="Save Changes" class="adminbutton">
&nbsp;<a href="/admin/content" class="error-message">Cancel</a>
</form> 

<script type="text/javascript" src="/js/jquery-1.7.1.min.js" ></script>  
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js" ></script>
<script type="text/javascript" > 
tinyMCE.init({         
mode : "textareas",         
theme : "advanced",  
relative_urls : false,       
plugins : "markettoimages, emotions,spellchecker,advhr,insertdatetime,preview",                           // Theme options - button# indicated the row# only         
theme_advanced_buttons1 : "bold,italic,underline,|,formatselect",         
theme_advanced_buttons2 : "cut,copy,paste,|,bullist,numlist,|,undo,redo,|,link,unlink,markettoimages,image,|,code,preview",         theme_advanced_buttons3 : "", 
content_css : "/css/editor.css",               
theme_advanced_toolbar_location : "top",         
theme_advanced_toolbar_align : "left",         
theme_advanced_statusbar_location : "bottom",         
theme_advanced_resizing : false }); 
</script> 