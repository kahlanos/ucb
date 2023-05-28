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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="../../view/assets/js/charts-lines.js" defer></script>
    <script src="../../view/assets/js/charts-pie.js" defer></script>
</head>

<body>
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
                        Valora nuestra <?php echo $beer->getNombre() ?>
                    </h2>
                    <form action="<?php echo $id ?>/process" method="POST" enctype="multipart/form-data">
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <!-- PUNTUACION -->
                            <div class="my-6">
                                <div class="flex w-full justify-center items-center">
                                    <div x-data="
	{
		rating: 0,
		hoverRating: 0,
		ratings: [{'amount': 1, 'label':'Horrible'}, {'amount': 2, 'label':'Mala'}, {'amount': 3, 'label':'Buena'}, {'amount': 4, 'label':'Muy Buena'}, {'amount': 5, 'label':'Cojonuda'}],
		rate(amount) {
            event.preventDefault();
            
			if (this.rating == amount) {
        this.rating = 0;
      }
			else this.rating = amount;
		},
    currentLabel() {
       let r = this.rating;
      if (this.hoverRating != this.rating) r = this.hoverRating;
      let i = this.ratings.findIndex(e => e.amount == r);
      if (i >=0) {return this.ratings[i].label;} else {return ''};     
    }
	}
	" class="flex flex-col items-center justify-center space-y-2 rounded m-2 w-72 h-56 p-3 bg-gray-200 mx-auto">
                                        <div class="flex space-x-0 bg-gray-100">
                                            <template x-for="(star, index) in ratings" :key="index">
                                                <button @click="rate(star.amount)" @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating" aria-hidden="true" :title="star.label" class="rounded-sm text-gray-400 fill-current focus:outline-none focus:shadow-outline p-1 w-12 m-0 cursor-pointer" :class="{'text-gray-600': hoverRating >= star.amount, 'text-purple-600': rating >= star.amount && hoverRating >= star.amount}">
                                                    <svg class="w-15 transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                </button>

                                            </template>
                                        </div>
                                        <div class="p-2">
                                            <template x-if="rating || hoverRating">
                                                <p class="text-gray-700 dark:text-gray-400" x-text="currentLabel()"></p>
                                                <input type="hidden" value="currentLabel()" name="score" x-model="rating" />
                                            </template>
                                            <template x-if="!rating && !hoverRating">
                                                <p class="text-gray-700 dark:text-gray-400">Puntúa</p>
                                            </template>
                                        </div>

                                    </div>

                                </div>

                                <div class="my-6">
                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Dejanos un comentario sobre esta cerveza</span>
                                        <textarea class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" name="comment"></textarea>
                                    </label>

                                </div>
                                <div class="flex space-x-6 my-6">
                                    <button type="submit" class="m-6 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Valora
                                    </button>
                                    <a href="<?php if (isAdmin() || isEncargado()) {
                                                    echo "http://localhost/ucb/dashboard/index.php/beers";
                                                } else if (isSocio()) {
                                                    echo "http://localhost/ucb/dashboard/index.php/cervezas";
                                                } ?>" class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
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