<?php
function adjustImage($imagePath, $outputPath, $contrast = 0, $brightness = 0, $smooth = false, $rotation = 0) {
    if (!extension_loaded('gd')) {
        die('A extensão GD não está carregada.');
    }

    // Função para carregar a imagem
    $image = imagecreatefromjpeg($imagePath);
    if (!$image) {
        die('Falha ao carregar a imagem.');
    }

    // Função que ajusta o contraste
    if ($contrast != 0) {
        imagefilter($image, IMG_FILTER_CONTRAST, $contrast);
    }

    // Função que ajusta o brilho
    if ($brightness != 0) {
        imagefilter($image, IMG_FILTER_BRIGHTNESS, $brightness);
    }

    // Função para aplicar a suavização (caso necessário)
    if ($smooth) {
        imagefilter($image, IMG_FILTER_SMOOTH, 5); // O valor 5 pode ser ajustado conforme necessário
    }

    // Funcão para rotacionar a imagem
    if ($rotation != 0) {
        $image = imagerotate($image, $rotation, 0);
    }

    if (!imagejpeg($image, $outputPath)) {
        die('Falha ao salvar a imagem.');
    }

    imagedestroy($image);
    echo "Processamento concluído com sucesso. Imagem salva em: " . $outputPath;
}

// Caminho da imagem original
$imagePath = 'paisagem.jpg';

// Caminho para salvar a imagem processada
$outputPath = 'paisagem_processada.jpg';

// Ajuste de contraste
$contrast = -50;

// Ajuste de brilho
$brightness = 80;

// Aplicar suavização
$smooth = false;

// Ângulo de rotação
$rotation = 0;

// Aplica a função para fazer as alterações inseridas
adjustImage($imagePath, $outputPath, $contrast, $brightness, $smooth, $rotation);
?>+++