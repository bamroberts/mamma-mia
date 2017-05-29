<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partners
 *
 * @author o0BAMBAM0o
 */
class Partners extends Page {

	static $has_many = array(
		'Sponsors' => 'Sponsor'
	);

	public $hideSponsors = false;

	public function Headline() {
		return $this->byTier('Headline')->First();
	}

	public function Platinum() {
		return $this->byTier('Platinum');
	}

	public function Gold() {
		if($set = $this->byTier('Gold')->Count()) {
			return $set;
		}

		$set = $this->byTier('Platinum')->toArray();
		return ArrayList::create($set)->merge($set)->Limit(4);

	}

	public function Silver() {
		if($set = $this->byTier('Silver')->Count()) {
			return $set;
		}

		$set = $this->byTier('Platinum')->toArray();
		return ArrayList::create($set)->merge($set)->merge($set)->Limit(6);
	}

	public function Bronze() {
		if($set = $this->byTier('Bronze')->Count()) {
			return $set;
		}

		$set = $this->byTier('Platinum')->toArray();
		return ArrayList::create($set)->merge($set)->merge($set)->merge($set)->Limit(12);
	}

	private function byTier($tier) {
		return $this->Sponsors()->filter('Tier', $tier);
	}

	public function getCMSFields() {
        // Get the fields from the parent implementation
        $fields = parent::getCMSFields();
        // Create a default configuration for the new GridField, allowing record editing
        $config = GridFieldConfig_RelationEditor::create();
        // Set the names and data for our gridfield columns
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Name',
			'Tier' => 'Tier'
        ));
        // Create a gridfield to hold the student relationship
        $sectionField = new GridField(
            'Sponsor', // Field name
            'Sections', // Field title
            $this->Sponsors(),
            $config
        );
        // Create a tab named "Students" and add our field to it
        $fields->addFieldToTab('Root.Main', $sectionField);
        return $fields;
    }
}

class Partners_Controller extends Page_Controller {

}

class Sponsor extends DataObject {
	static $db = array(
		'Title' => 'Varchar(250)',
		'URL' => 'Varchar(250)',
		'Bio' => 'HTMLtext',
		'Tier' => 'ENUM("Headline, Platinum, Gold, Silver, Bronze")',
		'Status' => 'INT'
	);
	static $has_one = array(
		'Page' => 'Partners',
		'Photo' => 'Image'
	);
}