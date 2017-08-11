<?php
/**
 * Description of HomePage
 *
 * @author o0BAMBAM0o
 */
class HomePage extends Page {
	
	static $has_many = array(
		'Sections' =>	'HomePageSection',
		'CaroselImages' => 'HomePageImages'
	);

	public function getCMSFields() {
        // Get the fields from the parent implementation
        $fields = parent::getCMSFields();
        // Create a default configuration for the new GridField, allowing record editing
        $config = GridFieldConfig_RelationEditor::create();
        // Set the names and data for our gridfield columns
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Name',
        ));
        // Create a gridfield to hold the student relationship
        $sectionField = new GridField(
            'HomePageSection', // Field name
            'Sections', // Field title
            $this->Sections(),
            $config
        );
        // Create a tab named "Students" and add our field to it
        $fields->addFieldToTab('Root.Main', $sectionField);
        return $fields;
    }
}

class HomePage_Controller extends Page_Controller {
	
}

//use SilverStripe\Forms\FieldList;
//use SilverStripe\Forms\TextField;
//use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class HomePageSection extends DataObject {
	static $db = array(
		'Title' => 'Varchar(50)',
		'Body' => 'HTMLText',
	);

	static $has_one = array(
		'Page' => 'Page'
	);

	public function getCMSFields() {
//		return Fieldlist::create(
//			TextField::create('Title'),
//			HTMLField::create('Body')
//		);
		return new FieldList(
				new TextField('Title'),
				new HTMLEditorField('Body')
		);

	}
}

class HomePageImages extends DataObject {
	static $db = array(
		'Title' => 'Varchar(50)',
		'Caption' => 'Varchar(255)',
		'Link' => 'Varchar(255)',
	);
	
	static $has_one = array(
		'Page' => 'Page',
		'Image' => 'Image'
	);
}