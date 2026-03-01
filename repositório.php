<?php
$pageTitle = "Repositórios GitHub";
include 'includes/config.php';
include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Portfólio - Desenvolvedor Full Stack</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" href="assets/css/style.css">

    
    <!-- icon bem personalizado -->
    <link rel="shortcut icon" href="img/icon.jpg" type="image/x-icon">

</head>
<body>
<div class="container">
    <!-- Cabeçalho da página -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-5 mb-3">
                <i class="fab fa-github text-dark"></i> Meus Repositórios no GitHub
            </h1>
            <p class="lead">Confira todos os meus projetos open source disponíveis no GitHub</p>
            <a href="https://github.com/<?php echo GITHUB_USERNAME; ?>" target="_blank" class="btn btn-dark">
                <i class="fab fa-github"></i> Ver perfil completo no GitHub
            </a>
        </div>
    </div>

    <!-- Filtros (opcional) -->
    <div class="row mb-4">
        <div class="col-md-6 mx-auto">
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
                <input type="text" id="filtroRepos" class="form-control" placeholder="Filtrar repositórios...">
            </div>
        </div>
    </div>

    <!-- Lista de Repositórios -->
    <div class="row" id="repos-container">
        <?php
        // Buscar MAIS repositórios (aumentei o limite para 30)
        $repos = getGitHubRepos(GITHUB_USERNAME, 30);
        
        if (!empty($repos)) {
            foreach ($repos as $repo) {
                // Pular repositórios forks se quiser (opcional)
                // if ($repo['fork']) continue;
                ?>
                <div class="col-lg-4 col-md-6 mb-4 repo-item">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0">
                                    <i class="fab fa-github"></i> 
                                    <?php echo $repo['name']; ?>
                                </h5>
                                <?php if ($repo['private']): ?>
                                    <span class="badge bg-secondary">Privado</span>
                                <?php else: ?>
                                    <span class="badge bg-success">Público</span>
                                <?php endif; ?>
                            </div>
                            
                            <p class="card-text"><?php echo $repo['description'] ?? '<span class="text-muted">Sem descrição</span>'; ?></p>
                            
                            <!-- Tecnologias e estatísticas -->
                            <div class="mb-3">
                                <?php if ($repo['language']): ?>
                                    <span class="badge bg-primary"><?php echo $repo['language']; ?></span>
                                <?php endif; ?>
                                
                                <?php if ($repo['stargazers_count'] > 0): ?>
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-star"></i> <?php echo $repo['stargazers_count']; ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ($repo['forks_count'] > 0): ?>
                                    <span class="badge bg-success">
                                        <i class="fas fa-code-branch"></i> <?php echo $repo['forks_count']; ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ($repo['has_issues']): ?>
                                    <span class="badge bg-info">
                                        <i class="fas fa-exclamation-circle"></i> <?php echo $repo['open_issues_count']; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Datas -->
                            <div class="small text-muted mb-3">
                                <i class="fas fa-calendar-alt"></i> Criado: <?php echo date('d/m/Y', strtotime($repo['created_at'])); ?><br>
                                <i class="fas fa-clock"></i> Último update: <?php echo date('d/m/Y', strtotime($repo['updated_at'])); ?>
                            </div>
                            
                            <!-- Links -->
                            <div class="d-grid gap-2">
                                <a href="<?php echo $repo['html_url']; ?>" target="_blank" class="btn btn-outline-dark btn-sm">
                                    <i class="fab fa-github"></i> Ver código
                                </a>
                                <?php if ($repo['homepage']): ?>
                                    <a href="<?php echo $repo['homepage']; ?>" target="_blank" class="btn btn-outline-success btn-sm">
                                        <i class="fas fa-external-link-alt"></i> Demo ao vivo
                                    </a>
                                <?php endif; ?>
                                <?php if ($repo['has_pages']): ?>
                                    <a href="https://<?php echo GITHUB_USERNAME; ?>.github.io/<?php echo $repo['name']; ?>/" target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-globe"></i> GitHub Pages
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Footer do card com informações extras -->
                        <div class="card-footer bg-transparent small">
                            <div class="d-flex justify-content-between">
                                <span title="Clone URL">
                                    <i class="fas fa-link"></i> 
                                    <?php 
                                    if ($repo['clone_url']) {
                                        echo substr($repo['clone_url'], 0, 30) . '...';
                                    }
                                    ?>
                                </span>
                                <span>
                                    <i class="fas fa-eye"></i> <?php echo $repo['watchers_count']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="col-12"><div class="alert alert-warning text-center">
                <i class="fas fa-exclamation-triangle"></i> 
                Não foi possível carregar os repositórios. Verifique:
                <ul class="mt-2">
                    <li>Se o username no arquivo config.php está correto: <strong>' . GITHUB_USERNAME . '</strong></li>
                    <li>Sua conexão com a internet</li>
                    <li>Se o GitHub está acessível</li>
                </ul>
                <a href="https://github.com/' . GITHUB_USERNAME . '" target="_blank" class="btn btn-primary mt-2">
                    <i class="fab fa-github"></i> Acessar GitHub diretamente
                </a>
            </div></div>';
        }
        ?>
    </div>

    <!-- Estatísticas (se quiser mostrar) -->
    <?php if (!empty($repos)): 
        $totalStars = array_sum(array_column($repos, 'stargazers_count'));
        $totalForks = array_sum(array_column($repos, 'forks_count'));
        $languages = array_count_values(array_filter(array_column($repos, 'language')));
        arsort($languages);
        $topLang = key($languages) ?? 'N/A';
    ?>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="card-title">Estatísticas do GitHub</h5>
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h3><?php echo count($repos); ?></h3>
                            <p>Repositórios</p>
                        </div>
                        <div class="col-md-4">
                            <h3><?php echo $totalStars; ?></h3>
                            <p>Estrelas totais</p>
                        </div>
                        <div class="col-md-4">
                            <h3><?php echo $totalForks; ?></h3>
                            <p>Forks totais</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- JavaScript para o filtro -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filtro = document.getElementById('filtroRepos');
    if (filtro) {
        filtro.addEventListener('keyup', function() {
            const termo = this.value.toLowerCase();
            const repos = document.querySelectorAll('.repo-item');
            
            repos.forEach(function(repo) {
                const titulo = repo.querySelector('.card-title').innerText.toLowerCase();
                const descricao = repo.querySelector('.card-text').innerText.toLowerCase();
                
                if (titulo.includes(termo) || descricao.includes(termo)) {
                    repo.style.display = '';
                } else {
                    repo.style.display = 'none';
                }
            });
        });
    }
});
</script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Seu JS personalizado -->
    <script src="assets/js/script.js"></script>
</body>
</html>
<?php include 'includes/footer.php'; ?>
