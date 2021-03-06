<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Menu class.  It uses the code-generated
	 * MenuDataGrid control which has meta-methods to help with
	 * easily creating/defining Menu columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both menu_list.php AND
	 * menu_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class MenuListForm extends QForm {
		// Local instance of the Meta DataGrid to list Menus
		protected $dtgMenus;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			// Security check for ALLOW_REMOTE_ADMIN
			// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
			QApplication::CheckRemoteAdmin();
		}

		protected function Form_Create() {
			// Instantiate the Meta DataGrid
			$this->dtgMenus = new MenuDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgMenus->CssClass = 'datagrid';
			$this->dtgMenus->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgMenus->Paginator = new QPaginator($this->dtgMenus);
			$this->dtgMenus->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/menu_edit.php';
			$this->dtgMenus->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for menu's properties, or you
			// can traverse down QQN::menu() to display fields that are down the hierarchy)
			$this->dtgMenus->MetaAddColumn('Id');
			$this->dtgMenus->MetaAddColumn('Name');
			$this->dtgMenus->MetaAddColumn('Description');
			$this->dtgMenus->MetaAddColumn(QQN::Menu()->Owner);
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// menu_list.tpl.php as the included HTML template file
	MenuListForm::Run('MenuListForm');
?>