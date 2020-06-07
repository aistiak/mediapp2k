import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _437306cd = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _4059fd12 = () => interopDefault(import('..\\pages\\blog.vue' /* webpackChunkName: "pages_blog" */))
const _c20e13f2 = () => interopDefault(import('..\\pages\\blog-details.vue' /* webpackChunkName: "pages_blog-details" */))
const _35495be0 = () => interopDefault(import('..\\pages\\contact.vue' /* webpackChunkName: "pages_contact" */))
const _3e65b637 = () => interopDefault(import('..\\pages\\index-2.vue' /* webpackChunkName: "pages_index-2" */))
const _802ea816 = () => interopDefault(import('..\\pages\\service.vue' /* webpackChunkName: "pages_service" */))
const _a6afdc2c = () => interopDefault(import('..\\pages\\service-details.vue' /* webpackChunkName: "pages_service-details" */))
const _632ae192 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

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
    component: _437306cd,
    name: "about"
  }, {
    path: "/blog",
    component: _4059fd12,
    name: "blog"
  }, {
    path: "/blog-details",
    component: _c20e13f2,
    name: "blog-details"
  }, {
    path: "/contact",
    component: _35495be0,
    name: "contact"
  }, {
    path: "/index-2",
    component: _3e65b637,
    name: "index-2"
  }, {
    path: "/service",
    component: _802ea816,
    name: "service"
  }, {
    path: "/service-details",
    component: _a6afdc2c,
    name: "service-details"
  }, {
    path: "/",
    component: _632ae192,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
