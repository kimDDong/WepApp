<!DOCTYPE html>
<html>
<head>
	<title>WebApp</title>
</head>
<body>
    <form method="POST">
        <div>
            DB name: <input type="text" name="DB"/>
            SQL query: <input type="text" name="query"/>
            <input type="submit" name="submit"/>
        </div>
    </form>

	<ul>
		<?php 
            $dbName = $_POST["DB"];
            $query = $_POST["query"];
            $db = new PDO("mysql:dbname=$dbName;host=localhost", "root", "1234");
			$rows = $db->query($query, PDO::FETCH_ASSOC);
			foreach ($rows as $row) {
		?>
			<li>
				<?php foreach ($row as $col){
					print($col." ");
				} ?>
			</li>
			<?php
			}
		?>
	</ul>
</body>
</html>