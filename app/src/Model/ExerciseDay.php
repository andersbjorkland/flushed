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
        'ExerciseSchema' => ExerciseSchemaTemplate::class,
    ];

    private static $summary_fields = [
        'Description'
    ];

    public function getDescription(): string
    {
        $description = '';

        $exercises = $this->getExercises();

        $numOfExercises = $exercises->count();

        $i = 1;
        /** @var Exercise $exercise */
        foreach ($exercises as $exercise) {
            $description .= $exercise->Name;

            if ($i < $numOfExercises - 1) {
                $description .= ', ';
            } else if ($i + 1 == $numOfExercises) {
                $description .= ' & ';
            }

            $i++;
        }

        $date = (new DateTime($this->ScheduledDay))->format('d M');

        return $date . ': ' . $description;
    }

    public function getExercises()
    {

        $schemaID = $this->ExerciseSchemaID;
        $exerciseIDs = ExerciseSetGroup::get()->filter('ExerciseSchemaID', $schemaID)->column('ExerciseID');

        return Exercise::get()->filter('ID', $exerciseIDs);
    }

    public function validate(): ValidationResult
    {
        $result = parent::validate();

        if ($this->FatigueLevel && ($this->FatigueLevel <= 0 || $this->FatigueLevel > 5)) {
            $result->addError('Fatigue Level should be in the interval of 1 to 5.');
        }

        return $result;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('ExerciseSchemaID');

        return $fields;
    }
}
