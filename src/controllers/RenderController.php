<?php

namespace Garret\LabelMaker\controllers;

class RenderController
{
    public function render()
    {
        ob_start();
        include('view/form.php');
        $applied_template = ob_get_contents();
        ob_end_clean();

        echo $applied_template;
    }
}