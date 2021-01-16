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
        'personal' => 'Pessoal',
        'professional' => 'Profissional',
    ],

    // Priorities table default registers
    'priority' => [
        'low' => 'Baixa',
        'medium' => 'Média',
        'high' => 'Alta'
    ],

    // States table default registers
    'state' => [
        'pending' => 'Pendente',
        'completed' => 'Concluído',
        'shelved' => 'Arquivado',
    ],

    // Defaults
    'default' => [
        'task-name' => 'Uma tafera :category :state de :priority prioridade'
    ],

];
