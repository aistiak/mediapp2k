import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _9eb0f24c = () => interopDefault(import('..\\pages\\about.vue' /* webpackChunkName: "pages_about" */))
const _80827136 = () => interopDefault(import('..\\pages\\blog.vue' /* webpackChunkName: "pages_blog" */))
const _e7b8854c = () => interopDefault(import('..\\pages\\blog-details.vue' /* webpackChunkName: "pages_blog-details" */))
const _275e0cad = () => interopDefault(import('..\\pages\\contact.vue' /* webpackChunkName: "pages_contact" */))
const _307a6704 = () => interopDefault(import('..\\pages\\index-2.vue' /* webpackChunkName: "pages_index-2" */))
const _01f0a80e = () => interopDefault(import('..\\pages\\index-old.vue' /* webpackChunkName: "pages_index-old" */))
const _cbf1f694 = () => interopDefault(import('..\\pages\\login.vue' /* webpackChunkName: "pages_login" */))
const _0f4ac7f1 = () => interopDefault(import('..\\pages\\mediapp\\index.vue' /* webpackChunkName: "pages_mediapp_index" */))
const _0743b351 = () => interopDefault(import('..\\pages\\mediapp2\\index.vue' /* webpackChunkName: "pages_mediapp2_index" */))
const _f97c3548 = () => interopDefault(import('..\\pages\\register\\index.vue' /* webpackChunkName: "pages_register_index" */))
const _9c05467c = () => interopDefault(import('..\\pages\\service.vue' /* webpackChunkName: "pages_service" */))
const _11d9a5b7 = () => interopDefault(import('..\\pages\\service-details.vue' /* webpackChunkName: "pages_service-details" */))
const _ff54f2fe = () => interopDefault(import('..\\pages\\user\\appointment.vue' /* webpackChunkName: "pages_user_appointment" */))
const _cfffd6ea = () => interopDefault(import('..\\pages\\user\\profile.vue' /* webpackChunkName: "pages_user_profile" */))
const _754762ba = () => interopDefault(import('..\\pages\\register\\components\\HospitalForm.vue' /* webpackChunkName: "pages_register_components_HospitalForm" */))
const _372269fd = () => interopDefault(import('..\\pages\\register\\components\\PatientForm.vue' /* webpackChunkName: "pages_register_components_PatientForm" */))
const _67909ef4 = () => interopDefault(import('..\\pages\\register\\components\\TypeSelection.vue' /* webpackChunkName: "pages_register_components_TypeSelection" */))
const _3580c0de = () => interopDefault(import('..\\pages\\doctor-detail\\_id.vue' /* webpackChunkName: "pages_doctor-detail__id" */))
const _47ac8939 = () => interopDefault(import('..\\pages\\hospital-detail\\_id.vue' /* webpackChunkName: "pages_hospital-detail__id" */))
const _5f413cc2 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))

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
    component: _9eb0f24c,
    name: "about"
  }, {
    path: "/blog",
    component: _80827136,
    name: "blog"
  }, {
    path: "/blog-details",
    component: _e7b8854c,
    name: "blog-details"
  }, {
    path: "/contact",
    component: _275e0cad,
    name: "contact"
  }, {
    path: "/index-2",
    component: _307a6704,
    name: "index-2"
  }, {
    path: "/index-old",
    component: _01f0a80e,
    name: "index-old"
  }, {
    path: "/login",
    component: _cbf1f694,
    name: "login"
  }, {
    path: "/mediapp",
    component: _0f4ac7f1,
    name: "mediapp"
  }, {
    path: "/mediapp2",
    component: _0743b351,
    name: "mediapp2"
  }, {
    path: "/register",
    component: _f97c3548,
    name: "register"
  }, {
    path: "/service",
    component: _9c05467c,
    name: "service"
  }, {
    path: "/service-details",
    component: _11d9a5b7,
    name: "service-details"
  }, {
    path: "/user/appointment",
    component: _ff54f2fe,
    name: "user-appointment"
  }, {
    path: "/user/profile",
    component: _cfffd6ea,
    name: "user-profile"
  }, {
    path: "/register/components/HospitalForm",
    component: _754762ba,
    name: "register-components-HospitalForm"
  }, {
    path: "/register/components/PatientForm",
    component: _372269fd,
    name: "register-components-PatientForm"
  }, {
    path: "/register/components/TypeSelection",
    component: _67909ef4,
    name: "register-components-TypeSelection"
  }, {
    path: "/doctor-detail/:id?",
    component: _3580c0de,
    name: "doctor-detail-id"
  }, {
    path: "/hospital-detail/:id?",
    component: _47ac8939,
    name: "hospital-detail-id"
  }, {
    path: "/",
    component: _5f413cc2,
    name: "index"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
