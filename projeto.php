<?php
$pageTitle = "Projetos";
include 'config.php';
?>
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
    <link rel="shortcut icon" href="img/icon.jpg" type="image/x-icon">

</head>
<body>
<div class="container">
    <h1 class="mb-4">Meus Projetos</h1>
    
    <!-- Projetos em Destaque (pode adicionar manualmente) -->
    <div class="row mb-5">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <img src="img/mt.jpg" class="card-img-top" alt="Projeto 1">
                <div class="card-body">
                    <h5 class="card-title">Projeto 1</h5>
                    <p class="card-text">Descrição do seu projeto. Explique o que ele faz, quais tecnologias usou, etc.</p>
                    <p>
                        <span class="badge bg-primary">PHP</span>
                        <span class="badge bg-success">MySQL</span>
                        <span class="badge bg-info">Bootstrap</span>
                    </p>
                    <a href="#" class="btn btn-primary">Ver Demo</a>
                    <a href="#" class="btn btn-outline-dark">GitHub</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <img src="img/logo.jpg" class="card-img-top" alt="Projeto 2">
                <div class="card-body">
                    <h5 class="card-title">Projeto 2</h5>
                    <p class="card-text">Descrição do seu projeto. Explique o que ele faz, quais tecnologias usou, etc.</p>
                    <p>
                        <span class="badge bg-warning text-dark">JavaScript</span>
                        <span class="badge bg-danger">React</span>
                        <span class="badge bg-info">Bootstrap</span>
                    </p>
                    <a href="#" class="btn btn-primary">Ver Demo</a>
                    <a href="#" class="btn btn-outline-dark">GitHub</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Repositórios do GitHub -->
    <h2 class="mb-4">Repositórios GitHub</h2>
    <div class="row">
        <?php
        $repos = getGitHubRepos(GITHUB_USERNAME, 12);
        
        if (!empty($repos)) {
            foreach ($repos as $repo) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fab fa-github"></i> <?php echo $repo['name']; ?>
                            </h5>
                            <p class="card-text"><?php echo $repo['description'] ?? 'Sem descrição disponível'; ?></p>
                            <div class="mb-2">
                                <?php if ($repo['language']): ?>
                                    <span class="badge bg-primary"><?php echo $repo['language']; ?></span>
                                <?php endif; ?>
                            </div>
                            <p>
                                <i class="fas fa-star text-warning"></i> <?php echo $repo['stargazers_count']; ?>
                                <i class="fas fa-code-branch text-success ms-2"></i> <?php echo $repo['forks_count']; ?>
                            </p>
                            <a href="<?php echo $repo['html_url']; ?>" target="_blank" class="btn btn-sm btn-outline-dark">
                                Ver no GitHub
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="col-12"><div class="alert alert-info">Configure seu GitHub no config.php</div></div>';
        }
        ?>
    </div>
</div>
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

