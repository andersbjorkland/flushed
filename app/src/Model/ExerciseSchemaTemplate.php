<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\Forms\GridField\GridFieldPrintButton;
use SilverStripe\ORM\DataObject;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class ExerciseSchemaTemplate extends DataObject
{
    private static $db = [
        "Name" => "Varchar"
    ];

    private static $many_many = [
        "ExerciseSetGroups" => ExerciseSetGroup::class,
        "Tags" => Tag::class
    ];

    private static $many_many_Extrafields = [
        "ExerciseSetGroups" => [
            "Sort" => "Int"
        ]
    ];

    public function getCMSFields(): FieldList
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('ExerciseSetGroups');

        $groupField = GridField::create(
            'ExerciseSetGroups',
            "Exercise Sets",
            $this->ExerciseSetGroups(),
            GridFieldConfig_RelationEditor::create()
                // ->removeComponentsByType(GridFieldAddExistingAutocompleter::class)
                ->addComponent(new GridFieldOrderableRows('Sort'))
                ->addComponent(new GridFieldPrintButton())
        );

        $fields->addFieldsToTab('Root.Main', $groupField);

        return $fields;
    }

    
}