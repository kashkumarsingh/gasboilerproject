<!-- Footer -->
<footer class="footer-wrap bg-custom-blue py-16">
    <div class="container mx-auto">
        <div class="grid lg:grid-cols-4 md:grid-cols-4 gap-4">
            <div class="footer-widget">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo block">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/gasboiler-logo-dark.svg'); ?>" class="w-60 img-fluid" alt="Gasboiler">
                </a>
                <p class="text-gray-300 mt-7 mb-6 pr-2"><?php _e('We believe in excellent service in emergencies, hence we have experienced Gas Safe registered engineers standing by for emergency call out 24 hours a day, 7 days a week, 365 days of the year.', 'meraboiler'); ?></p>
                <ul class="social-profile flex gap-2">
                    <li><a href="https://www.instagram.com/gasboiler1/" target="_blank" rel="noopener" class="text-gray-300 hover:text-blue-400"><i class="fab fa-facebook"></i><span class="sr-only">Follow us on Facebook</span></a></li>
                    <li><a href="https://www.instagram.com/gasboiler1/" target="_blank" rel="noopener" class="text-gray-300 hover:text-blue-400"><i class="fab fa-instagram"></i><span class="sr-only">Follow us on Instagram</span></a></li>
                    <li><a href="https://api.whatsapp.com/send/?phone=447857870000&text=Hi+Gasboiler+I+need+Quote+%2F+Assistance&type=phone_number&app_absent=0" target="_blank" rel="noopener" class="text-gray-300 hover:text-blue-400"><i class="fab fa-whatsapp"></i><span class="sr-only">Contact us on WhatsApp</span></a></li>
                </ul>
            </div>

            <div class="footer-widget">
                <h3 class="text-white text-2xl mb-6"><?php _e('Services', 'gasboiler'); ?></h3>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url(home_url('/service-plan')); ?>" class="text-gray-300 hover:text-white"><?php _e('About Our Company', 'gasboiler'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact-us')); ?>" class="text-gray-300 hover:text-white"><?php _e('Contact Us', 'gasboiler'); ?></a></li>
                </ul>
            </div>

            <div class="footer-widget">
                <h3 class="text-white text-2xl mb-6"><?php _e('Quick Links', 'gasboiler'); ?></h3>
                <ul class="space-y-3">
                    <li><a href="<?php echo esc_url(home_url('/service-plan')); ?>" class="text-gray-300 hover:text-white"><?php _e('Service Plans', 'gasboiler'); ?></a></li>
                    <li><a href="<?php echo esc_url('https://www.gasboiler.com/blog'); ?>" class="text-gray-300 hover:text-white"><?php _e('News & Articles', 'gasboiler'); ?></a></li>
                    <li><a href="<?php echo esc_url('https://www.gasboiler.com/sitemap.xml'); ?>" class="text-gray-300 hover:text-white"><?php _e('Sitemap', 'gasboiler'); ?></a></li>
                </ul>
            </div>

            <div class="footer-widget">
                <h3 class="text-white text-2xl mb-6"><?php _e('Contact Info', 'gasboiler'); ?></h3>
                <ul class="space-y-3">
                    <li class="flex items-start space-x-3">
                        <i class="fa fa-map-marker text-blue-400 text-lg"></i>
                        <div>
                            <h6 class="text-white font-medium"><?php _e('Location', 'gasboiler'); ?></h6>
                            <p class="text-gray-300"><?php _e('Suite #1, Greenleaf House, Pottersbar, Hertsfordshire, EN6 1AD', 'gasboiler'); ?></p>
                        </div>
                    </li>
                    <li class="flex items-start space-x-3">
                        <i class="fa fa-envelope text-blue-400 text-lg"></i>
                        <div>
                            <h6 class="text-white font-medium"><?php _e('Email', 'gasboiler'); ?></h6>
                            <a href="mailto:info@gasboiler.com" class="text-gray-300 hover:text-white">info@gasboiler.com</a>
                        </div>
                    </li>
                    <li class="flex items-start space-x-3">
                        <i class="fa fa-phone text-blue-400 text-lg"></i>
                        <div>
                            <h6 class="text-white font-medium"><?php _e('Phone', 'gasboiler'); ?></h6>
                            <a href="tel:02081502025" class="text-gray-300 hover:text-white">02081502025</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="footer-copyright bg-custom-blue py-4 text-center text-gray-300 border-t border-blue-800">
    <div class="container mx-auto">
        <p class="text-sm">
    <?php
    printf(
        __('Price applicable for changing an existing combi boiler and does exclude VAT. T & Cs Apply. © %d gasboiler | All Rights Reserved', 'gasboiler'),
        date('Y')
    );
    ?>
</p>

    </div>
</div>

<?php wp_footer(); ?>

<!-- DelightChat -->
<script>
    var wa_btnSetting = {
        "btnColor": "#25D366",
        "ctaText": "WhatsApp us",
        "cornerRadius": 7,
        "marginBottom": 20,
        "marginLeft": 20,
        "marginRight": 20,
        "btnPosition": "right",
        "whatsAppNumber": "447857870000",
        "welcomeMessage": "Hi Gasboiler I need Quote / Assistance",
        "zIndex": 100,
        "btnColorScheme": "light",
    };
    var wa_widgetSetting = {
        "title": "Gasboiler",
        "subTitle": "Typically replies in a minute",
        "headerBackgroundColor": "#17253E",
        "headerColorScheme": "light",
        "greetingText": "Hi there! \nHow can I help you?",
        "ctaText": "Start Chat",
        "btnColor": "#17253E",
        "cornerRadius": 7,
        "welcomeMessage": "Hello",
        "btnColorScheme": "light",
        "brandImage": "<?php echo esc_url(wp_get_attachment_url(346)); ?>",
        "darkHeaderColorScheme": {
            "title": "#333333",
            "subTitle": "#4F4F4F"
        }
    };
    window.onload = () => {
        _waEmbed(wa_btnSetting, wa_widgetSetting);
    };
</script>

</body>

</html>
