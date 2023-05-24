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
    <script src="../view/assets/js/charts-lines.js" defer></script>
    <script src="../view/assets/js/charts-pie.js" defer></script>
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
                        Entregas
                    </h2>
                    <div class="flex gap-6">
                        <div class="flex flex-row px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 gap-6 ">

                            <div class="flex flex-col mb-6">
                                <label for="type" class="text-gray-700 dark:text-gray-400">
                                    Ver entregas de:
                                </label>
                                <input onchange="pinta()" value="" type="month" id="filtro_mes" name="filtro_mes" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                       
                            </div>

                        </div>
                        <div class="flex flex-col px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label for="encargado" class="text-gray-700 dark:text-gray-400">
                                Por encargado
                            </label>
                            <select onchange="pinta()" class=" mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="encargado" id="encargado">
                            <option value="" >Filtra por encargado</option>                           
                            <option value="" disabled>-------------------</option>
                                <?php 
                                
                                    foreach($res as $r) {
                                        echo "<option value='".$r."'>".$r."</option>";
                                    }
                                ?>                              
                            </select>
                        </div>
                        <div class="flex flex-row px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 gap-6 ">

                            <div class="flex flex-col m-6">
                                <label for="type" class="text-gray-700 dark:text-gray-400">
                                    Crear nueva entrega para:
                                </label>
                                <input type="month" name="generador_mes" id="generador_mes" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                            </div>
                            <div class="flex my-6">
                                <button onclick="generaEntregas()" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Generar entrega mensual
                                </button>

                            </div>
                        </div>
                        
                    </div>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table id="tabla" class="w-full whitespace-no-wrap">

                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="../view/assets/js/deliveries.js" defer></script>
</body>