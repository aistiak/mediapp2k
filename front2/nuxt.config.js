
require('dotenv').config()
export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/png', href: '/assets/logos/icon-01.png' },
      { rel: "stylesheet", href: "https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,600i,700" },

      { rel: "stylesheet", href: "/assets/css/bootstrap.min.css" },
      { rel: "stylesheet", href: "/assets/css/font-awesome.min.css" },
      { rel: "stylesheet", href: "/assets/css/owl.carousel.min.css" },
      { rel: "stylesheet", href: "/assets/css/fontello.css" },
      { rel: "stylesheet", href: "/assets/css/animate.css" },
      { rel: "stylesheet", href: "/assets/css/style.css" },
      { rel: "stylesheet", href: "/assets/css/responsive.css" },
    ],

    script: [
      { src: "/assets/js/jquery.min.js", type: "text/javascript", body: true },
      { src: "/assets/js/bootstrap.min.js", type: "text/javascript", body: true },
      { src: "/assets/js/owl.carousel.min.js", type: "text/javascript", body: true },
      { src: "/assets/js/jquery.magnific-popup.min.js", type: "text/javascript", body: true },
      { src: "/assets/js/waypoint.js", type: "text/javascript", body: true },
      { src: "/assets/js/jquery.counterup.min.js", type: "text/javascript", body: true },
      { src: "/assets/js/custom-map.js", type: "text/javascript", body: true },
      { src: "https://maps.googleapis.com/maps/api/js?key=AIzaSyA_Agsvf36du-7l_mp8iu1a-rXoKcWfs2I", type: "text/javascript", body: true },
      //{ src: "/assets/js/custom.js", type: "text/javascript", body: true },
    ]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: {
    color: '#09aeb8',
    height: '4px'
  },
  /*
  ** Global CSS
  */
  css: [

    
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/foo.js',
   
    {src:  '~/plugins/notifications.js', ssr: false}
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
    '@nuxtjs/vuetify',
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/proxy',
    '@nuxtjs/auth' ,
    'nuxt-leaflet' ,
  ],

  auth: {
    redirect: {
      login: '/login',
      logout: '/',
      callback: '/login',
      home: '/index-2'
    },
    strategies: {
      local: false,
      password_grant: {
        _scheme: 'local',
        endpoints: {
          login: {
            url: '/oauth/token',
            method: 'post',
            propertyName: 'access_token'
          },
          logout: false,
          user: {
            url: '/api/user/info',
            method: 'get',
            propertyName: 'user'
          }
        },
        tokenRequired: true,
        tokenType: 'Bearer'
      },
      // local: {
      //   endpoints: {
      //     login: { url: '/oauth/token', method: 'post', propertyName: 'access_token' },
      //     logout: false,
      //     user: { url: '/api/user', method: 'get', propertyName: 'data' }
      //   },
      //   tokenRequired: true,
      //   tokenType: 'Bearer'
      // }
    }
  },
  axios: {
    // baseURL: 'http://localhost:8000',
    baseURL: process.env.API_URL,
    proxy: false,
    credentials: false
  },
  proxy: {
    // '/api': {
    //   target: 'http://127.0.0.1:8000',
    //   pathRewrite: {
    //     '^/api' : 'http://127.0.0.1:8000'
    //     }
    //   },

  },

  
  /*
  ** optimizedImages
  */
  optimizedImages: {
    optimizeImages: true
  },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  },

  router: {
    mode: 'history'
  }
}
