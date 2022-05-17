<?php

use SilverStripe\ORM\DataObject;

class Exercise extends DataObject
{
    private static $db = [
        "Name" => "Varchar",
        "Description" => "HTMLText",
        "Preparation" => "Text",
        "Execution" => "Text",
        "YoutubeURL" => "Varchar"
    ];

    private static $has_one = [
        "Category" => ExerciseCategory::class
    ];

    private static $many_many = [
        "Tags" => Tag::class
    ];
}