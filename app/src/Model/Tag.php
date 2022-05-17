<?php

use SilverStripe\ORM\DataObject;

class Tag extends DataObject
{
    private static $db = [
        "Name" => "Varchar"
    ];

    private static $has_many = [
        "Objects" => DataObject::class
    ];
}