// import 'v-markdown-editor/dist/index.css';
// import Editor from 'v-markdown-editor'
//
// Vue.use(Editor);
import '@fortawesome/free-regular-svg-icons'
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import 'font-awesome/css/font-awesome.min.css' // Ensure you are using css-loade
import 'vuetify/es5'
import 'v-markdown-editor/dist/index.css';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/scss/bootstrap.scss'
import 'font-awesome/scss/font-awesome.scss'
import Vue from 'vue'
import Vuetify from 'vuetify'
import VueParticles from 'vue-particles'
import Editor from './MarkdownEditor'
Vue.use(VueParticles)
Vue.use(Editor);

Vue.use(Vuetify,{
    theme: {
        primary: '#006BB7',
        secondary: '#b0bec5',
        info: '#8c9eff',
        error: '#b71c1c',
        purple: '#007290',
        success: '#00FFFF'
    },
    icons:{
        iconfont:'mdiSvg' || 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4'
    }
});

