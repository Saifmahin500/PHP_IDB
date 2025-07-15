<?php
require 'nameSpace.php';
require 'customer.php';

use Admin\User as AdminUser;
use Customer\User as CustomerUser;

$admin = new AdminUser();
$customer = new CustomerUser();

echo $admin->getRole() . "<br>";     // Admin User  
echo $customer->getRole() . "<br>";  // Customer User
?>
