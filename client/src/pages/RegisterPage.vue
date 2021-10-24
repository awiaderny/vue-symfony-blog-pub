<template>
	<div class="register-page">
		<navbar-blog class="navbar">Navbar</navbar-blog>
		<main class="container-register-form">
			<form>
				<h1>Register</h1>
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" aria-describedby="emailHelp" />
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" />
				</div>
				<button type="submit" class="btn btn-primary" @click="handleRegisterSubmit"> Submit </button>
			</form>
		</main>
	</div>
</template>

<script>
	import TheNavbar from '../components/TheNavbar/TheNavbar';

	export default {
		name: 'register-page',
		components: {
			'navbar-blog': TheNavbar
		},
		data() {
			return {
				email: '',
				password: ''
			};
		},
		methods: {
			async handleRegisterSubmit() {
				try {
					await fetch('https://127.0.0.1:8000/api/register', {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json'
						},
						body: {
							email: this.email,
							password: this.password
						}
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
	.container-register-form {
		margin: 3rem auto;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.form-control {
		width: 50vw;
	}
</style>
