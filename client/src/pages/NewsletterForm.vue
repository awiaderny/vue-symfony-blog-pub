<template>
	<div class="newsletter-page">
		<navbar-blog class="navbar">Navbar</navbar-blog>
		<main class="container-newsletter-form">
			<form v-on:submit.prevent="handleNewsletterSubmit">
				<h1>Subscribe to Newsletter</h1>
				<div class="form-group">
					<label for="firstName">First name</label>
					<input v-model="firstName" type="text" placeholder="First name" class="form-control" />
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input v-model="email" type="email" placeholder="Email" class="form-control" />
				</div>
				<button type="submit" class="btn btn-primary"> Submit </button>
			</form>
		</main>
	</div>
</template>

<script>
	import TheNavbar from '../components/TheNavbar/TheNavbar';

	export default {
		name: 'newsletter-form',
		components: {
			'navbar-blog': TheNavbar
		},
		data() {
			return {
				firstName: '',
				email: ''
			};
		},
		methods: {
			async handleNewsletterSubmit() {
				try {
					const exampleData = JSON.stringify({
						firstName: this.firstName,
						email: this.email
					});
					const response = await fetch('https://127.0.0.1:8000/api/newsletter', {
						method: 'post',
						headers: {
							Accept: 'application/json',
							'Content-Type': 'application/json'
						},
						body: JSON.stringify({
							firstName: this.firstName,
							email: this.email
						})
					});
					const data = await response.json();
					await console.log('data: ', data);
					console.log('exampleData: ', exampleData);
				} catch (err) {
					// eslint-disable-next-line no-console
					console.log('err: ', err);
				}
			}
		}
	};
</script>

<style scoped>
	.container-newsletter-form {
		margin: 3rem auto;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.form-control {
		width: 50vw;
	}
</style>
