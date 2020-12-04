<?php

	// default credentials used to access DB
	$hostname = 'localhost';
	$dbname = 'cookiepassion';
	$username = 'root';
	$password = 'root';
	$con=mysqli_connect($hostname, $username, $password) or DIE('Connection to host failed...');
	mysqli_select_db($con,$dbname) or DIE('DB not available...');

	if (isset($_GET['search'])) // check for null value
		$data1=$_GET['search'];
	else
		$data1='';

	if (isset($_GET['filter_price']))
		$data2=$_GET['filter_price'];
	else
		$data2='';


	$query = "select * from cookie where inventory > 0";

	if ($data2 == '<$1') {
		$query = "select * from cookie 
        where (name like '%$data1%' or description like '%$data1%') 
            and price < 1 
            and inventory > 0";
	} else if ($data2 == '$1-$5')) {
		$query = "select * from cookie 
        where (name like '%$data1%' or description like '%$data1%')
            and price >= 1 and price < 5 
            and inventory > 0";
	} else if ($data2 == '>$5'){
		$query="select * from cookie 
        where (name like '%$data1%' or description like '%$data1%')
            and price >= 5 
            and inventory > 0";
	}

	// Run query
	$result = mysqli_query($con,$query);
	if (!$result) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}
?>

<html>
	<head>
		<style>
			/* FOR TESTING: simple table */
			table, th, td {
			border: 1px solid black;
			}
		</style>
	</head>
	<body>
		<div>
			<form action="search.php"> 

                <!-- search form for keywards to cookie name and description -->
                <form name="search1" method="get">
		            <input type="text" placeholder="Search" name="search" aria-label="Search" required>
	            </form>

				<!-- create drop down options for price filter -->
				<select id="search2" name="filter_price" placeholder="Price">
					<option value="<$1"<?=$data2 == '<$1' ? ' selected="selected"' : '';?>><$1</option>
					<option value="$1-$5"<?=$data2=='$1-$5' ? ' selected="selected"' : '';?>>$1-$5</option>
					<option value=">$5"<?=$data2=='>$5' ? ' selected="selected"' : '';?>>>$5</option>
				</select>

				<input type="submit" id="submit" value="Search" name="searchsubmit"> <!-- submit button -->
			</form>

			<table>
				<tr>
					<!-- table header -->
					<thead>
						<td>Name</td>
						<td>Description</td>
						<td>Price</td>
						<td>Ingredients</td>
					</thead>
				</tr>
				<tbody>

				<?php
					while ($row = mysqli_fetch_array($result)) {
				?>

				<!-- populate table with data -->
				<tr>
					<td><?php echo $row[0]?></td>
					<td><?php echo $row[1]?></td>
					<td><?php echo $row[2]?></td>
					<td><?php echo $row[3]?></td>
					<?php
						}
					?>
				</tr>
				</tbody>
			</table>
		</div>
	</body>
</html>
