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
    <link rel="stylesheet" href="css/tyle.css">


    <!-- icon bem personalizado -->
    <link rel="shortcut icon" href="img/icon.jpg" type="image/x-icon">

</head>
<body>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-center mb-4">Entre em Contato</h2>
                
                <?php
                // Mostrar mensagem de sucesso/erro
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'success') {
                        echo '<div class="alert alert-success">Mensagem enviada com sucesso! Entrarei em contato em breve.</div>';
                    } elseif ($_GET['status'] == 'error') {
                        echo '<div class="alert alert-danger">Erro ao enviar mensagem. Tente novamente ou verifica a internet.</div>';
                    }
                }
                ?>
                
                <form action="proc_contato.php" method="POST" class="bg-light p-4 rounded">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome *</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="assunto" class="form-label">Assunto *</label>
                        <input type="text" class="form-control" id="assunto" name="assunto" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Mensagem *</label>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    </div>
</section>
       
    
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
</html