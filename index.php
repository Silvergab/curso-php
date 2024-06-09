<?php
const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesion de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado del a peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la peticion
y guardamos el resultado */
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
?>
</ul>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de Marvel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>
<body>
<main>
    <pre style="font-size: 8px; overflow: scroll; height: 250px;">
        <?php var_dump($data); ?>
    </pre>
    <section>
        <?php if (isset($data["poster_url"], $data["title"])): ?>
            <img src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= htmlspecialchars($data["title"]); ?>"
                 style="border-radius:16px" />    
        <?php else: ?>
            <p>Información de la película no disponible.</p>
        <?php endif; ?>
    </section>
    <hgroup>
        <?php if (isset($data["title"], $data["days_until"], $data["release_date"], $data["following_production"])): ?>
            <h2><?= htmlspecialchars($data["title"]); ?> se estrena en <?= htmlspecialchars($data["days_until"]); ?> días</h2>
            <p>Fecha de estreno: <?= htmlspecialchars($data["release_date"]); ?></p>
            <p>La siguiente es: <?= htmlspecialchars($data["following_production"]["title"]); ?></p>
        <?php else: ?>
            <p>Información de la película no disponible.</p>
        <?php endif; ?>
    </hgroup>
</main>
</body>
</html>
<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>