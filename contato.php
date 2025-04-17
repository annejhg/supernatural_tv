<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco - Foca na Fofoca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <img src="focanafofoca.jpg" alt="Logo Foca na Fofoca" class="logo" />
            <h1><span>Foca na</span> <strong>FOFOCA</strong></h1>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="focanafofca1.html">Início</a></li>
                <li><a href="celebridades.html">Celebridades</a></li>
                <li><a href="reality-shows.html">Reality Shows</a></li>
                <li><a href="influenciadores.html">Influenciadores</a></li>
                <li><a href="sobre.html">Sobre</a></li>
                <li><a href="contato.html">Fale Conosco</a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content">
        <div class="container">
            <h2>Fale Conosco</h2>
            <p>Tem alguma dúvida, sugestão ou quer compartilhar uma fofoca quente? Nós adoramos ouvir nossos leitores! Preencha o formulário abaixo para entrar em contato com a nossa equipe. Responderemos o mais rápido possível.</p>
            
            <form action="envio_formulario.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="assunto">Assunto:</label>
                    <input type="text" id="assunto" name="assunto" required>
                </div>

                <div class="form-group">
                    <label for="mensagem">Mensagem:</label>
                    <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-submit">Enviar</button>
                </div>
            </form>
            
            <?php
// Incluir a conexão com o banco de dados
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Preparar a consulta SQL para inserir os dados na tabela 'contatos'
    $sql = "INSERT INTO contatos (nome, email, assunto, mensagem) 
            VALUES ('$nome', '$email', '$assunto', '$mensagem')";

    // Executar a consulta e verificar se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Redirecionar para a página de agradecimento
        header("Location: obrigado.html");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>


            <p>Ou, se preferir, você pode nos enviar um e-mail diretamente para <a href="mailto:contato@focanafofoca.com">contato@focanafofoca.com</a>.</p>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Fofocas Quentes. Todos os direitos reservados.</p>
            <p><a href="privacy-policy.html">Política de Privacidade</a> | <a href="terms-of-use.html">Termos de Uso</a></p>
        </div>
    </footer>
</body>
</html>
