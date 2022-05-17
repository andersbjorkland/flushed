<?php

use SilverStripe\ORM\DataObject;

class ExerciseSet extends DataObject
{
    private static $db = [
        'Weight' => 'Decimal',
        'Reps' => 'Int',
        'PerformedReps' => 'Int'
    ];

    private static $has_one = [
        'Exercise' => Exercise::class
    ];
}