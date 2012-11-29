<?php
	/**
	 * The MealType class defined here contains
	 * code for the MealType enumerated type.  It represents
	 * the enumerated values found in the "meal_type" table
	 * in the database.
	 * 
	 * To use, you should use the MealType subclass which
	 * extends this MealTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the MealType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class MealTypeGen extends QBaseClass {
		const Appetizer = 1;
		const MainMeal = 2;
		const Dessert = 3;

		const MaxId = 3;

		public static $NameArray = array(
			1 => 'Appetizer',
			2 => 'Main Meal',
			3 => 'Dessert');

		public static $TokenArray = array(
			1 => 'Appetizer',
			2 => 'MainMeal',
			3 => 'Dessert');

		public static function ToString($intMealTypeId) {
			switch ($intMealTypeId) {
				case 1: return 'Appetizer';
				case 2: return 'Main Meal';
				case 3: return 'Dessert';
				default:
					throw new QCallerException(sprintf('Invalid intMealTypeId: %s', $intMealTypeId));
			}
		}

		public static function ToToken($intMealTypeId) {
			switch ($intMealTypeId) {
				case 1: return 'Appetizer';
				case 2: return 'MainMeal';
				case 3: return 'Dessert';
				default:
					throw new QCallerException(sprintf('Invalid intMealTypeId: %s', $intMealTypeId));
			}
		}

	}
?>