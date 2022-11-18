<?php
session_start();
include_once('../logar/redirecionamento.php');
include_once('../classe/UsuarioSQL.php');
echo $_SESSION['sessao'];
echo $_SESSION['id'];
?>
<select class='form-select' aria-label='Default select example'>;
    <option value='$n[idstatus]' selected>desc_status</option>;
    <option value='$n[idstatus]'>desc_status</option>;
    <option value='$n[idstatus]'>desc_status</option>;

</select>
bom dia meu amor

<form method=post>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name=sair>sair</button>
</form>
<?php
if (isset($_POST['sair'])) {
    $_SESSION['sessao'] = '';
    echo  "<script>window.location.href = '../index.php'</script>";
}

?>