import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _1451f232 = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _bc24dde6 = () => interopDefault(import('..\\pages\\blog.vue' /* webpackChunkName: "pages_blog" */))
const _68625f02 = () => interopDefault(import('..\\pages\\blog-details.vue' /* webpackChunkName: "pages_blog-details" */))
const _4a1b0205 = () => interopDefault(import('..\\pages\\contact.vue' /* webpackChunkName: "pages_contact" */))
const _53375c5c = () => interopDefault(import('..\\pages\\index-2.vue' /* webpackChunkName: "pages_index-2" */))
const _568b5bcc = () => interopDefault(import('..\\pages\\service.vue' /* webpackChunkName: "pages_service" */))
const _2e57c30f = () => interopDefault(import('..\\pages\\service-details.vue' /* webpackChunkName: "pages_service-details" */))
const _3409ccf7 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

// TODO: remove in Nuxt 3
const emptyFn = () => {}
const originalPush = Router.prototype.push
Router.prototype.push = function push (location, onComplete = emptyFn, onAbort) {
  return originalPush.call(this, location, onComplete, onAbort)
}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/about",
    component: _1451f232,
    name: "about"
  }, {
    path: "/blog",
    component: _bc24dde6,
    name: "blog"
  }, {
    path: "/blog-details",
    component: _68625f02,
    name: "blog-details"
  }, {
    path: "/contact",
    component: _4a1b0205,
    name: "contact"
  }, {
    path: "/index-2",
    component: _53375c5c,
    name: "index-2"
  }, {
    path: "/service",
    component: _568b5bcc,
    name: "service"
  }, {
    path: "/service-details",
    component: _2e57c30f,
    name: "service-details"
  }, {
    path: "/",
    component: _3409ccf7,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
