<?php

class ImageBuilder extends Builder
{
    public function __construct()
    {
        $this->addProperty('label');
        $this->addProperty('name');
        $this->addProperty('value', null);
    }

    public function build()
    {
        $result = '<div class="form-group">';
        $result .= "    <label class=\"col-md-2 control-label\" for=\"textinput\">{$this->label}</label>";
        $result .= '    <div class="col-md-4">';
        $result .= '    <div class="hidethisshit">';
        $result .= '    <p>Choose file</p>';
        $result .= "         <input type=\"file\" name=\"image\" id=\"fileToUpload\" class=\"hide_file\">";
        $result .= '</div>';

        return $result;
    }
}

