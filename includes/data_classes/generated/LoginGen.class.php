<?php
	/**
	 * The abstract LoginGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Login subclass which
	 * extends this LoginGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Login class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Username the value for strUsername 
	 * @property string $Password the value for strPassword 
	 * @property string $FirstName the value for strFirstName 
	 * @property string $LastName the value for strLastName 
	 * @property string $Email the value for strEmail 
	 * @property Menu $_MenuAsOwner the value for the private _objMenuAsOwner (Read-Only) if set due to an expansion on the menu.owner_id reverse relationship
	 * @property Menu[] $_MenuAsOwnerArray the value for the private _objMenuAsOwnerArray (Read-Only) if set due to an ExpandAsArray on the menu.owner_id reverse relationship
	 * @property Recipe $_RecipeAsOwner the value for the private _objRecipeAsOwner (Read-Only) if set due to an expansion on the recipe.owner_id reverse relationship
	 * @property Recipe[] $_RecipeAsOwnerArray the value for the private _objRecipeAsOwnerArray (Read-Only) if set due to an ExpandAsArray on the recipe.owner_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class LoginGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column login.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column login.username
		 * @var string strUsername
		 */
		protected $strUsername;
		const UsernameMaxLength = 255;
		const UsernameDefault = null;


		/**
		 * Protected member variable that maps to the database column login.password
		 * @var string strPassword
		 */
		protected $strPassword;
		const PasswordMaxLength = 255;
		const PasswordDefault = null;


		/**
		 * Protected member variable that maps to the database column login.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameMaxLength = 255;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column login.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameMaxLength = 255;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column login.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailMaxLength = 255;
		const EmailDefault = null;


		/**
		 * Private member variable that stores a reference to a single MenuAsOwner object
		 * (of type Menu), if this Login object was restored with
		 * an expansion on the menu association table.
		 * @var Menu _objMenuAsOwner;
		 */
		private $_objMenuAsOwner;

		/**
		 * Private member variable that stores a reference to an array of MenuAsOwner objects
		 * (of type Menu[]), if this Login object was restored with
		 * an ExpandAsArray on the menu association table.
		 * @var Menu[] _objMenuAsOwnerArray;
		 */
		private $_objMenuAsOwnerArray = array();

		/**
		 * Private member variable that stores a reference to a single RecipeAsOwner object
		 * (of type Recipe), if this Login object was restored with
		 * an expansion on the recipe association table.
		 * @var Recipe _objRecipeAsOwner;
		 */
		private $_objRecipeAsOwner;

		/**
		 * Private member variable that stores a reference to an array of RecipeAsOwner objects
		 * (of type Recipe[]), if this Login object was restored with
		 * an ExpandAsArray on the recipe association table.
		 * @var Recipe[] _objRecipeAsOwnerArray;
		 */
		private $_objRecipeAsOwnerArray = array();

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
		 * Load a Login from PK Info
		 * @param integer $intId
		 * @return Login
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Login::QuerySingle(
				QQ::Equal(QQN::Login()->Id, $intId)
			);
		}

		/**
		 * Load all Logins
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Login[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Login::QueryArray to perform the LoadAll query
			try {
				return Login::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Logins
		 * @return int
		 */
		public static function CountAll() {
			// Call Login::QueryCount to perform the CountAll query
			return Login::QueryCount(QQ::All());
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
			$objDatabase = Login::GetDatabase();

			// Create/Build out the QueryBuilder object with Login-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'login');
			Login::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('login');

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
		 * Static Qcodo Query method to query for a single Login object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Login the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Login::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Login object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Login::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Login::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Login objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Login[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Login::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Login::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Login::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Login objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Login::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Login::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'login_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Login-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Login::GetSelectFields($objQueryBuilder);
				Login::GetFromFields($objQueryBuilder);

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
			return Login::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Login
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'login';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'username', $strAliasPrefix . 'username');
			$objBuilder->AddSelectItem($strTableName, 'password', $strAliasPrefix . 'password');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Login from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Login::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Login
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
					$strAliasPrefix = 'login__';


				$strAlias = $strAliasPrefix . 'menuasowner__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objMenuAsOwnerArray)) {
						$objPreviousChildItem = $objPreviousItem->_objMenuAsOwnerArray[$intPreviousChildItemCount - 1];
						$objChildItem = Menu::InstantiateDbRow($objDbRow, $strAliasPrefix . 'menuasowner__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objMenuAsOwnerArray[] = $objChildItem;
					} else
						$objPreviousItem->_objMenuAsOwnerArray[] = Menu::InstantiateDbRow($objDbRow, $strAliasPrefix . 'menuasowner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'recipeasowner__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objRecipeAsOwnerArray)) {
						$objPreviousChildItem = $objPreviousItem->_objRecipeAsOwnerArray[$intPreviousChildItemCount - 1];
						$objChildItem = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipeasowner__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objRecipeAsOwnerArray[] = $objChildItem;
					} else
						$objPreviousItem->_objRecipeAsOwnerArray[] = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipeasowner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'login__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Login object
			$objToReturn = new Login();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'username', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'username'] : $strAliasPrefix . 'username';
			$objToReturn->strUsername = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'password', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'password'] : $strAliasPrefix . 'password';
			$objToReturn->strPassword = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'login__';




			// Check for MenuAsOwner Virtual Binding
			$strAlias = $strAliasPrefix . 'menuasowner__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objMenuAsOwnerArray[] = Menu::InstantiateDbRow($objDbRow, $strAliasPrefix . 'menuasowner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objMenuAsOwner = Menu::InstantiateDbRow($objDbRow, $strAliasPrefix . 'menuasowner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for RecipeAsOwner Virtual Binding
			$strAlias = $strAliasPrefix . 'recipeasowner__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objRecipeAsOwnerArray[] = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipeasowner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objRecipeAsOwner = Recipe::InstantiateDbRow($objDbRow, $strAliasPrefix . 'recipeasowner__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Logins from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Login[]
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
					$objItem = Login::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Login::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Login object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Login next row resulting from the query
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
			return Login::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Login object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Login
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Login::QuerySingle(
				QQ::Equal(QQN::Login()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Login objects,
		 * by Username Index(es)
		 * @param string $strUsername
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Login[]
		*/
		public static function LoadArrayByUsername($strUsername, $objOptionalClauses = null) {
			// Call Login::QueryArray to perform the LoadArrayByUsername query
			try {
				return Login::QueryArray(
					QQ::Equal(QQN::Login()->Username, $strUsername),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Logins
		 * by Username Index(es)
		 * @param string $strUsername
		 * @return int
		*/
		public static function CountByUsername($strUsername, $objOptionalClauses = null) {
			// Call Login::QueryCount to perform the CountByUsername query
			return Login::QueryCount(
				QQ::Equal(QQN::Login()->Username, $strUsername)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Login
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `login` (
							`username`,
							`password`,
							`first_name`,
							`last_name`,
							`email`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strUsername) . ',
							' . $objDatabase->SqlVariable($this->strPassword) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('login', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`login`
						SET
							`username` = ' . $objDatabase->SqlVariable($this->strUsername) . ',
							`password` = ' . $objDatabase->SqlVariable($this->strPassword) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . '
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
		 * Delete this Login
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Login with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`login`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Logins
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`login`');
		}

		/**
		 * Truncate login table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `login`');
		}

		/**
		 * Reload this Login from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Login object.');

			// Reload the Object
			$objReloaded = Login::Load($this->intId);

			// Update $this's local variables to match
			$this->strUsername = $objReloaded->strUsername;
			$this->strPassword = $objReloaded->strPassword;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strEmail = $objReloaded->strEmail;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Login::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `login` (
					`id`,
					`username`,
					`password`,
					`first_name`,
					`last_name`,
					`email`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strUsername) . ',
					' . $objDatabase->SqlVariable($this->strPassword) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->strEmail) . ',
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
		 * @return Login[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Login::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM login WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Login::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Login[]
		 */
		public function GetJournal() {
			return Login::GetJournalForId($this->intId);
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

				case 'Username':
					// Gets the value for strUsername 
					// @return string
					return $this->strUsername;

				case 'Password':
					// Gets the value for strPassword 
					// @return string
					return $this->strPassword;

				case 'FirstName':
					// Gets the value for strFirstName 
					// @return string
					return $this->strFirstName;

				case 'LastName':
					// Gets the value for strLastName 
					// @return string
					return $this->strLastName;

				case 'Email':
					// Gets the value for strEmail 
					// @return string
					return $this->strEmail;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_MenuAsOwner':
					// Gets the value for the private _objMenuAsOwner (Read-Only)
					// if set due to an expansion on the menu.owner_id reverse relationship
					// @return Menu
					return $this->_objMenuAsOwner;

				case '_MenuAsOwnerArray':
					// Gets the value for the private _objMenuAsOwnerArray (Read-Only)
					// if set due to an ExpandAsArray on the menu.owner_id reverse relationship
					// @return Menu[]
					return (array) $this->_objMenuAsOwnerArray;

				case '_RecipeAsOwner':
					// Gets the value for the private _objRecipeAsOwner (Read-Only)
					// if set due to an expansion on the recipe.owner_id reverse relationship
					// @return Recipe
					return $this->_objRecipeAsOwner;

				case '_RecipeAsOwnerArray':
					// Gets the value for the private _objRecipeAsOwnerArray (Read-Only)
					// if set due to an ExpandAsArray on the recipe.owner_id reverse relationship
					// @return Recipe[]
					return (array) $this->_objRecipeAsOwnerArray;


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
				case 'Username':
					// Sets the value for strUsername 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strUsername = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Password':
					// Sets the value for strPassword 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strPassword = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FirstName':
					// Sets the value for strFirstName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					// Sets the value for strLastName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					// Sets the value for strEmail 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
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

			
		
		// Related Objects' Methods for MenuAsOwner
		//-------------------------------------------------------------------

		/**
		 * Gets all associated MenusAsOwner as an array of Menu objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Menu[]
		*/ 
		public function GetMenuAsOwnerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Menu::LoadArrayByOwnerId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated MenusAsOwner
		 * @return int
		*/ 
		public function CountMenusAsOwner() {
			if ((is_null($this->intId)))
				return 0;

			return Menu::CountByOwnerId($this->intId);
		}

		/**
		 * Associates a MenuAsOwner
		 * @param Menu $objMenu
		 * @return void
		*/ 
		public function AssociateMenuAsOwner(Menu $objMenu) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMenuAsOwner on this unsaved Login.');
			if ((is_null($objMenu->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateMenuAsOwner on this Login with an unsaved Menu.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`menu`
				SET
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMenu->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objMenu->OwnerId = $this->intId;
				$objMenu->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a MenuAsOwner
		 * @param Menu $objMenu
		 * @return void
		*/ 
		public function UnassociateMenuAsOwner(Menu $objMenu) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMenuAsOwner on this unsaved Login.');
			if ((is_null($objMenu->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMenuAsOwner on this Login with an unsaved Menu.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`menu`
				SET
					`owner_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMenu->Id) . ' AND
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objMenu->OwnerId = null;
				$objMenu->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all MenusAsOwner
		 * @return void
		*/ 
		public function UnassociateAllMenusAsOwner() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMenuAsOwner on this unsaved Login.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Menu::LoadArrayByOwnerId($this->intId) as $objMenu) {
					$objMenu->OwnerId = null;
					$objMenu->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`menu`
				SET
					`owner_id` = null
				WHERE
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated MenuAsOwner
		 * @param Menu $objMenu
		 * @return void
		*/ 
		public function DeleteAssociatedMenuAsOwner(Menu $objMenu) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMenuAsOwner on this unsaved Login.');
			if ((is_null($objMenu->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMenuAsOwner on this Login with an unsaved Menu.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`menu`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objMenu->Id) . ' AND
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objMenu->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated MenusAsOwner
		 * @return void
		*/ 
		public function DeleteAllMenusAsOwner() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateMenuAsOwner on this unsaved Login.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Menu::LoadArrayByOwnerId($this->intId) as $objMenu) {
					$objMenu->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`menu`
				WHERE
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for RecipeAsOwner
		//-------------------------------------------------------------------

		/**
		 * Gets all associated RecipesAsOwner as an array of Recipe objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Recipe[]
		*/ 
		public function GetRecipeAsOwnerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Recipe::LoadArrayByOwnerId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated RecipesAsOwner
		 * @return int
		*/ 
		public function CountRecipesAsOwner() {
			if ((is_null($this->intId)))
				return 0;

			return Recipe::CountByOwnerId($this->intId);
		}

		/**
		 * Associates a RecipeAsOwner
		 * @param Recipe $objRecipe
		 * @return void
		*/ 
		public function AssociateRecipeAsOwner(Recipe $objRecipe) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRecipeAsOwner on this unsaved Login.');
			if ((is_null($objRecipe->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateRecipeAsOwner on this Login with an unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`recipe`
				SET
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRecipe->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objRecipe->OwnerId = $this->intId;
				$objRecipe->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a RecipeAsOwner
		 * @param Recipe $objRecipe
		 * @return void
		*/ 
		public function UnassociateRecipeAsOwner(Recipe $objRecipe) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipeAsOwner on this unsaved Login.');
			if ((is_null($objRecipe->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipeAsOwner on this Login with an unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`recipe`
				SET
					`owner_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRecipe->Id) . ' AND
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRecipe->OwnerId = null;
				$objRecipe->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all RecipesAsOwner
		 * @return void
		*/ 
		public function UnassociateAllRecipesAsOwner() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipeAsOwner on this unsaved Login.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Recipe::LoadArrayByOwnerId($this->intId) as $objRecipe) {
					$objRecipe->OwnerId = null;
					$objRecipe->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`recipe`
				SET
					`owner_id` = null
				WHERE
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated RecipeAsOwner
		 * @param Recipe $objRecipe
		 * @return void
		*/ 
		public function DeleteAssociatedRecipeAsOwner(Recipe $objRecipe) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipeAsOwner on this unsaved Login.');
			if ((is_null($objRecipe->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipeAsOwner on this Login with an unsaved Recipe.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objRecipe->Id) . ' AND
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objRecipe->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated RecipesAsOwner
		 * @return void
		*/ 
		public function DeleteAllRecipesAsOwner() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateRecipeAsOwner on this unsaved Login.');

			// Get the Database Object for this Class
			$objDatabase = Login::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Recipe::LoadArrayByOwnerId($this->intId) as $objRecipe) {
					$objRecipe->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`recipe`
				WHERE
					`owner_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Login"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Username" type="xsd:string"/>';
			$strToReturn .= '<element name="Password" type="xsd:string"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Login', $strComplexTypeArray)) {
				$strComplexTypeArray['Login'] = Login::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Login::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Login();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Username'))
				$objToReturn->strUsername = $objSoapObject->Username;
			if (property_exists($objSoapObject, 'Password'))
				$objToReturn->strPassword = $objSoapObject->Password;
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Login::GetSoapObjectFromObject($objObject, true));

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
	 * @property-read QQNode $Id
	 * @property-read QQNode $Username
	 * @property-read QQNode $Password
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Email
	 * @property-read QQReverseReferenceNodeMenu $MenuAsOwner
	 * @property-read QQReverseReferenceNodeRecipe $RecipeAsOwner
	 */
	class QQNodeLogin extends QQNode {
		protected $strTableName = 'login';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Login';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'MenuAsOwner':
					return new QQReverseReferenceNodeMenu($this, 'menuasowner', 'reverse_reference', 'owner_id');
				case 'RecipeAsOwner':
					return new QQReverseReferenceNodeRecipe($this, 'recipeasowner', 'reverse_reference', 'owner_id');

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
	 * @property-read QQNode $Username
	 * @property-read QQNode $Password
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Email
	 * @property-read QQReverseReferenceNodeMenu $MenuAsOwner
	 * @property-read QQReverseReferenceNodeRecipe $RecipeAsOwner
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeLogin extends QQReverseReferenceNode {
		protected $strTableName = 'login';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Login';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Username':
					return new QQNode('username', 'Username', 'string', $this);
				case 'Password':
					return new QQNode('password', 'Password', 'string', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'MenuAsOwner':
					return new QQReverseReferenceNodeMenu($this, 'menuasowner', 'reverse_reference', 'owner_id');
				case 'RecipeAsOwner':
					return new QQReverseReferenceNodeRecipe($this, 'recipeasowner', 'reverse_reference', 'owner_id');

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