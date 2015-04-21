<!DOCTYPE html>
<html>

<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		
    	//echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'));
		echo '<script type="text/javascript" src="https://www.google.com/jsapi"></script>'


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body>
	<div id="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php // echo $this->fetch('script'); ?>

			<?php echo $this->fetch('content'); ?>
			<?php echo $this->fetch('js'); ?>
							
		</div>
	</div>
</body>
</html>
