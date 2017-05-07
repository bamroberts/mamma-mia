<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TheShow
 *
 * @author o0BAMBAM0o
 */
class TheShow extends Page {

	static $db = array(
		'Heading' => 'Text',
		'ShowDetails' => 'HTMLText',
		'Showbiz' =>'HTMLText'
	);

	static $has_many = array(
		'Quotes' => 'Quote'
	);

	public function getCMSFields() {
        // Get the fields from the parent implementation
        $fields = parent::getCMSFields();
		$fields->insertAfter('Content', new TextAreaField("Heading"));
		$fields->insertAfter('Heading', new HtmlEditorField("ShowDetails", "About the Show"));
		$fields->insertAfter('TheShow', new HtmlEditorField("Showbiz", "About Showbiz"));
		
		$config = GridFieldConfig_RelationEditor::create();
        // Set the names and data for our gridfield columns
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Author' => 'Author',
        ));
        // Create a gridfield to hold the student relationship
        $sectionField = new GridField(
            'Quote', // Field name
            'Quotes', // Field title
            $this->Quotes(),
            $config
        );
        // Create a tab named "Students" and add our field to it
        $fields->insertBefore('Metadata', $sectionField);

		
		$fields->removeByName('Content');

		return $fields;
	}
	
}

class TheShow_Controller extends Page_Controller {

	//put your code here
}

class Quote extends DataObject {
	static $db = array(
		'Quote' => 'Text',
		'Author' => 'Varchar',
		'Star' => 'Int'
	);
	
	static $has_one = array(
		'Page' => 'Page'
	);

	public function renderStar() {
		$text = '';
		for($i = 1;  $i<=$this->Star; $i++) {
			$text .= '<i class="fa fa-star"></i> ';
		}
		return $text;
	}
}
