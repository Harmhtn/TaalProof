<?php
$table = 'product';

$all_products = $app['database']->selectAll($table);


//load head and navbar
require 'Resources/views/head.php';

//load view
require 'Resources/views/default/index.view.php';

//load footer
require 'Resources/views/footer.php';