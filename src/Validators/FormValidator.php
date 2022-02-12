<?php
/**
 * Date: 12.02.2022
 * Time: 16:16
 */

namespace Garret\LabelMaker\Validators;

class FormValidator
{
    public function validation($data)
    {
        $validationErrors = [];
        $formData         = [];

        $formData[ 'firstname' ]   = $this->cleanInput($data[ 'firstname' ]);
        $formData[ 'lastname' ]    = $this->cleanInput($data[ 'lastname' ]);
        $formData[ 'companyname' ] = $this->cleanInput($data[ 'companyname' ]);
        $formData[ 'address1' ]    = $this->cleanInput($data[ 'address1' ]);
        $formData[ 'address2' ]    = $this->cleanInput($data[ 'address2' ]);
        $formData[ 'city' ]        = $this->cleanInput($data[ 'city' ]);
        $formData[ 'county' ]      = $this->cleanInput($data[ 'county' ]);
        $formData[ 'zipcode' ]     = $this->cleanInput($data[ 'zipcode' ]);
        $formData[ 'country' ]     = $this->cleanInput($data[ 'country' ]);
        $formData[ 'phonenumber' ] = $this->cleanInput($data[ 'phonenumber' ]);
        $formData[ 'email' ]       = $this->cleanInput($data[ 'email' ]);

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

        if (!empty($validationErrors)) {
            print_r('Validation errors');
            print_r($validationErrors);
            return false;
        }
        
        $hash = $this->generateHash(
            $formData[ 'firstname' ],
            $formData[ 'lastname' ],
            $formData[ 'zipcode' ],
            $formData[ 'phonenumber' ],
            $formData[ 'email' ]
        );

        return [
            'name' => $formData[ 'firstname' ].' '.$formData[ 'lastname' ],
            'companyname' => $formData[ 'companyname' ],
            'address' => $formData[ 'address1' ].' '.$formData[ 'address2' ],
            'phonenumber' => $formData[ 'phonenumber' ],
            'email' => $formData[ 'email' ],
            'Hash' => $hash
        ];
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

    private function generateHash ($firstname, $lastname, $zipcode, $phonenumber, $email) {
        $largeString = $firstname.$lastname.$zipcode.$phonenumber.$email;
        return hash('md5', $largeString);
    }

}