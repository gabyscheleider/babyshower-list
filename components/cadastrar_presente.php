<?php
    function limparNome($nome) {
        // Remover espaços em branco e caracteres especiais (exceto letras e números)
        $nome = preg_replace('/[^a-zA-Z0-9]+/', '', $nome);

        // Remover acentos e caracteres especiais
        $nome = iconv('UTF-8', 'ASCII//TRANSLIT', $nome);

        // Tornar tudo em letras minúsculas e remover espaços em branco
        $nome = strtolower(str_replace(' ', '', $nome));

        return $nome;
    }

    try {
        $db = new PDO('mysql:host=localhost;dbname=babyshower', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $nome = $_POST['nome'];
        $link_referencia = $_POST['link_referencia'];

        // Processar o upload da imagem
        if ($_FILES['imagem_referencia']['error'] == UPLOAD_ERR_OK) {
            $tempName = $_FILES['imagem_referencia']['tmp_name'];
            $imageName = limparNome($nome) . '.jpg';
            $imagePath = '../src/images/' . $imageName; // Substitua pelo caminho real onde você deseja salvar as imagens

            // Mova o arquivo para o diretório de destino
            move_uploaded_file($tempName, $imagePath);
        } else {
            // Lida com erros de upload, se houver
        }

        $stmt = $db->prepare("INSERT INTO presentes (nome, link_referencia, imagem_referencia) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $link_referencia, $imagePath]);

        // Redirecionar de volta à página principal ou para onde desejar
        header("Location: ../pages/index.php");
    } catch (PDOException $e) {
        echo 'Erro ao cadastrar o presente: ' . $e->getMessage();
    }
?>
