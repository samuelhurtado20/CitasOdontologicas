<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>

	<section>
		<h1>My Product:</h1>
		<ul>
			<li><?php echo $product->Title; ?></li>
            <li><?php echo $product->Description; ?></li>
            <li><?php echo $product->Price; ?></li>
            <li><?php echo $product->Sku; ?></li>
            <li><?php echo $product->Image; ?></li>
		</ul>
        <a href="<?php echo $routes->get('homepage')->getPath(); ?>">Back to homepage</a>
	<section>

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>