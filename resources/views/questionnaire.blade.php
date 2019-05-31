@extends("templatequestionnaire")

@section("titre", "Questionnaire ".$titre)

@section("contenuquestionnaire")

<h1 class="pt-4 pb-3">Questionnaire {{ $questionnaire->nom }}</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-7 mx-auto">
            <form>
                @csrf
                <ul>
                    <div class="mb-3 infoscandidat">
                        <li class="mb-0"><label for="email">Adresse e-mail</label><br>
                            <input class="mt-0" type="email" name="email"/></li>
                    </div>
                    <div class="infoscandidat">
                        <li class="mb-0"><label for="nom">NOM</label><br>
                            <input class="mt-0" type="text" name="nom"/></li>
                    </div>
                    <div class="infoscandidat">
                        <li class="mb-0"><label for="prenom">Prénom</label><br>
                            <input class="mt-0" type="text" name="prenom"/></li>
                    </div>
                    @foreach ($request->session()->get("questions") as $unequestion)
                    <div class="mb-2">
                    <li class="mb-2" class="questions">{{ $unequestion->intitule_question }}</li>
                    <li>
                        <ul class="reponses">
                            @foreach ($request->session()->get("reponses") as $unereponse)
                            @if ($unequestion->id_question == $unereponse->id_question)
                            <li><input type="{{ $unequestion->type }}" name="{{ $unequestion->id_question }}[]"
                                value="{{ $unereponse->id_reponse }}"/>
                                <label for="{{ $unequestion->id_question }}">{{ $unereponse->intitule_reponse }}</label></li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                    </div>
                    @endforeach
                </ul>
                <div class="mb-4 mx-auto boutonvalider">
                    <input type="button" id="valider" value="Valider" class="text-center">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section("script")
<script type="text/javascript" src="{{ asset('js/verificationreponses.js') }}"></script>
@endsection
