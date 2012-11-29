<?php
	/**
	 * The MeasurementType class defined here contains
	 * code for the MeasurementType enumerated type.  It represents
	 * the enumerated values found in the "measurement_type" table
	 * in the database.
	 * 
	 * To use, you should use the MeasurementType subclass which
	 * extends this MeasurementTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MeasurementType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MeasurementTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intMeasurementTypeId) {
			switch ($intMeasurementTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intMeasurementTypeId: %s', $intMeasurementTypeId));
			}
		}

		public static function ToToken($intMeasurementTypeId) {
			switch ($intMeasurementTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intMeasurementTypeId: %s', $intMeasurementTypeId));
			}
		}

	}
?>