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

    public function generateLabel($data) //make this generateLabel
    {
        if ( !$this->formValidator->validation($data)) {
            print_r('Not valid input, cannot generate label');
            return false;
        }
//        print_r($this->formValidator->validation($data));
        $this->render('label.php', $this->formValidator->validation($data));
        return true;
    }

    public function function_get_output($fn)
    {
        $args = func_get_args();unset($args[0]);
        ob_start();
        call_user_func_array($fn, $args);
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    public function display($template, $params = array())
    {
        extract($params);
        include $template;
    }

    public function render($template, $params = array())
    {
        return $this->function_get_output('display', $template, $params);
    }




}