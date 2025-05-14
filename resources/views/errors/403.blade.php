<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>On tas capo?</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white p-10 rounded-xl shadow-md text-center">
    <h1 class="text-3xl font-bold text-red-600 mb-4">403 - Acceso no autorizado</h1>
    <p class="text-gray-700 text-lg mb-6">No tienes permisos para ver esta página.</p>
    <a href="{{ url()->previous() }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition">
      Volver
    </a>
  </div>
</div>

</body>
</html>