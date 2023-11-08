<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=babyshower', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $presenteID = $_POST["id"];
    
            // Atualize o status no banco de dados (assumindo que a coluna se chama 'escolhido')
            $stmt = $db->prepare("UPDATE presentes SET escolhido = 1 WHERE id = ?");
            $stmt->execute([$presenteID]);
    
            // Envie uma resposta JSON de sucesso
            echo json_encode(["success" => true]);
        } catch (PDOException $e) {
            echo json_encode(["success" => false, "error" => $e->getMessage()]);
        }
    }
    