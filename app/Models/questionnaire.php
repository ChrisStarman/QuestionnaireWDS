<?php

namespace App\Models;

class Questionnaire
{
    public $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }
}