<?php $this->layout('_layout'); ?>

<?php $this->start('hero') ?>
<div class=" flex flex-col justify-start items-start gap-2">

    <a href="#" class="inline-flex items-center text-white bg-gray-800 rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200">
        <span class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-auth0 rounded-full">Logged In</span>
        <span class="ml-4 text-sm">PHP TEST 1</span>
        <svg class="ml-2 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
    </a>

    <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:leading-none lg:mt-6 lg:text-5xl xl:text-6xl flex flex-col gap-4">
        <span class="flex items-start ">Welcome</span>
        <span class="text-auth0 md:block">
            <?php if(isset($session->user['picture'])): ?>
                <span class="inline-block relative">
                    <img class="h-12 w-12 rounded-full" src="<?php echo $session->user['picture'] ?>" alt="">
                </span>
            <?php endif; ?>

            <?php echo $session->user['email'] ?>
        </span>
    </h1>

    <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">You successfully authenticated as <span class="font-mono bg-gray-800 p-1 rounded text-sm"><?php echo $session->user['sub'] ?></span>.</p>
            </div>
<?php $this->stop() ?>

<?php $this->start('body') ?>
    <div class="mb-16 w-full lg:grid lg:grid-cols-12 lg:gap-x-5">
        <aside class="py-6 px-2 sm:px-6 lg:py-0 lg:px-0 lg:col-span-3">
            <nav class="space-y-1">
                <a href="#user" class="bg-gray-50 text-indigo-700 hover:text-indigo-700 hover:bg-white group rounded-md px-3 py-2 flex items-center text-sm font-medium" aria-current="page">
                    <svg class="text-indigo-500 group-hover:text-indigo-500 flex-shrink-0 -ml-1 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="truncate">
                        User Information
                    </span>
                </a>

            </nav>
        </aside>

        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9">

        <div id="otp">
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="bg-white">
                    <div class="px-4 py-5 sm:px-6 bg-gray-100">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">OTP</h3>
                        <p class="mt-1 text-sm text-gray-500">This OTP lasts for 30 seconds.</p>
                    </div>

                    <div class="px-4 py-5 sm:px-6 grid grid-cols-6 gap-6">
                        <div class="col-span-6">
                            <label for="<?php echo $row ?>" class="block text-sm font-medium text-gray-700" >OTP CODE</label>
                            <p class="bg-blue-500 text-white p-4 m-2 rounded-md text-xl font-bold" id="myptt"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="countdown" class="text-center mt-2 text-sm text-red-500"></div>

        <script>
            // Generate 6-digit OTP
            function generateOTP() {
                return Math.floor(100000 + Math.random() * 900000);
            }

            // Update OTP input with generated OTP
            window.addEventListener('DOMContentLoaded', function() {
                
                document.getElementById('myptt').innerHTML = generateOTP();
            });

            // Countdown timer
            var countdown = 30;
            var countdownElement = document.getElementById('countdown');

            function updateCountdown() {
                countdownElement.textContent = 'OTP expires in ' + countdown + ' seconds';
                countdown--;

                if (countdown < 0) {
                    countdownElement.textContent = 'OTP expired';
                    var otpInput = document.getElementById('otp');
                    if (otpInput) {
                        otpInput.style.display = 'none';
                    }
                } else {
                    setTimeout(updateCountdown, 1000);
                }
            }

            updateCountdown();
        </script>

            <div id="user">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white">
                        <div class="px-4 py-5 sm:px-6 bg-gray-100">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">User Information</h3>
                        </div>

                        <div class="px-4 py-5 sm:px-6 grid grid-cols-6 gap-6">
                            <?php foreach($session->user as $key => $data): ?>
                                <?php $row = uniqid(); ?>

                                <?php if(is_string($data)): ?>
                                    <div class="col-span-6">
                                        <label for="<?php echo $row ?>" class="block text-sm font-medium text-gray-700"><?php echo $key ?></label>
                                        <input value="<?php echo htmlspecialchars($data) ?>" type="text" readonly="true" name="<?php echo $row ?>" id="<?php echo $row ?>" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    </div>
                                <?php endif ?>

                                <?php if(is_array($data)): ?>
                                    <div class="col-span-6">
                                        <label for="<?php echo $row ?>" class="block text-sm font-medium text-gray-700"><?php echo $key ?></label>
                                        <textarea name="<?php echo $row ?>" id="<?php echo $row ?>" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"><?php echo htmlspecialchars(print_r($data, true)) ?></textarea>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
                      
        </div>
    </div>
<?php $this->stop() ?>
