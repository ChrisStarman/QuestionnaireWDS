<?php

namespace App\Http\Controllers;

use App\Models\Questionnaires;
use Illuminate\Http\Request;


class QuestionnaireWDSController extends Controller
{
    //Page d'accueil
    public function accueil()
    {
        return response()
            ->view('accueil', [], 200)
            ->header('content-type', 'text/html');
    }

    //Pages questionnaire
    public function pagequestionnaire(Request $request, Questionnaires $is, $titre)
    {
        //Définit le titre des pages
        $questionnaires = $is->getQuestionnaires($titre);
        switch ($titre) {
            case ('developpement'):
                $titre = 'Développement';
                $questionnaire = $questionnaires[$titre];
                break;
            case ('cpn'):
                $titre = 'Chef de Projet Numérique';
                $questionnaire = $questionnaires[$titre];
                break;
            case ('uiuxdesign'):
                $titre = 'UI/UX Design';
                $questionnaire = $questionnaires[$titre];
                break;
            case ('devops'):
                $titre = 'DevOps';
                $questionnaire = $questionnaires[$titre];
                break;
            case ('anglais'):
                $titre = 'Anglais';
                $questionnaire = $questionnaires[$titre];
                break;
        }

        //Requêtes en base de données

        //Sélectionne 3 questions du questionnaire souhaité + les réponses
        $questions = \DB::select(
            "SELECT *
        FROM questions
        WHERE filiere = '$titre'
        ORDER BY RAND()
        LIMIT 3"
        );
        $request->session()->put('questions', $questions);

        $resultatquestionid = array();
        foreach ($request->session()->get('questions') as $unequestion) {
            $resultatquestionid[] = $unequestion->id_question;
        }

        $reponses = \DB::select(
            "SELECT *
        FROM reponses
        WHERE reponses.id_question
        IN (" . implode(', ', $resultatquestionid) . ")"
        );
        $request->session()->put('reponses', $reponses);

        return response()
            ->view('questionnaire', compact(['titre', 'questionnaire', 'i', 'request']), 200)
            ->header('content-type', 'text/html');
    }

    //Page de résultats au questionnaire + envoi des données en bdd
    public function pageresultats(Request $request)
    {
        return response()
            ->view('resultats', compact(['request']), 200)
            ->header('content-type', 'text/html');
    }

    //Page de connexion à l'espace d'administration
    public function connexionadmin()
    {
        return response()
            ->view('connexion-administration', [], 200)
            ->header('content-type', 'text/html');
    }
}