<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the IngredientSource class.  It uses the code-generated
	 * IngredientSourceDataGrid control which has meta-methods to help with
	 * easily creating/defining IngredientSource columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ingredient_source_list.php AND
	 * ingredient_source_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class IngredientSourceListForm extends QForm {
		// Local instance of the Meta DataGrid to list IngredientSources
		protected $dtgIngredientSources;

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
			$this->dtgIngredientSources = new IngredientSourceDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgIngredientSources->CssClass = 'datagrid';
			$this->dtgIngredientSources->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgIngredientSources->Paginator = new QPaginator($this->dtgIngredientSources);
			$this->dtgIngredientSources->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/ingredient_source_edit.php';
			$this->dtgIngredientSources->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for ingredient_source's properties, or you
			// can traverse down QQN::ingredient_source() to display fields that are down the hierarchy)
			$this->dtgIngredientSources->MetaAddColumn('Id');
			$this->dtgIngredientSources->MetaAddColumn(QQN::IngredientSource()->Ingredient);
			$this->dtgIngredientSources->MetaAddColumn(QQN::IngredientSource()->Location);
			$this->dtgIngredientSources->MetaAddColumn('Cost');
			$this->dtgIngredientSources->MetaAddColumn(QQN::IngredientSource()->Quality);
			$this->dtgIngredientSources->MetaAddColumn('Comments');
			$this->dtgIngredientSources->MetaAddColumn('Name');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// ingredient_source_list.tpl.php as the included HTML template file
	IngredientSourceListForm::Run('IngredientSourceListForm');
?>