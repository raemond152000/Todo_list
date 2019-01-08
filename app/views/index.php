<!DOCTYPE html>
<html lang=en>
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

	<h1>To Do List App</h1>
	<form>
		<input type="text" name="name" id="new-task">
		<button id="addTaskBtn"> Add Task </button>
	</form>


	<script>
		//add task
		$("#addTaskBtn").click( () => {
			const newTask = $('#new-task').val();

		$.ajax({
			method : 'GET',
			url : '../controllers/add_task.php',
			data: {name : newTask},
		 }).done(
		    console.log('added task')
		 );		
	});

	</script>


	<!-- display task -->

	<h2>Task List</h2>
	<ul id="taskList">

		<?php

		require_once '../controllers/connect.php';

		$sql = "SELECT * FROM task";
		$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_assoc($result) ) { ?>
			<li data-id="<?php echo $row['id'] ; ?>">
				<?php echo $row['name'] . "is task number" .$row['id'] ; ?>
				<button class="deleteBtn">Delete</button>
			</li>
		<?php } ?>
	</ul>

	<script>
		/*delete task*/

		$('#taskList').on('click', '.deleteBtn', function() {
			const task_id = $(this).parent().attr('data-id');
			//console.log(task-id);
		$.ajax({
			method : 'post',
			url : '../controllers/remove_task.php',
			data : { task_id : task_id}
		}).done( data => {
			$(this).parent().fadeOut();
		});
	});

	</script>
	


	
</body>
</html>