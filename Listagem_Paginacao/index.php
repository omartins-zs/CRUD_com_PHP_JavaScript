<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar com JavaScript e Paginação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <h1 class="display-4 text-center">Listar Usuarios</h1>
        <span id="conteudo"></span>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var qnt_result_pg = 50; //quantidade de registro por página
        var pagina = 1; //página inicial
        $(document).ready(function() {
            listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
        });

        function listar_usuario(pagina, qnt_result_pg) {
            var dados = {
                pagina: pagina,
                qnt_result_pg: qnt_result_pg
            }
            $.post('listar_usuarios.php', dados, function(retorna) {
                //Subtitui o valor no seletor id="conteudo"
                $("#conteudo").html(retorna);
            });
        }
    </script>
</body>

</html>