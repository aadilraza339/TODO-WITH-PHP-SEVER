<?php 
	$errors = "";
    $db = new mysqli("127.0.0.1", "codechef", "ccdevs", "TODO");
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You ust fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: index.php');
		}
    }
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
    
        mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo with php</title>
    <link rel="stylesheet" type="text/css" href="/style.css">

</head>
<body>
	<div class="H2">
		<h2 style="font-style: 'Hervetica';">Add TODO</h2>
	</div>
	<form method="post" action="index.php" class="input_form">
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" class="add_btn">+</button>
    </form>
    

<table>
	<tbody>
		<?php 
		$tasks = mysqli_query($db, "SELECT * FROM tasks");

		while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>">-</a> 
				</td>
			</tr>
		<?php } ?>	
	</tbody>
</table>

</body>
</html>









