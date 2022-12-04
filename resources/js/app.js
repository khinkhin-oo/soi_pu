require('bootstrap');
import { createApp } from 'vue';
// import Store Vuex
import store from './store';
// import Cookie
import cookie from './cookie';
/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* import specific icons */
import { faEnvelope, faBars, faCircleLeft, faMessage } from '@fortawesome/free-solid-svg-icons';

/* add icons to the library */
library.add(faEnvelope, faBars, faCircleLeft, faMessage);

// Register Vue Components
import CommentVue from './components/Comments.vue';


const app = createApp({
    components: {
        CommentVue
    }
});


app.component('font-awesome-icon', FontAwesomeIcon);
// Create Global Vue Property
const global = app.config.globalProperties;
// Define Global CSRFTOKEN
// global.CSRFTOKEN = document.head.querySelector("[name~=csrf-token][content]").content;
// Define Global Cookie
global.$cookie = cookie;

app.config.errorHandler = (err) => {
    /* handle error */
    console.log(err);
}

app.mount('#app');





// Add Global Array Remove Function
Array.prototype.remove = function() {
    var what, a = arguments,
        L = a.length,
        ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
}
