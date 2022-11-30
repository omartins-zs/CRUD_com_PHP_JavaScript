<?php
include_once "../include/conexao.php";

//consultar no banco de dados
$result_usuario = "SELECT * FROM usuarios ORDER BY id ASC";
$resultado_usuario = mysqli_query($conn, $result_usuario);


//Verificar se encontrou resultado na tabela "usuarios"
if (($resultado_usuario) and ($resultado_usuario->num_rows != 0)) {
?>
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>E-mail</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
			?>
				<tr>
					<th><?= $row_usuario['id']; ?></th>
					<td><?= $row_usuario['nome']; ?></td>
					<td><?= $row_usuario['email']; ?></td>
				</tr>
			<?php
			} ?>
		</tbody>
	</table>
<?php
} else {
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
