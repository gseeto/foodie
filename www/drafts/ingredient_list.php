<?php
	// Load the Qcodo Development Framework
	require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Ingredient class.  It uses the code-generated
	 * IngredientDataGrid control which has meta-methods to help with
	 * easily creating/defining Ingredient columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both ingredient_list.php AND
	 * ingredient_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My Application
	 * @subpackage Drafts
	 */
	class IngredientListForm extends QForm {
		// Local instance of the Meta DataGrid to list Ingredients
		protected $dtgIngredients;

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
			$this->dtgIngredients = new IngredientDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgIngredients->CssClass = 'datagrid';
			$this->dtgIngredients->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgIngredients->Paginator = new QPaginator($this->dtgIngredients);
			$this->dtgIngredients->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/ingredient_edit.php';
			$this->dtgIngredients->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for ingredient's properties, or you
			// can traverse down QQN::ingredient() to display fields that are down the hierarchy)
			$this->dtgIngredients->MetaAddColumn('Id');
			$this->dtgIngredients->MetaAddColumn('Name');
			$this->dtgIngredients->MetaAddTypeColumn('UnitOfMeasurementId', 'UnitOfMeasurementType');
			$this->dtgIngredients->MetaAddColumn('InitialAmount');
			$this->dtgIngredients->MetaAddColumn('Cost');
			$this->dtgIngredients->MetaAddTypeColumn('CostUnitOfMeasurement', 'UnitOfMeasurementType');
		}
	}

	// Go ahead and run this form object to generate the page and event handlers, implicitly using
	// ingredient_list.tpl.php as the included HTML template file
	IngredientListForm::Run('IngredientListForm');
?>