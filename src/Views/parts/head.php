<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php if(isset($title)) {
            echo $title;
        }?>
    </title>
    <link href="/public/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/darkly/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/public/img/logo.png">
</head>
<body>
<nav class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: rgba(0, 0, 0, 0.05);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="public/img/logo.png" height="50" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        </li>
        <?php if (!isset($_SESSION['user'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="/login">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register" >Inscription</a>
          </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="/task">Accueil
                <span class="visually-hidden">(current)</span>
              </a>

          <li class="nav-item">
            <a class="nav-link" href="/logout" >Déconnexion</a>
          </li>
          <?php } ?>
      </ul>
    </div>
  </div>
</nav>
