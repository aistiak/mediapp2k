import Vue from 'vue'
import Meta from 'vue-meta'
import ClientOnly from 'vue-client-only'
import NoSsr from 'vue-no-ssr'
import { createRouter } from './router.js'
import NuxtChild from './components/nuxt-child.js'
import NuxtError from './components/nuxt-error.vue'
import Nuxt from './components/nuxt.js'
import App from './App.js'
import { setContext, getLocation, getRouteData, normalizeError } from './utils'
import { createStore } from './store.js'

/* Plugins */

// Component: <ClientOnly>
Vue.component(ClientOnly.name, ClientOnly)
/**/
import axios from "axios"
Vue.prototype.$http = axios 
axios.defaults.baseURL = "http://127.0.0.1:8000/"
// TODO: Remove in Nuxt 3: <NoSsr>
Vue.component(NoSsr.name, {
  ...NoSsr,
  render (h, ctx) {
    if (process.client && !NoSsr._warned) {
      NoSsr._warned = true

      console.warn('<no-ssr> has been deprecated and will be removed in Nuxt 3, please use <client-only> instead')
    }
    return NoSsr.render(h, ctx)
  }
})

// Component: <NuxtChild>
Vue.component(NuxtChild.name, NuxtChild)
Vue.component('NChild', NuxtChild)

// Component NuxtLink is imported in server.js or client.js

// Component: <Nuxt>
Vue.component(Nuxt.name, Nuxt)

Vue.use(Meta, {"keyName":"head","attribute":"data-n-head","ssrAttribute":"data-n-head-ssr","tagIDKeyName":"hid"})

const defaultTransition = {"name":"page","mode":"out-in","appear":false,"appearClass":"appear","appearActiveClass":"appear-active","appearToClass":"appear-to"}

async function createApp (ssrContext) {
  const router = await createRouter(ssrContext)

  const store = createStore(ssrContext)
  // Add this.$router into store actions/mutations
  store.$router = router

  // Fix SSR caveat https://github.com/nuxt/nuxt.js/issues/3757#issuecomment-414689141
  const registerModule = store.registerModule
  store.registerModule = (path, rawModule, options) => registerModule.call(store, path, rawModule, Object.assign({ preserveState: process.client }, options))

  // Create Root instance

  // here we inject the router and store to all child components,
  // making them available everywhere as `this.$router` and `this.$store`.
  const app = {
    head: {"title":"loazzne","meta":[{"charset":"utf-8"},{"name":"viewport","content":"width=device-width, initial-scale=1"},{"hid":"description","name":"description","content":"Loazzne - Vue Nuxt Heating &amp; Air Conditioning Services Template"}],"link":[{"rel":"icon","type":"image\u002Fpng","href":"\u002Fassets\u002Fimages\u002Ffavicon.png"},{"rel":"stylesheet","href":"https:\u002F\u002Ffonts.googleapis.com\u002Fcss?family=Josefin+Sans:100,300,400,600,600i,700"},{"rel":"stylesheet","href":"\u002Fassets\u002Fcss\u002Fbootstrap.min.css"},{"rel":"stylesheet","href":"\u002Fassets\u002Fcss\u002Ffont-awesome.min.css"},{"rel":"stylesheet","href":"\u002Fassets\u002Fcss\u002Fowl.carousel.min.css"},{"rel":"stylesheet","href":"\u002Fassets\u002Fcss\u002Ffontello.css"},{"rel":"stylesheet","href":"\u002Fassets\u002Fcss\u002Fanimate.css"},{"rel":"stylesheet","href":"\u002Fassets\u002Fcss\u002Fstyle.css"},{"rel":"stylesheet","href":"\u002Fassets\u002Fcss\u002Fresponsive.css"}],"script":[{"src":"\u002Fassets\u002Fjs\u002Fjquery.min.js","type":"text\u002Fjavascript","body":true},{"src":"\u002Fassets\u002Fjs\u002Fbootstrap.min.js","type":"text\u002Fjavascript","body":true},{"src":"\u002Fassets\u002Fjs\u002Fowl.carousel.min.js","type":"text\u002Fjavascript","body":true},{"src":"\u002Fassets\u002Fjs\u002Fjquery.magnific-popup.min.js","type":"text\u002Fjavascript","body":true},{"src":"\u002Fassets\u002Fjs\u002Fwaypoint.js","type":"text\u002Fjavascript","body":true},{"src":"\u002Fassets\u002Fjs\u002Fjquery.counterup.min.js","type":"text\u002Fjavascript","body":true},{"src":"\u002Fassets\u002Fjs\u002Fcustom-map.js","type":"text\u002Fjavascript","body":true},{"src":"https:\u002F\u002Fmaps.googleapis.com\u002Fmaps\u002Fapi\u002Fjs?key=AIzaSyA_Agsvf36du-7l_mp8iu1a-rXoKcWfs2I","type":"text\u002Fjavascript","body":true}],"style":[]},

    store,
    router,
    nuxt: {
      defaultTransition,
      transitions: [defaultTransition],
      setTransitions (transitions) {
        if (!Array.isArray(transitions)) {
          transitions = [transitions]
        }
        transitions = transitions.map((transition) => {
          if (!transition) {
            transition = defaultTransition
          } else if (typeof transition === 'string') {
            transition = Object.assign({}, defaultTransition, { name: transition })
          } else {
            transition = Object.assign({}, defaultTransition, transition)
          }
          return transition
        })
        this.$options.nuxt.transitions = transitions
        return transitions
      },

      err: null,
      dateErr: null,
      error (err) {
        err = err || null
        app.context._errored = Boolean(err)
        err = err ? normalizeError(err) : null
        let nuxt = app.nuxt // to work with @vue/composition-api, see https://github.com/nuxt/nuxt.js/issues/6517#issuecomment-573280207
        if (this) {
          nuxt = this.nuxt || this.$options.nuxt
        }
        nuxt.dateErr = Date.now()
        nuxt.err = err
        // Used in src/server.js
        if (ssrContext) {
          ssrContext.nuxt.error = err
        }
        return err
      }
    },
    ...App
  }

  // Make app available into store via this.app
  store.app = app

  const next = ssrContext ? ssrContext.next : location => app.router.push(location)
  // Resolve route
  let route
  if (ssrContext) {
    route = router.resolve(ssrContext.url).route
  } else {
    const path = getLocation(router.options.base, router.options.mode)
    route = router.resolve(path).route
  }

  // Set context to app.context
  await setContext(app, {
    store,
    route,
    next,
    error: app.nuxt.error.bind(app),
    payload: ssrContext ? ssrContext.payload : undefined,
    req: ssrContext ? ssrContext.req : undefined,
    res: ssrContext ? ssrContext.res : undefined,
    beforeRenderFns: ssrContext ? ssrContext.beforeRenderFns : undefined,
    ssrContext
  })

  if (process.client) {
    // Replace store state before plugins execution
    if (window.__NUXT__ && window.__NUXT__.state) {
      store.replaceState(window.__NUXT__.state)
    }
  }

  // Plugin execution

  // If server-side, wait for async component to be resolved first
  if (process.server && ssrContext && ssrContext.url) {
    await new Promise((resolve, reject) => {
      router.push(ssrContext.url, resolve, () => {
        // navigated to a different route in router guard
        const unregister = router.afterEach(async (to, from, next) => {
          ssrContext.url = to.fullPath
          app.context.route = await getRouteData(to)
          app.context.params = to.params || {}
          app.context.query = to.query || {}
          unregister()
          resolve()
        })
      })
    })
  }

  return {
    store,
    app,
    router
  }
}

export { createApp, NuxtError }
