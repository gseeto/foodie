<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Category class.  It uses the code-generated
	 * CategoryDataGrid control which has meta-methods to help with
	 * easily creating/defining Category columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both category_list.php AND
	 * category_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class CategoryListForm extends QForm {
		// Local instance of the Meta DataGrid to list Categories
		protected $dtgCategories;

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
			$this->dtgCategories = new CategoryDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgCategories->CssClass = 'datagrid';
			$this->dtgCategories->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgCategories->Paginator = new QPaginator($this->dtgCategories);
			$this->dtgCategories->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/category_edit.php';
			$this->dtgCategories->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for category's properties, or you
			// can traverse down QQN::category() to display fields that are down the hierarchy)
			$this->dtgCategories->MetaAddColumn('Id');
			$this->dtgCategories->MetaAddColumn('Group');
			$this->dtgCategories->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// category_list.tpl.php as the included HTML template file
	CategoryListForm::Run('CategoryListForm');
?>