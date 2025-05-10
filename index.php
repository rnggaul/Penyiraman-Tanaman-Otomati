<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyiraman Tanaman Otomatis</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
          font-family: 'Inter', sans-serif;
          background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
      
        .card {
          background: rgba(15, 23, 42, 0.7);
          border: 1px solid rgba(74, 222, 128, 0.1);
          backdrop-filter: blur(10px);
          transition: all 0.3s ease;
        }
      
        .card:hover {
          transform: translateY(-3px);
          box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2), 0 0 1px rgba(74, 222, 128, 0.3);
        }
        .pill {
        transition: all 0.3s ease;
        }

        .pill:hover {
        background: rgba(74, 222, 128, 0.1) !important;
        }

        .pill.active {
        background: linear-gradient(90deg, rgba(74, 222, 128, 0.2) 0%, rgba(74, 222, 128, 0) 100%);
        border-left: 3px solid #4ade80;
        }

        .badge {
        animation: pulse 2s infinite;
        }

        @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.05);
            opacity: 0.7;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
        }
        .signature {
        font-family: 'Brush Script MT', cursive;
        color: #4ade80;
        }
    </style>
</head>

<body class="text-gray-100">
  <div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl rounded-2xl overflow-hidden flex flex-col md:flex-row shadow-xl bg-gradient-to-br from-gray-900 to-gray-800 border border-gray-700/50">
      <!-- Sidebar -->
      <aside class="p-6 w-full md:w-64 flex-shrink-0 border-r border-gray-700/50">
        <div class="flex items-center space-x-3 mb-10">
          <div class="p-3 bg-green-500/10 rounded-xl">
            <i class="fas fa-leaf text-green-400 text-xl"></i>
          </div>
          <h2 class="text-xl font-bold text-white">
            IoT<span class="text-green-400">Dash</span>
          </h2>
        </div>

        <nav class="space-y-2">
          <a href="index.php" class="pill active flex items-center space-x-3 px-4 py-3 rounded-lg text-white">
            <i class="fas fa-fire text-green-400 w-5"></i>
            <span>Live Data</span>
            <span class="ml-auto text-xs bg-green-900/30 text-green-400 px-2 py-1 rounded-full badge">Hot</span>
          </a>
          <a href="setting.php" class="pill flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white">
            <i class="fas fa-cogs w-5"></i>
            <span>Settings</span>
          </a>
          <a href="#" class="pill flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white">
            <i class="fas fa-history w-5"></i>
            <span>History</span>
          </a>
        </nav>

        <div class="mt-auto pt-8">
          <div class="text-xs text-gray-400 text-center">
            Crafted with <i class="fas fa-heart text-red-400 mx-1"></i> by
            <span class="signature">Rangga Aulia</span>
          </div>
        </div>
      </aside>
    
    <!-- Main Content -->
    <main class="flex-1 p-6 md:p-8">
      <!-- Header -->
      <header class="mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-white">
          Welcome to <span class="text-green-400">Your IoT Dashboard</span>
        </h1>
        <p class="text-gray-400 mt-2">
          Simple monitoring with powerful insights • Made with love by Rangga Aulia
        </p>
      </header>
     
     <!-- Cards -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-5">

      <!-- Temperature Card -->
      <div class="card rounded-xl p-6">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-sm font-medium text-gray-400">
            <i class="fas fa-thermometer-half text-red-400 mr-2"></i>
            TEMPERATURE
          </h2>
          <i class="fas fa-sync-alt text-gray-500 animate-spin" id="temp-loading"></i>
        </div>
        <p id="temperature" class="text-4xl font-bold text-white mb-1">24.5°C</p>
        <p class="text-xs text-gray-400">
          <i class="far fa-clock mr-1"></i>
          Updated: <span id="timestamp">Just now</span>
        </p>
      </div>

      <!-- Humidity Card -->
      <div class="card rounded-xl p-6">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-sm font-medium text-gray-400">
            <i class="fas fa-tint text-blue-400 mr-2"></i>
            HUMIDITY
          </h2>
          <span class="text-xs bg-blue-900/30 text-blue-400 px-2 py-1 rounded-full">Stable</span>
        </div>
        <p id="temp-humidity" class="text-4xl font-bold text-blue-300 mb-1"></p>
        <p class="text-xs text-gray-400">
          <i class="fas fa-info-circle mr-1"></i>
          Ideal range: 40-70%
        </p>
      </div>

      <!-- Status Card -->
      <div class="card rounded-xl p-6">
        <div class="flex items-center justify-between mb-4">
          <h2 class="text-sm font-medium text-gray-400">
            <i class="fas fa-plug text-green-400 mr-2"></i>
            DEVICE STATUS
          </h2>
        </div>
        <div class="flex items-center">
          <div class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></div>
          <span class="text-xs text-green-400">Online</span>
        </div>
        <p class="text-xl font-bold text-white">ESP32</p>
        <p class="text-xs text-gray-400 mt-1">
          <i class="fas fa-code-branch mr-1"></i>
          Firmware: v2.1.8
        </p>
      </div>
    </section> 
    <script>
    async function fetchData() {
    try {
      const response = await fetch('read.php');
      if (!response.ok) throw new Error("Gagal fetch data");

      const data = await response.json();

      document.getElementById('temp-humidity').textContent = data.humidity;
      document.getElementById('timestamp').textContent = data.timestamp;

    } catch (error) {
      console.error("Error:", error);
      document.getElementById('status').textContent = "Error!";
    }
  }

  setInterval(fetchData, 1000); // update setiap 1 detik
  fetchData(); // jalankan pertama kali

</script>
</body>
</html>
