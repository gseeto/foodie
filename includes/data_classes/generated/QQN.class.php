<?php
	class QQN {
		/**
		 * @return QQNodeCategory
		 */
		static public function Category() {
			return new QQNodeCategory('category', null, null);
		}
		/**
		 * @return QQNodeIngredient
		 */
		static public function Ingredient() {
			return new QQNodeIngredient('ingredient', null, null);
		}
		/**
		 * @return QQNodeIngredientSource
		 */
		static public function IngredientSource() {
			return new QQNodeIngredientSource('ingredient_source', null, null);
		}
		/**
		 * @return QQNodeLocation
		 */
		static public function Location() {
			return new QQNodeLocation('location', null, null);
		}
		/**
		 * @return QQNodeLogin
		 */
		static public function Login() {
			return new QQNodeLogin('login', null, null);
		}
		/**
		 * @return QQNodeMenu
		 */
		static public function Menu() {
			return new QQNodeMenu('menu', null, null);
		}
		/**
		 * @return QQNodeQuality
		 */
		static public function Quality() {
			return new QQNodeQuality('quality', null, null);
		}
		/**
		 * @return QQNodeRecipe
		 */
		static public function Recipe() {
			return new QQNodeRecipe('recipe', null, null);
		}
	}
?>