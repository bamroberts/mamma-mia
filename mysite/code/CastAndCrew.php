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
}

class CastAndCrew_Controller extends Page_Controller {
       

}

class CastAndCrewMember extends DataObject {
	static $db = array(
		'Name' => 'Varchar(100)',
		'Title' => 'Varchar(100)',
		'Bio' => 'HTMLText',
		//'Department' => Enum
	);

	static $has_one = array(
		'Photo' => 'Image',
		'Page' => 'CastAndCrew'
	);
}

class CastMember extends CastAndCrewMember {}
class CrewMember extends CastAndCrewMember {}
class CreativeMember extends CastAndCrewMember {}
class CommitteeMember extends CastAndCrewMember {}
