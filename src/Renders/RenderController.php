<?php

namespace Garret\LabelMaker\Renders;

class RenderController
{
    public function render()
    {
        ob_start();
        include('../views/form.php');
        $applied_template = ob_get_contents();
        ob_end_clean();

        echo $applied_template;
    }
}