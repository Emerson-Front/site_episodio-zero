<?php
// Quantidade total de estrelas
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