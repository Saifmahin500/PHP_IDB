<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />


	<style type="text/css">
	body {
		margin: 0;
		padding: 0;
		font-family: 'Segoe UI', sans-serif;
		background-color: #f5f7fa;
	}

	.sidebar {
		width: 220px;
		height: 100vh;
		position: fixed;
		background-color: #3485A7;
		color: white;
		padding: 25px 15px;
		box-shadow: 2px 0 8px rgba(0, 0, 0, 0.05);
	}

	.sidebar a {
		color: white;
		display: block;
		padding: 10px 15px;
		margin: 10px 0;
		border-radius: 6px;
		text-decoration: none;
		transition: background-color 0.3s ease;
	}

	.sidebar a:hover {
		background-color: #08417a;
		text-decoration: none;
	}

	.content {
		margin-left: 240px;
		padding: 30px;
	}
</style>

</head>
<body>
