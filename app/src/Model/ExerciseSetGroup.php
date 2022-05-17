<?php

use SilverStripe\ORM\DataObject;

class ExerciseSetGroup extends DataObject
{
    private static $db = [
        'Sort' => 'Int'
    ];

    private static $has_one = [
        'Exercise' => Exercise::class,
        'Schema' => ExerciseSchemaTemplate::class

    ];

    private static $has_many = [
        'ExerciseSets' => ExerciseSet::class
    ];

}