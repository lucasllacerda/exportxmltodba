<?php
//
include_once ("config.php");
//echo "<pre>";
//$arquivoupload = $_FILES['arquivo_traducao'];
//var_dump($arquivoupload);
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
            echo "attribute_id: $attribute_id <br>";
            $store_id = $dado->getElementsByTagName("Data")->item(1)->nodeValue;
            echo "store_id: $store_id <br>";
            $entity_id = $dado->getElementsByTagName("Data")->item(2)->nodeValue;
            echo "entity_id: $entity_id <br>";
            $value = $dado->getElementsByTagName("Data")->item(3)->nodeValue;
            echo "value: $value <br>";
            echo "<hr>";
            $dadosinserir = "INSERT INTO brandboutique_category_entity_varchar (attribute_id, store_id, entity_id, value) values ('$attribute_id', '$store_id', '$entity_id', '$value')";
            $resultado_usuario = mysqli_query($conn, $dadosinserir);
        }
        $lineone = false;
    }
}
?>