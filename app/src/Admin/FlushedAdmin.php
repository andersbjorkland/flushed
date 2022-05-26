<?php

use SilverStripe\Admin\ModelAdmin;

class FlushedAdmin extends ModelAdmin
{
    private static $url_segment = 'flushed';
    private static $menu_title = 'Flushed';
    private static $menu_icon_class = 'font-icon-p-book';

    private static $managed_models = [
        ExerciseDay::class
    ];
}
