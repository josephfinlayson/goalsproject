<?php

$i=0

?>

		<div class = "span9">
<h1>
<?php echo ucwords($query[0]['person'])."'s Goals";
?>
</h1>

<?php
	

 foreach($query as $row) {
	echo "<div class=\"row-fluid \">";
	echo "<div class =\"span8 \" >";


	echo "<h2>";
	echo "These are goals number ". (count($query)-$i)." submitted on ".$row['timestamp'];	
	echo "</h2></br >"; //last  and timestamp

	echo "<h3>";
	echo $row['q1'];
	echo "</h3></br >"; //q1

	echo "<p>";
	echo ($row['a1']);
	echo "</p></br >"; //a1

	echo "<h3>";
	echo ($row['q2']);
	echo "</h3></br >"; //q2

	echo "<p>";
	echo ($row['a2']);
	echo "</p></br >"; //a2

	echo "<h3>";
	echo($row['q3']);
	echo "</h3></br >"; //q3

	echo "<p>";
	echo($row['a3']);
	echo "</p></br >"; //a3

	echo "<h3>";
	echo($row['sq']);
	echo "</h3></br >"; //sq

	echo "<p>";
	echo($row['sa']);
	echo "</p></br >"; //sa

	echo "<a class =\"btn\" href = \"";
	echo base_url();
	echo "\">Submit new update here</a>"; //submit update here

	echo "</div>";
	echo "</div>";
	echo "<hr>";
$i = $i + 1;	
}
?>
</div>
<hr>