<?php
/*
Template Name: Contact Us Page
*/
get_header();
?>

<section class="bg-gray-100 px-4 py-20">
    <div class="block container-v5 container mx-auto text-center">
        <h1 class="text-4xl lg:text-5xl font-medium">Get in contact with our team</h1>
        <p class="mt-4">We are always here to help</p>
        <div class="grid grid-cols-12 mt-14 gap-4">
            <div class="col-span-12 sm:col-span-6 lg:col-span-4 p-6 bg-white rounded-2xl">
                <h3 class="text-left text-3xl lg:text-4xl font-medium mb-2">Sales</h3>
                <p class="text-left mb-4">Looking for a new boiler?</p>
                <p class="text-left text-2xl font-medium"><a href="tel:02081502025">0208 150 2025</a></p>
                <p class="text-left mb-4">info@gasboiler.com</p>
                <p class="text-left"><b>Mon to Sat:</b> 8am - 6pm</p>
                <a href="<?php echo esc_url(home_url('/quote')); ?>" class="btn btn-secondary mt-6 w-full">Get A Quote</a>
            </div>
            <div class="col-span-12 sm:col-span-6 lg:col-span-4 p-6 bg-white rounded-2xl">
                <h2 class="text-left text-3xl lg:text-4xl font-medium mb-2">Live chat</h2>
                <p class="text-left mb-4">Have a question? Talk to our sales and engineering team.</p>
                <p class="text-left"><b>Mon to Sat:</b> 8am - 6pm</p>
                <a target="_blank" rel="noopener" href="<?php echo esc_url('https://api.whatsapp.com/send/?phone=447857870000&text=Hi+Gasboiler+I+need+Quote+%2F+Assistance&type=phone_number&app_absent=0')?>" class=" bg-green-100 hover:bg-green-200 rounded-lg p-2 mt-4 flex w-full justify-start items-center rounded-lg p-2 mt-4 cursor-pointer open_live_chat_multi  btn-secondary">
                    <span class="blob-online"></span>
                    <p class="text-green-800">Live chat online</p>
                </a>
            </div>
            <div class="col-span-12 sm:col-span-6 lg:col-span-4 p-6 bg-white rounded-2xl">
                <h3 class="text-left text-3xl lg:text-4xl font-medium mb-2">Boiler troubles?</h3>
                <p class="text-left mb-2">Report an issue to the aftercare team.</p>
                <p class="text-left">The fastest way is to report any issue using the button below.</p>
                <a target="_blank" rel="noopener" href="<?php echo esc_url('https://api.whatsapp.com/send/?phone=447857870000&text=Hi+Gasboiler+I+need+Quote+%2F+Assistance&type=phone_number&app_absent=0')?>" class="btn btn-primary mt-6 w-full">
                    Report an issue
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-gray-100 px-4 py-14">
    <div class="container block container-v5 text-center">
        <h2 class="text-4xl lg:text-5xl font-medium">Having issues with your boiler or thermostat?</h2>
        <p class="mt-4">Looking for support? Talk to the manufacturer directly</p>
        <div class="grid grid-cols-12 mt-14 gap-4">
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/alpha.webp" alt="Alpha logo" class="h-8">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:03448718760">0344 871 8760</a></p>
                    <p>info@alpha-innovation.co.uk</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/ariston.webp" alt="Ariston logo" class="h-8">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:03332408777">0333 240 8777</a></p>
                    <p>techhelpdesk@ariston.com</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/eph.webp" alt="EPH logo" class="h-8">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:01933626396">01933 626 396</a></p>
                    <p>sales@ephcontrols.com</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/glowworm.webp" alt="Glow-worm logo" class="h-8">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:03301003142">0330 100 3142</a></p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/ideal.webp" alt="Ideal logo" class="h-8">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:01482498660">01482 498660</a></p>
                    <p>support@idealboilers.com</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/honeywell.webp" alt="Honeywell logo" class="h-7">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:03001301299">0300 130 1299</a></p>
                    <p>technical.support@resideo.com</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/worcester.webp" alt="Worcester Bosch logo" class="h-8">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:03301233366">0330 123 3366</a></p>
                    <p>technical-advice@uk.bosch.com</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/vaillant.webp" alt="Vaillant logo" class="h-8">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:03301003540">0330 100 3540</a></p>
                    <p>advance-support@vaillant.co.uk</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/navien.webp" alt="Navien logo" class="h-7">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:03443322323">0344 332 2323</a></p>
                    <p>service@navienuk.com</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/viessmann.webp" alt="Viessmann logo" class="h-7">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:01952675060">01952 675060</a></p>
                    <p>aftersales-uk@viessmann.com</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/hive.webp" alt="Hive logo" class="h-6">
                <div class="text-center md:text-right">
                    <p class="text-lg font-medium"><a href="tel:03332029614">0333 202 9614</a></p>
                    <p>help@hivehome.com</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-white rounded-2xl p-6 flex flex-col justify-center md:flex-row items-center md:justify-between">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/manufacturer/nest.webp" alt="Google Nest logo" class="h-6">
                <div class="text-center md:text-right">
                    <p><a href="https://support.google.com/googlenest/gethelp?hl=en" target="_blank" class="underline text-blue-600 ">Support website</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white px-4 py-14">
    <div class="container block container-v5 mx-auto text-center">
        <div class="grid grid-cols-12 gap-4 items-center">
            <div class="col-span-12 md:col-span-6 text-left">
                <h2 class="text-4xl lg:text-6xl font-medium mb-6">A bunch of friendly londoners</h2>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us.jpg" class="w-full sm:w-[80%]" alt="Greenstreet London, the home of Gasboiler">
            </div>
            <div class="col-span-12 md:col-span-6 text-left">
                <h2 class="text-3xl lg:text-4xl font-medium mb-4">Located in the Green St London</h2>
                <p class="text-lg font-medium mb-2">Head office</p>
                <p class="mb-4">Gasboiler, 168 Green St, London E7 8JT</p>
                <p class="text-lg font-medium mb-2">About us</p>
                <p class="mb-4">Gasboiler HQ is a friendly team dedicated to bringing warmth to homes. Rooted in the vibrant community, we're passionate about providing efficient and reliable heating solutions.</p>
                <p class="text-lg font-medium mb-2">Social media</p>
                <p>
                    <a href="https://www.instagram.com/gasboiler1/" target="_blank" rel="nofollow">
                        <i class="fab fa-facebook text-2xl mr-1"></i>
                    </a>
                    <a href="https://www.instagram.com/gasboiler1//" target="_blank" rel="nofollow">
                        <i class="fab fa-instagram text-2xl mr-1"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>



<?php  get_footer(); ?>
