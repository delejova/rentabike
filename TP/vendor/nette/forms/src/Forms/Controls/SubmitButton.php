<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */

namespace Nette\Forms\Controls;

use Nette;


/**
 * Submittable button control.
 *
 * @property-read bool $submittedBy
 */
class SubmitButton extends Button implements Nette\Forms\ISubmitterControl
{
	/** @var callable[]  function (SubmitButton $sender); Occurs when the button is clicked and form is successfully validated */
	public $onClick;

	/** @var callable[]  function (SubmitButton $sender); Occurs when the button is clicked and form is not validated */
	public $onInvalidClick;

	/** @var array */
	private $validationScope;


	/**
	 * @param  string  caption
	 */
	public function __construct($caption = NULL)
	{
		parent::__construct($caption);
		$this->control->type = 'submit';
		$this->setOmitted(TRUE);
	}


	/**
	 * Loads HTTP data.
	 * @return void
	 */
	public function loadHttpData()
	{
		parent::loadHttpData();
		if ($this->isFilled()) {
			$this->getForm()->setSubmittedBy($this);
		}
	}


	/**
	 * Tells if the form was submitted by this button.
	 * @return bool
	 */
	public function isSubmittedBy()
	{
		return $this->getForm()->isSubmitted() === $this;
	}


	/**
	 * Sets the validation scope. Clicking the button validates only the controls within the specified scope.
	 * @return self
	 */
	public function setValidationScope(/*array*/$scope = NULL)
	{
		if ($scope === NULL || $scope === TRUE) {
			$this->validationScope = NULL;
		} else {
			$this->validationScope = [];
			foreach ($scope ?: [] as $control) {
				if (!$control instanceof Nette\Forms\Container && !$control instanceof Nette\Forms\IControl) {
					throw new Nette\InvalidArgumentException('Validation scope accepts only Nette\Forms\Container or Nette\Forms\IControl instances.');
				}
				$this->validationScope[] = $control;
			}
		}
		return $this;
	}


	/**
	 * Gets the validation scope.
	 * @return array|NULL
	 */
	public function getValidationScope()
	{
		return $this->validationScope;
	}


	/**
	 * Fires click event.
	 * @return void
	 */
	public function click()
	{
		$this->onClick($this);
	}


	/**
	 * Generates control's HTML element.
	 * @param  string
	 * @return Nette\Utils\Html
	 */
	public function getControl($caption = NULL)
	{
		$scope = [];
		foreach ((array) $this->validationScope as $control) {
			$scope[] = $control->lookupPath(Nette\Forms\Form::class);
		}
		return parent::getControl($caption)->addAttributes([
			'formnovalidate' => $this->validationScope !== NULL,
			'data-nette-validation-scope' => $scope ?: NULL,
		]);
	}

}
