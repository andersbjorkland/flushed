<?php

use SilverStripe\ORM\DataObject;

class ExerciseSet extends DataObject
{
    private static $db = [
        'Weight' => 'Decimal',
        'Reps' => 'Int',
        'PerformedReps' => 'Int',
        'Sort' => 'Int'
    ];

    private static $has_one = [
        'Exercise' => ExerciseSetGroup::class
    ];

    public function getDescription(): string
    {
        $description = '';
        $reps = $this->Reps;
        $weight = $this->Weight;

        if ($reps) $description .= $reps;
        if ($reps && $weight) $description .= "x";
        if ($weight) $description .= $weight;

        return $description;
    }
}