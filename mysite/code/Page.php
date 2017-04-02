<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		requirements::javascript('https://code.jquery.com/jquery-3.2.1.min.js');
		requirements::javascript('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
		requirements::themedJavascript('scripts');

		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}

}
