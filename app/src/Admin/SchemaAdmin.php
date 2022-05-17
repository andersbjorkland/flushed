<?php

use SilverStripe\Admin\ModelAdmin;

class SchemaAdmin extends ModelAdmin
{
    private static $managed_models = [
        ExerciseSchemaTemplate::class
    ];

    private static $url_segment = 'schemas';

    private static $menu_title = 'Build Schemas';
}