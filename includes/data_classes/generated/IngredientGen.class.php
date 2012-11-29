<?php
	/**
	 * The abstract IngredientGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Ingredient subclass which
	 * extends this IngredientGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Ingredient class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Name the value for strName 
	 * @property integer $UnitOfMeasurementId the value for intUnitOfMeasurementId 
	 * @property double $InitialAmount the value for fltInitialAmount 
	 * @property double $Cost the value for fltCost 
	 * @property integer $CostUnitOfMeasurement the value for intCostUnitOfMeasurement 
	 * @property Recipe $_Recipe the value for the private _objRecipe (Read-Only) if set due to an expansion on the recipe_ingredient_assn association table
	 * @property Recipe[] $_RecipeArray the value for the private _objRecipeArray (Read-Only) if set due to an ExpandAsArray on the recipe_ingredient_assn association table
	 * @property IngredientSource $_IngredientSource the value for the private _objIngredientSource (Read-Only) if set due to an expansion on the ingredient_source.ingredient_id reverse relationship
	 * @property IngredientSource[] $_IngredientSourceArray the value for the private _objIngredientSourceArray (Read-Only) if set due to an ExpandAsArray on the ingredient_source.ingredient_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class IngredientGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column ingredient.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient.unit_of_measurement_id
		 * @var integer intUnitOfMeasurementId
		 */
		protected $intUnitOfMeasurementId;
		const UnitOfMeasurementIdDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient.initial_amount
		 * @var double fltInitialAmount
		 */
		protected $fltInitialAmount;
		const InitialAmountDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient.cost
		 * @var double fltCost
		 */
		protected $fltCost;
		const CostDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient.cost_unit_of_measurement
		 * @var integer intCostUnitOfMeasurement
		 */
		protected $intCostUnitOfMeasurement;
		const CostUnitOfMeasurementDefault = null;


		/**
		 * Private member variable that stores a reference to a single Recipe object
		 * (of type Recipe), if this Ingredient object was restored with
		 * an expansion on the recipe_ingredient_assn association table.
		 * @var Recipe _objRecipe;
		 */
		private $_objRecipe;

		/**
		 * Private member variable that stores a reference to an array of Recipe objects
		 * (of type Recipe[]), if this Ingredient object was restored with
		 * an ExpandAsArray on the recipe_ingredient_assn association table.
		 * @var Recipe[] _objRecipeArray;
		 */
		private $_objRecipeArray = array();

		/**
		 * Private member variable that stores a reference to a single IngredientSource object
		 * (of type IngredientSource), if this Ingredient object was restored with
		 * an expansion on the ingredient_source association table.
		 * @var IngredientSource _objIngredientSource;
		 */
		private $_objIngredientSource;

		/**
		 * Private member variable that stores a reference to an array of IngredientSource objects
		 * (of type IngredientSource[]), if this Ingredient object was restored with
		 * an ExpandAsArray on the ingredient_source association table.
		 * @var IngredientSource[] _objIngredientSourceArray;
		 */
		private $_objIngredientSourceArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a Ingredient from PK Info
		 * @param integer $intId
		 * @return Ingredient
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Ingredient::QuerySingle(
				QQ::Equal(QQN::Ingredient()->Id, $intId)
			);
		}

		/**
		 * Load all Ingredients
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ingredient[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Ingredient::QueryArray to perform the LoadAll query
			try {
				return Ingredient::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Ingredients
		 * @return int
		 */
		public static function CountAll() {
			// Call Ingredient::QueryCount to perform the CountAll query
			return Ingredient::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Create/Build out the QueryBuilder object with Ingredient-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'ingredient');
			Ingredient::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('ingredient');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single Ingredient object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Ingredient the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ingredient::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Ingredient object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Ingredient::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return Ingredient::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Ingredient objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Ingredient[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ingredient::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Ingredient::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = Ingredient::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of Ingredient objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Ingredient::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'ingredient_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Ingredient-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Ingredient::GetSelectFields($objQueryBuilder);
				Ingredient::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return Ingredient::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Ingredient
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'ingredient';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'unit_of_measurement_id', $strAliasPrefix . 'unit_of_measurement_id');
			$objBuilder->AddSelectItem($strTableName, 'initial_amount', $strAliasPrefix . 'initial_amount');
			$objBuilder->AddSelectItem($strTableName, 'cost', $strAliasPrefix . 'cost');
			$objBuilder->AddSelectItem($strTableName, 'cost_unit_of_measurement', $strAliasPrefix . 'cost_unit_of_measurement');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Ingredient from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Ingredient::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Ingredient
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'ingredient__';

				$strAlias = $strAliasPrefix . 'recipe__recipe_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRecipeArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRecipeArray[$intPreviousChildItemCount - 1];
						$objChildItem = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipe__recipe_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRecipeArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRecipeArray[] = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipe__recipe_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'ingredientsource__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objIngredientSourceArray)) {
						$objPreviousChildItem = $objPreviousItem->_objIngredientSourceArray[$intPreviousChildItemCount - 1];
						$objChildItem = IngredientSource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ingredientsource__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objIngredientSourceArray[] = $objChildItem;
					} else
						$objPreviousItem->_objIngredientSourceArray[] = IngredientSource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ingredientsource__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'ingredient__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Ingredient object
			$objToReturn = new Ingredient();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'unit_of_measurement_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'unit_of_measurement_id'] : $strAliasPrefix . 'unit_of_measurement_id';
			$objToReturn->intUnitOfMeasurementId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'initial_amount', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'initial_amount'] : $strAliasPrefix . 'initial_amount';
			$objToReturn->fltInitialAmount = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'cost', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cost'] : $strAliasPrefix . 'cost';
			$objToReturn->fltCost = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'cost_unit_of_measurement', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cost_unit_of_measurement'] : $strAliasPrefix . 'cost_unit_of_measurement';
			$objToReturn->intCostUnitOfMeasurement = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'ingredient__';



			// Check for Recipe Virtual Binding
			$strAlias = $strAliasPrefix . 'recipe__recipe_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRecipeArray[] = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipe__recipe_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRecipe = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipe__recipe_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for IngredientSource Virtual Binding
			$strAlias = $strAliasPrefix . 'ingredientsource__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objIngredientSourceArray[] = IngredientSource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ingredientsource__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objIngredientSource = IngredientSource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ingredientsource__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Ingredients from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Ingredient[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Ingredient::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Ingredient::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Ingredient object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Ingredient next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return Ingredient::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Ingredient object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Ingredient
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Ingredient::QuerySingle(
				QQ::Equal(QQN::Ingredient()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Ingredient objects,
		 * by Name Index(es)
		 * @param string $strName
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ingredient[]
		*/
		public static function LoadArrayByName($strName, $objOptionalClauses = null) {
			// Call Ingredient::QueryArray to perform the LoadArrayByName query
			try {
				return Ingredient::QueryArray(
					QQ::Equal(QQN::Ingredient()->Name, $strName),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Ingredients
		 * by Name Index(es)
		 * @param string $strName
		 * @return int
		*/
		public static function CountByName($strName, $objOptionalClauses = null) {
			// Call Ingredient::QueryCount to perform the CountByName query
			return Ingredient::QueryCount(
				QQ::Equal(QQN::Ingredient()->Name, $strName)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Ingredient objects,
		 * by UnitOfMeasurementId Index(es)
		 * @param integer $intUnitOfMeasurementId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ingredient[]
		*/
		public static function LoadArrayByUnitOfMeasurementId($intUnitOfMeasurementId, $objOptionalClauses = null) {
			// Call Ingredient::QueryArray to perform the LoadArrayByUnitOfMeasurementId query
			try {
				return Ingredient::QueryArray(
					QQ::Equal(QQN::Ingredient()->UnitOfMeasurementId, $intUnitOfMeasurementId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Ingredients
		 * by UnitOfMeasurementId Index(es)
		 * @param integer $intUnitOfMeasurementId
		 * @return int
		*/
		public static function CountByUnitOfMeasurementId($intUnitOfMeasurementId, $objOptionalClauses = null) {
			// Call Ingredient::QueryCount to perform the CountByUnitOfMeasurementId query
			return Ingredient::QueryCount(
				QQ::Equal(QQN::Ingredient()->UnitOfMeasurementId, $intUnitOfMeasurementId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Ingredient objects,
		 * by CostUnitOfMeasurement Index(es)
		 * @param integer $intCostUnitOfMeasurement
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ingredient[]
		*/
		public static function LoadArrayByCostUnitOfMeasurement($intCostUnitOfMeasurement, $objOptionalClauses = null) {
			// Call Ingredient::QueryArray to perform the LoadArrayByCostUnitOfMeasurement query
			try {
				return Ingredient::QueryArray(
					QQ::Equal(QQN::Ingredient()->CostUnitOfMeasurement, $intCostUnitOfMeasurement),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Ingredients
		 * by CostUnitOfMeasurement Index(es)
		 * @param integer $intCostUnitOfMeasurement
		 * @return int
		*/
		public static function CountByCostUnitOfMeasurement($intCostUnitOfMeasurement, $objOptionalClauses = null) {
			// Call Ingredient::QueryCount to perform the CountByCostUnitOfMeasurement query
			return Ingredient::QueryCount(
				QQ::Equal(QQN::Ingredient()->CostUnitOfMeasurement, $intCostUnitOfMeasurement)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Recipe objects for a given Recipe
		 * via the recipe_ingredient_assn table
		 * @param integer $intRecipeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ingredient[]
		*/
		public static function LoadArrayByRecipe($intRecipeId, $objOptionalClauses = null) {
			// Call Ingredient::QueryArray to perform the LoadArrayByRecipe query
			try {
				return Ingredient::QueryArray(
					QQ::Equal(QQN::Ingredient()->Recipe->RecipeId, $intRecipeId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Ingredients for a given Recipe
		 * via the recipe_ingredient_assn table
		 * @param integer $intRecipeId
		 * @return int
		*/
		public static function CountByRecipe($intRecipeId, $objOptionalClauses = null) {
			return Ingredient::QueryCount(
				QQ::Equal(QQN::Ingredient()->Recipe->RecipeId, $intRecipeId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Ingredient
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `ingredient` (
							`name`,
							`unit_of_measurement_id`,
							`initial_amount`,
							`cost`,
							`cost_unit_of_measurement`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->intUnitOfMeasurementId) . ',
							' . $objDatabase->SqlVariable($this->fltInitialAmount) . ',
							' . $objDatabase->SqlVariable($this->fltCost) . ',
							' . $objDatabase->SqlVariable($this->intCostUnitOfMeasurement) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('ingredient', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`ingredient`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`unit_of_measurement_id` = ' . $objDatabase->SqlVariable($this->intUnitOfMeasurementId) . ',
							`initial_amount` = ' . $objDatabase->SqlVariable($this->fltInitialAmount) . ',
							`cost` = ' . $objDatabase->SqlVariable($this->fltCost) . ',
							`cost_unit_of_measurement` = ' . $objDatabase->SqlVariable($this->intCostUnitOfMeasurement) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Ingredient
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Ingredient with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ingredient`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Ingredients
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ingredient`');
		}

		/**
		 * Truncate ingredient table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `ingredient`');
		}

		/**
		 * Reload this Ingredient from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Ingredient object.');

			// Reload the Object
			$objReloaded = Ingredient::Load($this->intId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->UnitOfMeasurementId = $objReloaded->UnitOfMeasurementId;
			$this->fltInitialAmount = $objReloaded->fltInitialAmount;
			$this->fltCost = $objReloaded->fltCost;
			$this->CostUnitOfMeasurement = $objReloaded->CostUnitOfMeasurement;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Ingredient::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `ingredient` (
					`id`,
					`name`,
					`unit_of_measurement_id`,
					`initial_amount`,
					`cost`,
					`cost_unit_of_measurement`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->intUnitOfMeasurementId) . ',
					' . $objDatabase->SqlVariable($this->fltInitialAmount) . ',
					' . $objDatabase->SqlVariable($this->fltCost) . ',
					' . $objDatabase->SqlVariable($this->intCostUnitOfMeasurement) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return Ingredient[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Ingredient::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM ingredient WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Ingredient::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Ingredient[]
		 */
		public function GetJournal() {
			return Ingredient::GetJournalForId($this->intId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Id':
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'UnitOfMeasurementId':
					// Gets the value for intUnitOfMeasurementId 
					// @return integer
					return $this->intUnitOfMeasurementId;

				case 'InitialAmount':
					// Gets the value for fltInitialAmount 
					// @return double
					return $this->fltInitialAmount;

				case 'Cost':
					// Gets the value for fltCost 
					// @return double
					return $this->fltCost;

				case 'CostUnitOfMeasurement':
					// Gets the value for intCostUnitOfMeasurement 
					// @return integer
					return $this->intCostUnitOfMeasurement;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Recipe':
					// Gets the value for the private _objRecipe (Read-Only)
					// if set due to an expansion on the recipe_ingredient_assn association table
					// @return Recipe
					return $this->_objRecipe;

				case '_RecipeArray':
					// Gets the value for the private _objRecipeArray (Read-Only)
					// if set due to an ExpandAsArray on the recipe_ingredient_assn association table
					// @return Recipe[]
					return (array) $this->_objRecipeArray;

				case '_IngredientSource':
					// Gets the value for the private _objIngredientSource (Read-Only)
					// if set due to an expansion on the ingredient_source.ingredient_id reverse relationship
					// @return IngredientSource
					return $this->_objIngredientSource;

				case '_IngredientSourceArray':
					// Gets the value for the private _objIngredientSourceArray (Read-Only)
					// if set due to an ExpandAsArray on the ingredient_source.ingredient_id reverse relationship
					// @return IngredientSource[]
					return (array) $this->_objIngredientSourceArray;


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Name':
					// Sets the value for strName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'UnitOfMeasurementId':
					// Sets the value for intUnitOfMeasurementId 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intUnitOfMeasurementId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'InitialAmount':
					// Sets the value for fltInitialAmount 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltInitialAmount = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Cost':
					// Sets the value for fltCost 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltCost = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CostUnitOfMeasurement':
					// Sets the value for intCostUnitOfMeasurement 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCostUnitOfMeasurement = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for IngredientSource
		//-------------------------------------------------------------------

		/**
		 * Gets all associated IngredientSources as an array of IngredientSource objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IngredientSource[]
		*/ 
		public function GetIngredientSourceArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return IngredientSource::LoadArrayByIngredientId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated IngredientSources
		 * @return int
		*/ 
		public function CountIngredientSources() {
			if ((is_null($this->intId)))
				return 0;

			return IngredientSource::CountByIngredientId($this->intId);
		}

		/**
		 * Associates a IngredientSource
		 * @param IngredientSource $objIngredientSource
		 * @return void
		*/ 
		public function AssociateIngredientSource(IngredientSource $objIngredientSource) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIngredientSource on this unsaved Ingredient.');
			if ((is_null($objIngredientSource->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIngredientSource on this Ingredient with an unsaved IngredientSource.');

			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ingredient_source`
				SET
					`ingredient_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIngredientSource->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objIngredientSource->IngredientId = $this->intId;
				$objIngredientSource->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a IngredientSource
		 * @param IngredientSource $objIngredientSource
		 * @return void
		*/ 
		public function UnassociateIngredientSource(IngredientSource $objIngredientSource) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIngredientSource on this unsaved Ingredient.');
			if ((is_null($objIngredientSource->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIngredientSource on this Ingredient with an unsaved IngredientSource.');

			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ingredient_source`
				SET
					`ingredient_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIngredientSource->Id) . ' AND
					`ingredient_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objIngredientSource->IngredientId = null;
				$objIngredientSource->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all IngredientSources
		 * @return void
		*/ 
		public function UnassociateAllIngredientSources() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIngredientSource on this unsaved Ingredient.');

			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (IngredientSource::LoadArrayByIngredientId($this->intId) as $objIngredientSource) {
					$objIngredientSource->IngredientId = null;
					$objIngredientSource->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ingredient_source`
				SET
					`ingredient_id` = null
				WHERE
					`ingredient_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated IngredientSource
		 * @param IngredientSource $objIngredientSource
		 * @return void
		*/ 
		public function DeleteAssociatedIngredientSource(IngredientSource $objIngredientSource) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIngredientSource on this unsaved Ingredient.');
			if ((is_null($objIngredientSource->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIngredientSource on this Ingredient with an unsaved IngredientSource.');

			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ingredient_source`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIngredientSource->Id) . ' AND
					`ingredient_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objIngredientSource->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated IngredientSources
		 * @return void
		*/ 
		public function DeleteAllIngredientSources() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIngredientSource on this unsaved Ingredient.');

			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (IngredientSource::LoadArrayByIngredientId($this->intId) as $objIngredientSource) {
					$objIngredientSource->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ingredient_source`
				WHERE
					`ingredient_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for Recipe
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Recipes as an array of Recipe objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Recipe[]
		*/ 
		public function GetRecipeArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Recipe::LoadArrayByIngredient($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Recipes
		 * @return int
		*/ 
		public function CountRecipes() {
			if ((is_null($this->intId)))
				return 0;

			return Recipe::CountByIngredient($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Recipe
		 * @param Recipe $objRecipe
		 * @return bool
		*/
		public function IsRecipeAssociated(Recipe $objRecipe) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsRecipeAssociated on this unsaved Ingredient.');
			if ((is_null($objRecipe->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsRecipeAssociated on this Ingredient with an unsaved Recipe.');

			$intRowCount = Ingredient::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Ingredient()->Id, $this->intId),
					QQ::Equal(QQN::Ingredient()->Recipe->RecipeId, $objRecipe->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the Recipe relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalRecipeAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = Ingredient::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `recipe_ingredient_assn` (
					`ingredient_id`,
					`recipe_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($intAssociatedId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's Recipe relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalRecipeAssociationForId($intId) {
			$objDatabase = Ingredient::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM recipe_ingredient_assn WHERE ingredient_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's Recipe relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalRecipeAssociation() {
			return Ingredient::GetJournalRecipeAssociationForId($this->intId);
		}

		/**
		 * Associates a Recipe
		 * @param Recipe $objRecipe
		 * @return void
		*/ 
		public function AssociateRecipe(Recipe $objRecipe) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRecipe on this unsaved Ingredient.');
			if ((is_null($objRecipe->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRecipe on this Ingredient with an unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `recipe_ingredient_assn` (
					`ingredient_id`,
					`recipe_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objRecipe->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalRecipeAssociation($objRecipe->Id, 'INSERT');
		}

		/**
		 * Unassociates a Recipe
		 * @param Recipe $objRecipe
		 * @return void
		*/ 
		public function UnassociateRecipe(Recipe $objRecipe) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipe on this unsaved Ingredient.');
			if ((is_null($objRecipe->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipe on this Ingredient with an unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe_ingredient_assn`
				WHERE
					`ingredient_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`recipe_id` = ' . $objDatabase->SqlVariable($objRecipe->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalRecipeAssociation($objRecipe->Id, 'DELETE');
		}

		/**
		 * Unassociates all Recipes
		 * @return void
		*/ 
		public function UnassociateAllRecipes() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllRecipeArray on this unsaved Ingredient.');

			// Get the Database Object for this Class
			$objDatabase = Ingredient::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `recipe_id` AS associated_id FROM `recipe_ingredient_assn` WHERE `ingredient_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalRecipeAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe_ingredient_assn`
				WHERE
					`ingredient_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Ingredient"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="UnitOfMeasurementId" type="xsd:int"/>';
			$strToReturn .= '<element name="InitialAmount" type="xsd:float"/>';
			$strToReturn .= '<element name="Cost" type="xsd:float"/>';
			$strToReturn .= '<element name="CostUnitOfMeasurement" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Ingredient', $strComplexTypeArray)) {
				$strComplexTypeArray['Ingredient'] = Ingredient::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Ingredient::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Ingredient();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'UnitOfMeasurementId'))
				$objToReturn->intUnitOfMeasurementId = $objSoapObject->UnitOfMeasurementId;
			if (property_exists($objSoapObject, 'InitialAmount'))
				$objToReturn->fltInitialAmount = $objSoapObject->InitialAmount;
			if (property_exists($objSoapObject, 'Cost'))
				$objToReturn->fltCost = $objSoapObject->Cost;
			if (property_exists($objSoapObject, 'CostUnitOfMeasurement'))
				$objToReturn->intCostUnitOfMeasurement = $objSoapObject->CostUnitOfMeasurement;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Ingredient::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $RecipeId
	 * @property-read QQNodeRecipe $Recipe
	 * @property-read QQNodeRecipe $_ChildTableNode
	 */
	class QQNodeIngredientRecipe extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'recipe';

		protected $strTableName = 'recipe_ingredient_assn';
		protected $strPrimaryKey = 'ingredient_id';
		protected $strClassName = 'Recipe';

		public function __get($strName) {
			switch ($strName) {
				case 'RecipeId':
					return new QQNode('recipe_id', 'RecipeId', 'integer', $this);
				case 'Recipe':
					return new QQNodeRecipe('recipe_id', 'RecipeId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeRecipe('recipe_id', 'RecipeId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Name
	 * @property-read QQNode $UnitOfMeasurementId
	 * @property-read QQNode $InitialAmount
	 * @property-read QQNode $Cost
	 * @property-read QQNode $CostUnitOfMeasurement
	 * @property-read QQNodeIngredientRecipe $Recipe
	 * @property-read QQReverseReferenceNodeIngredientSource $IngredientSource
	 */
	class QQNodeIngredient extends QQNode {
		protected $strTableName = 'ingredient';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Ingredient';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'UnitOfMeasurementId':
					return new QQNode('unit_of_measurement_id', 'UnitOfMeasurementId', 'integer', $this);
				case 'InitialAmount':
					return new QQNode('initial_amount', 'InitialAmount', 'double', $this);
				case 'Cost':
					return new QQNode('cost', 'Cost', 'double', $this);
				case 'CostUnitOfMeasurement':
					return new QQNode('cost_unit_of_measurement', 'CostUnitOfMeasurement', 'integer', $this);
				case 'Recipe':
					return new QQNodeIngredientRecipe($this);
				case 'IngredientSource':
					return new QQReverseReferenceNodeIngredientSource($this, 'ingredientsource', 'reverse_reference', 'ingredient_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Name
	 * @property-read QQNode $UnitOfMeasurementId
	 * @property-read QQNode $InitialAmount
	 * @property-read QQNode $Cost
	 * @property-read QQNode $CostUnitOfMeasurement
	 * @property-read QQNodeIngredientRecipe $Recipe
	 * @property-read QQReverseReferenceNodeIngredientSource $IngredientSource
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeIngredient extends QQReverseReferenceNode {
		protected $strTableName = 'ingredient';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Ingredient';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'UnitOfMeasurementId':
					return new QQNode('unit_of_measurement_id', 'UnitOfMeasurementId', 'integer', $this);
				case 'InitialAmount':
					return new QQNode('initial_amount', 'InitialAmount', 'double', $this);
				case 'Cost':
					return new QQNode('cost', 'Cost', 'double', $this);
				case 'CostUnitOfMeasurement':
					return new QQNode('cost_unit_of_measurement', 'CostUnitOfMeasurement', 'integer', $this);
				case 'Recipe':
					return new QQNodeIngredientRecipe($this);
				case 'IngredientSource':
					return new QQReverseReferenceNodeIngredientSource($this, 'ingredientsource', 'reverse_reference', 'ingredient_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>