<?php

namespace Garret\LabelMaker\Controllers;

class FormController
{
    public function formData($data)
    {
        if ( ! $this->validation($data)) {
            print_r('nevalidat');
        }

    }

    private function validation($data)
    {
        $validationErrors = [];
        $formData = [];

        $formData['firstname'] = $this->cleanInput($data['firstname']);
        $formData['lastname'] = $this->cleanInput($data['lastname']);
        $formData['companyname'] = $this->cleanInput($data['companyname']);
        $formData['address1'] = $this->cleanInput($data['address1']);
        $formData['address2'] = $this->cleanInput($data['address2']);
        $formData['city'] = $this->cleanInput($data['city']);
        $formData['county'] = $this->cleanInput($data['county']);
        $formData['zipcode'] = $this->cleanInput($data['zipcode']);
        $formData['country'] = $this->cleanInput($data['country']);
        $formData['phonenumber'] = $this->cleanInput($data['phonenumber']);
        $formData['email'] = $this->cleanInput($data['email']);

        print_r($formData);




        return true;
    }

    private function cleanInput($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input.'iepuri';
    }

    private function validateStringLength(string $string, int $length)
    {
        if (strlen($string) > $length) {
            return false;
        }

        return true;
    }
}