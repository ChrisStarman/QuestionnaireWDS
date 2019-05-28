<?php

namespace App\Models;

class Questionnaires
{
    private $questionnaires = array();

    public function __construct()
    {
        $questionnairedeveloppement = new Questionnaire('Développement');
        $questionnaireuiuxdesign = new Questionnaire('UI/UX Design');
        $questionnairedevops = new Questionnaire('DevOps');
        $questionnairecpn = new Questionnaire('Chargé de Projet Numérique');
        $questionnaireanglais = new Questionnaire('Anglais');

        $this->questionnaires[$questionnairedeveloppement->nom] = $questionnairedeveloppement;
        $this->questionnaires[$questionnaireuiuxdesign->nom] = $questionnaireuiuxdesign;
        $this->questionnaires[$questionnairedevops->nom] = $questionnairedevops;
        $this->questionnaires[$questionnairecpn->nom] = $questionnairecpn;
        $this->questionnaires[$questionnaireanglais->nom] = $questionnaireanglais;
    }

    //Retourne la liste des questionnaires
    public function getQuestionnaires()
    {
        return $this->questionnaires;
    }

    public function getQuestionnaire($nom)
    {
        return $this->questionnaires[$nom];
    }
}