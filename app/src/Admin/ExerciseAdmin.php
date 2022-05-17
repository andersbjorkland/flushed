<?php

use SilverStripe\Admin\ModelAdmin;

class ExerciseAdmin extends ModelAdmin
{
    private static $managed_models = [
        ExerciseCategory::class
    ];

    private static $url_segment = 'exercises';

    private static $menu_title = 'Manage Exercises';
}