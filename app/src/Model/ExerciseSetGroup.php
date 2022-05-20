<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;

class ExerciseSetGroup extends DataObject
{
    private static $db = [
        'Sort' => 'Int'
    ];

    private static $has_one = [
        'Exercise' => Exercise::class,
        'ExerciseSchema' => ExerciseSchemaTemplate::class

    ];

    private static $has_many = [
        'ExerciseSets' => ExerciseSet::class
    ];

    private static $summary_fields = [
        'Exercise.Name' => 'Exercice',
        'Description' => 'Sets'
    ]; 

    protected function getDescription(): string
    {
        $description = '';

        $numOfSets = $this->ExerciseSets()->count();
        $i = 1;

        /** @var ExerciseSet $exerciseSet */
        foreach ($this->ExerciseSets() as $exerciseSet) {
            $description .= $exerciseSet->getDescription();

            if ($i < $numOfSets) {
                $description .= ', ';
            }

            $i++;
        }


        return $description;
    }

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('ExerciseSchemaID');
        return $fields;
    }

}