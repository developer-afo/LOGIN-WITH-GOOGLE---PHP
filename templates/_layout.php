<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="//unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    <title>PHP TEST 1</title>

    <style>
        .text-auth0 {
            color: #635dff;
        }

        .bg-auth0 {
            background-color: #635dff;
        }

        textarea {
            min-height: 15em;
        }


      
       
    </style>
</head>

<body class="home">
    <div class="relative bg-gray-900 overflow-hidden">
        <div class="hidden sm:block sm:absolute sm:inset-0" aria-hidden="true">
            <svg class="absolute bottom-0 right-0 transform translate-x-1/2 mb-48 text-gray-700 lg:top-0 lg:mt-28 lg:mb-0 xl:transform-none xl:translate-x-0" width="364" height="384" viewBox="0 0 364 384" fill="none">
                <defs>
                    <pattern id="eab71dd9-9d7a-47bd-8044-256344ee00d0" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="364" height="384" fill="url(#eab71dd9-9d7a-47bd-8044-256344ee00d0)" />
            </svg>
        </div>
        <div class="relative pt-6 pb-16 sm:pb-24">
            <div>
                <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">
                    <div class="flex items-center flex-1">
                        <div class="flex items-center justify-between w-full md:w-auto">
                          
                        </div>
                        <div class="hidden space-x-10 md:flex md:ml-10">
                           
                        </div>
                    </div>

                    <div class="hidden md:flex">
                        <?php if(! isset($session)): ?>
                            <a href="<?php echo $router->getUri('/login', '') ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">Log in</a>
                        <?php else: ?>
                            <a href="<?php echo $router->getUri('/logout', '') ?>" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">Log out</a>
                        <?php endif ?>
                    </div>
                </nav>
            </div>

            <main class="mt-16 sm:mt-24">
                <div class="px-4 sm:px-6 sm:text-center md:max-w-7xl md:mx-auto lg:col-span-6 lg:text-left lg:flex lg:items-center">
                    <div>
                        <?php echo $this->section('hero')?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <main class="mt-4 md:mt-16">

    <?php if(! isset($session)): ?>
        <div class="text-center justify-content-center flex flex-col gap-2">
            <h1 class="text-3xl font-bold text-gray-900">Welcome to PHP Test 1</h1>
            <p class="text-lg text-gray-700">Please log in to continue</p>


                <div class="flex justify-center">

                <a href="<?php echo $router->getUri('/login', '') ?>">
                    <button type="button" class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 me-2 mb-2">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
                    <path fill-rule="evenodd" d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z" clip-rule="evenodd"/>
                    </svg>
                    Sign in with Google
                    </button>
                </a>

                </div>
                
        </div>
            <?php else: ?>
                <div class="px-4 sm:px-6 sm:text-center md:max-w-7xl md:mx-auto lg:col-span-6 lg:text-left lg:flex lg:items-center">
              <?= $this->section('body'); ?>
                </div>
            <?php endif ?>
       
    </main>

  
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>
</html>
