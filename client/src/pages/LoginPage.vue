<template>
	<div class="login-page">
		<navbar-blog class="navbar">Navbar</navbar-blog>
		<main class="container-login-form">
			<form>
				<h1>Login</h1>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input v-model="email" type="email" placeholder="Email" class="form-control" aria-describedby="emailHelp" />
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input v-model="password" type="password" placeholder="Password" class="form-control" />
				</div>
				<button type="submit" class="btn btn-primary" @click="handleLoginSubmit"> Submit </button>
			</form>
		</main>
	</div>
</template>

<script>
	import TheNavbar from '../components/TheNavbar/TheNavbar';

	export default {
		name: 'login-page',
		components: {
			'navbar-blog': TheNavbar
		},
		data() {
			return {
				email: '',
				password: '',
				csrf: ''
			};
		},
		methods: {
			async handleLoginSubmit() {
				try {
					await this.$store.dispatch('retrieveToken', {
						email: this.email,
						password: this.password,
						csrf: this.csrf
					});
				} catch (err) {
					// eslint-disable-next-line no-console
					console.log('err: ', err);
				}
			}
		}
	};
</script>

<style scoped>
	.container-login-form {
		margin: 3rem auto;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.form-control {
		width: 50vw;
	}
</style>
