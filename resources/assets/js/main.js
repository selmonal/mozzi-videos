import axios from 'axios';
import Vue from 'vue';
import VueAxios from 'vue-axios';
import App from './App';

Vue.use(VueAxios, axios);

import router from './router/index';

new Vue({
	el: '#app',

	router,

	render: h => h(App),

	components: { App }
});
