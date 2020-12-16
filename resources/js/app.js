require('./bootstrap');

import vue from 'vue'

import App from './vue/app'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlusSquare,faTrash } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


library.add(faPlusSquare,faTrash)
vue.component('font-awesome-icon', FontAwesomeIcon)

// Vue.config.productionTip = false

const app=new vue({
    el:"#app",
    components:{App}
})


//we can use vue in both import vue and new vue or Vue in both cases
