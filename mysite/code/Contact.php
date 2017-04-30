<?php
/**
 * Description of Contact
 *
 * @author o0BAMBAM0o
 */
class Contact extends Page {


}

class Contact_controller extends Page_Controller {

	private static $allowed_actions = array('tickets','volunteer','audition','TicketsForm');

	public function Tickets() {
		return $this->render(array(
			'Content'=>$this->TicketsForm(),
			'Title' => 'Wait List'
		));
	}

	public function Audition() {
		return $this->render(array('Content'=>$this->AuditionForm()));
	}

	public function Volunteer() {
		return $this->render(array('Content'=>$this->CrewForm()));
	}

	private function baseForm() {
		return FieldList::create(
			TextField::create('FirstName'),
			TextField::create('Surname'),
			EmailField::create('Email'),
			TextField::create('Phone')
		);
	}

	public function CrewForm() {
		$fields = $this->baseForm();
		$fields->push(
			CheckboxSetField::create('InterestAreas', 'Interested in:', array(
				'Hair' => 'Hair',
				'Makeup' => 'Makeup',
				'Wardrobe' => 'Wardrobe',
				'Sound' => 'Sound',
				'Backstage' => 'Backstage',
				'Lighting' => 'Lighting',
				'Bar' => 'Bar',
				'FoH' => 'Front of House',
			))
		);

		$actions = FieldList::create(
			FormAction::create('doCrewRequest', 'Send')->setStyle("primary")
		);

		return BootstrapForm::create($this, 'CrewForm', $fields, $actions)->setLayout("horizontal");
	}

	public function TicketsForm() {
		$fields = $this->baseForm();
		$fields->unshift(new LiteralField('Info','<article><h4>Sign up now for the latest ticket anouncements</h4> <p>Make sure you get the best sets in the house.</p><article>'));
		$actions = FieldList::create(
			FormAction::create('doTicketsRequest', 'Sign Me Up!')->setStyle("danger")->setSize("action")
		);

		return BootstrapForm::create($this, 'TicketsForm', $fields, $actions)->setLayout("horizontal");
	}

	public function AuditionForm() {
		$fields = $this->baseForm();
		$actions = FieldList::create(
			FormAction::create('doAuditionRequest', 'Get your audition pack!')->setStyle("danger")->setSize("action")
		);

		return BootstrapForm::create($this, 'AuditionForm', $fields, $actions)->addExtraClass('module')->setLayout("horizontal");
	}

	public function doTicketsRequest($data, $form, $request) {
		if(!$entry = MailingList::get()->filter(array('Email'=> $data['Email']))->first()){
			$entry = new MailingList();
		}
		$entry->update($data);
		$entry->write();
		$form->sessionMessage('Thanks. You are on the list! We will be in touch shortly when tickets go on sale','success');
		//Director::redirectBack();
		$this->redirectBack();
		echo 'thanks';
	}

	function SubMenu() {
		return new arrayList(array(
			new ArrayData(array('Title'=>'Contact','HREF'=>$this->Link(),'Class'=>$this->action == 'index' ? 'active' : '')),
			new ArrayData(array('Title'=>'Ticket Waitlist','HREF'=>$this->Link($url = 'tickets'),'Class'=>$this->action == $url ? 'active' : '')),
			new ArrayData(array('Title'=>'Audition','HREF'=>$this->Link($url = 'audition'),'Class'=>$this->action == $url ? 'active' : '')),
			new ArrayData(array('Title'=>'Volunteer','HREF'=>$this->Link($url = 'volunteer'),'Class'=>$this->action == $url ? 'active' : '')),
			)
		);
	}

}

class MailingList extends DataObject {
	static $db = array(
		'FirtName' => 'Varchar(50)',
		'Surname' => 'Varchar(50)',
		'Email' => 'Varchar(255)',
		'Phone' => 'Varchar(10)',
	);
}

class Crew extends MailingList {
	static $db = array(
		'Hair' => 'Boolean',
		'Makeup' => 'Boolean',
		'Wardrobe' => 'Boolean',
		'Sound' => 'Boolean',
		'Backstage' => 'Boolean',
		'Lighting' => 'Boolean',
		'Bar' => 'Boolean',
		'FoH' => 'Boolean',
	);
}

class Audition extends MailingList {
	static $db = array(
		'Height' => 'Varchar',
		'Gender' => 'Enum("Male,Female")',
	);
}