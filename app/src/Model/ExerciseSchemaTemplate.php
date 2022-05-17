<?php

use SilverStripe\ORM\DataObject;

class ExerciseSchemaTemplate extends DataObject
{
    private static $db = [
        "Name" => "Varchar"
    ];

    private static $many_many = [
        "ExerciseSetGroup" => ExerciseSetGroup::class,
        "Tags" => Tag::class
    ];

    
}