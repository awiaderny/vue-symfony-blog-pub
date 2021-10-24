import CreatePostForm from '@/pages/CreatePostForm';
import LoginPage from '@/pages/LoginPage';
import MainPage from '@/pages/MainPage';
import NewsletterForm from '@/pages/NewsletterForm';
import NotFoundPage from '@/pages/NotFoundPage';
import RegisterPage from '@/pages/RegisterPage';
import SingleBlogPostPage from '@/pages/SingleBlogPostPage';
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/',
			name: 'MainPage',
			component: MainPage
		},
		{
			path: '/blog-post/:id',
			name: 'SingleBlogPostPage',
			component: SingleBlogPostPage
		},
		{
			path: '/login',
			name: 'LoginPage',
			component: LoginPage,
			meta: {
				requiresVisitor: true
			}
		},
		{
			path: '/register',
			name: 'RegisterPage',
			component: RegisterPage,
			meta: {
				requiresVisitor: true
			}
		},
		{
			path: '/create-post',
			name: 'CreatePostForm',
			component: CreatePostForm,
			meta: {
				requiresAuth: true
			}
		},
		{
			path: '/newsletter-form',
			name: 'NewsletterForm',
			component: NewsletterForm
		},
		{path: '*', component: NotFoundPage}
	]
});
