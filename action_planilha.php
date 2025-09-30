<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // URL do Apps Script
    $url = "https://script.google.com/macros/s/AKfycbx6dp8-e1-1PplYsa_E9DZ7FK2jQJMj_S6plKP1nx57D7LfWPw5a1bo0UK69fpHpCzx/exec";

    // Dados do formulário
    $data = [
        "nome" => $_POST["nome"] ?? "",
        "email" => $_POST["email"] ?? "",
        "mensagem" => $_POST["mensagem"] ?? ""
        // Adicione outros campos conforme necessário
    ];

    // Inicializa cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    echo "<p>Dados enviados para a planilha com sucesso!</p>";
    echo "<pre>".htmlspecialchars($response)."</pre>";

} else {
    echo "<p>Nenhum dado foi enviado.</p>";
}
?>
