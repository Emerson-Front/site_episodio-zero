<div class="centralizar">
    <section class="animes_lista bloco_1">
        <!--Adicionar anime-->
        <form method="post">
            <input class="nome_anime_input" type="text" name="nome_anime_input" placeholder="Digite o nome do anime"
                required="">
            <button type="submit" name="btn_adicionar" class="btn_adicionar">Adicionar Anime</button>
        </form>

        <?php
        $lista = mvc\controllers\HomeController::pegar_animes();

        foreach ($lista as $key => $value) {

            $capa = $value['url'];

            ?>

            <form method="get">
                <div style="background: url('<?php echo $capa ?>'); background-position: center; background-size: cover;"
                    class='anime' id='<?php echo $value['id_anime']; ?>'>
                    <p class='nome_anime'><?php echo $value['nome_anime']; ?></p>


                    <p class='temporada'>Temporada:
                        <input id='numberInput_temp<?php echo $key; ?>' type='number' name='valor_temp'
                            value='<?php echo $value['temporada']; ?>' min='0' max='9999'>
                    </p>
                    <button type='button' id='decremento_temp<?php echo $key; ?>'>-</button>
                    <button type='button' id='incremento_temp<?php echo $key; ?>'>+</button>



                    <p class='ep'>Episódio:
                        <input id='numberInput_ep<?php echo $key; ?>' type='number' name='valor_ep'
                            value='<?php echo $value['episodio']; ?>' min='0' max='9999'>
                    </p>
                    <button type='button' id='decremento_ep<?php echo $key; ?>'>-</button>
                    <button type='button' id='incremento_ep<?php echo $key; ?>'>+</button>


                    <input type="checkbox" id="<?php echo $value['id_anime']; ?>" class="input_check" />
                </div>
            </form>
            <?php
        }

        ?>


        <div class="botoes">
            <button class="btn_concluido" type="submit" name="btn_deletar"><i class="bi bi-check2-all"></i></button>
            <button class="btn_deletar" type="submit" name="btn_deletar"><i class="bi bi-trash"></i></button>
        </div>
    </section>
</div>


<div class="centralizar">
    <section class="concluidos bloco_1">
        <h1>Concluídos</h1>

        <?php
        $concluidos = mvc\controllers\HomeController::pegar_concluidos();

        foreach ($concluidos as $key => $value) {
            $data = $value['data_concluido'];
            $dataTime = new DateTime($data);
            $data = $dataTime->format('d/m/Y');
            $avaliacao = $value['avaliacao'];
            $id = $value['id_anime'];
            $nome_anime = $value['nome_anime'];
            $notas = $value['notas'];
            $capa = $value['url'];
            ?>

            <div id="anime_<?php echo $id ?>" class="concluido">
                <div style="background-image: url(<?php echo $capa ?>); background-position: center; background-size: cover;"
                    class="img"></div>
                <div class="detalhes">
                    <p class="nome"><?php echo $nome_anime ?></p>
                    <p class="data">Data de Conclusão: <?php echo $data ?></p>
                    <div class="avaliacao">
                        <p class="avaliacao" data-star="<?php echo $avaliacao ?>">Avaliação: </p>
                        <span class="stars">

                            <?php
                            $totalEstrelas = 5;
                            // Loop para exibir as estrelas
                            for ($i = 1; $i <= $totalEstrelas; $i++) {
                                if ($i <= $avaliacao) {
                                    // Estrela preenchida
                                    echo "<i class='bi bi-star-fill star$i' data-id='$id'></i>";
                                } else {
                                    // Estrela vazia
                                    echo "<i class='bi bi-star star$i' data-id='$id'></i>";
                                }
                            }
                            ?>

                        </span>
                    </div>
                    <p class="notas"><span>Notas: </span><?php echo $value['notas'] ?></p>
                </div>

                <i id="editar_<?php echo $id ?>" data-nome="<?php echo $nome_anime ?>" class="bi bi-pencil-square"></i>

                <div data-nome="<?php echo $nome_anime ?>" class="editar">
                    <h3>Editar</h3>
                    <form action="" method="post">
                        <label for="nome">Nome:</label>
                        <input type="text" id="input" value="<?php echo $nome_anime ?>"
                            placeholder="Digite o nome do anime">
                        <label for="notas">Notas:</label>
                        <textarea name="notas" id="notas"
                            placeholder="Digite comentários para esse anime:"><?php echo $notas ?></textarea>

                        <div class="botoes">
                            <button class='btn_concluido' data-id="<?php echo $id ?>" type='button' name='salvar'><i
                                    class="bi bi-check2-all"></i></button>
                            <button class='btn_deletar' data-id="<?php echo $id ?>" type='button' name='deletar'><i
                                    class="bi bi-trash"></i></button>
                        </div>
                    </form>
                </div>

            </div>

            <?php
        }
        ?>

    </section>
</div>
