<?php
	/**
	 * The abstract RecipeGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Recipe subclass which
	 * extends this RecipeGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Recipe class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Name the value for strName 
	 * @property string $Description the value for strDescription 
	 * @property string $Instructions the value for strInstructions 
	 * @property double $PreparationTime the value for fltPreparationTime 
	 * @property integer $ServingSize the value for intServingSize 
	 * @property integer $OwnerId the value for intOwnerId 
	 * @property integer $MealTypeId the value for intMealTypeId 
	 * @property Login $Owner the value for the Login object referenced by intOwnerId 
	 * @property Menu $_Menu the value for the private _objMenu (Read-Only) if set due to an expansion on the menu_recipe_assn association table
	 * @property Menu[] $_MenuArray the value for the private _objMenuArray (Read-Only) if set due to an ExpandAsArray on the menu_recipe_assn association table
	 * @property Category $_Category the value for the private _objCategory (Read-Only) if set due to an expansion on the recipe_category_assn association table
	 * @property Category[] $_CategoryArray the value for the private _objCategoryArray (Read-Only) if set due to an ExpandAsArray on the recipe_category_assn association table
	 * @property Ingredient $_Ingredient the value for the private _objIngredient (Read-Only) if set due to an expansion on the recipe_ingredient_assn association table
	 * @property Ingredient[] $_IngredientArray the value for the private _objIngredientArray (Read-Only) if set due to an ExpandAsArray on the recipe_ingredient_assn association table
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class RecipeGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column recipe.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column recipe.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column recipe.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 500;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column recipe.Instructions
		 * @var string strInstructions
		 */
		protected $strInstructions;
		const InstructionsMaxLength = 2048;
		const InstructionsDefault = null;


		/**
		 * Protected member variable that maps to the database column recipe.preparation_time
		 * @var double fltPreparationTime
		 */
		protected $fltPreparationTime;
		const PreparationTimeDefault = null;


		/**
		 * Protected member variable that maps to the database column recipe.serving_size
		 * @var integer intServingSize
		 */
		protected $intServingSize;
		const ServingSizeDefault = null;


		/**
		 * Protected member variable that maps to the database column recipe.owner_id
		 * @var integer intOwnerId
		 */
		protected $intOwnerId;
		const OwnerIdDefault = null;


		/**
		 * Protected member variable that maps to the database column recipe.meal_type_id
		 * @var integer intMealTypeId
		 */
		protected $intMealTypeId;
		const MealTypeIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single Menu object
		 * (of type Menu), if this Recipe object was restored with
		 * an expansion on the menu_recipe_assn association table.
		 * @var Menu _objMenu;
		 */
		private $_objMenu;

		/**
		 * Private member variable that stores a reference to an array of Menu objects
		 * (of type Menu[]), if this Recipe object was restored with
		 * an ExpandAsArray on the menu_recipe_assn association table.
		 * @var Menu[] _objMenuArray;
		 */
		private $_objMenuArray = array();

		/**
		 * Private member variable that stores a reference to a single Category object
		 * (of type Category), if this Recipe object was restored with
		 * an expansion on the recipe_category_assn association table.
		 * @var Category _objCategory;
		 */
		private $_objCategory;

		/**
		 * Private member variable that stores a reference to an array of Category objects
		 * (of type Category[]), if this Recipe object was restored with
		 * an ExpandAsArray on the recipe_category_assn association table.
		 * @var Category[] _objCategoryArray;
		 */
		private $_objCategoryArray = array();

		/**
		 * Private member variable that stores a reference to a single Ingredient object
		 * (of type Ingredient), if this Recipe object was restored with
		 * an expansion on the recipe_ingredient_assn association table.
		 * @var Ingredient _objIngredient;
		 */
		private $_objIngredient;

		/**
		 * Private member variable that stores a reference to an array of Ingredient objects
		 * (of type Ingredient[]), if this Recipe object was restored with
		 * an ExpandAsArray on the recipe_ingredient_assn association table.
		 * @var Ingredient[] _objIngredientArray;
		 */
		private $_objIngredientArray = array();

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

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column recipe.owner_id.
		 *
		 * NOTE: Always use the Owner property getter to correctly retrieve this Login object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Login objOwner
		 */
		protected $objOwner;





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
		 * Load a Recipe from PK Info
		 * @param integer $intId
		 * @return Recipe
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Recipe::QuerySingle(
				QQ::Equal(QQN::Recipe()->Id, $intId)
			);
		}

		/**
		 * Load all Recipes
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Recipe[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Recipe::QueryArray to perform the LoadAll query
			try {
				return Recipe::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Recipes
		 * @return int
		 */
		public static function CountAll() {
			// Call Recipe::QueryCount to perform the CountAll query
			return Recipe::QueryCount(QQ::All());
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
			$objDatabase = Recipe::GetDatabase();

			// Create/Build out the QueryBuilder object with Recipe-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'recipe');
			Recipe::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('recipe');

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
		 * Static Qcodo Query method to query for a single Recipe object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Recipe the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Recipe::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Recipe object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Recipe::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Recipe::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Recipe objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Recipe[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Recipe::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Recipe::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Recipe::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Recipe objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Recipe::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Recipe::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'recipe_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Recipe-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Recipe::GetSelectFields($objQueryBuilder);
				Recipe::GetFromFields($objQueryBuilder);

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
			return Recipe::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Recipe
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'recipe';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'Instructions', $strAliasPrefix . 'Instructions');
			$objBuilder->AddSelectItem($strTableName, 'preparation_time', $strAliasPrefix . 'preparation_time');
			$objBuilder->AddSelectItem($strTableName, 'serving_size', $strAliasPrefix . 'serving_size');
			$objBuilder->AddSelectItem($strTableName, 'owner_id', $strAliasPrefix . 'owner_id');
			$objBuilder->AddSelectItem($strTableName, 'meal_type_id', $strAliasPrefix . 'meal_type_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Recipe from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Recipe::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Recipe
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
					$strAliasPrefix = 'recipe__';

				$strAlias = $strAliasPrefix . 'menu__menu_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objMenuArray)) {
						$objPreviousChildItem = $objPreviousItem->_objMenuArray[$intPreviousChildItemCount - 1];
						$objChildItem = Menu::InstantiateDbRow($objDbRow, $strAliasPrefix . 'menu__menu_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objMenuArray[] = $objChildItem;
					} else
						$objPreviousItem->_objMenuArray[] = Menu::InstantiateDbRow($objDbRow, $strAliasPrefix . 'menu__menu_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'category__category_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCategoryArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCategoryArray[$intPreviousChildItemCount - 1];
						$objChildItem = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'category__category_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCategoryArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCategoryArray[] = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'category__category_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'ingredient__ingredient_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objIngredientArray)) {
						$objPreviousChildItem = $objPreviousItem->_objIngredientArray[$intPreviousChildItemCount - 1];
						$objChildItem = Ingredient::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ingredient__ingredient_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objIngredientArray[] = $objChildItem;
					} else
						$objPreviousItem->_objIngredientArray[] = Ingredient::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ingredient__ingredient_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'recipe__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Recipe object
			$objToReturn = new Recipe();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'Instructions', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'Instructions'] : $strAliasPrefix . 'Instructions';
			$objToReturn->strInstructions = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'preparation_time', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'preparation_time'] : $strAliasPrefix . 'preparation_time';
			$objToReturn->fltPreparationTime = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'serving_size', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'serving_size'] : $strAliasPrefix . 'serving_size';
			$objToReturn->intServingSize = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'owner_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'owner_id'] : $strAliasPrefix . 'owner_id';
			$objToReturn->intOwnerId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'meal_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'meal_type_id'] : $strAliasPrefix . 'meal_type_id';
			$objToReturn->intMealTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'recipe__';

			// Check for Owner Early Binding
			$strAlias = $strAliasPrefix . 'owner_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objOwner = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'owner_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for Menu Virtual Binding
			$strAlias = $strAliasPrefix . 'menu__menu_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objMenuArray[] = Menu::InstantiateDbRow($objDbRow, $strAliasPrefix . 'menu__menu_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objMenu = Menu::InstantiateDbRow($objDbRow, $strAliasPrefix . 'menu__menu_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Category Virtual Binding
			$strAlias = $strAliasPrefix . 'category__category_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCategoryArray[] = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'category__category_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCategory = Category::InstantiateDbRow($objDbRow, $strAliasPrefix . 'category__category_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Ingredient Virtual Binding
			$strAlias = $strAliasPrefix . 'ingredient__ingredient_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objIngredientArray[] = Ingredient::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ingredient__ingredient_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objIngredient = Ingredient::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ingredient__ingredient_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			return $objToReturn;
		}

		/**
		 * Instantiate an array of Recipes from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Recipe[]
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
					$objItem = Recipe::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Recipe::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Recipe object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Recipe next row resulting from the query
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
			return Recipe::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Recipe object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Recipe
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Recipe::QuerySingle(
				QQ::Equal(QQN::Recipe()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Recipe objects,
		 * by OwnerId Index(es)
		 * @param integer $intOwnerId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Recipe[]
		*/
		public static function LoadArrayByOwnerId($intOwnerId, $objOptionalClauses = null) {
			// Call Recipe::QueryArray to perform the LoadArrayByOwnerId query
			try {
				return Recipe::QueryArray(
					QQ::Equal(QQN::Recipe()->OwnerId, $intOwnerId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Recipes
		 * by OwnerId Index(es)
		 * @param integer $intOwnerId
		 * @return int
		*/
		public static function CountByOwnerId($intOwnerId, $objOptionalClauses = null) {
			// Call Recipe::QueryCount to perform the CountByOwnerId query
			return Recipe::QueryCount(
				QQ::Equal(QQN::Recipe()->OwnerId, $intOwnerId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Recipe objects,
		 * by MealTypeId Index(es)
		 * @param integer $intMealTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Recipe[]
		*/
		public static function LoadArrayByMealTypeId($intMealTypeId, $objOptionalClauses = null) {
			// Call Recipe::QueryArray to perform the LoadArrayByMealTypeId query
			try {
				return Recipe::QueryArray(
					QQ::Equal(QQN::Recipe()->MealTypeId, $intMealTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Recipes
		 * by MealTypeId Index(es)
		 * @param integer $intMealTypeId
		 * @return int
		*/
		public static function CountByMealTypeId($intMealTypeId, $objOptionalClauses = null) {
			// Call Recipe::QueryCount to perform the CountByMealTypeId query
			return Recipe::QueryCount(
				QQ::Equal(QQN::Recipe()->MealTypeId, $intMealTypeId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Menu objects for a given Menu
		 * via the menu_recipe_assn table
		 * @param integer $intMenuId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Recipe[]
		*/
		public static function LoadArrayByMenu($intMenuId, $objOptionalClauses = null) {
			// Call Recipe::QueryArray to perform the LoadArrayByMenu query
			try {
				return Recipe::QueryArray(
					QQ::Equal(QQN::Recipe()->Menu->MenuId, $intMenuId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Recipes for a given Menu
		 * via the menu_recipe_assn table
		 * @param integer $intMenuId
		 * @return int
		*/
		public static function CountByMenu($intMenuId, $objOptionalClauses = null) {
			return Recipe::QueryCount(
				QQ::Equal(QQN::Recipe()->Menu->MenuId, $intMenuId),
				$objOptionalClauses
			);
		}
			/**
		 * Load an array of Category objects for a given Category
		 * via the recipe_category_assn table
		 * @param integer $intCategoryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Recipe[]
		*/
		public static function LoadArrayByCategory($intCategoryId, $objOptionalClauses = null) {
			// Call Recipe::QueryArray to perform the LoadArrayByCategory query
			try {
				return Recipe::QueryArray(
					QQ::Equal(QQN::Recipe()->Category->CategoryId, $intCategoryId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Recipes for a given Category
		 * via the recipe_category_assn table
		 * @param integer $intCategoryId
		 * @return int
		*/
		public static function CountByCategory($intCategoryId, $objOptionalClauses = null) {
			return Recipe::QueryCount(
				QQ::Equal(QQN::Recipe()->Category->CategoryId, $intCategoryId),
				$objOptionalClauses
			);
		}
			/**
		 * Load an array of Ingredient objects for a given Ingredient
		 * via the recipe_ingredient_assn table
		 * @param integer $intIngredientId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Recipe[]
		*/
		public static function LoadArrayByIngredient($intIngredientId, $objOptionalClauses = null) {
			// Call Recipe::QueryArray to perform the LoadArrayByIngredient query
			try {
				return Recipe::QueryArray(
					QQ::Equal(QQN::Recipe()->Ingredient->IngredientId, $intIngredientId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Recipes for a given Ingredient
		 * via the recipe_ingredient_assn table
		 * @param integer $intIngredientId
		 * @return int
		*/
		public static function CountByIngredient($intIngredientId, $objOptionalClauses = null) {
			return Recipe::QueryCount(
				QQ::Equal(QQN::Recipe()->Ingredient->IngredientId, $intIngredientId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Recipe
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `recipe` (
							`name`,
							`description`,
							`Instructions`,
							`preparation_time`,
							`serving_size`,
							`owner_id`,
							`meal_type_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->strInstructions) . ',
							' . $objDatabase->SqlVariable($this->fltPreparationTime) . ',
							' . $objDatabase->SqlVariable($this->intServingSize) . ',
							' . $objDatabase->SqlVariable($this->intOwnerId) . ',
							' . $objDatabase->SqlVariable($this->intMealTypeId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('recipe', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`recipe`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`Instructions` = ' . $objDatabase->SqlVariable($this->strInstructions) . ',
							`preparation_time` = ' . $objDatabase->SqlVariable($this->fltPreparationTime) . ',
							`serving_size` = ' . $objDatabase->SqlVariable($this->intServingSize) . ',
							`owner_id` = ' . $objDatabase->SqlVariable($this->intOwnerId) . ',
							`meal_type_id` = ' . $objDatabase->SqlVariable($this->intMealTypeId) . '
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
		 * Delete this Recipe
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Recipe with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Recipes
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe`');
		}

		/**
		 * Truncate recipe table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `recipe`');
		}

		/**
		 * Reload this Recipe from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Recipe object.');

			// Reload the Object
			$objReloaded = Recipe::Load($this->intId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->strDescription = $objReloaded->strDescription;
			$this->strInstructions = $objReloaded->strInstructions;
			$this->fltPreparationTime = $objReloaded->fltPreparationTime;
			$this->intServingSize = $objReloaded->intServingSize;
			$this->OwnerId = $objReloaded->OwnerId;
			$this->MealTypeId = $objReloaded->MealTypeId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Recipe::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `recipe` (
					`id`,
					`name`,
					`description`,
					`Instructions`,
					`preparation_time`,
					`serving_size`,
					`owner_id`,
					`meal_type_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->strInstructions) . ',
					' . $objDatabase->SqlVariable($this->fltPreparationTime) . ',
					' . $objDatabase->SqlVariable($this->intServingSize) . ',
					' . $objDatabase->SqlVariable($this->intOwnerId) . ',
					' . $objDatabase->SqlVariable($this->intMealTypeId) . ',
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
		 * @return Recipe[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Recipe::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM recipe WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Recipe::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Recipe[]
		 */
		public function GetJournal() {
			return Recipe::GetJournalForId($this->intId);
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

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'Instructions':
					// Gets the value for strInstructions 
					// @return string
					return $this->strInstructions;

				case 'PreparationTime':
					// Gets the value for fltPreparationTime 
					// @return double
					return $this->fltPreparationTime;

				case 'ServingSize':
					// Gets the value for intServingSize 
					// @return integer
					return $this->intServingSize;

				case 'OwnerId':
					// Gets the value for intOwnerId 
					// @return integer
					return $this->intOwnerId;

				case 'MealTypeId':
					// Gets the value for intMealTypeId 
					// @return integer
					return $this->intMealTypeId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Owner':
					// Gets the value for the Login object referenced by intOwnerId 
					// @return Login
					try {
						if ((!$this->objOwner) && (!is_null($this->intOwnerId)))
							$this->objOwner = Login::Load($this->intOwnerId);
						return $this->objOwner;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Menu':
					// Gets the value for the private _objMenu (Read-Only)
					// if set due to an expansion on the menu_recipe_assn association table
					// @return Menu
					return $this->_objMenu;

				case '_MenuArray':
					// Gets the value for the private _objMenuArray (Read-Only)
					// if set due to an ExpandAsArray on the menu_recipe_assn association table
					// @return Menu[]
					return (array) $this->_objMenuArray;

				case '_Category':
					// Gets the value for the private _objCategory (Read-Only)
					// if set due to an expansion on the recipe_category_assn association table
					// @return Category
					return $this->_objCategory;

				case '_CategoryArray':
					// Gets the value for the private _objCategoryArray (Read-Only)
					// if set due to an ExpandAsArray on the recipe_category_assn association table
					// @return Category[]
					return (array) $this->_objCategoryArray;

				case '_Ingredient':
					// Gets the value for the private _objIngredient (Read-Only)
					// if set due to an expansion on the recipe_ingredient_assn association table
					// @return Ingredient
					return $this->_objIngredient;

				case '_IngredientArray':
					// Gets the value for the private _objIngredientArray (Read-Only)
					// if set due to an ExpandAsArray on the recipe_ingredient_assn association table
					// @return Ingredient[]
					return (array) $this->_objIngredientArray;


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

				case 'Description':
					// Sets the value for strDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Instructions':
					// Sets the value for strInstructions 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strInstructions = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'PreparationTime':
					// Sets the value for fltPreparationTime 
					// @param double $mixValue
					// @return double
					try {
						return ($this->fltPreparationTime = QType::Cast($mixValue, QType::Float));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ServingSize':
					// Sets the value for intServingSize 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intServingSize = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'OwnerId':
					// Sets the value for intOwnerId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objOwner = null;
						return ($this->intOwnerId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'MealTypeId':
					// Sets the value for intMealTypeId 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intMealTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Owner':
					// Sets the value for the Login object referenced by intOwnerId 
					// @param Login $mixValue
					// @return Login
					if (is_null($mixValue)) {
						$this->intOwnerId = null;
						$this->objOwner = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Login object
						try {
							$mixValue = QType::Cast($mixValue, 'Login');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Login object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Owner for this Recipe');

						// Update Local Member Variables
						$this->objOwner = $mixValue;
						$this->intOwnerId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

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

			
		// Related Many-to-Many Objects' Methods for Menu
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Menus as an array of Menu objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Menu[]
		*/ 
		public function GetMenuArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Menu::LoadArrayByRecipe($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Menus
		 * @return int
		*/ 
		public function CountMenus() {
			if ((is_null($this->intId)))
				return 0;

			return Menu::CountByRecipe($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Menu
		 * @param Menu $objMenu
		 * @return bool
		*/
		public function IsMenuAssociated(Menu $objMenu) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsMenuAssociated on this unsaved Recipe.');
			if ((is_null($objMenu->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsMenuAssociated on this Recipe with an unsaved Menu.');

			$intRowCount = Recipe::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Recipe()->Id, $this->intId),
					QQ::Equal(QQN::Recipe()->Menu->MenuId, $objMenu->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the Menu relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalMenuAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = Recipe::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `menu_recipe_assn` (
					`recipe_id`,
					`menu_id`,
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
		 * Gets the historical journal for an object's Menu relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalMenuAssociationForId($intId) {
			$objDatabase = Recipe::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM menu_recipe_assn WHERE recipe_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's Menu relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalMenuAssociation() {
			return Recipe::GetJournalMenuAssociationForId($this->intId);
		}

		/**
		 * Associates a Menu
		 * @param Menu $objMenu
		 * @return void
		*/ 
		public function AssociateMenu(Menu $objMenu) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMenu on this unsaved Recipe.');
			if ((is_null($objMenu->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMenu on this Recipe with an unsaved Menu.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `menu_recipe_assn` (
					`recipe_id`,
					`menu_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objMenu->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalMenuAssociation($objMenu->Id, 'INSERT');
		}

		/**
		 * Unassociates a Menu
		 * @param Menu $objMenu
		 * @return void
		*/ 
		public function UnassociateMenu(Menu $objMenu) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMenu on this unsaved Recipe.');
			if ((is_null($objMenu->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMenu on this Recipe with an unsaved Menu.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`menu_recipe_assn`
				WHERE
					`recipe_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`menu_id` = ' . $objDatabase->SqlVariable($objMenu->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalMenuAssociation($objMenu->Id, 'DELETE');
		}

		/**
		 * Unassociates all Menus
		 * @return void
		*/ 
		public function UnassociateAllMenus() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllMenuArray on this unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `menu_id` AS associated_id FROM `menu_recipe_assn` WHERE `recipe_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalMenuAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`menu_recipe_assn`
				WHERE
					`recipe_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for Category
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Categories as an array of Category objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Category[]
		*/ 
		public function GetCategoryArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Category::LoadArrayByRecipe($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Categories
		 * @return int
		*/ 
		public function CountCategories() {
			if ((is_null($this->intId)))
				return 0;

			return Category::CountByRecipe($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Category
		 * @param Category $objCategory
		 * @return bool
		*/
		public function IsCategoryAssociated(Category $objCategory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCategoryAssociated on this unsaved Recipe.');
			if ((is_null($objCategory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCategoryAssociated on this Recipe with an unsaved Category.');

			$intRowCount = Recipe::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Recipe()->Id, $this->intId),
					QQ::Equal(QQN::Recipe()->Category->CategoryId, $objCategory->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the Category relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalCategoryAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = Recipe::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `recipe_category_assn` (
					`recipe_id`,
					`category_id`,
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
		 * Gets the historical journal for an object's Category relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalCategoryAssociationForId($intId) {
			$objDatabase = Recipe::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM recipe_category_assn WHERE recipe_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's Category relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalCategoryAssociation() {
			return Recipe::GetJournalCategoryAssociationForId($this->intId);
		}

		/**
		 * Associates a Category
		 * @param Category $objCategory
		 * @return void
		*/ 
		public function AssociateCategory(Category $objCategory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCategory on this unsaved Recipe.');
			if ((is_null($objCategory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCategory on this Recipe with an unsaved Category.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `recipe_category_assn` (
					`recipe_id`,
					`category_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objCategory->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalCategoryAssociation($objCategory->Id, 'INSERT');
		}

		/**
		 * Unassociates a Category
		 * @param Category $objCategory
		 * @return void
		*/ 
		public function UnassociateCategory(Category $objCategory) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategory on this unsaved Recipe.');
			if ((is_null($objCategory->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCategory on this Recipe with an unsaved Category.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe_category_assn`
				WHERE
					`recipe_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`category_id` = ' . $objDatabase->SqlVariable($objCategory->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalCategoryAssociation($objCategory->Id, 'DELETE');
		}

		/**
		 * Unassociates all Categories
		 * @return void
		*/ 
		public function UnassociateAllCategories() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllCategoryArray on this unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `category_id` AS associated_id FROM `recipe_category_assn` WHERE `recipe_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalCategoryAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe_category_assn`
				WHERE
					`recipe_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for Ingredient
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Ingredients as an array of Ingredient objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Ingredient[]
		*/ 
		public function GetIngredientArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Ingredient::LoadArrayByRecipe($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Ingredients
		 * @return int
		*/ 
		public function CountIngredients() {
			if ((is_null($this->intId)))
				return 0;

			return Ingredient::CountByRecipe($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Ingredient
		 * @param Ingredient $objIngredient
		 * @return bool
		*/
		public function IsIngredientAssociated(Ingredient $objIngredient) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsIngredientAssociated on this unsaved Recipe.');
			if ((is_null($objIngredient->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsIngredientAssociated on this Recipe with an unsaved Ingredient.');

			$intRowCount = Recipe::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Recipe()->Id, $this->intId),
					QQ::Equal(QQN::Recipe()->Ingredient->IngredientId, $objIngredient->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the Ingredient relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalIngredientAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = Recipe::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `recipe_ingredient_assn` (
					`recipe_id`,
					`ingredient_id`,
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
		 * Gets the historical journal for an object's Ingredient relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalIngredientAssociationForId($intId) {
			$objDatabase = Recipe::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM recipe_ingredient_assn WHERE recipe_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's Ingredient relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalIngredientAssociation() {
			return Recipe::GetJournalIngredientAssociationForId($this->intId);
		}

		/**
		 * Associates a Ingredient
		 * @param Ingredient $objIngredient
		 * @return void
		*/ 
		public function AssociateIngredient(Ingredient $objIngredient) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIngredient on this unsaved Recipe.');
			if ((is_null($objIngredient->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIngredient on this Recipe with an unsaved Ingredient.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `recipe_ingredient_assn` (
					`recipe_id`,
					`ingredient_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objIngredient->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalIngredientAssociation($objIngredient->Id, 'INSERT');
		}

		/**
		 * Unassociates a Ingredient
		 * @param Ingredient $objIngredient
		 * @return void
		*/ 
		public function UnassociateIngredient(Ingredient $objIngredient) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIngredient on this unsaved Recipe.');
			if ((is_null($objIngredient->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIngredient on this Recipe with an unsaved Ingredient.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe_ingredient_assn`
				WHERE
					`recipe_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`ingredient_id` = ' . $objDatabase->SqlVariable($objIngredient->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalIngredientAssociation($objIngredient->Id, 'DELETE');
		}

		/**
		 * Unassociates all Ingredients
		 * @return void
		*/ 
		public function UnassociateAllIngredients() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllIngredientArray on this unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Recipe::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `ingredient_id` AS associated_id FROM `recipe_ingredient_assn` WHERE `recipe_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalIngredientAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe_ingredient_assn`
				WHERE
					`recipe_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Recipe"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="Instructions" type="xsd:string"/>';
			$strToReturn .= '<element name="PreparationTime" type="xsd:float"/>';
			$strToReturn .= '<element name="ServingSize" type="xsd:int"/>';
			$strToReturn .= '<element name="Owner" type="xsd1:Login"/>';
			$strToReturn .= '<element name="MealTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Recipe', $strComplexTypeArray)) {
				$strComplexTypeArray['Recipe'] = Recipe::GetSoapComplexTypeXml();
				Login::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Recipe::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Recipe();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if (property_exists($objSoapObject, 'Instructions'))
				$objToReturn->strInstructions = $objSoapObject->Instructions;
			if (property_exists($objSoapObject, 'PreparationTime'))
				$objToReturn->fltPreparationTime = $objSoapObject->PreparationTime;
			if (property_exists($objSoapObject, 'ServingSize'))
				$objToReturn->intServingSize = $objSoapObject->ServingSize;
			if ((property_exists($objSoapObject, 'Owner')) &&
				($objSoapObject->Owner))
				$objToReturn->Owner = Login::GetObjectFromSoapObject($objSoapObject->Owner);
			if (property_exists($objSoapObject, 'MealTypeId'))
				$objToReturn->intMealTypeId = $objSoapObject->MealTypeId;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Recipe::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objOwner)
				$objObject->objOwner = Login::GetSoapObjectFromObject($objObject->objOwner, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intOwnerId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $MenuId
	 * @property-read QQNodeMenu $Menu
	 * @property-read QQNodeMenu $_ChildTableNode
	 */
	class QQNodeRecipeMenu extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'menu';

		protected $strTableName = 'menu_recipe_assn';
		protected $strPrimaryKey = 'recipe_id';
		protected $strClassName = 'Menu';

		public function __get($strName) {
			switch ($strName) {
				case 'MenuId':
					return new QQNode('menu_id', 'MenuId', 'integer', $this);
				case 'Menu':
					return new QQNodeMenu('menu_id', 'MenuId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeMenu('menu_id', 'MenuId', 'integer', $this);
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
	 * @property-read QQNode $CategoryId
	 * @property-read QQNodeCategory $Category
	 * @property-read QQNodeCategory $_ChildTableNode
	 */
	class QQNodeRecipeCategory extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'category';

		protected $strTableName = 'recipe_category_assn';
		protected $strPrimaryKey = 'recipe_id';
		protected $strClassName = 'Category';

		public function __get($strName) {
			switch ($strName) {
				case 'CategoryId':
					return new QQNode('category_id', 'CategoryId', 'integer', $this);
				case 'Category':
					return new QQNodeCategory('category_id', 'CategoryId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeCategory('category_id', 'CategoryId', 'integer', $this);
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
	 * @property-read QQNode $IngredientId
	 * @property-read QQNodeIngredient $Ingredient
	 * @property-read QQNodeIngredient $_ChildTableNode
	 */
	class QQNodeRecipeIngredient extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'ingredient';

		protected $strTableName = 'recipe_ingredient_assn';
		protected $strPrimaryKey = 'recipe_id';
		protected $strClassName = 'Ingredient';

		public function __get($strName) {
			switch ($strName) {
				case 'IngredientId':
					return new QQNode('ingredient_id', 'IngredientId', 'integer', $this);
				case 'Ingredient':
					return new QQNodeIngredient('ingredient_id', 'IngredientId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeIngredient('ingredient_id', 'IngredientId', 'integer', $this);
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
	 * @property-read QQNode $Description
	 * @property-read QQNode $Instructions
	 * @property-read QQNode $PreparationTime
	 * @property-read QQNode $ServingSize
	 * @property-read QQNode $OwnerId
	 * @property-read QQNodeLogin $Owner
	 * @property-read QQNode $MealTypeId
	 * @property-read QQNodeRecipeMenu $Menu
	 * @property-read QQNodeRecipeCategory $Category
	 * @property-read QQNodeRecipeIngredient $Ingredient
	 */
	class QQNodeRecipe extends QQNode {
		protected $strTableName = 'recipe';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Recipe';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Instructions':
					return new QQNode('Instructions', 'Instructions', 'string', $this);
				case 'PreparationTime':
					return new QQNode('preparation_time', 'PreparationTime', 'double', $this);
				case 'ServingSize':
					return new QQNode('serving_size', 'ServingSize', 'integer', $this);
				case 'OwnerId':
					return new QQNode('owner_id', 'OwnerId', 'integer', $this);
				case 'Owner':
					return new QQNodeLogin('owner_id', 'Owner', 'integer', $this);
				case 'MealTypeId':
					return new QQNode('meal_type_id', 'MealTypeId', 'integer', $this);
				case 'Menu':
					return new QQNodeRecipeMenu($this);
				case 'Category':
					return new QQNodeRecipeCategory($this);
				case 'Ingredient':
					return new QQNodeRecipeIngredient($this);

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
	 * @property-read QQNode $Description
	 * @property-read QQNode $Instructions
	 * @property-read QQNode $PreparationTime
	 * @property-read QQNode $ServingSize
	 * @property-read QQNode $OwnerId
	 * @property-read QQNodeLogin $Owner
	 * @property-read QQNode $MealTypeId
	 * @property-read QQNodeRecipeMenu $Menu
	 * @property-read QQNodeRecipeCategory $Category
	 * @property-read QQNodeRecipeIngredient $Ingredient
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeRecipe extends QQReverseReferenceNode {
		protected $strTableName = 'recipe';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Recipe';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'Instructions':
					return new QQNode('Instructions', 'Instructions', 'string', $this);
				case 'PreparationTime':
					return new QQNode('preparation_time', 'PreparationTime', 'double', $this);
				case 'ServingSize':
					return new QQNode('serving_size', 'ServingSize', 'integer', $this);
				case 'OwnerId':
					return new QQNode('owner_id', 'OwnerId', 'integer', $this);
				case 'Owner':
					return new QQNodeLogin('owner_id', 'Owner', 'integer', $this);
				case 'MealTypeId':
					return new QQNode('meal_type_id', 'MealTypeId', 'integer', $this);
				case 'Menu':
					return new QQNodeRecipeMenu($this);
				case 'Category':
					return new QQNodeRecipeCategory($this);
				case 'Ingredient':
					return new QQNodeRecipeIngredient($this);

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