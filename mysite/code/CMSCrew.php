<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CMSCrew extends LeftAndMain implements PermissionProvider{

	private static $url_segment = 'crew';

	private static $url_rule = '/$Action/$ID';

	private static $menu_title = 'Crew';

	private static $tree_class = 'Folder';

	public function Crew() {
		return Crew::get();
	}

	public function getEditForm($id = null, $fields = null) {

			$fields = new FieldList();
			$gridFieldConfig = GridFieldConfig::create()->addComponents(
				new GridFieldToolbarHeader(),
				new GridFieldFilterHeader(),
				new GridFieldSortableHeader(),
				new GridFieldDataColumns(),
				new GridFieldFooter(),
				new GridFieldExportButton()

			);
			$gridField = new GridField('Crew',false, $this->Crew(), $gridFieldConfig);
			$columns = $gridField->getConfig()->getComponentByType('GridFieldDataColumns');
			$columns->setDisplayFields(array(
				'Created' => 'Application Date',
				'FirstName' => 'First Name',
				'Surname' => 'Surname',
				'Email' => 'Email',
				'Phone' => 'Phone',
				'AreasOfInterest' => 'Areas of Interest',
				'Search' => 'Search'
			));

			$fields->push($gridField);


		$actions = new FieldList();
		$form = new Form($this, "EditForm", $fields, $actions);
		$form->addExtraClass('cms-edit-form cms-panel-padded center ' . $this->BaseCSSClasses());
		$form->loadDataFrom($this->request->getVars());

		$this->extend('updateEditForm', $form);

		return $form;
	}

	public function providePermissions() {
		$title = _t("CMSCrew.MENUTITLE", LeftAndMain::menu_title_for_class($this->class));
		return array(
			"CMS_ACCESS_CMSCrew" => array(
				'name' => _t('CMSMain.ACCESS', "Access to '{title}' section", array('title' => $title)),
				'category' => _t('Permission.CMS_ACCESS_CATEGORY', 'CMS Access')
			)
		);
	}
}