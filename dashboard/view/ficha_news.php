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


<body >
    <!-- CONTROL -->
    <?php
    if (isAdmin() ) {
               
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
                    <?php echo 'Noticia: ' . $res->getTitle() . ' el día '. $res->getDate() ?>
                    </h2>
                    <form action="<?php echo $id ?>/process" method="POST" enctype="multipart/form-data">
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="my-6">
                                <label class="block text-sm m-4">
                                    <span class="text-gray-700 dark:text-gray-400">Título</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value=<?php echo $res->getTitle() ?>  name="title" type="text" required/>
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Texto</span>
                                    <textarea
                                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                        rows="4" name="text" required><?php echo $res->getText() ?> </textarea>
                                </label>
                            </div>
                            <div class="my-6">
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Fecha</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value=<?php echo $res->getDate() ?>  name="date" type="date" required/>
                                </label>
                            </div>

                            <div class="flex flex-col mt-6 my-6 text-sm">
                                
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Imagen</span>
                                    <input
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        value="<?php echo $res->getImg() ?>"  name="img" type="file" id="img"/>
                                </label>
                                <div class="m-6">
                                    <?php
                                    $img = $res->getImg();
                                    if ($img != "" && $img != NULL && $img != 'NULL') {
                                        echo "<img src='../../view/assets/img/news/$id/$img' style='width:100px;height: 100px;' class='rounded-lg my-6 w-12 h-12'></img> ";
                                    }
                                    ?>
                                </div>
                            </div>
                     
                            <div class="flex space-x-6 my-6">
                                <button type="submit"
                                    class="m-6 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Guardar
                                </button>
                                <a href="http://localhost/ucb/dashboard/index.php/news"
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