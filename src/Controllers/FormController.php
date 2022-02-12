<?php

namespace Garret\LabelMaker\Controllers;

class FormController
{
    public function formData($data)
    {
        if(!$this->validation($data)) {
            print_r('nevalidat');
        }

    }

    private function validation($data)
    {
        print_r($data);
        return true;
    }
}