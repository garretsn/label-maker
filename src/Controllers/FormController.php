<?php

namespace Garret\LabelMaker\Controllers;

use Garret\LabelMaker\Validators\FormValidator;

class FormController
{
    public $formValidator;

    public function generateLabel($data)
    {
        $this->formValidator = new FormValidator();
        if ( !$this->formValidator->validation($data)) {
            print_r('Not valid input, cannot generate label');
            return false;
        }



        print_r($this->formValidator->validation($data));
        return true;
    }

    public function buildTable ($labelArray)
    {
        ?>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Company Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Unique ID</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <?php
    }

}