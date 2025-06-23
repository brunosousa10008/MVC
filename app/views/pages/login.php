<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 h-screen flex items-center justify-center">
  <div class="bg-white p-8 rounded-xl shadow-lg w-96">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Bem-vindo de volta</h2>
    <form action="/login" method="post">
      <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
      <input type="email" name="email" class="w-full px-4 py-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="seu@email.com" />

      <label class="block mb-2 text-sm font-medium text-gray-700">Senha</label>
      <input type="password" name="password" class="w-full px-4 py-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="••••••••" />

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Entrar</button>
    </form>
    <p class="text-center text-sm text-gray-500 mt-4">Ainda não tem conta? <a href="#" class="text-blue-600 hover:underline">Cadastre-se</a></p>
  </div>
</body>
</html>
