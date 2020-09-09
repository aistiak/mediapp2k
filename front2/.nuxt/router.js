import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _0fc78dca = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _abebbb16 = () => interopDefault(import('..\\pages\\blog.vue' /* webpackChunkName: "pages_blog" */))
const _d9a9ef2c = () => interopDefault(import('..\\pages\\blog-details.vue' /* webpackChunkName: "pages_blog-details" */))
const _3e98179d = () => interopDefault(import('..\\pages\\contact.vue' /* webpackChunkName: "pages_contact" */))
const _47b471f4 = () => interopDefault(import('..\\pages\\index-2.vue' /* webpackChunkName: "pages_index-2" */))
const _0db1e8b4 = () => interopDefault(import('..\\pages\\login.vue' /* webpackChunkName: "pages_login" */))
const _71ab8f01 = () => interopDefault(import('..\\pages\\mediapp\\index.vue' /* webpackChunkName: "pages_mediapp_index" */))
const _1e08637e = () => interopDefault(import('..\\pages\\mediapp2\\index.vue' /* webpackChunkName: "pages_mediapp2_index" */))
const _6cfa004c = () => interopDefault(import('..\\pages\\register\\index.vue' /* webpackChunkName: "pages_register_index" */))
const _6d91309c = () => interopDefault(import('..\\pages\\service.vue' /* webpackChunkName: "pages_service" */))
const _08dc7eb2 = () => interopDefault(import('..\\pages\\service-details.vue' /* webpackChunkName: "pages_service-details" */))
const _471ab51e = () => interopDefault(import('..\\pages\\user\\appointment.vue' /* webpackChunkName: "pages_user_appointment" */))
const _71e22b7b = () => interopDefault(import('..\\pages\\user\\profile.vue' /* webpackChunkName: "pages_user_profile" */))
const _cfe3fc6c = () => interopDefault(import('..\\pages\\register\\components\\HospitalForm.vue' /* webpackChunkName: "pages_register_components_HospitalForm" */))
const _4083a8ed = () => interopDefault(import('..\\pages\\register\\components\\PatientForm.vue' /* webpackChunkName: "pages_register_components_PatientForm" */))
const _0244f376 = () => interopDefault(import('..\\pages\\register\\components\\TypeSelection.vue' /* webpackChunkName: "pages_register_components_TypeSelection" */))
const _5d077fee = () => interopDefault(import('..\\pages\\doctor-detail\\_id.vue' /* webpackChunkName: "pages_doctor-detail__id" */))
const _af00776e = () => interopDefault(import('..\\pages\\hospital-detail\\_id.vue' /* webpackChunkName: "pages_hospital-detail__id" */))
const _2f7f688f = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

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
    component: _0fc78dca,
    name: "about"
  }, {
    path: "/blog",
    component: _abebbb16,
    name: "blog"
  }, {
    path: "/blog-details",
    component: _d9a9ef2c,
    name: "blog-details"
  }, {
    path: "/contact",
    component: _3e98179d,
    name: "contact"
  }, {
    path: "/index-2",
    component: _47b471f4,
    name: "index-2"
  }, {
    path: "/login",
    component: _0db1e8b4,
    name: "login"
  }, {
    path: "/mediapp",
    component: _71ab8f01,
    name: "mediapp"
  }, {
    path: "/mediapp2",
    component: _1e08637e,
    name: "mediapp2"
  }, {
    path: "/register",
    component: _6cfa004c,
    name: "register"
  }, {
    path: "/service",
    component: _6d91309c,
    name: "service"
  }, {
    path: "/service-details",
    component: _08dc7eb2,
    name: "service-details"
  }, {
    path: "/user/appointment",
    component: _471ab51e,
    name: "user-appointment"
  }, {
    path: "/user/profile",
    component: _71e22b7b,
    name: "user-profile"
  }, {
    path: "/register/components/HospitalForm",
    component: _cfe3fc6c,
    name: "register-components-HospitalForm"
  }, {
    path: "/register/components/PatientForm",
    component: _4083a8ed,
    name: "register-components-PatientForm"
  }, {
    path: "/register/components/TypeSelection",
    component: _0244f376,
    name: "register-components-TypeSelection"
  }, {
    path: "/doctor-detail/:id?",
    component: _5d077fee,
    name: "doctor-detail-id"
  }, {
    path: "/hospital-detail/:id?",
    component: _af00776e,
    name: "hospital-detail-id"
  }, {
    path: "/",
    component: _2f7f688f,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
