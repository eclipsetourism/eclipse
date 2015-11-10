var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | PUBLIC ASSETS
 |--------------------------------------------------------------------------
 */

var bowers = '../bower_components/';

elixir(function(mix) {
	mix.sass('app.scss', 'resources/assets/css/app.css')
  
    	.styles([
          'libs/bootstrap.custom.css',
          'libs/bootstrap-formhelpers.css',
          'libs/bootstrap-formhelpers-countries.flags.css',
          'libs/bootstrap-formhelpers-currencies.flags.css',
          bowers + 'materialize/dist/css/materialize.css',
          bowers + 'sweetalert/dist/sweetalert.css',
          bowers + 'wowjs/css/libs/animate.css',
          bowers + 'fontawesome/css/font-awesome.css',
          'app.css'
    	], 'public/css/public.css')

      .scripts([
          'libs/modernizr.custom.js',
          bowers + 'jquery/dist/jquery.js',
          'libs/bootstrap-formhelpers-selectbox.js',
          'libs/bootstrap-formhelpers-currencies.en_US.js',
          'libs/bootstrap-formhelpers-currencies.js',
          bowers + 'materialize/dist/js/materialize.js',
          bowers + 'sweetalert/dist/sweetalert.min.js',
          bowers + 'wowjs/dist/wow.js',
          'app.js'
      ], 'public/js/public.js')

      .scripts([
        'libs/billing.js'
        ], 'public/js/billing.js')


      .styles([
        'libs/hero-slider.css'
        ], 'public/css/hero-slider.css')

      .styles([
        bowers + 'owl-carousel/owl-carousel/owl.carousel.css',
        bowers + 'owl-carousel/owl-carousel/owl.theme.css'
        ], 'public/css/owl-carousel.css')

      .scripts([
        'libs/hero-slider.js'
        ], 'public/js/hero-slider.js')

      .scripts([
        bowers + 'owl-carousel/owl-carousel/owl.carousel.js',
        'libs/owl-carousel.js'
        ], 'public/js/owl-carousel.js');


/*
 |--------------------------------------------------------------------------
 | ADMIN ASSETS
 |--------------------------------------------------------------------------
 */

 mix.sass('admin.scss', 'resources/assets/css/admin/admin.css')
    
    .styles([
      'admin/admin.css',
      'admin/sb-admin.css',
      bowers + 'fontawesome/css/font-awesome.css',
      bowers + 'sweetalert/dist/sweetalert.css',
      bowers + 'metisMenu/dist/metisMenu.css'
      ], 'public/css/admin.css')

    .styles([
      bowers + 'dropzone/dist/dropzone.css'
      ], 'public/css/dropzone.css')

    .scripts([
      'libs/modernizr.custom.js',
      bowers + 'jquery/dist/jquery.js',
      bowers + 'bootstrap/dist/js/bootstrap.js',
      bowers + 'sweetalert/dist/sweetalert.min.js',
      bowers + 'metisMenu/dist/metisMenu.js',
      'admin/admin.js',
      'admin/sb-admin.js'

      ], 'public/js/admin.js')

    .scripts([
      bowers + 'dropzone/dist/dropzone.js',
      'admin/dropzone.js'
      ], 'public/js/dropzone.js')

    .version([
      'css/public.css',
      'js/public.js',

      'js/billing.js',
      
      //'css/bootstrap.custom.css',
      
      'css/hero-slider.css',
      'js/hero-slider.js',
      
      'css/owl-carousel.css',
      'js/owl-carousel.js',

      'css/admin.css',
      'js/admin.js',

      'css/dropzone.css',
      'js/dropzone.js'
      ]);
});
