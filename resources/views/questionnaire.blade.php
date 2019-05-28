@extends('templatequestionnaire')

@section('titre', 'Questionnaire '.$titre)

@section('contenuquestionnaire')

<h1 class="pt-4 pb-3">Questionnaire {{ $questionnaire->nom }}</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-7 mx-auto">
            <form>
                @csrf
                <ul>
                    <div class="mb-3">
                        <li class="mb-0"><label for="email">Adresse e-mail</label><br>
                            <input class="mt-0" type="email" name="email"/></li>
                        <li class="mb-0"><label for="nom">NOM</label><br>
                            <input class="mt-0" type="text" name="nom"/></li>
                        <li class="mb-0"><label for="prenom">Prénom</label><br>
                            <input class="mt-0" type="text" name="prenom"/></li>
                    </div>
                    @foreach ($request->session()->get('questions') as $unequestion)
                    <div class="mb-2">
                    <li class="mb-2" class="questions">{{ $unequestion->intitule_question }}</li>
                    <li>
                        <ul class="reponses">
                            @foreach ($request->session()->get('reponses') as $unereponse)
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

@section('script')
<script>
    var button = document.getElementById('valider');
    button.onclick = function () {
        var valide;
        var reponses = document.getElementsByClassName('reponses');
        for (let reponse of reponses) {
            valide = false;
            var inputs = reponse.querySelectorAll('.reponses input');
            inputs.forEach((input) => {
                if (input.checked) {
                    valide = true;
                }
            if (valide === false) {
                reponse.parentNode.previousSibling.previousSibling.setAttribute("id", "requis");
                return;
            } else {
                return;
            }
            });
        }
        if (valide) {
            console.log('succès');
        } else {
            console.log('erreur');
            document.getElementById("requis").scrollIntoView({behavior:"smooth"});
        }
        document.getElementById("requis").removeAttribute("id");
    }
</script>
@endsection
