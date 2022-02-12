<?php

namespace Garret\LabelMaker\Controllers;

use Garret\LabelMaker\Validators\FormValidator;

class FormController
{
    public $formValidator;

    public function __construct(FormValidator $formValidator)
    {
        $this->formValidator = $formValidator;
    }

    public function formData($data) //make this generateLabel
    {
        if ( !$this->formValidator->validation($data)) {
            print_r('Not valid input, cannot generate label');
            return false;
        }
        print_r($this->formValidator->validation($data));
        return true;
    }




}