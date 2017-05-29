<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tickets
 *
 * @author o0BAMBAM0o
 */
class Tickets extends Page {
	static $has_many = array(
		'Perfomances' => 'Perfomance',
		'Sections' => 'Section'
	);

	public function getCMSFields() {
        // Get the fields from the parent implementation
        $fields = parent::getCMSFields();
        // Create a default configuration for the new GridField, allowing record editing
        $config = GridFieldConfig_RelationEditor::create();
        // Set the names and data for our gridfield columns
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
			'Title' => 'Title',
			'Date' => 'Date',
			'Time' => 'Time',
        ));

        $sectionField = new GridField(
            'Perfomance', // Field name
            'Perfomances', // Field title
            $this->Perfomances(),
            $config
        );
        // Create a tab named "Students" and add our field to it
        $fields->addFieldToTab('Root.Main', $sectionField);
		return $fields;
	}
	

}

class Tickets_Controller extends Page_Controller {
	protected $sections = array(
		'T3' => array(
			'PriceGroup' => 'B',
			'Width' => 23,
			'Rows' => 5,
			'StartRow' => 'y',
 			'StartSeat' => '11',

		),
		'T4' => array(
			'PriceGroup' => 'B',
			'Width' => 19,
			'Rows' => 5,
			'StartRow' => 'y',
 			'StartSeat' => '34',

		),
		'T1' => array(
			'PriceGroup' => 'B',
			'Width' => 3,
			'Rows' => 9,
			'StartRow' => 'n',
 			'StartSeat' => '1',
 			'Structure' => array(
				5, 3, 3, 3, 3, 3, 3, 3, 3
			),
			'Class' => 'no-right-margin rotate-10-ccw'
		),
		'T2' => array(
			'PriceGroup' => 'A',
			'Width' => 6,
			'Rows' => 9,
			'StartRow' => 'n',
 			'StartSeat' => '6',
			'Class' => 'no-left-margin rotate-10-ccw'

		),
		'F5' => array(
			'PriceGroup' => 'B',
			'Width' => 36,
			'Rows' => 5,
			'StartRow' => 's',
			'StartSeat' => 12,
			'Class' => 'break-13 break-26 no-bottom-margin'

		),
		'F4' => array(
			'PriceGroup' => 'A',
			'Width' => 36,
			'Rows' => 5,
			'StartRow' => 'n',
			'StartSeat' => 12,
			'Class' => 'break-13 break-26 no-top-margin'
		),

		
		'T5' => array(
			'PriceGroup' => 'A',
			'Width' => 6,
			'Rows' => 9,
			'StartRow' => 'n',
 			'StartSeat' => '48',
			'Class' => 'no-right-margin rotate-10-cw'

		),
		'T6' => array(
			'PriceGroup' => 'B',
			'Width' => 3,
			'Rows' => 9,
			'StartRow' => 'n',
 			'StartSeat' => '54',
 			'Structure' => array(
				5, 3, 3, 3, 3, 3, 3, 3, 3
			),
			'Class' => 'no-left-margin rotate-10-cw text-right'
		),
		'F1' => array(
			'PriceGroup' => 'B',
			'Width' => 16,
			'Rows' => 13,
			'StartRow' => 'a',
 			'StartSeat' => '1',
 			'Structure' => array(
				16,15,14,13,12,11,10,9,8,7,6,5,4
			),
			'Class'=> 'text-right'
		),
		'F2' => array(
			'PriceGroup' => 'A',
			'Width' => 24,
			'Rows' => 13,
			'StartRow' => 'a',
			'StartSeat' => 17,
		),
		'F3' => array(
			'PriceGroup' => 'B',
			'Width' => 16,
			'Rows' => 13,
			'StartRow' => 'a',
 			'StartSeat' => '42',
 			'Structure' => array(
				16,15,14,13,12,11,10,9,8,7,6,5,4
			)
		),

		


		
	);

	function renderSeats(){
		$html = '';
		foreach($this->sections as $section=>$details) {

			$html .= sprintf('<div class="ticket-section ticket-section-%s ticket-price-group-%s %s" data-toggle="tooltip" title="%s" data-placement="bottom" >',$section,$details['PriceGroup'],$details['Class'],str_replace('T','Tier ',str_replace('F','Floor ',$section )));
			if(!isset($details['Structure'])) {
				$details['Structure'] = array_fill(1, $details['Rows'], $details['Width']);
			}
			$startRow = isset($details['StartRow']) ? $details['StartRow'] : 'a';
			$allRows = array();
			foreach($details['Structure'] as $row=>$seats) {
				$allRows[] = $startRow++;
			}
			//$flipedRows = array_reverse($allRows);
			foreach($details['Structure'] as $row=>$seats) {
				$topRow = array_pop($allRows);
				$html .= sprintf('<div class="ticket-row ticket-row-%s">',$topRow);
				$fill = array_fill(0, $seats, 1);
					foreach($fill as $seat=>$valid) {
						$seatNumber = $details['StartSeat'] + $seat;
						$html .= sprintf('<span class="ticket-seat ticket-seat-%s %s" data-toggle="tooltip" title="%s%02d" ></span>',"$section-{$topRow}$seatNumber", $valid ? '' : 'disabled', strtoupper($topRow),$seatNumber);
					}
				$html .= '</div>';
			}
			$html .= '</div>';
		}
		return $html;
	}

	
}

class Perfomance extends DataObject {
	static $default_sort = 'Date';

	static $db = array(
		'Title' => 'Varchar',
		'Date' => 'Date',
		'Time' => 'Time',
		'AdultA' => 'Currency',
		'AdultB' => 'Currency',
		'ChildA' => 'Currency',
		'ChildB' => 'Currency',
	);

	static $has_one = array(
		'Production' => 'Tickets'
	);
}

class Section extends DataObject {
	static $db = array(
		'Title' => 'Varchar',
		'Type' => 'ENum("Floor,Tier")',
		'PriceGroup' => 'ENum("A,B")',
		'Rows' => 'Int',
		'Seats' => 'Int',
		'StartRow' => 'Varchar(2)',
		'StartSeat' => 'Int',
		'FormatClasses' => 'Text',
		'Structure' => 'Text'
	);

	static $has_one = array(
		'Production' => 'Tickets'
	);

	function totalseats() {
		if($this->Structure){
			$total = 0;
			foreach($this->Structure as $seats) {
				$total += $seats;
			}
		} else {
			$total = $this->Rows * $this->Seats;
		}
		return $total;
	}
}