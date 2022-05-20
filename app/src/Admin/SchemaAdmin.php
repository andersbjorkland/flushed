<?php

use SilverStripe\Admin\ModelAdmin;

class SchemaAdmin extends ModelAdmin
{
    private static $managed_models = [
        ExerciseDay::class,
        ExerciseSchemaTemplate::class
    ];

    private static $url_segment = 'schemas';

    private static $menu_title = 'Build Schemas';

    public function getEditForm($id = null, $fields = null)
    {
        return parent::getEditForm($id, $fields);
    }
}