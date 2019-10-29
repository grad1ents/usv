<template>
    <div id="app" :class="{loading : stateLoadingMirror}">
      <loader></loader>
      <transition  name="top-navigation"
        enter-active-class="animated slideInDown"
        leave-active-class="animated slideOutUp"
        mode="out-in"
      >
      <user-top-navigation v-show='userToken'></user-top-navigation>
      </transition>
      <div class="content-container">
          <router-view></router-view>
      </div>
    </div>
</template>

<script>
import Vue from 'vue'
import './common/Styles.js'
import Loader from './components/common/Loader'
import UserTopNavigation from './components/user/common/user-top-navigation'

export default {
  data () {
    return {}
  },
  name: 'App',
  computed: {
    stateLoadingMirror () {
      return this.$store.state.isLoading
    },
    userToken () {
      return this.$store.state.userToken
    }
  },
  components: {
    Loader, UserTopNavigation
  },
  created () {
    // Setup Authorization Header for all requests henceforth
    Vue.http.headers.common['Authorization'] = window.localStorage.getItem('w2s_token') ? window.localStorage.getItem('w2s_token') : ''

    // Setup User Data from the server
    this.setupUserData()

    // Setting defaults for notifications
    Vue.notySetDefaults({
      layout: 'topRight',
      theme: 'relax',
      timeout: 5000,
      animation: {
        open: 'animated flipInX',
        close: 'animated flipOutX'
      }
    })
  }
}
</script>

<style>
html {
  height: 100%;
}
.page-transition {
  -webkit-animation-duration: .2s !important;
  animation-duration: .2s !important;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

.content-container {
  padding-top:80px;
}
</style>
