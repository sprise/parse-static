<?php 
require_once('vendor/autoload.php'); // We are using Composer to load some helpful packages

// We're going to use open source libs "Faker" and "US State Codes" for this dummy data
$r 			= new ReflectionClass("usStateCodes\Codes"); 
$us_states 	= $r->getStaticPropertyValue('uspsStates'); // get the static property out of this class
$faker 		= Faker\Factory::create();

// Pick a list of random states
$num_states 	= rand(5, 20);
$rand_states 	= array();
$state_keys		= array_keys($us_states); // an indexed array for choosing at random

// Fill our $rand_states array until we have $num_states (a number, qty) ready to go
while(count($rand_states) < $num_states) {
	$i 		= rand(0, (count($state_keys) - 1));
	$abbrev	= $state_keys[$i];

	// If we have already done this state, try again
	if(in_array($abbrev, $rand_states)) continue;
	
	$rand_states[$abbrev] = $us_states[$abbrev];
}
?>
<html>
<head>
	<title>Our Distributors</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/slate/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">She Builds Widgets Inc</a>
			</div>
			<div class="navbar-main">
			&nbsp;</div>
		</div>
	</div><!--/navbar-->
    
	<div class="container">
		<div class="page-header">
			<div class="row">
				<div class="col-lg-8">
					<h1>Our Distributors</h1>
				</div>
			</div>
		</div>
          
		<div id="distributors">
			<?php foreach($rand_states as $key => $val) : $num_companies = rand(10, 50); ?>
				<div class="one-state">
					<h2><?php echo $val; ?></h2>
					
					<div class="row well">
						<?php for($i = 0; $i < $num_companies; $i++): ?>
							<div class="col-md-6">
								<h3><?php echo $faker->company; ?></h3>
								<p>Rep: <strong class="rep"><?php echo $faker->name; ?></strong></p>
								<p>Tel: <span class="tel"><?php echo $faker->phoneNumber; ?></span></p>
								<p>Address: <span class="addr"><?php echo $faker->address; ?></span></p>
							</div>
						<?php endfor; ?>
					</div><!--/row-->
				</div><!--/one-state-->
			<?php endforeach; ?>
		</div>
	</div><!--/container-->

</body>
</html>
