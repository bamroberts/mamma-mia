<?php

class SiteSettings extends DataExtension {

    private static $db = array(
        'TicketsURL' => 'Varchar(500)',
		'TicketsForSale' => 'Boolean'
    );

    public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab("Root.Main",
			new CheckboxField("TicketsForSale", "Tickets are on sale.")
		);
        $fields->addFieldToTab("Root.Main",
            new TextField("TicketsURL", "External URL to book tickets")
        );
		
    }
}