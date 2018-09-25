// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'

Vue.config.productionTip = false
Vue.prototype.$project = {
  title: 'RDIA',
  subtitle: 'Repositório Digital CONNEPI',
  year: '2018',
  devs: [
    {
      name: 'Adrysson',
      link: 'https://github.com/adrysson'
    }
  ]
}

Vue.prototype.$bus = new Vue({})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
