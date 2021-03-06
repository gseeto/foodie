<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Quality class.  It uses the code-generated
	 * QualityDataGrid control which has meta-methods to help with
	 * easily creating/defining Quality columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both quality_list.php AND
	 * quality_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class QualityListForm extends QForm {
		// Local instance of the Meta DataGrid to list Qualities
		protected $dtgQualities;

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
			$this->dtgQualities = new QualityDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgQualities->CssClass = 'datagrid';
			$this->dtgQualities->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgQualities->Paginator = new QPaginator($this->dtgQualities);
			$this->dtgQualities->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/quality_edit.php';
			$this->dtgQualities->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for quality's properties, or you
			// can traverse down QQN::quality() to display fields that are down the hierarchy)
			$this->dtgQualities->MetaAddColumn('Id');
			$this->dtgQualities->MetaAddColumn('Rating');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// quality_list.tpl.php as the included HTML template file
	QualityListForm::Run('QualityListForm');
?>