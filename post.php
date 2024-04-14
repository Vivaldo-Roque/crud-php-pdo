<?php

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

Quando ocorrer um POST, haverá um array $_POST nele estamos verificado se existe a chave "Adicionar"
com a função isset() que verfica se um variável está definida.

*/

if (isset($_POST["Adicionar"])) {

    /*

    Quando ocorrer um POST, haverá um array $_POST nele estamos verificado se existe as chaves "disciplina", "nota1", "nota2" e "notafinal"
    com a função isset() que verfica se um variável está definida.

    */

    if (isset($_POST["disciplina"]) && isset($_POST["nota1"]) && isset($_POST["nota2"]) && isset($_POST["notaFinal"])) {

        // Passar as informações nas chaves do array para as variáveis
        $disciplina = $_POST["disciplina"];
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $notaFinal = $_POST["notaFinal"];

        // Comando SQL para inserir o dado
        $sql = 'INSERT INTO notas(disciplina, n1, n2, notafinal) VALUES(:d,:n1,:n2,:nf)';

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':d' => $disciplina,
            ':n1' => $nota1,
            ':n2' => $nota2,
            ':nf' => $notaFinal
        ]);

        // Redirecionar para a página index.php no final
        header('Location: ./index.php');
    }
}

/*

Quando ocorrer um POST, haverá um array $_POST nele estamos verificado se existe a chave "Adicionar"
com a função isset() que verfica se um variável está definida.

*/

if (isset($_POST["Editar"])) {

    /*

    Quando ocorrer um POST, haverá um array $_POST nele estamos verificado se existe as chaves "disciplina", "nota1", "nota2" e "notafinal"
    com a função isset() que verfica se um variável está definida.

    */

    if (isset($_POST["disciplina"]) && isset($_POST["nota1"]) && isset($_POST["nota2"]) && isset($_POST["notaFinal"])) {

        // Passar as informações nas chaves do array para as variáveis
        $id = $_POST["editId"];
        $disciplina = $_POST["disciplina"];
        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $notaFinal = $_POST["notaFinal"];

        // Comando SQL para atualizar o dado
        $sql = 'UPDATE notas SET disciplina = :d, n1 = :n1, n2 = :n2, notafinal = :nf WHERE id = :id';

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id,
            ':d' => $disciplina,
            ':n1' => $nota1,
            ':n2' => $nota2,
            ':nf' => $notaFinal
        ]);

        // Redirecionar para a página index.php no final
        header('Location: ./index.php');
    }
}


/*

Quando ocorrer um POST, haverá um array $_POST nele estamos verificado se existe a chave "Cancelar"
com a função isset() que verfica se um variável está definida.

*/

if (isset($_POST["Cancelar"])) {

    // Redirecionar para a página index.php
    header('Location: ./index.php');
}