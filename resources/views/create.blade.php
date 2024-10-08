<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Estudante</title>
</head>
<body>
    <h1>Cadastrar Estudante</h1>

    <form action="{{ route('estudantes.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" required>

        <button type="submit">Cadastrar</button>
    </form>

    <a href="{{ route('estudantes.index') }}">Voltar para a lista de estudantes</a>
</body>
</html>
