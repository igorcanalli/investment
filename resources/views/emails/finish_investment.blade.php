<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h4>Investimento feito com Sucesso</h4>

    <p> Valor: R$ {{$data->value}} </p>

    <p> Data: R$ {{ date('d/m/Y H:i:s', strtotime($data->created_at)) }} </p>
    
</body>
</html>