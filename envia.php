<?php
//
include_once ("config.php");
//echo "<pre>";
//$arquivorecebido = $_FILES['arquivo_traducao'];
//var_dump($arquivorecebido);
//echo "<pre>";
if (!empty($_FILES['arquivo_traducao']['tmp_name'])) {
    $file = new DomDocument();
    $file->load($_FILES['arquivo_traducao']['tmp_name']);
    $dados = $file->getElementsByTagName("Row");
    //var_dump($dados);
    $lineone = true;
    foreach ($dados as $dado) {
        if ($lineone == false) {
            $attribute_id = $dado->getElementsByTagName("Data")->item(0)->nodeValue;
            echo "Nome: $attribute_id <br>";
            $store_id = $dado->getElementsByTagName("Data")->item(1)->nodeValue;
            echo "E-mail: $store_id <br>";
            $entity_id = $dado->getElementsByTagName("Data")->item(2)->nodeValue;
            echo "Niveis: $entity_id <br>";
            $value = $dado->getElementsByTagName("Data")->item(3)->nodeValue;
            echo "Niveis: $value <br>";
            echo "<hr>";
            $dadosinserir = "INSERT INTO brandboutique_category_entity_varchar (attribute_id, store_id, entity_id, value) values ('$attribute_id', '$store_id', '$entity_id', '$value')";
            $resultado_usuario = mysqli_query($conn, $dadosinserir);
        }
        $lineone = false;
    }
}
?>