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
//        $firstname = $this->cleanInput($data['firstname']);
//        $lastname = $this->cleanInput($data['lastname']);
//        $companyname = $this->cleanInput($data['companyname']);
//        $address1 = $this->cleanInput($data['address1']);
//        $address2 = $this->cleanInput($data['address2']);
//        $city = $this->cleanInput($data['city']);
//        $county = $this->cleanInput($data['county']);
//        $zipcode = $this->cleanInput($data['zipcode']);
//        $country = $this->cleanInput($data['country']);
//        $phonenumber = $this->cleanInput($data['phonenumber']);
//        $email = $this->cleanInput($data['email']);
        $formData = $data;
        array_walk(
            $formData,
            function (&$key, $value) {
                $value = $this->cleanInput($value);
            }
        );
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