<?php
// Configurações do site
define('SITE_NAME', 'Meu Portfólio');
define('SITE_AUTHOR', 'Domingos Pongolola');

// GitHub
define('GITHUB_USERNAME', 'rodriguespongolola47@gmail.com'); // COLOQUE SEU GITHUB AQUI

// E-mail para contato
define('CONTACT_EMAIL', 'rodriguespongolola47@gmail.com');

// Função para buscar repositórios do GitHub
function getGitHubRepos($username = GITHUB_USERNAME, $limit = 6) {
    $url = "https://api.github.com/users/{$username}/repos?sort=updated&per_page={$limit}";
    
    $options = [
        'http' => [
            'header' => "User-Agent: PHP\r\n"
        ]
    ];
    $context = stream_context_create($options);
    $response = @file_get_contents($url, false, $context);
    
    if ($response === FALSE) {
        return [];
    }
    
    $repos = json_decode($response, true);
    
    // Se a API retornar erro
    if (isset($repos['message'])) {
        return [];
    }
    
    return $repos;
}
?>

