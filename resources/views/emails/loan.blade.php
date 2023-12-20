<!DOCTYPE html>
<html>
<head>
    <title>Notificação de Empréstimo</title>
</head>
<body>
    <p>Olá {{ $collaborator->name }},</p>
    <p>Você realizou um empréstimo com sucesso. Abaixo estão os detalhes:</p>
    <ul>
        <li><strong>Título do Livro:</strong> {{ $loan->copy->book->title }}</li>
        <li><strong>Data do Empréstimo:</strong> {{ Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</li>
        <li><strong>Data de Devolução Esperada:</strong> {{ Carbon\Carbon::parse($loan->expected_return_date)->format('d/m/Y') }}</li>
    </ul>
</body>
</html>
