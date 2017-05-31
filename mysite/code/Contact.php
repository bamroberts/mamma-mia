<?php
/**
 * Description of Contact
 *
 * @author o0BAMBAM0o
 */
class Contact extends Page {


}

class Contact_controller extends Page_Controller {

	private static $allowed_actions = array('tickets','volunteer','audition','TicketsForm','CrewForm','AuditionForm');

	public function Tickets() {
		return $this->render(array(
			'Form'=>$this->TicketsForm(),
		));
	}

	public function Audition() {
		$header = '<div class="alert alert-success">

							<h2>Auditions for Mamma Mia! are now open!</h2>
							<h4>Step 1</h4>
							<p>
								Before applying download the audition pack below and read fully.
								Please make sure that you fully understand what is required from you both during the audition
								process and the longer term show commitment.
							</p>
							<p class="text-center"><a class="btn btn-default" href="/assets/MammaMiaAuditionInfoPack.pdf" ><i class="fa fa-file-pdf-o fa-4x text-danger" aria-hidden="true"> </i> Mamma Mia Audition Info Pack <i class="fa fa-download fa-2x" aria-hidden="true"> </i></a></p>
							<h4>Step 2</h4>
							<p>
								Please fill in your details in the form below.
								Remember that we are holding auditions for Principal & Featured Roles in the
								<b>evening</b> on <b>Friday 7th July</b> and Ensemble & Backing Vocalists auditions
								<b>all day</b> on <b>Saturday 8th July</b> There are a very limited number of extra audition
								slots available <b>Sunday morning 9th July</b> these are only available for people that cannot make the other auction slots.
							</p>
							<p>
								Once you have picked the correct day please select a time slot, they are in one hour sections,
								but we will allocate and email you a five or ten minute slot (depending on role) within that hour.

								We cannot guarantee your exact time slot, but will contact you to make arrangements if we need to.
							</p><br/ >
							<h4>Step 3</h4>
							<p>
								We will send you a brief automated email to confirm we have received your application. We will contact you again to confirm the
								application and to give you your final time slot and any other details required.
							</p><br />
							<h4>Finally...</h4>
							<p>
								Familiarise yourself with the material, get practicing and prepare for the fun and challenges ahead.
							</p>
							<p>
								<b>Thanks for applying and Good Luck!</b>
							</p>
						</div>';
		return $this->render(array('FormHeader'=>$header,'Form'=>$this->AuditionForm()));
	}

	public function Volunteer() {
		return $this->render(array('Form'=>$this->CrewForm()));
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
			FormAction::create('doCrewRequest', 'Send')->addExtraClass("btn-danger")->addExtraClass("btn-action")
		);
		$this->action = 'volunteer';

		return BootstrapForm::create($this, 'CrewForm', $fields, $actions)->addExtraClass('module')->setLayout("horizontal");
	}
	
	public function doCrewRequest($data, $form, $request) {
		if(!$entry = Crew::get()->filter(array('Email'=> $data['Email']))->first()){
			$entry = new Crew();
		}
		$entry->update($data);
		$entry->write();

		return $this->customise(array('Form'=>'<div class="alert alert-success">Thanks. You are on the list! We will be in touch shortly. Thanks for your support!</div>'))->render();
	}



	public function TicketsForm() {
		$fields = $this->baseForm();
		$fields->unshift(new LiteralField('Info','<article><h4>Sign up now for the latest ticket anouncements</h4> <p>Make sure you get the best sets in the house.</p><article>'));
		$actions = FieldList::create(
			FormAction::create('doTicketsRequest', 'Sign Me Up!')->addExtraClass("btn-danger")->addExtraClass("btn-action")
		);
		$this->action = 'tickets';
		return BootstrapForm::create($this, 'TicketsForm', $fields, $actions)->addExtraClass('module')->setLayout("horizontal");
	}

	public function doTicketsRequest($data, $form, $request) {
		if(!$entry = MailingList::get()->filter(array('ClassName'=>'MailingList', 'Email'=> $data['Email']))->first()){
			$entry = new MailingList();
		}
		$entry->update($data);
		$entry->write();

		return $this->customise(array('Form'=>'<div class="alert alert-success">Thanks. You are on the list! We will be in touch shortly when tickets go on sale!</div>'))->render();
	}

	public function AuditionForm() {
		$fields = $this->baseForm();

		$mainTimeslots = array();
		for($i; $i<8; $i++) {
			$time = ltrim(date('ha', strtotime('' . ($i+10) .':00')),'0') . '-' . ltrim(date('ha', strtotime('' . ($i+11) .':00')),'0');
			$mainTimeslots[$time]=$time;
		}
		$fields->push(
			$date = new SelectionGroup(
				'Date',
				array(
					new SelectionGroup_Item('2017-07-07', new CompositeField(
							new DropdownField('2017-07-07[Time]', 'Time', array('6pm-7pm'=>'6pm-7pm', '7pm-8pm'=>'7pm-8pm', '8pm-9pm'=>'8pm-9pm', '9pm-10pm'=>'9pm-10pm'), null, null, true),
							new DropdownField('2017-07-07[Role]', 'Prefered Role', array('Donna Sheridan'=>'Donna Sheridan', 'Sophie Sheridan'=>'Sophie Sheridan', 'Tanya'=>'Tanya', 'Rosie'=>'Rosie', 'Sam Carmichael'=>'Sam Carmichael','Harry Bright'=>'Harry Bright','Bill Austin'=>'Bill Austin','Sky'=>'Sky','Lisa'=>'Lisa','Ali'=>'Ali','Pepper'=>'Pepper','Eddie'=>'Eddie','Father Alexandrios'=>'Father Alexandrios'))

									),'Principal Auditions & Featured Roles - Friday 07th July 2017'),
					new SelectionGroup_Item('2017-07-08', new CompositeField(new DropdownField('2017-07-08[Time]', 'Time',$mainTimeslots, null, null, true)),'Ensemble & Backing Vocalists - Saturday 08th July 2017'),
					new SelectionGroup_Item('2017-07-09', new CompositeField(
							new DropdownField('2017-07-09[Time]', 'Time', array(' ', '10am-11am'=>'10am-11am','11am-12pm'=>'11am-12pm') , null, null, true),
			
							new TextAreaField('2017-07-09[Reason]', 'Reason')

							),'Special Circumstance Auditions - Sunday 09th July 2017')

				)
			)
		
		);
		$date->addExtraClass('col-sm-9 col-sm-offset-3');

		$danceSlots = ArrayLib::valuekey(array('','Sunday 25 June | 2.00pm-3.00pm','Friday 30 June | 7.00pm-8.00pm', 'Sunday 02 July | 2.00pm-3.00pm'));

		$fields->push(new DropdownField('DanceWorkshop1', 'Dance Workshop 1', $danceSlots));
		$fields->push(new DropdownField('DanceWorkshop2', 'Dance Workshop 2', $danceSlots));

		$fields->push(new Textareafield('Comment','Any additional comments?'));

		$actions = FieldList::create(
			FormAction::create('doAuditionRequest', 'Register for Auditions!')->addExtraClass("btn-danger")->addExtraClass("btn-action")
		);
		$this->action = 'audition';

//		$fields->push(new LiteralField(
//				'step4', '<div class="alert alert-success" style="clear:both"><h2>Step 4</h2><p>Click the button below to submit your application. We will be in touch soon to to confirm your audition place and give you an exact time for your slot. In the mean time familiureise your self with the material, get practicing and prepare to have a lot of Abba stuck in your head.</p><p><b>Good Luck</b></p></p></div>'
//				));
		return BootstrapForm::create($this, 'AuditionForm', $fields, $actions, new RequiredFields('FirstName','Surname','Email','DanceWorkshop1', 'DanceWorkshop2'))->addExtraClass('module')->setLayout("horizontal")->setLegend('Audition Form');
	}

	public function doAuditionRequest($data, $form, $request) {
		if(!$entry = Audition::get()->filter(array('Email'=> $data['Email']))->first()){
			$entry = new Audition();
		}
		

		if(is_array($dateFields = $data[$data['Date']])) {
			$data =	array_merge($data, $dateFields);
		}
		if(!$data['Date']) {
			$form->sessionMessage("Please pick an audition day", 'bad');
			return $this->render(array('Form'=>$form));
			 
		}
		if(!isset($data['Time']) || !$data['Time']) {
			$form->sessionMessage("Please make sure you pick a time slot", 'bad');
			 return $this->render(array('Form'=>$form));
		}

		if($data['DanceWorkshop1'] == $data['DanceWorkshop2'] ) {
			$form->sessionMessage("Please make sure you pick two different dance workshops", 'bad');
			 return $this->render(array('Form'=>$form));
		}

		unset($data['2017-07-07'],$data['2017-07-08'],$data['2017-07-09'],$data['url'],$data['SecurityID'],$data['action_doAuditionRequest']);

		$entry->update($data);
		$entry->write();

		//Send email to us
		$audition = "<h3>New Audtion request:</h3><ul>";
		foreach($data as $key=>$value) {
			$audition .= "<li><b>$key:</b> $value</li>";
		}
		$audition .= '</ul>';
		$auditionEmail = new Email('server@mamma-mia-queenstown.com', 'mamma-mia@showbizqt.co.nz', 'New Audition Request', $audition);
		$auditionEmail->send();

		//Send email to them
		$receipt = '<h3>Thanks for your interest in auditioning !</h3><p>We will be in contact soon to confirm your audition time slot.</p><p>Regards,<br />The Mamma Mia Queenstown Team.';
		$receiptEmail = new Email('mamma-mia@showbizqt.co.nz', $data['Email'], 'Thanks for your Audition Request', $receipt);
		$receiptEmail->send();

		return $this->customise(array('Form'=>'<div class="alert alert-success">Thanks ' . $data['FirstName'] . '. You are on the list! We will be in touch shortly to confirm your audition time slot. Good Luck!</div>'))->render();
	}

	

	function SubMenu() {
		return new arrayList(array(
			new ArrayData(array('Title'=>'Contact','HREF'=>$this->Link(),'Class'=>$this->action == 'index' ? 'active' : '')),
			new ArrayData(array('Title'=>'Audition','HREF'=>$this->Link($url = 'audition'),'Class'=>$this->action == $url ? 'active' : '')),
			new ArrayData(array('Title'=>'Ticket Mailing List','HREF'=>$this->Link($url = 'tickets'),'Class'=>$this->action == $url ? 'active' : '')),
			new ArrayData(array('Title'=>'Volunteer','HREF'=>$this->Link($url = 'volunteer'),'Class'=>$this->action == $url ? 'active' : '')),
			)
		);
	}

}

class MailingList extends DataObject {
	static $db = array(
		'FirstName' => 'Varchar(50)',
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

		'Date' => 'Date',
		'Time' => 'Varchar',
		'Role' => 'Varchar',
		'Reason' => 'Text',
		'Comment' => 'Text',
		'DanceWorkshop1' => 'Varchar',
		'DanceWorkshop2' => 'Varchar',

	);
}