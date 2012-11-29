<?php
	/**
	 * The UnitOfMeasurementType class defined here contains
	 * code for the UnitOfMeasurementType enumerated type.  It represents
	 * the enumerated values found in the "unit_of_measurement_type" table
	 * in the database.
	 * 
	 * To use, you should use the UnitOfMeasurementType subclass which
	 * extends this UnitOfMeasurementTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the UnitOfMeasurementType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class UnitOfMeasurementTypeGen extends QBaseClass {
		const teaspoons = 1;
		const tablespoons = 2;
		const Quarts = 3;
		const pints = 4;
		const ounces = 5;
		const milliliters = 6;
		const liters = 7;
		const gallons = 8;
		const Cups = 9;
		const Pounds = 10;
		const stone = 11;
		const Kilograms = 12;
		const Grams = 13;

		const MaxId = 13;

		public static $NameArray = array(
			1 => 'teaspoons',
			2 => 'tablespoons',
			3 => 'Quarts',
			4 => 'pints',
			5 => 'ounces',
			6 => 'milliliters',
			7 => 'liters',
			8 => 'gallons',
			9 => 'Cups',
			10 => 'Pounds',
			11 => 'stone',
			12 => 'Kilograms',
			13 => 'Grams');

		public static $TokenArray = array(
			1 => 'teaspoons',
			2 => 'tablespoons',
			3 => 'Quarts',
			4 => 'pints',
			5 => 'ounces',
			6 => 'milliliters',
			7 => 'liters',
			8 => 'gallons',
			9 => 'Cups',
			10 => 'Pounds',
			11 => 'stone',
			12 => 'Kilograms',
			13 => 'Grams');

		public static $ExtraColumnNamesArray = array(
			'ConversionRatio');

		public static $ExtraColumnValuesArray = array(
			1 => array (
						'ConversionRatio' => '0.167'),
			2 => array (
						'ConversionRatio' => '0.5'),
			3 => array (
						'ConversionRatio' => '32'),
			4 => array (
						'ConversionRatio' => '16'),
			5 => array (
						'ConversionRatio' => '1'),
			6 => array (
						'ConversionRatio' => '0.034'),
			7 => array (
						'ConversionRatio' => '33.8'),
			8 => array (
						'ConversionRatio' => '128'),
			9 => array (
						'ConversionRatio' => '8'),
			10 => array (
						'ConversionRatio' => '16'),
			11 => array (
						'ConversionRatio' => '224'),
			12 => array (
						'ConversionRatio' => '35.27'),
			13 => array (
						'ConversionRatio' => '0.035'));


		public static function ToString($intUnitOfMeasurementTypeId) {
			switch ($intUnitOfMeasurementTypeId) {
				case 1: return 'teaspoons';
				case 2: return 'tablespoons';
				case 3: return 'Quarts';
				case 4: return 'pints';
				case 5: return 'ounces';
				case 6: return 'milliliters';
				case 7: return 'liters';
				case 8: return 'gallons';
				case 9: return 'Cups';
				case 10: return 'Pounds';
				case 11: return 'stone';
				case 12: return 'Kilograms';
				case 13: return 'Grams';
				default:
					throw new QCallerException(sprintf('Invalid intUnitOfMeasurementTypeId: %s', $intUnitOfMeasurementTypeId));
			}
		}

		public static function ToToken($intUnitOfMeasurementTypeId) {
			switch ($intUnitOfMeasurementTypeId) {
				case 1: return 'teaspoons';
				case 2: return 'tablespoons';
				case 3: return 'Quarts';
				case 4: return 'pints';
				case 5: return 'ounces';
				case 6: return 'milliliters';
				case 7: return 'liters';
				case 8: return 'gallons';
				case 9: return 'Cups';
				case 10: return 'Pounds';
				case 11: return 'stone';
				case 12: return 'Kilograms';
				case 13: return 'Grams';
				default:
					throw new QCallerException(sprintf('Invalid intUnitOfMeasurementTypeId: %s', $intUnitOfMeasurementTypeId));
			}
		}

		public static function ToConversionRatio($intUnitOfMeasurementTypeId) {
			if (array_key_exists($intUnitOfMeasurementTypeId, UnitOfMeasurementType::$ExtraColumnValuesArray))
				return UnitOfMeasurementType::$ExtraColumnValuesArray[$intUnitOfMeasurementTypeId]['ConversionRatio'];
			else
				throw new QCallerException(sprintf('Invalid intUnitOfMeasurementTypeId: %s', $intUnitOfMeasurementTypeId));
		}

	}
?>