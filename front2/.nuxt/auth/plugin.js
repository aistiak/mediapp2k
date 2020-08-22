import Auth from './auth'

import './middleware'

// Active schemes
import scheme_3e2123be from './schemes/local.js'

export default function (ctx, inject) {
  // Options
  const options = {"resetOnError":false,"scopeKey":"scope","rewriteRedirects":true,"fullPathRedirect":false,"watchLoggedIn":true,"redirect":{"login":"/login","logout":"/","home":"/index-2","callback":"/login"},"vuex":{"namespace":"auth"},"cookie":{"prefix":"auth.","options":{"path":"/"}},"localStorage":{"prefix":"auth."},"token":{"prefix":"_token."},"refresh_token":{"prefix":"_refresh_token."},"defaultStrategy":"password_grant"}

  // Create a new Auth instance
  const $auth = new Auth(ctx, options)

  // Register strategies
  // password_grant
  $auth.registerStrategy('password_grant', new scheme_3e2123be($auth, {"endpoints":{"login":{"url":"/oauth/token","method":"post","propertyName":"access_token"},"logout":false,"user":{"url":"/api/user/info","method":"get","propertyName":"user"}},"tokenRequired":true,"tokenType":"Bearer","_name":"password_grant"}))

  // Inject it to nuxt context as $auth
  inject('auth', $auth)
  ctx.$auth = $auth

  // Initialize auth
  return $auth.init().catch(error => {
    if (process.client) {
      console.error('[ERROR] [AUTH]', error)
    }
  })
}
