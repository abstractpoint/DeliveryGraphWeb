<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> | DeliveryGraph
	</title>
	
	<link rel="shortcut icon" href="<?=$this->webroot?>favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="<?=$this->webroot?>favicon.ico" />

	<?php
		//echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
		echo $this->Html->script('jquery');
		
		echo $this->Html->meta('favicon');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('deliverygraph');
		
		echo $this->Html->script('bootstrap');
		echo $scripts_for_layout;
	?>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="container" class="container">
<div class="row" style="margin-top:30px;">
	<div class="col-md-4">
	<a href="<?=$this->webroot?>"><img style="" src="<?=$this->webroot?>img/logo.jpg" alt="logo" width="" height="" /></a>
	</div>
	<div class="col-md-offset-6 col-md-2">
	<a class="btn btn-primary btn-lg btn-block">Business Login</a>
	</div>
</div>

<hr>
<?php echo $content_for_layout; ?>
</div>
</body>
</html>