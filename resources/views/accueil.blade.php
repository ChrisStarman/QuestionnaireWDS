@include('head')

@section('title', 'Accueil')

<body>
    <h1 class="pt-4">Bienvenue sur le test de positionnement</h1>
    <div class="text-center mb-4">
    <img src="{{ asset('images/logo_hd_ecole.png') }}" alt="logo WDS" class="logo_index" />
    </div>
    <div class="conteneur-flex">
        <h2 class="pb-3">Filière Développement</h2>
        <div class="flexbox mb-4">
            <a href="{{ route('questionnaire', ['titre' => 'developpement']) }}" class="text-center bouton">
                <p>Questionnaire
                    Développement</p>
            </a>
            <a href="{{ route('questionnaire', ['titre' => 'anglais']) }}" class="text-center bouton">
                <p>Questionnaire Anglais</p>
            </a>
        </div>
        <h2 class="pb-3">Filière Design</h2>
        <div class="flexbox mb-4">
            <a href="{{ route('questionnaire', ['titre' => 'uiuxdesign']) }}" class="text-center bouton">
                <p>Questionnaire UI/UX
                    Design</p>
            </a>
            <a href="{{ route('questionnaire', ['titre' => 'anglais']) }}" class="text-center bouton">
                <p>Questionnaire Anglais</p>
            </a>
        </div>
        <h2 class="pb-3">Filière DevOps</h2>
        <div class="flexbox mb-4">
            <a href="{{ route('questionnaire', ['titre' => 'devops']) }}" class="text-center bouton">
                <p>Questionnaire DevOps</p>
            </a>
            <a href="{{ route('questionnaire', ['titre' => 'anglais']) }}" class="text-center bouton">
                <p>Questionnaire Anglais</p>
            </a>
        </div>
        <h2 class="pb-3">Filière Marketing</h2>
        <div class="flexbox mb-4">
            <a href="{{ route('questionnaire', ['titre' => 'cpn']) }}" class="text-center bouton">
                <p>Questionnaire CPN</p>
            </a>
            <a href="{{ route('questionnaire', ['titre' => 'anglais']) }}" class="text-center bouton">
                <p>Questionnaire Anglais</p>
            </a>
        </div>
    </div>
</body>

</html>
