<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CMSAuditions extends LeftAndMain implements PermissionProvider{

	private static $url_segment = 'auditions';

	private static $url_rule = '/$Action/$ID';

	private static $menu_title = 'Auditions';

	private static $tree_class = 'Folder';

	public function Auditions() {
		return Audition::get()->sort('Date ASC, Time Asc');
	}

	public function getEditForm($id = null, $fields = null) {
		
			// List all reports
			$fields = new FieldList();
			$gridFieldConfig = GridFieldConfig::create()->addComponents(
				new GridFieldToolbarHeader(),
				new GridFieldFilterHeader(),
				new GridFieldSortableHeader(),
				new GridFieldDataColumns(),
				new GridFieldFooter(),
				new GridFieldExportButton()

			);
			$gridField = new GridField('Auditions',false, $this->Auditions(), $gridFieldConfig);
			$columns = $gridField->getConfig()->getComponentByType('GridFieldDataColumns');
			$columns->setDisplayFields(array(
				'Date' => 'Date',
				'Time' => 'Time',
				'FirstName' => 'First Name',
				'Surname' => 'Surname',
				'Email' => 'Email',
				'Role' => 'Role',
				'DanceWorkshop1' => 'Dance Workshop 1',
				'DanceWorkshop2' => 'Dance Workshop 2',
				'Comment' => 'Comment',
				'Created' => 'Application Date',
				'Search' => 'Search'

			));
			$columns->setFieldCasting(array(
				'Date' => 'Date->Nice',
			));
			$columns->setFieldFormatting(array(
				'Comment' => function($value, $item) {
					$comment = $value;
					if($item->Reason) {
						$comment .= "  Reason for Sunday Audition: " . $item->Reason;
					}
					return $comment;
				},
			));

			$export = $gridField->getConfig()->getComponentByType('GridFieldExportButton');

			$export = $gridField->getConfig()->getComponentByType('GridFieldExportButton');
			$export->setExportColumns($columns->getDisplayFields($gridField) + array('Reason'=>'Reason for Sunday'));

			
			$fields->push($gridField);
		

		$actions = new FieldList();
		$form = new Form($this, "EditForm", $fields, $actions);
		$form->addExtraClass('cms-edit-form cms-panel-padded center ' . $this->BaseCSSClasses());
		$form->loadDataFrom($this->request->getVars());

		$this->extend('updateEditForm', $form);

		return $form;
	}

	public function providePermissions() {
		$title = _t("CMSAuditions.MENUTITLE", LeftAndMain::menu_title_for_class($this->class));
		return array(
			"CMS_ACCESS_CMSAuditions" => array(
				'name' => _t('CMSMain.ACCESS', "Access to '{title}' section", array('title' => $title)),
				'category' => _t('Permission.CMS_ACCESS_CATEGORY', 'CMS Access')
			)
		);
	}
}