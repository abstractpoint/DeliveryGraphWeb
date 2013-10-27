<?php
class Company extends AppModel {
	var $name = 'Company';
	var $displayField = 'name';
	var $hasMany = array(
		'Delivery','Driver'
	);
}
