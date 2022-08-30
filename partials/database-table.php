<table>
	<tr>
		<th>No</th> 
		<th>LDR Value</th> 
		<th>Time Stamp</th>
	</tr>	
	<?php
		$table = mysqli_query($conn, "SELECT No, Ldr,  TimeStamp FROM nodemcu_ldr_table"); //nodemcu_ldr_table = Youre_table_name
		while($row = mysqli_fetch_array($table))
		{
	?>
	<tr>
		<td><?php echo $row["No"]; ?></td>
		<td><?php echo $row["Ldr"]; ?></td>
		<td><?php echo $row["TimeStamp"]; ?></td>
	</tr>
	<?php
		}
	?>
</table>