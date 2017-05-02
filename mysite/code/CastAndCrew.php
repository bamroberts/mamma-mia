<?php
/**
 * Description of HomePage
 *
 * @author o0BAMBAM0o
 */
class CastAndCrew extends Page {
	static $has_many = array(
		'Cast' =>	'CastMember',
		'Creative' => 'CreativeMember',
		'Crew' => 'CrewMember',
		'Committee' => 'CommitteeMember'
	);

	public function getCMSFields() {
        // Get the fields from the parent implementation
        $fields = parent::getCMSFields();
        // Create a default configuration for the new GridField, allowing record editing
        $config = GridFieldConfig_RelationEditor::create();
        // Set the names and data for our gridfield columns
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Name' => 'Name',
			'Title' => 'Title',
        ));
        // Create a gridfield to hold the student relationship
        $sectionField = new GridField(
            'CastMember', // Field name
            'CastMembers', // Field title
            $this->Cast(),
            $config
        );
        // Create a tab named "Students" and add our field to it
        $fields->addFieldToTab('Root.Main', $sectionField);

		// Create a gridfield to hold the student relationship
        $sectionField = new GridField(
            'CrewMember', // Field name
            'CrewMembers', // Field title
            $this->Crew(),
            $config
        );
        // Create a tab named "Students" and add our field to it
        $fields->addFieldToTab('Root.Main', $sectionField);

        return $fields;
    }

	function SubMenu() {
		return new arrayList(array(
			new ArrayData(array('Title'=>'Cast','HREF'=>"{$this->Link()}#cast",'Class'=>'active')),
			new ArrayData(array('Title'=>'Crew','HREF'=>"{$this->Link()}#crew")),
			new ArrayData(array('Title'=>'Committee','HREF'=>"{$this->Link()}#committee"))
			)
		);

	}
}

class CastAndCrew_Controller extends Page_Controller {

	private static $allowed_actions = array(
        'findByUrl'
    );

    private static $url_handlers = array(
		'' => 'index',
        '$Department/$Name' => 'findByUrl',

    );

	public function findByUrl($request) {
		$department = $request->latestParam('Department');
		$name = $request->latestParam('Name');
		if($department && $name && $member = DataObject::Get_one($department.'Member',"REPLACE(CONCAT(Name,'-',Title),' ','') = '$name'")) {
			$content = $member->renderWith('bio');
			return Director::is_ajax() ? $content : $this->customise(array('Content'=> $content))->render();
		}
		return $this->httpError(404);
	}
}

class CastAndCrewMember extends DataObject {
	static $db = array(
		'Name' => 'Varchar(100)',
		'Title' => 'Varchar(100)',
		'Bio' => 'HTMLText',
		'TopBilled' => 'boolean'
	);

	static $has_one = array(
		'Photo' => 'Image',
		'Page' => 'CastAndCrew'
	);

	public function Link() {
		$department = str_replace('Member', '', $this->ClassName);
		return $this->Page()->Link().str_replace(' ', '', strtolower("$department/$this->Name-$this->Title"));
	}

}

class CastMember extends CastAndCrewMember {}
class CrewMember extends CastAndCrewMember {}
class CreativeMember extends CastAndCrewMember {}
class CommitteeMember extends CastAndCrewMember {}
