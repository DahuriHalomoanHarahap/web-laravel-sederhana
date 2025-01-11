<?php

use App\Models\Section;
use App\Models\setting;

function get_setting_value($key) {
    $data = setting::where('key', $key)->first();
    if(isset($data->value)){
        return $data->value;
    } else {
        return 'Empty';
    }
}

function get_section_data($key) {
    $data = Section::where('post_as', $key)->first();
    if(isset($data)){
        return $data;
    } else {
        return 'Empty';
    }
}