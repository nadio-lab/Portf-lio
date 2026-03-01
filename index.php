<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Portfólio - Desenvolvedor Full Stack</title>
    
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="css/all.min.css">
    
    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">

    <!-- icon bem personalizado -->
    <link rel="shortcut icon" href="Img/icon.jpg" type="image/x-icon">
</head>
<body>
    <!-- Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"> <span style="color:#0c5fbb; ">Dev.</span>Domingos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'sobre.php' ? 'active' : ''; ?>" href="sobre.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'projetos.php' ? 'active' : ''; ?>" href="projeto.php">Projetos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contato.php' ? 'active' : ''; ?>" href="contacto.php">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main>
<!-- Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container text-center">
        <img src="Img/photo.png" alt="Sua Foto" class="rounded-circle mb-4" width="150" height="150">
        <h1 class="display-4">Olá, eu sou Domingos Pongolola</h1>
        <p class="lead">Desenvolvedor Full Stack Web</p>
        <div class="mt-4">
            <a href="projeto.php" class="btn btn-light btn-lg me-2">Ver Projetos</a>
            <a href="contacto.php" class="btn btn-outline-light btn-lg">Contato</a>
        </div>
    </div>
</section>

<!-- Tecnologias -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Tecnologias que Domino</h2>
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3">
                <i class="fab fa-php fa-3x mb-2 text-primary"></i>
                <p>PHP</p>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <i class="fab fa-js fa-3x mb-2 text-warning"></i>
                <p>JavaScript</p>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <i class="fab fa-html5 fa-3x mb-2 text-danger"></i>
                <p>HTML5</p>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <i class="fab fa-css3-alt fa-3x mb-2 text-info"></i>
                <p>CSS3</p>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <i class="fab fa-bootstrap fa-3x mb-2 text-purple"></i>
                <p>Bootstrap</p>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <i class="fab fa-laravel fa-3x mb-2 text-danger"></i>
                <p>Laravel</p>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <i class="fas fa-database fa-3x mb-2 text-success"></i>
                <p>MySQL</p>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <i class="fab fa-git-alt fa-3x mb-2 text-orange"></i>
                <p>Git</p>
            </div>
        </div>
    </div>
</section>

<!-- Últimos Projetos -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Últimos Projetos</h2>
        <div class="row">
            <?php
            // Buscar repositórios do GitHub via API
            $username = "SEU-USERNAME-GITHUB";
            $url = "https://api.github.com/users/{$username}/repos?sort=updated&per_page=3";
            
            $options = [
                'http' => [
                    'header' => "User-Agent: PHP\r\n"
                ]
            ];
            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
            $repos = json_decode($response, true);
            
            if ($repos && !isset($repos['message'])) {
                foreach ($repos as $repo) {
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $repo['name']; ?></h5>
                                <p class="card-text"><?php echo $repo['description'] ?? 'Sem descrição'; ?></p>
                                <p>
                                    <span class="badge bg-primary">⭐ <?php echo $repo['stargazers_count']; ?></span>
                                    <span class="badge bg-success">🍴 <?php echo $repo['forks_count']; ?></span>
                                    <?php if ($repo['language']): ?>
                                        <span class="badge bg-info"><?php echo $repo['language']; ?></span>
                                    <?php endif; ?>
                                </p>
                                <a href="<?php echo $repo['html_url']; ?>" target="_blank" class="btn btn-outline-primary">Ver no GitHub</a>
                                <?php if ($repo['homepage']): ?>
                                    <a href="<?php echo $repo['homepage']; ?>" target="_blank" class="btn btn-outline-success">Demo</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-center">Não foi possível carregar os repositórios.</p>';
            }
            ?>
        </div>
        <div class="text-center mt-3">
            <a href="projeto.php" class="btn btn-primary">Ver todos os projetos</a>
        </div>
    </div>
</section>
          </main>
    
    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <div class="mb-3">
                <a href="https://github.com/seuusername" target="_blank" class="text-white me-3">
                    <i class="fab fa-github fa-2x"></i>
                </a>
                <a href="https://linkedin.com/in/seuusername" target="_blank" class="text-white me-3">
                    <i class="fab fa-linkedin fa-2x"></i>
                </a>
                <a href="mailto:seuemail@email.com" class="text-white">
                    <i class="fas fa-envelope fa-2x"></i>
                </a>
            </div>
            <p>&copy; <?php echo date('Y'); ?> Seu Nome. Todos os direitos reservados.</p>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <!-- Seu JS personalizado -->
    <script src="js/script.js"></script>
</body>
</html>