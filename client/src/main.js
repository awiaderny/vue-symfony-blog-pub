// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import 'es6-promise/auto';
import Vue from 'vue';
import Vuex from 'vuex';
import App from './App';
import router from './router';
import store from './store/store';

window.eventBus = new Vue();

Vue.use(Vuex);

Vue.config.productionTip = false;

router.beforeEach((to, from, next) => {
	if (to.matched.some(record => record.meta.requiresAuth)) {
		if (!store.getters.loggedIn) {
			next({
				name: 'LoginPage'
			});
		} else {
			next();
		}
	} else if (to.matched.some(record => record.meta.requiresVisitor)) {
		if (store.getters.loggedIn) {
			next({
				name: 'MainPage'
			});
		} else {
			next();
		}
	} else {
		next();
	}
});

/* eslint-disable no-new */
new Vue({
	el: '#app',
	router,
	components: {App},
	template: '<App/>',
	store
});
