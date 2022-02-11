<?php

namespace Garret\LabelMaker;

class Index
{
    public function greet($greet = "Hello World")
    {
        ob_start();
        include('view/form.php');
        $applied_template = ob_get_contents();
        ob_end_clean();

        echo $applied_template;
    }
}