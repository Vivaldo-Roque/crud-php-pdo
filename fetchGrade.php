<?php

// incluir os códigos no ficheiro require.php
require 'connect.php';

/*

Informações sobre JSON:
    https://rockcontent.com/br/blog/json/

informações sobre PDO:

	https://www.devmedia.com.br/introducao-ao-php-pdo/24973

Informações sobre o POST e GET:

    https://www.alura.com.br/artigos/diferencas-entre-get-e-post
    https://www.devmedia.com.br/http-get-e-post/41221
    https://www.treinaweb.com.br/blog/o-que-e-http-request-get-post-response-200-404

Informações sobre POST e GET para formulários HTML:
    https://www.youtube.com/watch?v=rcaXavXsWGA&ab_channel=CursoemV%C3%ADdeo

Cursos em Video:
    Curso HTML5 e CSS3.- Módulo 1 de 5: https://www.youtube.com/playlist?list=PLHz_AreHm4dkZ9-atkcmcBaMZdmLHft8n
    Curso HTML5 e CSS3.- Módulo 2 de 5: https://www.youtube.com/playlist?list=PLHz_AreHm4dlUpEXkY1AyVLQGcpSgVF8s
    Curso HTML5 e CSS3.- Módulo 3 de 5: https://www.youtube.com/playlist?list=PLHz_AreHm4dmcAviDwiGgHbeEJToxbOpZ
    Curso HTML5 e CSS3.- Módulo 4 de 5: https://www.youtube.com/playlist?list=PLHz_AreHm4dkcVCk2Bn_fdVQ81Fkrh6WT
    Curso Grátis de JavaScript e ECMAScript para Iniciantes: https://www.youtube.com/playlist?list=PLHz_AreHm4dlsK3Nr9GVvXCbpQyHQl1o1
    Curso de PHP para Iniciantes: https://www.youtube.com/playlist?list=PLHz_AreHm4dm4beCCCmW4xwpmLf6EHY9k
    Curso de POO PHP (Programação Orientada a Objetos): https://www.youtube.com/playlist?list=PLHz_AreHm4dmGuLII3tsvryMMD7VgcT7x

*/

/*

Quando ocorrer um POST, haverá um array $_POST nele estamos verificado se existe a chave "id"
com a função isset() que verfica se um variável está definida.

*/

if (isset($_POST["id"])) {

    // Pegar a informação armazenada nessa chave do array
    $id = $_POST["id"];

    // Pegar a informação baseada no ID
    $sql = 'SELECT * FROM notas WHERE id = :id';

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':id' => $id,
    ]);

    $nota = $stmt->fetch(PDO::FETCH_ASSOC);

    // Imprimir a informação em formato JSON
    echo json_encode($nota);

}
