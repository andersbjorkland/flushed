<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ValidationResult;

class ExerciseDay extends DataObject
{
    private static $db = [
        'ScheduledDay' => 'Datetime',
        'PerformedDay' => 'Datetime',
        'FatigueLevel' => 'Int'
    ];

    private static $has_one = [
        'Schema' => ExerciseSchemaTemplate::class,
    ];

    private static $many_many = [
        'Exercises' => Exercise::class
    ];

    private static $many_many_Extrafields = [
        'Exercises' => [
            'Sort' => 'Int'
        ]
    ];

    public function validate(): ValidationResult
    {
        $result = parent::validate();

        if ($this->FatigueLevel <= 0 || $this->FatigueLevel > 5) {
            $result->addError('Fatigue Level should be in the interval of 1 to 5.');
        }

        return $result;
    }
}