<?php
	/**
	 * The abstract IngredientSourceGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the IngredientSource subclass which
	 * extends this IngredientSourceGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IngredientSource class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $IngredientId the value for intIngredientId (Not Null)
	 * @property integer $LocationId the value for intLocationId (Not Null)
	 * @property double $Cost the value for fltCost 
	 * @property integer $QualityId the value for intQualityId 
	 * @property string $Comments the value for strComments 
	 * @property string $Name the value for strName 
	 * @property Ingredient $Ingredient the value for the Ingredient object referenced by intIngredientId (Not Null)
	 * @property Location $Location the value for the Location object referenced by intLocationId (Not Null)
	 * @property Quality $Quality the value for the Quality object referenced by intQualityId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class IngredientSourceGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column ingredient_source.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient_source.ingredient_id
		 * @var integer intIngredientId
		 */
		protected $intIngredientId;
		const IngredientIdDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient_source.location_id
		 * @var integer intLocationId
		 */
		protected $intLocationId;
		const LocationIdDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient_source.cost
		 * @var double fltCost
		 */
		protected $fltCost;
		const CostDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient_source.quality_id
		 * @var integer intQualityId
		 */
		protected $intQualityId;
		const QualityIdDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient_source.comments
		 * @var string strComments
		 */
		protected $strComments;
		const CommentsMaxLength = 1024;
		const CommentsDefault = null;


		/**
		 * Protected member variable that maps to the database column ingredient_source.name
		 * @var string strName
		 */
		protected $strName;
		const NameMaxLength = 255;
		const NameDefault = null;


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
		 * in the database column ingredient_source.ingredient_id.
		 *
		 * NOTE: Always use the Ingredient property getter to correctly retrieve this Ingredient object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Ingredient objIngredient
		 */
		protected $objIngredient;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column ingredient_source.location_id.
		 *
		 * NOTE: Always use the Location property getter to correctly retrieve this Location object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Location objLocation
		 */
		protected $objLocation;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column ingredient_source.quality_id.
		 *
		 * NOTE: Always use the Quality property getter to correctly retrieve this Quality object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Quality objQuality
		 */
		protected $objQuality;





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
		 * Load a IngredientSource from PK Info
		 * @param integer $intId
		 * @return IngredientSource
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return IngredientSource::QuerySingle(
				QQ::Equal(QQN::IngredientSource()->Id, $intId)
			);
		}

		/**
		 * Load all IngredientSources
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IngredientSource[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call IngredientSource::QueryArray to perform the LoadAll query
			try {
				return IngredientSource::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all IngredientSources
		 * @return int
		 */
		public static function CountAll() {
			// Call IngredientSource::QueryCount to perform the CountAll query
			return IngredientSource::QueryCount(QQ::All());
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
			$objDatabase = IngredientSource::GetDatabase();

			// Create/Build out the QueryBuilder object with IngredientSource-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'ingredient_source');
			IngredientSource::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('ingredient_source');

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
		 * Static Qcodo Query method to query for a single IngredientSource object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IngredientSource the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IngredientSource::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new IngredientSource object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = IngredientSource::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return IngredientSource::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of IngredientSource objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return IngredientSource[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IngredientSource::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return IngredientSource::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = IngredientSource::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of IngredientSource objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = IngredientSource::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = IngredientSource::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'ingredient_source_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with IngredientSource-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				IngredientSource::GetSelectFields($objQueryBuilder);
				IngredientSource::GetFromFields($objQueryBuilder);

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
			return IngredientSource::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this IngredientSource
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'ingredient_source';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'ingredient_id', $strAliasPrefix . 'ingredient_id');
			$objBuilder->AddSelectItem($strTableName, 'location_id', $strAliasPrefix . 'location_id');
			$objBuilder->AddSelectItem($strTableName, 'cost', $strAliasPrefix . 'cost');
			$objBuilder->AddSelectItem($strTableName, 'quality_id', $strAliasPrefix . 'quality_id');
			$objBuilder->AddSelectItem($strTableName, 'comments', $strAliasPrefix . 'comments');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a IngredientSource from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this IngredientSource::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return IngredientSource
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the IngredientSource object
			$objToReturn = new IngredientSource();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'ingredient_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'ingredient_id'] : $strAliasPrefix . 'ingredient_id';
			$objToReturn->intIngredientId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'location_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'location_id'] : $strAliasPrefix . 'location_id';
			$objToReturn->intLocationId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'cost', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'cost'] : $strAliasPrefix . 'cost';
			$objToReturn->fltCost = $objDbRow->GetColumn($strAliasName, 'Float');
			$strAliasName = array_key_exists($strAliasPrefix . 'quality_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'quality_id'] : $strAliasPrefix . 'quality_id';
			$objToReturn->intQualityId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'comments', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'comments'] : $strAliasPrefix . 'comments';
			$objToReturn->strComments = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'ingredient_source__';

			// Check for Ingredient Early Binding
			$strAlias = $strAliasPrefix . 'ingredient_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIngredient = Ingredient::InstantiateDbRow($objDbRow, $strAliasPrefix . 'ingredient_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Location Early Binding
			$strAlias = $strAliasPrefix . 'location_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objLocation = Location::InstantiateDbRow($objDbRow, $strAliasPrefix . 'location_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Quality Early Binding
			$strAlias = $strAliasPrefix . 'quality_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objQuality = Quality::InstantiateDbRow($objDbRow, $strAliasPrefix . 'quality_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of IngredientSources from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return IngredientSource[]
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
					$objItem = IngredientSource::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = IngredientSource::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single IngredientSource object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return IngredientSource next row resulting from the query
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
			return IngredientSource::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single IngredientSource object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return IngredientSource
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return IngredientSource::QuerySingle(
				QQ::Equal(QQN::IngredientSource()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of IngredientSource objects,
		 * by IngredientId Index(es)
		 * @param integer $intIngredientId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IngredientSource[]
		*/
		public static function LoadArrayByIngredientId($intIngredientId, $objOptionalClauses = null) {
			// Call IngredientSource::QueryArray to perform the LoadArrayByIngredientId query
			try {
				return IngredientSource::QueryArray(
					QQ::Equal(QQN::IngredientSource()->IngredientId, $intIngredientId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IngredientSources
		 * by IngredientId Index(es)
		 * @param integer $intIngredientId
		 * @return int
		*/
		public static function CountByIngredientId($intIngredientId, $objOptionalClauses = null) {
			// Call IngredientSource::QueryCount to perform the CountByIngredientId query
			return IngredientSource::QueryCount(
				QQ::Equal(QQN::IngredientSource()->IngredientId, $intIngredientId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of IngredientSource objects,
		 * by LocationId Index(es)
		 * @param integer $intLocationId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IngredientSource[]
		*/
		public static function LoadArrayByLocationId($intLocationId, $objOptionalClauses = null) {
			// Call IngredientSource::QueryArray to perform the LoadArrayByLocationId query
			try {
				return IngredientSource::QueryArray(
					QQ::Equal(QQN::IngredientSource()->LocationId, $intLocationId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IngredientSources
		 * by LocationId Index(es)
		 * @param integer $intLocationId
		 * @return int
		*/
		public static function CountByLocationId($intLocationId, $objOptionalClauses = null) {
			// Call IngredientSource::QueryCount to perform the CountByLocationId query
			return IngredientSource::QueryCount(
				QQ::Equal(QQN::IngredientSource()->LocationId, $intLocationId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of IngredientSource objects,
		 * by QualityId Index(es)
		 * @param integer $intQualityId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IngredientSource[]
		*/
		public static function LoadArrayByQualityId($intQualityId, $objOptionalClauses = null) {
			// Call IngredientSource::QueryArray to perform the LoadArrayByQualityId query
			try {
				return IngredientSource::QueryArray(
					QQ::Equal(QQN::IngredientSource()->QualityId, $intQualityId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count IngredientSources
		 * by QualityId Index(es)
		 * @param integer $intQualityId
		 * @return int
		*/
		public static function CountByQualityId($intQualityId, $objOptionalClauses = null) {
			// Call IngredientSource::QueryCount to perform the CountByQualityId query
			return IngredientSource::QueryCount(
				QQ::Equal(QQN::IngredientSource()->QualityId, $intQualityId)
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
		 * Save this IngredientSource
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = IngredientSource::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `ingredient_source` (
							`ingredient_id`,
							`location_id`,
							`cost`,
							`quality_id`,
							`comments`,
							`name`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intIngredientId) . ',
							' . $objDatabase->SqlVariable($this->intLocationId) . ',
							' . $objDatabase->SqlVariable($this->fltCost) . ',
							' . $objDatabase->SqlVariable($this->intQualityId) . ',
							' . $objDatabase->SqlVariable($this->strComments) . ',
							' . $objDatabase->SqlVariable($this->strName) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('ingredient_source', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`ingredient_source`
						SET
							`ingredient_id` = ' . $objDatabase->SqlVariable($this->intIngredientId) . ',
							`location_id` = ' . $objDatabase->SqlVariable($this->intLocationId) . ',
							`cost` = ' . $objDatabase->SqlVariable($this->fltCost) . ',
							`quality_id` = ' . $objDatabase->SqlVariable($this->intQualityId) . ',
							`comments` = ' . $objDatabase->SqlVariable($this->strComments) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . '
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
		 * Delete this IngredientSource
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this IngredientSource with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = IngredientSource::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ingredient_source`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all IngredientSources
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = IngredientSource::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ingredient_source`');
		}

		/**
		 * Truncate ingredient_source table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = IngredientSource::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `ingredient_source`');
		}

		/**
		 * Reload this IngredientSource from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved IngredientSource object.');

			// Reload the Object
			$objReloaded = IngredientSource::Load($this->intId);

			// Update $this's local variables to match
			$this->IngredientId = $objReloaded->IngredientId;
			$this->LocationId = $objReloaded->LocationId;
			$this->fltCost = $objReloaded->fltCost;
			$this->QualityId = $objReloaded->QualityId;
			$this->strComments = $objReloaded->strComments;
			$this->strName = $objReloaded->strName;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = IngredientSource::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `ingredient_source` (
					`id`,
					`ingredient_id`,
					`location_id`,
					`cost`,
					`quality_id`,
					`comments`,
					`name`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intIngredientId) . ',
					' . $objDatabase->SqlVariable($this->intLocationId) . ',
					' . $objDatabase->SqlVariable($this->fltCost) . ',
					' . $objDatabase->SqlVariable($this->intQualityId) . ',
					' . $objDatabase->SqlVariable($this->strComments) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
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
		 * @return IngredientSource[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = IngredientSource::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM ingredient_source WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return IngredientSource::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return IngredientSource[]
		 */
		public function GetJournal() {
			return IngredientSource::GetJournalForId($this->intId);
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

				case 'IngredientId':
					// Gets the value for intIngredientId (Not Null)
					// @return integer
					return $this->intIngredientId;

				case 'LocationId':
					// Gets the value for intLocationId (Not Null)
					// @return integer
					return $this->intLocationId;

				case 'Cost':
					// Gets the value for fltCost 
					// @return double
					return $this->fltCost;

				case 'QualityId':
					// Gets the value for intQualityId 
					// @return integer
					return $this->intQualityId;

				case 'Comments':
					// Gets the value for strComments 
					// @return string
					return $this->strComments;

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;


				///////////////////
				// Member Objects
				///////////////////
				case 'Ingredient':
					// Gets the value for the Ingredient object referenced by intIngredientId (Not Null)
					// @return Ingredient
					try {
						if ((!$this->objIngredient) && (!is_null($this->intIngredientId)))
							$this->objIngredient = Ingredient::Load($this->intIngredientId);
						return $this->objIngredient;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Location':
					// Gets the value for the Location object referenced by intLocationId (Not Null)
					// @return Location
					try {
						if ((!$this->objLocation) && (!is_null($this->intLocationId)))
							$this->objLocation = Location::Load($this->intLocationId);
						return $this->objLocation;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Quality':
					// Gets the value for the Quality object referenced by intQualityId 
					// @return Quality
					try {
						if ((!$this->objQuality) && (!is_null($this->intQualityId)))
							$this->objQuality = Quality::Load($this->intQualityId);
						return $this->objQuality;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


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
				case 'IngredientId':
					// Sets the value for intIngredientId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objIngredient = null;
						return ($this->intIngredientId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LocationId':
					// Sets the value for intLocationId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objLocation = null;
						return ($this->intLocationId = QType::Cast($mixValue, QType::Integer));
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

				case 'QualityId':
					// Sets the value for intQualityId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objQuality = null;
						return ($this->intQualityId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Comments':
					// Sets the value for strComments 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strComments = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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


				///////////////////
				// Member Objects
				///////////////////
				case 'Ingredient':
					// Sets the value for the Ingredient object referenced by intIngredientId (Not Null)
					// @param Ingredient $mixValue
					// @return Ingredient
					if (is_null($mixValue)) {
						$this->intIngredientId = null;
						$this->objIngredient = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Ingredient object
						try {
							$mixValue = QType::Cast($mixValue, 'Ingredient');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Ingredient object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Ingredient for this IngredientSource');

						// Update Local Member Variables
						$this->objIngredient = $mixValue;
						$this->intIngredientId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Location':
					// Sets the value for the Location object referenced by intLocationId (Not Null)
					// @param Location $mixValue
					// @return Location
					if (is_null($mixValue)) {
						$this->intLocationId = null;
						$this->objLocation = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Location object
						try {
							$mixValue = QType::Cast($mixValue, 'Location');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Location object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Location for this IngredientSource');

						// Update Local Member Variables
						$this->objLocation = $mixValue;
						$this->intLocationId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Quality':
					// Sets the value for the Quality object referenced by intQualityId 
					// @param Quality $mixValue
					// @return Quality
					if (is_null($mixValue)) {
						$this->intQualityId = null;
						$this->objQuality = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Quality object
						try {
							$mixValue = QType::Cast($mixValue, 'Quality');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Quality object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Quality for this IngredientSource');

						// Update Local Member Variables
						$this->objQuality = $mixValue;
						$this->intQualityId = $mixValue->Id;

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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="IngredientSource"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Ingredient" type="xsd1:Ingredient"/>';
			$strToReturn .= '<element name="Location" type="xsd1:Location"/>';
			$strToReturn .= '<element name="Cost" type="xsd:float"/>';
			$strToReturn .= '<element name="Quality" type="xsd1:Quality"/>';
			$strToReturn .= '<element name="Comments" type="xsd:string"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('IngredientSource', $strComplexTypeArray)) {
				$strComplexTypeArray['IngredientSource'] = IngredientSource::GetSoapComplexTypeXml();
				Ingredient::AlterSoapComplexTypeArray($strComplexTypeArray);
				Location::AlterSoapComplexTypeArray($strComplexTypeArray);
				Quality::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, IngredientSource::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new IngredientSource();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Ingredient')) &&
				($objSoapObject->Ingredient))
				$objToReturn->Ingredient = Ingredient::GetObjectFromSoapObject($objSoapObject->Ingredient);
			if ((property_exists($objSoapObject, 'Location')) &&
				($objSoapObject->Location))
				$objToReturn->Location = Location::GetObjectFromSoapObject($objSoapObject->Location);
			if (property_exists($objSoapObject, 'Cost'))
				$objToReturn->fltCost = $objSoapObject->Cost;
			if ((property_exists($objSoapObject, 'Quality')) &&
				($objSoapObject->Quality))
				$objToReturn->Quality = Quality::GetObjectFromSoapObject($objSoapObject->Quality);
			if (property_exists($objSoapObject, 'Comments'))
				$objToReturn->strComments = $objSoapObject->Comments;
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, IngredientSource::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIngredient)
				$objObject->objIngredient = Ingredient::GetSoapObjectFromObject($objObject->objIngredient, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intIngredientId = null;
			if ($objObject->objLocation)
				$objObject->objLocation = Location::GetSoapObjectFromObject($objObject->objLocation, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLocationId = null;
			if ($objObject->objQuality)
				$objObject->objQuality = Quality::GetSoapObjectFromObject($objObject->objQuality, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intQualityId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $IngredientId
	 * @property-read QQNodeIngredient $Ingredient
	 * @property-read QQNode $LocationId
	 * @property-read QQNodeLocation $Location
	 * @property-read QQNode $Cost
	 * @property-read QQNode $QualityId
	 * @property-read QQNodeQuality $Quality
	 * @property-read QQNode $Comments
	 * @property-read QQNode $Name
	 */
	class QQNodeIngredientSource extends QQNode {
		protected $strTableName = 'ingredient_source';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IngredientSource';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IngredientId':
					return new QQNode('ingredient_id', 'IngredientId', 'integer', $this);
				case 'Ingredient':
					return new QQNodeIngredient('ingredient_id', 'Ingredient', 'integer', $this);
				case 'LocationId':
					return new QQNode('location_id', 'LocationId', 'integer', $this);
				case 'Location':
					return new QQNodeLocation('location_id', 'Location', 'integer', $this);
				case 'Cost':
					return new QQNode('cost', 'Cost', 'double', $this);
				case 'QualityId':
					return new QQNode('quality_id', 'QualityId', 'integer', $this);
				case 'Quality':
					return new QQNodeQuality('quality_id', 'Quality', 'integer', $this);
				case 'Comments':
					return new QQNode('comments', 'Comments', 'string', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);

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
	 * @property-read QQNode $IngredientId
	 * @property-read QQNodeIngredient $Ingredient
	 * @property-read QQNode $LocationId
	 * @property-read QQNodeLocation $Location
	 * @property-read QQNode $Cost
	 * @property-read QQNode $QualityId
	 * @property-read QQNodeQuality $Quality
	 * @property-read QQNode $Comments
	 * @property-read QQNode $Name
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeIngredientSource extends QQReverseReferenceNode {
		protected $strTableName = 'ingredient_source';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'IngredientSource';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IngredientId':
					return new QQNode('ingredient_id', 'IngredientId', 'integer', $this);
				case 'Ingredient':
					return new QQNodeIngredient('ingredient_id', 'Ingredient', 'integer', $this);
				case 'LocationId':
					return new QQNode('location_id', 'LocationId', 'integer', $this);
				case 'Location':
					return new QQNodeLocation('location_id', 'Location', 'integer', $this);
				case 'Cost':
					return new QQNode('cost', 'Cost', 'double', $this);
				case 'QualityId':
					return new QQNode('quality_id', 'QualityId', 'integer', $this);
				case 'Quality':
					return new QQNodeQuality('quality_id', 'Quality', 'integer', $this);
				case 'Comments':
					return new QQNode('comments', 'Comments', 'string', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);

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