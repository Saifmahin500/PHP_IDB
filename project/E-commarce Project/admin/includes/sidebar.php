

<div class="sidebar">
	<div class="text-center mb-3">
		<?php

			if(!isset($_SESSION)) session_start();
			require_once __DIR__.'/../dbConfig.php';
			$admin_id = $_SESSION['admin_logged_in'] ?? null;

			$adminPhoto = 'default.jpg';
			$adminName = 'Admin';

			if($admin_id)
			{
				$stmt = $DB_con->prepare("SELECT * FROM admins WHERE id =?");
				$stmt->execute([$admin_id]);
				$admin = $stmt->fetch(PDO::FETCH_ASSOC);

				if($admin)
				{
					$adminPhoto = !empty($admin['photo']) ? $admin['photo'] : 'default.jpg';
					$adminName = $admin['username'];
				}
			}		

		?>
		<img src="../uploads/admins/<?= htmlspecialchars($adminPhoto) ?>" alt="No photo found" class="rounded-circle" width="60" height="60">

		<h5 class=""><?= htmlspecialchars($adminName) ?></h5>
	</div>
	<h4><i class="fas fa-user-cog"></i> Admin Panel</h4>

	<a href="index.php?page=dashboard">
		<i class="fas fa-tachometer-alt"></i> Dashboard
	</a>

	<a href="index.php?page=products">
		<i class="fas fa-box-open"></i>All Products
	</a>

	<a href="index.php?page=categories">
		<i class="fas fa-th-list"></i>All Categories
	</a>

	<a href="index.php?page=attributes">
		<i class="fas fa-tags"></i> Attributes
	</a>

	<a href="#inventorySubmenu" data-toggle="collapse" class="dropdown-toggle">
		<i class="fas fa-warehouse"></i> Inventory
	</a>
	<div class="collapse" id="inventorySubmenu" style="margin-left: 10px;">
		<a href="index.php?page=stock_in">
			<i class="fas fa-arrow-down"></i> Stock In
		</a>
		<a href="index.php?page=stock_out">
			<i class="fas fa-arrow-up"></i> Stock Out
		</a>
		<a href="index.php?page=stock_by_products">
			<i class="fas fa-boxes"></i> Stock By Products
		</a>
		<a href="index.php?page=inventory_report">
			<i class="fas fa-chart-bar"></i> Report
		</a>
	</div>
	<a href="index.php?page=admin_profile">
		<i class="fa-solid fa-user-doctor"></i> Change Profile
	</a>

	<a href="logout.php">
		<i class="fas fa-sign-out-alt"></i> Logout
	</a>
</div>
