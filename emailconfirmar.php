<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/cadastrar.css" />

  <!-- script do croppie (ainda é necessario revisar para implementar) -->
  <link rel="stylesheet" href="croppie.css" />
  <script src="croppie.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <link rel="stylesheet" href="../css/bootsrap.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Cadastrar</title>
</head>

<body>
  <div class="section">
    <div class="container">
      <div class="imgborder">
        <div class="inputs">
          <!-- logo junto com nome -->
          <div class="logocenter">
            <a style="text-decoration: none" href="/"><img src="../img/logo.png" alt="logoicon" /><br />
              KoftTec
            </a>
          </div>
          <h1 style="text-align: center;">Você foi cadastrado com sucesso!!!</h1>
          <?php if (isset($_POST['partEmail']))
            $site = $_POST['partEmail']; ?>

          <button class='comeback' onclick="location.href= <?php echo "'https://$site.com'"; ?>">
            Ir para email
          </button>
          <!-- <button class="comeback" onclick="location.href= 'https://gmail.com'">
            Ir para email
          </button> -->
          <!------------------------->
        </div>
      </div>
    </div>
  </div>
</body>

</html>