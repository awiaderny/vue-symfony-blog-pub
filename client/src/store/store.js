import axios from 'axios';
import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
	state: {
		token: localStorage.getItem('access_token') || null
	},
	getters: {
		loggedIn(state) {
			return state.token !== null;
		},
		anyRemaining(state, getters) {
			// eslint-disable-next-line eqeqeq
			return getters.remaining != 0;
		}
	},
	mutations: {
		register(context, data) {
			return new Promise((resolve, reject) => {
				axios
					.post('/api/register', {
						email: data.email,
						password: data.password
					})
					.then(response => {
						resolve(response);
					})
					.catch(error => {
						reject(error);
					});
			});
		},
		// eslint-disable-next-line consistent-return
		destroyToken(context) {
			axios.defaults.headers.common.Authorization = `Bearer ${context.state.token}`;
			if (context.getters.loggedIn) {
				return new Promise((resolve, reject) => {
					axios
						.post('/api/logout')
						.then(response => {
							localStorage.removeItem('access_token');
							context.commit('destroyToken');
							resolve(response);
						})
						.catch(error => {
							localStorage.removeItem('access_token');
							context.commit('destroyToken');
							reject(error);
						});
				});
			}
		},
		retrieveToken(context, credentials) {
			return new Promise((resolve, reject) => {
				axios
					.post('/api/login', {
						username: credentials.username,
						password: credentials.password
					})
					.then(response => {
						const token = response.data.access_token;
						localStorage.setItem('access_token', token);
						context.commit('retrieveToken', token);
						resolve(response);
					})
					.catch(error => {
						console.log(error);
						reject(error);
					});
			});
		}
	}
});

export default store;
