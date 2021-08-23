<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Cajui</title>
</head>

<body>
    <nav class="green darken-3">
        <a href="/" class="brand-logo center">CAJUÍ</a>
        <ul>
            <li><a href="{{route('disciplinas.index')}}">Disciplinas</a>
            </li>
            <li><a href="{{route('professor.index')}}">Professores</a></li>
        </ul>
    </nav>
    <div class="container ">
        @yield('conteudo-principal')
    </div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        @if(session('sucesso'))
        M.toast({
            html: "{{session('sucesso')}}",
            classes: 'rounded'
        });
        @endif



        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>

</html>
