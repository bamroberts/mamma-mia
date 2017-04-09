<?php
/**
 * Description of Contact
 *
 * @author o0BAMBAM0o
 */
class Contact extends Page {


}

class Contact_controller extends Page_Controller {

	private static $allowed_actions = array('tickets','Crew');

	public function Tickets() {
		return $this->render(array('Content'=>$this->TicketsForm()));
	}

	 public function CrewForm() {
		$fields = FieldList::create(
			TextField::create('First Name'),
			TextField::create('Surname'),
			EmailField::create('Email'),
			TextField::create('Phone'),
			CheckboxSetField::create('InterestAreas', 'Interested in:', array(
				'Hair' => 'Hair',
				'Makeup' => 'Makeup',
				'Wardrobe' => 'Wardrobe',
				'Sound' => 'Sound',
				'Backstage' => 'Backstage',
				'Lighting' => 'Lighting',
				'Bar' => 'Bar',
				'Front of House' => 'Front of House',
			))
		);

		$actions = FieldList::create(
			FormAction::create('doCrewRequest', 'Send')->setStyle("primary")
		);

		return BootstrapForm::create($this, 'CrewForm', $fields, $actions)->addWell()->setLayout("horizontal");
	}

	public function TicketsForm() {
		$fields = FieldList::create(
			TextField::create('First Name'),
			TextField::create('Surname'),
			EmailField::create('Email'),
			TextField::create('Phone')
		);
		$actions = FieldList::create(
			FormAction::create('doCrewRequest', 'Sign Up!')->setStyle("primary")
		);

		return BootstrapForm::create($this, 'TicketForm', $fields, $actions)->addWell()->setLayout("horizontal");
	}


}

class MailingList extends Member {
	static $db = array(
		'Phone' => 'Varchar',
	);
}

class Crew extends MailingList {
	
}

class Audition extends MailingList {
	static $db = array(
		'Height' => 'Varchar',
		'Gender' => 'Enum("Male,Female")',
	);
}