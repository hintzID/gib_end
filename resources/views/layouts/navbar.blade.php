<nav class="bg-purple-200  dark:text-white dark:bg-blue-950 shadow-lg">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex items-center flex-shrink-0 mr-6">
            <a href="/" class="flex items-center" data-tooltip-target="tooltip" data-tooltip-placement="top">
                <img src="{{ asset('image/paskas.jpeg') }}" class="h-8 shadow-lg rounded-full mr-3" alt="Paskas Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Gerakan Infaq
                    Beras</span>
            </a>

            <div id="tooltip" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-700 rounded-lg shadow-lg opacity-0 tooltip bg-opacity-50 backdrop-blur-lg dark:bg-opacity-50 dark:bg-gray-900">
                Beras Terbaik Untuk Orang Terbaik

            </div>
        </div>

        <div class="text-center">
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                aria-controls="drawer-navigation">
                Menu
            </button>
        </div>
    </div>
</nav>
