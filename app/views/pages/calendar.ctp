<style>

tr, td, th { border:solid 1px #FFFFFF; }
td {height:150px; width:78px; text-align:left;}
</style>

<h1>Calendar</h1>

<?php
$current_month = $month;
$current_year = $year;

if ($current_month == 1){
	$prev_month = 12;
	$prev_year = $current_year-1;
}else{
	$prev_month = $current_month-1;
	$prev_year = $current_year;
}

if ($current_month == 12){
	$next_month = 1;
	$next_year = $current_year+1;
}else{
	$next_month = $current_month+1;
	$next_year = $current_year;
}

$month = array (1=>"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
?>
<script language='javascript'>
function getmonth(){
    window.location='/pages/calendar/'+document.cal_form.month.value+'/'+document.cal_form.year.value+'/';
}
</script>
<table border="0" cellpadding="0" cellspacing="0" width="550">
<tr>
	<th colspan="7">
    <form name="cal_form" action="calendar.php" method="get">
    <select name="year"  onChange="getmonth();">
    	<?
		for ($x=2012;$x<=date("Y")+5;$x++){
			if ($x == $current_year){
				$select = "selected";
			}else{
				$select = "";
			}
		?>
        	<option value="<?=$x?>" <?=$select?>><?=$x?></option>
        <?
		}
		?>
    </select>
    <select name="month" onChange="getmonth();">
    	<?
		for ($x=1;$x<=12;$x++){
			if ($x == $current_month){
				$select = "selected";
			}else{
				$select = "";
			}
		?>
        	<option value="<?=$x?>" <?=$select?>><?=$month[$x]?></option>
        <?
		}
		?>
    </select>
    </form>
    </th>
</tr><tr>
	<th colspan="2">
	<a href="/pages/calendar/<?=$prev_month?>/<?=$prev_year?>/" class="linkNormal">&laquo; Prev</a> 
	</th>
	<th class="textNormal" align="center" colspan="3">
	<b><?=$month[intval($current_month)]?>&nbsp;<?=$current_year?></b>
	</th>
	<th align="right" colspan="2">
	<a href="/pages/calendar/<?=$next_month?>/<?=$next_year?>/" class="linkNormal">Next &raquo;</a>
	</th>
</tr>
<tr>
	<th class="textSmaller" align="center">S</th>
	<th class="textSmaller" align="center">M</th>
	<th class="textSmaller" align="center">T</th>
	<th class="textSmaller" align="center">W</th>
	<th class="textSmaller" align="center">T</th>
	<th class="textSmaller" align="center">F</th>
	<th class="textSmaller" align="center">S</th>
</tr>
<tr>
<?
$cols = 0;
$first_day = $current_year."-".$current_month."-1";

$date = getdate(mktime(12, 0, 0, $current_month, 1, $current_year));
$first_day = $date["wday"];

for ( $x = 1; $x <= $first_day; $x += 1) {
   $cols = $cols+1;
   ?>
   <td>&nbsp;</td>
   <?
}

for ( $x = 1; $x <= 31; $x += 1) {
	$show_date =$current_month."/".$x."/".$current_year;
	//$show_date = display_date($show_date);
	if (checkdate($current_month, $x, $current_year)){
                if (strlen($x)<2){
                    $day = '0'.$x;
                }else{
                    $day = $x;
                }
                if (strlen($current_month)<2){
                    $month = '0'.$current_month;
                }else{
                    $month = $current_month;
                }
		?>
		<td align="center" valign="top" class="textSmaller">
			<?=$x?>
                        <br/>
                        <?php
                        foreach ($events as $row){
                            if ($row['Events']['date'] == $current_year.'-'.$month.'-'.$day){
                                ?>
                                <a href="/pages/news-article/<?=$row['Events']['id']?>/"><?=$row['Events']['title']?></a>
                                <?php
                            }
                        }
                        ?>
		</td>
		<?
		$cols = $cols + 1;
		if ($cols == 7){
		$cols = 0;
		?>
			</tr><tr>
		<?
		}
	}
}

for ( $y = $cols+1; $y <= 7; $y += 1) {
	?>
	<td>&nbsp;</td>
	<?
}

?>

</tr>
</table>