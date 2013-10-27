<?php
class Driver extends AppModel {
	var $name = 'Driver';
	var $displayField = 'username';
	var $hasMany = array(
		'Delivery'
	);
	var $belongsTo = array(
		'Company'
	);
}
