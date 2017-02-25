import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Welcome from './../views/Welcome';
import WatchVideo from './../views/watch/WatchVideo';
import Search from './../views/search/Search';
import UserProfile from './../views/UserProfile';

export default new VueRouter({
	mode: 'history',

	routes: [
		{ path: '/', name: 'welcome', component: Welcome },
		{ path: '/videos/:id', name: 'watch', component: WatchVideo},
		{ path: '/search', name: 'search', component: Search},
		{ path: '/@:username', name: 'user.profile', component: UserProfile},
	]         
});