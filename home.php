<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cálculo Salário Líquido</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
  <div class="text-center mt-3">
    <h2>Calcular Salário</h2>
    
      <div class="container text-center">
        <div class="row align-items-center justify-content-center">
          <div class="col-6 ">

            <form method="$_GET">
              <div class="text-start mb-4">
                <label class="form-label">Salário Bruto:</label>
                <input type="text" class="form-control" name="salarioBruto">
              </div>
              <div class="text-start mb-4">
                <label class="form-label">Numero de dependentes:</label>
                <input type="text" class="form-control" name="dependentes">
              </div>
              <div class="mb-4">
                <button type="submit" class="btn btn-success ">Calcular</button>
              </div>
            </form>
          </div>
          <h1>Resultado</h1>

          <div class="textoFInal">

            <?php 
            include "./index.php";

            if (isset($_GET['salarioBruto']) && isset($_GET['dependentes'])) {
              echo calcularINSS($salarioBruto);
            }
            ?>
          </div>
        </div>
      </div>
    
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>