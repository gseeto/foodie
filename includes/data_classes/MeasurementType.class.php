<?php
	require(__DATAGEN_CLASSES__ . '/MeasurementTypeGen.class.php');

	/**
	 * The MeasurementType class defined here contains any
	 * customized code for the MeasurementType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "measurement_type" table in the database,
	 * and extends from the code generated abstract MeasurementTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 */
	abstract class MeasurementType extends MeasurementTypeGen {
	}
?>