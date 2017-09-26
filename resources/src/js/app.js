import Vue from 'vue'
import App from '../components/App'
import '../assets/scss/main.css';

new Vue({
    components:{
        'app_cw': App,
    }
}).$mount('#app');