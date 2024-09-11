<?php
// Fetch services data from JSON file
$services_json = file_get_contents(get_template_directory() . '/template-parts/services/services.json');
$services = json_decode($services_json, true);
?>

<section id="services" class="services-section gasboiler-services py-20">
  <div class="container mx-auto">
    <div class="row justify-content-center">
       <div class="col-sm-12">
           <div class="services">
               <div class="row">
                      <?php foreach ($services as $service) : ?>
                        <div class="col-md-3 col-sm-6 mb-4">
                          <div class="card p-4 h-100 bg-white shadow-lg transition-transform transform hover:scale-105 duration-300">
                            <img class="img-fluid img-rounded" src="<?php echo esc_url($service['image']); ?>" alt="<?php echo esc_attr($service['title']); ?>" width="125px">
                            <div class="card-body text-left">
                              <h5 class="card-title font-normal text-xl mb-2"><?php echo esc_html($service['title']); ?></h5>
                              <p class="card-text text-gray-700 w-[180px]"><?php echo esc_html($service['description']); ?></p>
                              <a href="<?php echo home_url(esc_url($service['link'])); ?>" class="btn btn-primary mt-4">Service Plan</a>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
               </div>
           </div> 
       </div>
    </div>
  </div>
</section>
