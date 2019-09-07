import Vue from 'vue'
import VueRouter from 'vue-router'

// components
import App from './components/App'
import Form from './components/app/GenerateForm'

Vue.use(VueRouter)

// routes
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: 'generate'
        },
        {
            path: '/generate',
            name: 'generate',
            component: Form
        },
    ]
})

// instantiation
const app = new Vue({
    el: '#app',
    components: {
        'app': App,
    },
    router,
});
