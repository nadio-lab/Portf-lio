<?php
$pageTitle = "Sobre";
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
    <link rel="stylesheet" href="/css/all.min.css">
    
    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- icon bem personalizado -->
    <link rel="shortcut icon" href="img/icon.jpg" type="image/x-icon">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-4">Sobre Mim</h1>
            
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Quem sou eu</h5>
                    <p class="card-text">
                        Sou um desenvolvedor full stack com paixão por criar soluções web elegantes e funcionais. 
                        Com experiência em diversas tecnologias, busco sempre entregar projetos de alta qualidade 
                        que atendam às necessidades dos usuários.
                    </p>
                </div>
            </div>
            
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Experiência</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Desenvolvedor Full Stack</strong> - Empresa X (2022 - Presente)
                        </li>
                        <li class="list-group-item">
                            <strong>Desenvolvedor Web</strong> - Empresa Y (2020 - 2022)
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Formação</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Análise e Desenvolvimento de Sistemas</strong> - Universidade X
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
