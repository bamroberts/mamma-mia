<?php
/**
 * Description of HomePage
 *
 * @author o0BAMBAM0o
 */
class CastAndCrew extends Page {
	
}

class CastAndCrew_Controller extends Page_Controller {

}

class CastAndCrewMember extends Page {
	static $db = array(
		'Name' => 'Varchar(100)',
		'Title' => 'Varchar(100)',
		'Bio' => 'HTMLText',
		//'Department' => Enum
	);

	static $has_one = array(
		'Photo' => 'Image'
	);
}