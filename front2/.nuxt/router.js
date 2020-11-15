import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _17d14a8c = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _6714f785 = () => interopDefault(import('..\\pages\\blog.vue' /* webpackChunkName: "pages_blog" */))
const _4a50650c = () => interopDefault(import('..\\pages\\blog-details.vue' /* webpackChunkName: "pages_blog-details" */))
const _4e28688d = () => interopDefault(import('..\\pages\\contact.vue' /* webpackChunkName: "pages_contact" */))
const _5744c2e4 = () => interopDefault(import('..\\pages\\index-2.vue' /* webpackChunkName: "pages_index-2" */))
const _c6aae04e = () => interopDefault(import('..\\pages\\index-old.vue' /* webpackChunkName: "pages_index-old" */))
const _45124ed4 = () => interopDefault(import('..\\pages\\login.vue' /* webpackChunkName: "pages_login" */))
const _fd895fde = () => interopDefault(import('..\\pages\\mediapp\\index.vue' /* webpackChunkName: "pages_mediapp_index" */))
const _5937a19e = () => interopDefault(import('..\\pages\\mediapp2\\index.vue' /* webpackChunkName: "pages_mediapp2_index" */))
const _4f62613c = () => interopDefault(import('..\\pages\\register\\index.vue' /* webpackChunkName: "pages_register_index" */))
const _4e708ebc = () => interopDefault(import('..\\pages\\service.vue' /* webpackChunkName: "pages_service" */))
const _440bbcd2 = () => interopDefault(import('..\\pages\\service-details.vue' /* webpackChunkName: "pages_service-details" */))
const _7372eb3e = () => interopDefault(import('..\\pages\\user\\appointment.vue' /* webpackChunkName: "pages_user_appointment" */))
const _1fce086b = () => interopDefault(import('..\\pages\\user\\profile.vue' /* webpackChunkName: "pages_user_profile" */))
const _64c29ada = () => interopDefault(import('..\\pages\\register\\components\\HospitalForm.vue' /* webpackChunkName: "pages_register_components_HospitalForm" */))
const _0d4faddd = () => interopDefault(import('..\\pages\\register\\components\\PatientForm.vue' /* webpackChunkName: "pages_register_components_PatientForm" */))
const _67b90734 = () => interopDefault(import('..\\pages\\register\\components\\TypeSelection.vue' /* webpackChunkName: "pages_register_components_TypeSelection" */))
const _a49f8e04 = () => interopDefault(import('..\\pages\\doctor-detail\\_id.vue' /* webpackChunkName: "pages_doctor-detail__id" */))
const _71de7959 = () => interopDefault(import('..\\pages\\hospital-detail\\_id.vue' /* webpackChunkName: "pages_hospital-detail__id" */))
const _13cf357f = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

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
    component: _17d14a8c,
    name: "about"
  }, {
    path: "/blog",
    component: _6714f785,
    name: "blog"
  }, {
    path: "/blog-details",
    component: _4a50650c,
    name: "blog-details"
  }, {
    path: "/contact",
    component: _4e28688d,
    name: "contact"
  }, {
    path: "/index-2",
    component: _5744c2e4,
    name: "index-2"
  }, {
    path: "/index-old",
    component: _c6aae04e,
    name: "index-old"
  }, {
    path: "/login",
    component: _45124ed4,
    name: "login"
  }, {
    path: "/mediapp",
    component: _fd895fde,
    name: "mediapp"
  }, {
    path: "/mediapp2",
    component: _5937a19e,
    name: "mediapp2"
  }, {
    path: "/register",
    component: _4f62613c,
    name: "register"
  }, {
    path: "/service",
    component: _4e708ebc,
    name: "service"
  }, {
    path: "/service-details",
    component: _440bbcd2,
    name: "service-details"
  }, {
    path: "/user/appointment",
    component: _7372eb3e,
    name: "user-appointment"
  }, {
    path: "/user/profile",
    component: _1fce086b,
    name: "user-profile"
  }, {
    path: "/register/components/HospitalForm",
    component: _64c29ada,
    name: "register-components-HospitalForm"
  }, {
    path: "/register/components/PatientForm",
    component: _0d4faddd,
    name: "register-components-PatientForm"
  }, {
    path: "/register/components/TypeSelection",
    component: _67b90734,
    name: "register-components-TypeSelection"
  }, {
    path: "/doctor-detail/:id?",
    component: _a49f8e04,
    name: "doctor-detail-id"
  }, {
    path: "/hospital-detail/:id?",
    component: _71de7959,
    name: "hospital-detail-id"
  }, {
    path: "/",
    component: _13cf357f,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
