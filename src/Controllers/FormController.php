<?php

namespace Garret\LabelMaker\Controllers;

use Garret\LabelMaker\Validators\FormValidator;

class FormController
{
    public $formValidator;

    public function generateLabel($data) //make this generateLabel
    {
        $this->formValidator = new FormValidator();
        if ( !$this->formValidator->validation($data)) {
            print_r('Not valid input, cannot generate label');
            return false;
        }
        print_r($this->formValidator->validation($data));
        return true;
    }

}