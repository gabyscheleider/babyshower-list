<div class="bg-baby-shower-colors-lavanda text-baby-shower-colors-dark-purple font-abhayalibre-regular">
    <div class="flex flex-col justify-center items-center w-full">
        <div class="title">
            <img src="../src/images/logo-baby-shower.png" alt="" srcset="">
        </div>
        <div class="text-baby-shower-colors-light-purple text-4xl font-extralight mb-3">
            Chá de Fraldas
        </div>
        <div class="font-parisienne font-medium text-8xl text-baby-shower-colors-purple">
            Lua Gabriely
        </div>
    </div>
    <div class="w-full flex flex-col items-center mt-8">
        <div class="flex flex-col items-center">
            <h1 class="text-3xl">Sugestões de Presente</h1>
            <h2 class="text-lg text-baby-shower-colors-light-purple">Sua presença é o mais valioso dos presentes!</h2>
             <!-- Botão para abrir o modal -->
            <button class="bg-baby-shower-colors-gray hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="openModal">
                Adicionar Presente
            </button>
        </div>
        <div class="w-11/12 overflow-x-auto mt-5 mb-10">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-baby-shower-colors-gray text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Nome do Item
                        </th>
                        <th class="px-6 py-3 bg-baby-shower-colors-gray text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Link Refêrencia
                        </th>
                        <!-- <th class="px-6 py-3 bg-baby-shower-colors-gray text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Escolher dar esse presente
                        </th> -->
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="item-list">
                    <?php
                        try {
                            $db = new PDO('mysql:host=localhost;dbname=babyshower', 'root', '');
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $stmt = $db->prepare("SELECT * FROM presentes WHERE escolhido != 1");
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $nome = $row['nome'];
                                $link_referencia = $row['link_referencia'];
                        ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <?php echo $nome; ?>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap w-1/4">
                                <a href="<?php echo $link_referencia; ?>" target="_blank">
                                    <img src="<?php echo $row['imagem_referencia']; ?>" alt="<?php echo $nome; ?>">
                                </a>
                            </td>
                            <!-- <td class="px-6 py-4 w-1/4 whitespace-no-wrap">
                                <input type="submit" value="Presentear" data-id="<?php echo $row['id']; ?>" class="presentear-btn">
                            </td> -->
                        </tr>
                        <?php
                            }
                        } catch (PDOException $e) {
                            echo 'Erro ao recuperar os presentes: ' . $e->getMessage();
                        }
                    ?>
                </tbody>
            </table>
          </div>
    </div>
</div>