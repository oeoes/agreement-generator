import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import Axios from 'axios'

// Auth package
import Auth from './components/auth/Authentication'
import CKEditor from './components/auth/CKeditor'

// components
import App from './components/App'
import UserPage from './components/app/UserPage'
import DocPage from './components/app/DocPage'
import Login from './components/auth/Login'
import CreateTemplate from './components/app/CreateTemplate'
import TemplateCollections from './components/app/TemplateCollections'
import FormUpdate from './components/templates/parts/FormUpdate'
import ViewTemplate from './components/templates/parts/ViewTemplate'
import ViewDoc from './components/templates/parts/ViewDoc'
import CustomHeaderFooter from './components/app/CustomHeaderFooter'
import ActivityLog from './components/app/ActivityLog'
import DetailLog from './components/templates/parts/DetailLog'



Vue.use(VueRouter)
Vue.use(Auth)
Vue.use(CKEditor)
Vue.use(VueResource)

// Header
Axios.defaults.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken()
Axios.defaults.baseURL = 'http://localhost:8000'

// routes
const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            redirect: 'user'
        },
        {
            path: '/update/:id',
            name: 'template-update',
            component: FormUpdate,
            meta: {
                forAuth: true
            }
        },
        {
            path: '/view/:id',
            name: 'template-view',
            component: ViewTemplate,
            meta: {
                forAuth: true
            }
        },
        {
            path: '/view/doc/:id',
            name: 'template-view-doc',
            component: ViewDoc,
            meta: {
                forAuth: true
            }
        },
        {
            path: '/user',
            name: 'user',
            component: UserPage,
            meta: {
                forAuth: true
            }
        },
        {
            path: '/docs',
            name: 'doc',
            component: DocPage,
            meta: {
                forAuth: true
            }
        },
        {
            path: '/template',
            name: 'template',
            component: CreateTemplate,
            meta: {
                forAuth: true
            }
        },
        {
            path: '/template/view',
            name: 'template_collections',
            component: TemplateCollections,
            meta: {
                forAuth: true
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                forVisitors: true,
                layout: 'login'
            }
        },
        {
            path: '/custom',
            name: 'custom_header_footer',
            component: CustomHeaderFooter,
            meta: {
                forAuth: true
            }
        },
        {
            path: '/log',
            name: 'activity_log',
            component: ActivityLog,
            meta: {
                forAuth: true
            }
        },
        {
            path: '/log/:id',
            name: 'detail_log',
            component: DetailLog,
            meta: {
                forAuth: true
            }
        }
    ]
})

// Navigation guard
router.beforeEach(
    (to, from, next) => {
        if (to.matched.some(record => record.meta.forVisitors)) {
            if (Vue.auth.isAuthenticated()) {
                next({
                    path: '/user'
                })
            } else next()
        } else if (to.matched.some(record => record.meta.forAuth)) {
            if (!Vue.auth.isAuthenticated()) {
                next({
                    path: '/login'
                })
            } else next()
        } else next()
    }
)

// instantiation
const app = new Vue({
    el: '#app',
    components: {
        'app': App,
    },
    router,
});

// ckeditor
DecoupledEditor.create(document.querySelector("#doc_editor"))
    .then(editor => {
        const toolbarContainer = document.querySelector("#toolbar-container");

        toolbarContainer.appendChild(editor.ui.view.toolbar.element);
    })
    .catch(error => {
        console.error(error);
    });