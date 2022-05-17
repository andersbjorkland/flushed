<?php

use SilverStripe\ORM\DataObject;

class ExerciseSchemaTemplate extends DataObject
{
    private static $db = [
        "Name" => "Varchar"
    ];

    private static $many_many = [
        "Exercises" => Exercise::class,
        "Tags" => Tag::class
    ];

    
}