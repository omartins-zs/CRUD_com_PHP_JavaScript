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
    <div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visulUsuarioModalLabel">Detalhes do Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="visul_usuario"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
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
        $(document).ready(function() {
            $(document).on('click', '.view_data', function() {
                var user_id = $(this).attr("id");
                //alert(user_id);
                //Verificar se há valor na variável "user_id".
                if (user_id !== '') {
                    var dados = {
                        user_id: user_id
                    };
                    $.post('visualizar.php', dados, function(retorna) {
                        //Carregar o conteúdo para o usuário
                        $("#visul_usuario").html(retorna);
                        $('#visulUsuarioModal').modal('show');
                    });
                }
            });
        });
    </script>
</body>

</html>