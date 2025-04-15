<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ChatGPT-like Sidebar</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white h-screen flex">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 p-4 overflow-y-auto flex flex-col">
    <div class="text-lg font-semibold mb-6">ChatGPT</div>
    <button class="bg-gray-700 hover:bg-gray-600 text-sm p-2 rounded mb-4">+ Tambah Data</button>

    <div class="space-y-1 text-sm flex-1 overflow-y-auto">
      <div class="text-gray-400 uppercase text-xs mb-2">Today</div>
      <a href="#" class="block bg-gray-700 p-2 rounded">Menambahkan Logo Navbar</a>

      <div class="text-gray-400 uppercase text-xs mt-4 mb-2">Previous 7 Days</div>
      <a href="#" class="block hover:bg-gray-700 p-2 rounded">Bantu Pilih Outfit dan Makeup</a>
      <a href="#" class="block hover:bg-gray-700 p-2 rounded">Tugas Sistem Operasi</a>
      <a href="#" class="block hover:bg-gray-700 p-2 rounded">Perbaikan Bounded-Buffer</a>

      <div class="text-gray-400 uppercase text-xs mt-4 mb-2">Previous 30 Days</div>
      <a href="#" class="block hover:bg-gray-700 p-2 rounded">Pengelompokan Alokasi Keuangan</a>

      <div class="text-gray-400 uppercase text-xs mt-4 mb-2">February</div>
      <a href="#" class="block hover:bg-gray-700 p-2 rounded">Jabatan Organisasi SMK N1</a>
      <a href="#" class="block hover:bg-gray-700 p-2 rounded">Bio LinkedIn Programmer</a>
    </div>

    <button class="mt-4 text-sm text-gray-400 hover:text-white">Upgrade plan</button>
  </aside>

  <!-- Konten Utama -->
  <main class="flex-1 p-6 overflow-y-auto">
    <h1 class="text-2xl font-bold">ChatGPT</h1>
    <p class="text-gray-400 mt-2">Pilih salah satu chat di sebelah kiri untuk mulai.</p>
  </main>

</body>
</html>
