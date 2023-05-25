<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UCC</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../view/assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../../view/assets/js/init-alpine.js"></script>


<body onload="cargaEncargados()">
    <!-- CONTROL -->
    <?php
    if (isAdmin() || isEncargado() || isSocio()) {
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
                        <?php echo 'Valora nuestra : ' . $res->getNombre() ?>

                    </h2>
                    <div class="flex space-x-6 my-6">

                        <a href="http://localhost/ucb/dashboard/index.php/cervezas" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Atrás
                        </a>
                    </div>
                    <div class="m-6">
                        <?php
                        $imgT = $res->getImgTapon();
                        if ($imgT != "" && $imgT != NULL && $imgT != 'NULL') {
                            echo "<img src='../../view/assets/img/tapones/$id/$imgT' style='width:100px;height: 100px;' class='rounded-lg my-6 w-12 h-12'></img> ";
                        }
                        ?>
                    </div>

                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Estilo
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?php echo $res->getEstilo()  ?>
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Alcohol
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?php echo $res->getAlcohol() . "%" ?>
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Consumo preferente
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?php echo $res->getConsumoPref()  ?>
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Temperatura de guardado
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <?php echo $res->getTempGuardado() . " ºC"  ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-6 mb-8 md:grid-cols-2">
                        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
                                Descripción
                            </h4>
                            <p class="text-gray-600 dark:text-gray-400">
                                <?php echo $res->getDescripcion()  ?>
                            </p>
                        </div>

                        <div class="m-6">
                            <?php
                            $imgB = $res->getImgBotella();
                            if ($imgB != "" && $imgB != NULL && $imgB != 'NULL') {
                                echo "<img src='../../view/assets/img/botellas/$id/$imgB' style='width:100px;height: 100px;' class='rounded-lg my-6 w-12 h-12'></img> ";
                            }
                            ?>
                        </div>


                    </div>



                    <div class="flex space-x-6 my-6">

                        <a href="http://localhost/ucb/dashboard/index.php/cervezas" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Atrás
                        </a>
                    </div>
                </div>

        </div>
        </main>
    </div>
    </div>

</body>