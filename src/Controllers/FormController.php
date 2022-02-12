<?php

namespace Garret\LabelMaker\Controllers;

class FormController
{
    public function formData($data)
    {
        if ( !$this->validation($data)) {
            print_r('Not valid input, cannot generate label');
            return false;
        }
        return $this->validation($data);
    }

    private function validation($data) // this need to return the hash cause it's validated
    {
        $validationErrors = [];
        $formData         = [];

        $formData[ 'firstname' ]   = $this->cleanInput($data[ 'firstname' ]); //awb //label
        $formData[ 'lastname' ]    = $this->cleanInput($data[ 'lastname' ]); //awb // label
        $formData[ 'companyname' ] = $this->cleanInput($data[ 'companyname' ]); // label
        $formData[ 'address1' ]    = $this->cleanInput($data[ 'address1' ]); // label
        $formData[ 'address2' ]    = $this->cleanInput($data[ 'address2' ]); // label
        $formData[ 'city' ]        = $this->cleanInput($data[ 'city' ]);
        $formData[ 'county' ]      = $this->cleanInput($data[ 'county' ]);
        $formData[ 'zipcode' ]     = $this->cleanInput($data[ 'zipcode' ]); //awb
        $formData[ 'country' ]     = $this->cleanInput($data[ 'country' ]);
        $formData[ 'phonenumber' ] = $this->cleanInput($data[ 'phonenumber' ]); //awb // label
        $formData[ 'email' ]       = $this->cleanInput($data[ 'email' ]); //awb
        // also the hash is //label

        foreach ($formData as $k => $v) {

            if (in_array($k, ['address1', 'address2'])) {
                if ( ! $this->validateStringMaxLength($v, 100)) {
                    $validationErrors[] = [$k => ' not valid length'];
                }
                if ($this->validateIsStringEmpty($v)) {
                    $validationErrors[] = [$k => ' is empty'];
                }
            }
            if (in_array($k, ['zipcode'])) {
                if ( ! $this->validateStringMaxLength($v, 10)) {
                    $validationErrors[] = [$k => ' not valid length'];
                }
                if ($this->validateIsStringEmpty($v)) {
                    $validationErrors[] = [$k => ' is empty'];
                }
            }
            if (in_array($k, ['phonenumber'])) {
                if ( ! $this->validateStringMaxLength($v, 15)) {
                    $validationErrors[] = [$k => ' not valid length'];
                }
                if ($this->validateIsStringEmpty($v)) {
                    $validationErrors[] = [$k => ' is empty'];
                }
            }
            if (in_array($k, ['email'])) {
                if ( ! $this->validateStringMaxLength($v, 50)) {
                    $validationErrors[] = [$k => ' not valid length'];
                }
                if ( ! filter_var($v, FILTER_VALIDATE_EMAIL)) {
                    $validationErrors[] = [$k => ' not valid email format'];
                }
                if ($this->validateIsStringEmpty($v)) {
                    $validationErrors[] = [$k => ' is empty'];
                }
            }
            if ( ! $this->validateStringMaxLength($v, 25)) {
                $validationErrors[] = [$k => ' not valid length'];
            }
            if ($this->validateIsStringEmpty($v)) {
                $validationErrors[] = [$k => ' is empty'];
            }
        }

//        if (!empty($validationErrors)) {
//            print_r('Validation errors');
//            print_r($validationErrors);
//            return false;
//        }


        $hash = $this->generateHash(
            $formData[ 'firstname' ],
            $formData[ 'lastname' ],
            $formData[ 'zipcode' ],
            $formData[ 'phonenumber' ],
            $formData[ 'email' ]
        );

        return [
            'name' => $formData[ 'firstname' ].''.$formData[ 'lastname' ],
            'companyname' => $formData[ 'companyname' ],
            'address' => $formData[ 'address1' ].''.$formData[ 'address2' ],
            'phonenumber' => $formData[ 'phonenumber' ],
            'email' => $formData[ 'email' ],
            'Hash' => $hash
        ];
    }

    private function generateHash ($firstname, $lastname, $zipcode, $phonenumber, $email) {
        $largeString = $firstname.$lastname.$zipcode.$phonenumber.$email;
        return hash('md5', $largeString);
    }

    private function cleanInput($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }

    private function validateStringMaxLength(string $string, int $length)
    {
        if (strlen($string) > $length) {
            return false;
        }

        return true;
    }

    private function validateIsStringEmpty(string $string)
    {
        if ( ! strlen($string)) {
            return true;
        }

        return false;
    }
}