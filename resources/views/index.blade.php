<!DOCTYPE html>
<html>
<head>
    <title>Lista de Estudantes</title>
</head>
<body>
    <h1>Estudantes Cadastrados</h1>
    <a href="{{ route('estudantes.create') }}">Cadastrar Novo Estudante</a>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('alunos.store')}}" method="POST">
    @csrf

<label>Nome: </label>
    <input type="text" name="nome" id="nome" placeholder="Nome da conta" required><br><br>    

    <label>email: </label>
    <input type="text" name="email" id="email" placeholder="Usar endereço de email" required><br><br>

    <label>data de nascimento: </label>
    <input type="date" name="data de nascimento" id="data de nascimento" required><br><br>
    <label>Senha: </label>
    <input type="text" name="password" id="password"><br><br>    

    <button type="submit">Cadastrar</button>

</form>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ $aluno->idade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
