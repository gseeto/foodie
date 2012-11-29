<?php
	/**
	 * The abstract MenuGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Menu subclass which
	 * extends this MenuGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Menu class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Name the value for strName 
	 * @property string $Description the value for strDescription 
	 * @property integer $OwnerId the value for intOwnerId 
	 * @property Login $Owner the value for the Login object referenced by intOwnerId 
	 * @property Recipe $_Recipe the value for the private _objRecipe (Read-Only) if set due to an expansion on the menu_recipe_assn association table
	 * @property Recipe[] $_RecipeArray the value for the private _objRecipeArray (Read-Only) if set due to an ExpandAsArray on the menu_recipe_assn association table
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class MenuGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column menu.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column menu.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column menu.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 1024;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column menu.owner_id
		 * @var integer intOwnerId
		 */
		protected $intOwnerId;
		const OwnerIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single Recipe object
		 * (of type Recipe), if this Menu object was restored with
		 * an expansion on the menu_recipe_assn association table.
		 * @var Recipe _objRecipe;
		 */
		private $_objRecipe;

		/**
		 * Private member variable that stores a reference to an array of Recipe objects
		 * (of type Recipe[]), if this Menu object was restored with
		 * an ExpandAsArray on the menu_recipe_assn association table.
		 * @var Recipe[] _objRecipeArray;
		 */
		private $_objRecipeArray = array();

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
		 * in the database column menu.owner_id.
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
		 * Load a Menu from PK Info
		 * @param integer $intId
		 * @return Menu
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Menu::QuerySingle(
				QQ::Equal(QQN::Menu()->Id, $intId)
			);
		}

		/**
		 * Load all Menus
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Menu[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Menu::QueryArray to perform the LoadAll query
			try {
				return Menu::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Menus
		 * @return int
		 */
		public static function CountAll() {
			// Call Menu::QueryCount to perform the CountAll query
			return Menu::QueryCount(QQ::All());
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
			$objDatabase = Menu::GetDatabase();

			// Create/Build out the QueryBuilder object with Menu-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'menu');
			Menu::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('menu');

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
		 * Static Qcodo Query method to query for a single Menu object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Menu the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Menu::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Menu object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Menu::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Menu::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Menu objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Menu[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Menu::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Menu::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Menu::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Menu objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Menu::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Menu::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'menu_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Menu-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Menu::GetSelectFields($objQueryBuilder);
				Menu::GetFromFields($objQueryBuilder);

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
			return Menu::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Menu
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'menu';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'owner_id', $strAliasPrefix . 'owner_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Menu from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Menu::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Menu
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
					$strAliasPrefix = 'menu__';

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


				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'menu__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Menu object
			$objToReturn = new Menu();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'owner_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'owner_id'] : $strAliasPrefix . 'owner_id';
			$objToReturn->intOwnerId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'menu__';

			// Check for Owner Early Binding
			$strAlias = $strAliasPrefix . 'owner_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objOwner = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'owner_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for Recipe Virtual Binding
			$strAlias = $strAliasPrefix . 'recipe__recipe_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRecipeArray[] = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipe__recipe_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRecipe = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipe__recipe_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			return $objToReturn;
		}

		/**
		 * Instantiate an array of Menus from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Menu[]
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
					$objItem = Menu::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Menu::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Menu object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Menu next row resulting from the query
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
			return Menu::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Menu object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Menu
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Menu::QuerySingle(
				QQ::Equal(QQN::Menu()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Menu objects,
		 * by OwnerId Index(es)
		 * @param integer $intOwnerId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Menu[]
		*/
		public static function LoadArrayByOwnerId($intOwnerId, $objOptionalClauses = null) {
			// Call Menu::QueryArray to perform the LoadArrayByOwnerId query
			try {
				return Menu::QueryArray(
					QQ::Equal(QQN::Menu()->OwnerId, $intOwnerId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Menus
		 * by OwnerId Index(es)
		 * @param integer $intOwnerId
		 * @return int
		*/
		public static function CountByOwnerId($intOwnerId, $objOptionalClauses = null) {
			// Call Menu::QueryCount to perform the CountByOwnerId query
			return Menu::QueryCount(
				QQ::Equal(QQN::Menu()->OwnerId, $intOwnerId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Recipe objects for a given Recipe
		 * via the menu_recipe_assn table
		 * @param integer $intRecipeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Menu[]
		*/
		public static function LoadArrayByRecipe($intRecipeId, $objOptionalClauses = null) {
			// Call Menu::QueryArray to perform the LoadArrayByRecipe query
			try {
				return Menu::QueryArray(
					QQ::Equal(QQN::Menu()->Recipe->RecipeId, $intRecipeId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Menus for a given Recipe
		 * via the menu_recipe_assn table
		 * @param integer $intRecipeId
		 * @return int
		*/
		public static function CountByRecipe($intRecipeId, $objOptionalClauses = null) {
			return Menu::QueryCount(
				QQ::Equal(QQN::Menu()->Recipe->RecipeId, $intRecipeId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Menu
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Menu::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `menu` (
							`name`,
							`description`,
							`owner_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->intOwnerId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('menu', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`menu`
						SET
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
							`owner_id` = ' . $objDatabase->SqlVariable($this->intOwnerId) . '
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
		 * Delete this Menu
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Menu with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Menu::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`menu`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Menus
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Menu::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`menu`');
		}

		/**
		 * Truncate menu table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Menu::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `menu`');
		}

		/**
		 * Reload this Menu from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Menu object.');

			// Reload the Object
			$objReloaded = Menu::Load($this->intId);

			// Update $this's local variables to match
			$this->strName = $objReloaded->strName;
			$this->strDescription = $objReloaded->strDescription;
			$this->OwnerId = $objReloaded->OwnerId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Menu::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `menu` (
					`id`,
					`name`,
					`description`,
					`owner_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
					' . $objDatabase->SqlVariable($this->intOwnerId) . ',
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
		 * @return Menu[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Menu::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM menu WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Menu::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Menu[]
		 */
		public function GetJournal() {
			return Menu::GetJournalForId($this->intId);
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

				case 'OwnerId':
					// Gets the value for intOwnerId 
					// @return integer
					return $this->intOwnerId;


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

				case '_Recipe':
					// Gets the value for the private _objRecipe (Read-Only)
					// if set due to an expansion on the menu_recipe_assn association table
					// @return Recipe
					return $this->_objRecipe;

				case '_RecipeArray':
					// Gets the value for the private _objRecipeArray (Read-Only)
					// if set due to an ExpandAsArray on the menu_recipe_assn association table
					// @return Recipe[]
					return (array) $this->_objRecipeArray;


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
							throw new QCallerException('Unable to set an unsaved Owner for this Menu');

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
				return Recipe::LoadArrayByMenu($this->intId, $objOptionalClauses);
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

			return Recipe::CountByMenu($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Recipe
		 * @param Recipe $objRecipe
		 * @return bool
		*/
		public function IsRecipeAssociated(Recipe $objRecipe) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsRecipeAssociated on this unsaved Menu.');
			if ((is_null($objRecipe->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsRecipeAssociated on this Menu with an unsaved Recipe.');

			$intRowCount = Menu::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Menu()->Id, $this->intId),
					QQ::Equal(QQN::Menu()->Recipe->RecipeId, $objRecipe->Id)
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
			$objDatabase = Menu::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `menu_recipe_assn` (
					`menu_id`,
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
			$objDatabase = Menu::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM menu_recipe_assn WHERE menu_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's Recipe relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalRecipeAssociation() {
			return Menu::GetJournalRecipeAssociationForId($this->intId);
		}

		/**
		 * Associates a Recipe
		 * @param Recipe $objRecipe
		 * @return void
		*/ 
		public function AssociateRecipe(Recipe $objRecipe) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRecipe on this unsaved Menu.');
			if ((is_null($objRecipe->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRecipe on this Menu with an unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Menu::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `menu_recipe_assn` (
					`menu_id`,
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipe on this unsaved Menu.');
			if ((is_null($objRecipe->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipe on this Menu with an unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Menu::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`menu_recipe_assn`
				WHERE
					`menu_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllRecipeArray on this unsaved Menu.');

			// Get the Database Object for this Class
			$objDatabase = Menu::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `recipe_id` AS associated_id FROM `menu_recipe_assn` WHERE `menu_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalRecipeAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`menu_recipe_assn`
				WHERE
					`menu_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Menu"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="Owner" type="xsd1:Login"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Menu', $strComplexTypeArray)) {
				$strComplexTypeArray['Menu'] = Menu::GetSoapComplexTypeXml();
				Login::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Menu::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Menu();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
			if ((property_exists($objSoapObject, 'Owner')) &&
				($objSoapObject->Owner))
				$objToReturn->Owner = Login::GetObjectFromSoapObject($objSoapObject->Owner);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Menu::GetSoapObjectFromObject($objObject, true));

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
	 * @property-read QQNode $RecipeId
	 * @property-read QQNodeRecipe $Recipe
	 * @property-read QQNodeRecipe $_ChildTableNode
	 */
	class QQNodeMenuRecipe extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'recipe';

		protected $strTableName = 'menu_recipe_assn';
		protected $strPrimaryKey = 'menu_id';
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
	 * @property-read QQNode $Description
	 * @property-read QQNode $OwnerId
	 * @property-read QQNodeLogin $Owner
	 * @property-read QQNodeMenuRecipe $Recipe
	 */
	class QQNodeMenu extends QQNode {
		protected $strTableName = 'menu';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Menu';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'OwnerId':
					return new QQNode('owner_id', 'OwnerId', 'integer', $this);
				case 'Owner':
					return new QQNodeLogin('owner_id', 'Owner', 'integer', $this);
				case 'Recipe':
					return new QQNodeMenuRecipe($this);

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
	 * @property-read QQNode $OwnerId
	 * @property-read QQNodeLogin $Owner
	 * @property-read QQNodeMenuRecipe $Recipe
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeMenu extends QQReverseReferenceNode {
		protected $strTableName = 'menu';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Menu';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'OwnerId':
					return new QQNode('owner_id', 'OwnerId', 'integer', $this);
				case 'Owner':
					return new QQNodeLogin('owner_id', 'Owner', 'integer', $this);
				case 'Recipe':
					return new QQNodeMenuRecipe($this);

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