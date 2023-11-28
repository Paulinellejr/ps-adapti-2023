{{-- Front-end começa aqui! --}}

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('site') }}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('site') }}/img/Logosite.png" type="image/x-icon">
    <title>CampusConnectHub</title>
</head>

<body id="Corpo">
    <header id="cabeçalho">
        <a href="#" class="Logo-Nome">
            <img src="{{ asset('site') }}/img/Logosite.png" alt="Logo" class="Logo">
            <div class="Nome">CampusConnectHub</div>
        </a>
        <div class="Adm_dark">
            <a href="./login" class="adm"></a>
            <div class="Darkmode" onclick="toggleDarkMode()" id="Mudartema" aria-checked="false"></div>
        </div>
    </header>
    <main id="Principal">
        <div id="container_cards">
            @foreach ($alunos as $aluno)
                <div class="card">
                    <img src="{{ url($aluno->imagem) }}" alt="Candidato">
                    <div class="Info-Candidato">
                        <ul>
                            <li>Nome: <div class="Info"> {{ $aluno->nome }} </div>
                            </li>
                            @foreach ($cursos as $curso)
                                @if ($aluno->curso_id == $curso->id)
                                    <li> Curso: <div class="Info"> {{ $curso->curso }} </div>
                                    </li>
                                @endif
                            @endforeach
                            <li>Formado: <div class="Info">{{ $aluno->formado != '1' ? 'Nâo' : 'Sim' }}</div>
                            </li>
                            <li>Descrição: <div class="Info-Descrição"> {{ $aluno->descricao }} </div>
                            </li>
                        </ul>
                    </div>
                    @if ($aluno->contratado)
                        <p class="contratado">Contratado</p>
                    @else
                        <form action="{{ route('aluno.contratar', $aluno) }}" method="post" class="Botao">
                            @csrf
                            <button class="Botao_Contratar" type="submit"> Contratar </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </main>
    <script src="{{ asset('site') }}/js/script.js"></script>
</body>

</html>
