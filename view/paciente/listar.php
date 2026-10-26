
<?php
use App\Paciente;

include('../includes/cabecalho.php');
include('../includes/menu.php');
include('../includes/rodape.php');
$pacientes = Paciente::listar(null,'nome desc');

?>

<main class="container">
    <h1 class="text-center">Lista de Pacientes</h1>
    <div class="text-end my-2">
        <button class="btn btn-success">Novo Paciente</button>
    </div>

    <table class="table table-hover">
        <thead class="table-pimary">
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Convênio</th>
                <th>Observação</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($pacientes)) { ?>

                <?php foreach ($pacientes as $paciente) { ?>
                    <tr>
                        <td><?= htmlspecialchars($paciente->nome ?? '') ?></td>
                        <td><?= htmlspecialchars($paciente->cpf ?? '') ?></td>
                        <td><?= htmlspecialchars($paciente->data_nascimento ?? '') ?></td>
                        <td><?= htmlspecialchars($paciente->telefone ?? '') ?></td>
                        <td><?= htmlspecialchars($paciente->email ?? '') ?></td>
                        <td><?= htmlspecialchars($paciente->endereco ?? '') ?></td>
                        <td><?= htmlspecialchars($paciente->convenio ?? '') ?></td>
                        <td><?= htmlspecialchars($paciente->observacao ?? '') ?></td>

                        <td>
                            <a class="btn btn-primary btn-sm"
                               href="editar.php?id=<?= (int) $paciente->id ?>">
                                Editar
                            </a>

                            <a class="btn btn-danger btn-sm"
                               href="/consultorio/action/action_paciente.php?action=excluir&id=<?= (int) $paciente->id ?>"
                               onclick="return confirm('Deseja realmente excluir este paciente?')">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="9">
                        Nenhum paciente encontrado.
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</main>

<?php
require_once('../includes/rodape.php');
?>
