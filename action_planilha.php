<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // URL do Apps Script
    $url = "https://script.google.com/macros/s/AKfycbypX2PzKvbV4mWId4HuHSurYcVs5KypcXJVqqElY_uv-2dXtRpxsWQaNsJc3jbvEm1E/exec";

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
