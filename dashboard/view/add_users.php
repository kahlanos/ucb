<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UCC</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../../view/assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../../view/assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="../../view/assets/js/charts-lines.js" defer></script>
    <script src="../../view/assets/js/charts-pie.js" defer></script>
</head>

<body onload="cargaEncargados()">
<!-- CONTROL -->
<?php
    if (isAdmin()) {
               
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
                        Nuevo Usuario
                    </h2>
                    <form action="add/process" method="POST" enctype="multipart/form-data">
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="my-6">
                                <label class="block text-sm m-4">
                                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="" name="nombre" type="text" />
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Email</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="" name="email" type="email" />
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="" name="password" type="password" />
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Teléfono</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="" name="phone" type="tel" />
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Nº Cuenta</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value=""
                                        name="n_cuenta" type="text" />
                                </label>
                            </div>
                            <span class="text-gray-700 dark:text-gray-400">
                                Rol
                            </span>
                            <div class="my-6">
                                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">

                                    <input type="radio"
                                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="rol" value="0"  />
                                    <span class="ml-2">Admin</span>
                                </label>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="radio"
                                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="rol" value="1"  />
                                    <span class="ml-2">Encargado</span>
                                </label>
                                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                    <input type="radio"
                                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="rol" value="2"  />
                                    <span class="ml-2">Socio</span>
                                </label>
                            </div>
                            <div class="my-6">
                            <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">
                                        Encargado
                                    </span>
                                    <select
                                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="encargado"
                                        id="encargado">
                                        <option value="">----------</option>
                                    </select>
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Fecha de alta</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="" name="fecha_alta" type="date" />
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Fecha de baja</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="" name="fecha_baja" type="date" />
                                </label>
                            </div>

                            <div class="flex flex-col mt-6 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Pago</span>
                                <label class="block text-sm">

                                    <input type="checkbox"
                                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        name="pagado" value="1" />
                                </label>
                            </div>
                            <div class="flex space-x-6 my-6">
                                <button type="submit"
                                    class="m-6 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Guardar
                                </button>
                                <a href="http://localhost/ucb/dashboard/index.php/users"
                                    class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script src="../../view/assets/js/loader.js"></script>
</body>