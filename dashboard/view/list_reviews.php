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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>

</head>

<body>
    <!-- CONTROL -->
    <?php
    if (isAdmin() || isEncargado()) {
    } else {
        header("location: login");
    }
    ?>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- SIDEBAR -->
        <?php include 'sidebar.php'; ?>
        <div class="flex flex-col flex-1 w-full">
            <!-- HEADER -->
            <?php include 'header.php'; ?>
            <main class="h-full pb-16 overflow-y-auto">

                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Valoraciones
                    </h2>
                    <div class="flex flex-row px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 gap-6 ">
                        <div class="flex flex-col m-6">
                            <label for="type" class="text-gray-700 dark:text-gray-400">
                                Por tipo
                            </label>
                            <select onchange="pinta()" class=" mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="type" id="type">
                                <option value="">Filtra por rol</option>
                                <option value="" disabled>-------------------</option>
                                <option value="socios">De socios</option>
                                <option value="admins">De administradores</option>
                            </select>
                        </div>

                        <div class="flex flex-col m-6">
                            <label for="beers" class="text-gray-700 dark:text-gray-400">
                                Por cerveza
                            </label>
                            <select onchange="pinta()" class=" mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="beers" id="beers">
                                <option value="">Filtra por cerveza</option>
                                <option value="" disabled>-------------------</option>
                                <?php

                                foreach ($res as $r) {
                                    echo "<option value='" . $r . "'>" . $r . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Search input -->

                        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                            
                            <div class="absolute inset-y-0 flex items-end pl-2">
                            <svg class="w-4 h-4 absolute ml-2 mb-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                                <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" 
                                onkeyup="pinta()" value="" type="text" id="search" placeholder="Busca por usuario" aria-label="Search" />
                            </div>
                        </div>

                    </div>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table id="tabla" class="w-full ">

                            </table>
                        </div>
                    </div>
                </div>
            </main>


            <script src="../view/assets/js/reviews.js" defer></script>
            <script src="../view/assets/js/focus-trap.js"></script>
</body>