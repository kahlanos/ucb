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


<body onload="cargaEncargados()">
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
                        <?php echo 'Cerveza: ' . $res->getNombre() ?>
                    </h2>
                    <form action="<?php echo $id ?>/process" method="POST" enctype="multipart/form-data">
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="my-6">
                                <label class="block text-sm m-4">
                                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value='<?php echo $res->getNombre() ?>' name="nombre" type="text" />
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Estilo</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value='<?php echo $res->getEstilo()  ?>' name="estilo" type="text" />
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Descripción</span>
                                    <textarea
                                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        rows="3" name="descripcion"><?php echo $res->getDescripcion() ?></textarea>
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Fecha de fabricación</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value=<?php echo $res->getFechaFabric() ?> name="fecha_fabric" type="date" />
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Fecha de distribución</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value=<?php echo $res->getFechaDistrib() ?> name="fecha_distrib" type="month" />
                                </label>
                            </div>

                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Consumo preferente</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value=<?php echo $res->getConsumoPref() ?> name="consumo_pref" type="month" />
                                </label>
                            </div>
                            <div class="my-6">

                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Nivel de alcohol</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value=<?php echo $res->getAlcohol() ?> name="alcohol" type="number"
                                        step="0.1" />
                                </label>

                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Temperatura de guardado</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value=<?php echo $res->getTempGuardado() ?> name="temp_guardado"
                                        type="number" />
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Ibus</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value=<?php echo $res->getIbus() ?> name="ibus" type="number" />
                                </label>
                            </div>

                            <div class="flex flex-col mt-6 text-sm">

                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Imagen del tapón</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="<?php echo $res->getImgTapon() ?>" name="img_tapon" type="file"
                                        id="img_tapon" />
                                </label>
                                <div class="m-6">
                                    <?php
                                    $imgT = $res->getImgTapon();
                                    if ($imgT != "" && $imgT != NULL && $imgT != 'NULL') {
                                        echo "<img src='../../view/assets/img/tapones/$id/$imgT' style='width:100px;height: 100px;' class='rounded-lg my-6 w-12 h-12'></img> ";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="flex flex-col mt-6 text-sm">

                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Imagen de la botella</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="<?php echo $res->getImgBotella() ?>" name="img_botella" type="file"
                                        id="img_botella" />
                                </label>
                                <div class="m-6">
                                    <?php
                                    $imgB = $res->getImgBotella();
                                    if ($imgB != "" && $imgB != NULL && $imgB != 'NULL') {
                                        echo "<img src='../../view/assets/img/botellas/$id/$imgB' style='width:100px;height: 100px;' class='rounded-lg my-6 w-12 h-12'></img> ";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="flex flex-col mt-6 text-sm">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Detalles de composición</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="<?php echo $res->getDetalles() ?>" name="detalles" type="file"
                                        id="detalles" accept=".pdf"/>
                                </label>
                                <div class="my-6">
                                    <?php
                                    $pdf = $res->getDetalles();
                                if ($pdf != "" && $pdf != NULL && $pdf != 'NULL') {
                                    echo "<a href='$id/descarga' class='font-bold text-blue-600 dark:text-purple-400 hover:underline'>Descarga los detalles de composición</a>";
                                }
                                ?>
                                </div>
                            </div>
                            <div class="flex space-x-6 my-6">
                                <button type="submit"
                                    class="m-6 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Guardar
                                </button>
                                <a href="http://localhost/ucb/dashboard/index.php/beers"
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

</body>