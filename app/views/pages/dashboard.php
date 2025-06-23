<?php
  if (isset($_SESSION['authentication']) && !empty($_SESSION['authentication'])):
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
  <nav class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600">Meu Painel</h1>
    <a href="/logout" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Sair</a>
  </nav>

  <main class="p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Olá, Usuário 👋</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-700 mb-2">Atividade recente</h3>
        <p class="text-gray-600 text-sm">Você se logou há 2 horas.</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold text-gray-700 mb-2">Notificações</h3>
        <ul class="list-disc ml-5 text-sm text-gray-600">
          <li>Nova mensagem recebida</li>
          <li>Atualização disponível</li>
        </ul>
      </div>
    </div>
  </main>
</body>
</html>
<?php
else:
    header("Location: /login");
    exit;
endif;
?>