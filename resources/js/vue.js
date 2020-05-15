import CommentForm from './components/comments/CommentForm'
import CommentList from './components/comments/CommentList'
import LandingContact from './components/LandingContact'
import Like from './components/Like'
import Vue from 'vue'

Vue.config.productionTip = false

window.Event = new Vue()

new Vue({
  el: '#app',

  components: {
    CommentForm,
    CommentList,
    Like,
    LandingContact
  },

  mounted () {
    $('[data-confirm]').on('click', () => {
      return confirm($(this).data('confirm'))
    })
  }
})
