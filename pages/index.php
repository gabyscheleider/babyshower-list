<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600&family=Parisienne&display=swap" rel="stylesheet">
    <link href="../dist/output.css" rel="stylesheet">
</head>
<body>
    <?php
        require_once('../components/topMenu.php');
    ?>

    <!-- Modal -->
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Conteúdo do modal -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg font-medium text-gray-900">Cadastro de Presente</h3>
                    <div class="mt-2">
                        <form action="../components/cadastrar_presente.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
                                    Nome do Item
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" type="text" name="nome" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="link_referencia">
                                    Link de Referência
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="link_referencia" type="text" name="link_referencia" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="imagem_referencia">
                                    Imagem de Referência
                                </label>
                                <input type="file" id="imagem_referencia" name="imagem_referencia" accept="image/*" required>
                            </div>
                            <div class="mt-4">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

        // JavaScript para abrir e fechar o modal
        document.getElementById('openModal').addEventListener('click', function () {
            document.getElementById('modal').classList.remove('hidden');
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                document.getElementById('modal').classList.add('hidden');
            }
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const presentearButtons = document.querySelectorAll(".presentear-btn");

            presentearButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const presenteID = this.getAttribute("data-id");
                    const row = this.closest("tr");

                    // Enviar uma solicitação AJAX para atualizar o status no banco de dados
                    fetch("../components/up_status.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ id: presenteID })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remover a linha da tabela
                            row.remove();
                        } else {
                            alert("Erro ao atualizar o status do presente.");
                        }
                    })
                    .catch(error => {
                        console.error("Erro na solicitação AJAX: " + error);
                    });
                });
            });
        });
    </script>

</body>
</html>