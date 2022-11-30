<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar com JavaScript</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <h2>Listar usuarios</h2>
    <span id="conteudo"></span>

    <script>
        $(document).ready(function() {
            $.post('listar_usuarios.php', function(retorna) {
                //Subtitui o valor no seletor id="conteudo"
                $("#conteudo").html(retorna);
            });
        });
    </script>
</body>

</html>