import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _4dd821ca = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _44d1e316 = () => interopDefault(import('..\\pages\\blog.vue' /* webpackChunkName: "pages_blog" */))
const _dde8172c = () => interopDefault(import('..\\pages\\blog-details.vue' /* webpackChunkName: "pages_blog-details" */))
const _3ad3ab9d = () => interopDefault(import('..\\pages\\contact.vue' /* webpackChunkName: "pages_contact" */))
const _43f005f4 = () => interopDefault(import('..\\pages\\index-2.vue' /* webpackChunkName: "pages_index-2" */))
const _751a089c = () => interopDefault(import('..\\pages\\service.vue' /* webpackChunkName: "pages_service" */))
const _1cf954a7 = () => interopDefault(import('..\\pages\\service-details.vue' /* webpackChunkName: "pages_service-details" */))
const _6d8ffc8f = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

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
    component: _4dd821ca,
    name: "about"
  }, {
    path: "/blog",
    component: _44d1e316,
    name: "blog"
  }, {
    path: "/blog-details",
    component: _dde8172c,
    name: "blog-details"
  }, {
    path: "/contact",
    component: _3ad3ab9d,
    name: "contact"
  }, {
    path: "/index-2",
    component: _43f005f4,
    name: "index-2"
  }, {
    path: "/service",
    component: _751a089c,
    name: "service"
  }, {
    path: "/service-details",
    component: _1cf954a7,
    name: "service-details"
  }, {
    path: "/",
    component: _6d8ffc8f,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
