<!DOCTYPE html>
	<html>
		<body>
			<?php
				$count = @file_get_contents('count.txt'); // read the hit count from file
				echo "<h1>You are visitor # $count</h1>"; //  display the hit count
				$count++; // increment the hit count by 1
				@file_put_contents('count.txt', $count); // store the new hit count
			?>
		</body>
	</html>