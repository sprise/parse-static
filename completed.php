<?php
require_once('./simple_html_dom.php');

// Load our static html file as a string
$html = file_get_html('./distributors.html');

// Start an array to put all our companies in
$companies = array();

// Go through each state
foreach($html->find('div[class=one-state]') as $row) {
	$state_name = $row->find('h2', 0)->innertext;
		
	// Loop over the .col-md-6 divs 
	foreach($row->find('div[class=col-md-6]') as $comp) {
		
		// Place an array of the company data into an array of states (will create $state_name array if needed)
		$companies[$state_name][] = array(
		
							// Arg 2 lets us receive a string, instead of array
			'title'		=> $comp->find('h3', 0)->innertext,
			'rep_name'	=> $comp->find('strong[class="rep"]', 0)->innertext,
			'tel'		=> $comp->find('span[class="tel"]', 0)->innertext,
			'address'	=> $comp->find('span[class="addr"]', 0)->innertext,
		);
	}
}

// Count up the total
$total = 0;
foreach($companies as $row) $total += count($row);

// Show the output as JSON with stats on top
echo count($companies).' states were recorded with '.$total.' records.<br>';
echo '<pre>';
echo json_encode($companies, JSON_PRETTY_PRINT); // optional flag for human display
echo '</pre>';
