<?php
	/**
	 * This is a standard, sample QForm which you can use as a starting
	 * point to build any QForm page that you wish.
	 */

	// Include prepend.inc to load Qcodo
	require(dirname(__FILE__) . '/../includes/prepend.inc.php');

	class SampleForm extends QForm {
		protected $lblMessage;
		protected $btnButton;
		protected $lblNewMessage;
		protected $lstListBox;

		protected function Form_Create() {
			$this->lblMessage = new QLabel($this);
			$this->lblMessage->Text = 'Click the button to change my message.';

			$this->lblNewMessage = new QLabel($this);
			$this->lblNewMessage->Text = 'second label';
			
			$this->btnButton = new QButton($this);
			$this->btnButton->Text = 'Click Me';
			$this->btnButton->AddAction(new QClickEvent(), new QAjaxAction('btnButton_Click'));
			
			$this->lstListBox = new QListBox($this);
			$this->lstListBox->AddItem("red","red",false);
			$this->lstListBox->AddItem("blue","blue",true);
			$this->lstListBox->AddItem("green","green",false);
			$this->lstListBox->AddItem("yellow","yellow",false);
			$this->lstListBox->AddAction(new QSelectEvent(), new QAjaxAction('lstListBox_Selected'));
		}

		protected function btnButton_Click($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
			$this->lblNewMessage->Text = 'what about this?';
		}
		
		protected function lstListBox_Selected($strFormId, $strControlId, $strParameter) {
			$this->lblMessage->Text = 'Hello, World!';
			$this->lblNewMessage->Text = 'what about this?';
		}
		
	}

	SampleForm::Run('SampleForm');
?>