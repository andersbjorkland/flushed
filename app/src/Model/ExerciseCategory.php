<?php

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

class ExerciseCategory extends DataObject
{
    private static $db = [
        "Name" => "Varchar"
    ];

    private static $has_one = [
        "Parent" => self::class
    ];

    private static $has_many = [
        "Children" => self::class,
        "Exercises" => Exercise::class
    ];

    private static $many_many = [
        "Tags" => Tag::class,
        "Images" => Image::class
    ];
}