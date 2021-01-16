<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Data Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used on creation of of default registers
    | directly on database. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    // Categories table default registers
    'category' => [
        'personal' => 'Personal',
        'professional' => 'Professional',
    ],

    // Priorities table default registers
    'priority' => [
        'low' => 'Low',
        'medium' => 'Medium',
        'high' => 'High'
    ],

    // States table default registers
    'state' => [
        'pending' => 'Pending',
        'completed' => 'Completed',
        'shelved' => 'Shelved',
    ],

    // Defaults
    'default' => [
        'task-name' => 'A :category :state :priority priority level Task'
    ],

];
