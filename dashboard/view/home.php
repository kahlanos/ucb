<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UCC</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../view/assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="../view/assets/js/init-alpine.js"></script>
  
</head>

<body>

  <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
    <!-- SIDEBAR -->
    <?php include 'sidebar.php'; ?>
    <div class="flex flex-col flex-1 w-full">
      <!-- HEADER -->
      <?php include 'header.php'; ?>
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            
          </h2>

          <img class="rounded-lg bg-gray-50 dark:bg-gray-900 shadow-xl" src="../view/assets/img/logo1.jpg" ></img>
          
        </div>
      </main>
    </div>
  </div>
</body>

</html>