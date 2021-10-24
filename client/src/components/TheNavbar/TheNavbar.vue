<template>
	<header class="navbar navbar-expand-lg navbar-light bg-light">
		<button
			class="navbar-toggler"
			type="button"
			data-toggle="collapse"
			data-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown"
			aria-expanded="false"
			aria-label="Toggle navigation"
		>
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav justify-content-center">
				<li class="navbar-brand">
					<router-link to="/"> Logo </router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" to="/blog-post/5">Single Blog post</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" to="/login">Login</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" to="/register">Register</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" to="/create-post">Create post</router-link>
				</li>
				<li class="nav-item">
					<router-link class="nav-link" to="/newsletter-form">Newsletter</router-link>
				</li>
				<button class="nav-item btn" @click="logout"> Logout </button>
			</ul>
		</div>
	</header>
</template>

<script>
	export default {
		name: 'navbar-blog',
		methods: {
			logout() {
				this.$store
					.dispatch('destroyToken')
					// eslint-disable-next-line no-unused-vars
					.then(response => {
						this.$router.push({name: 'MainPage'});
					});
			}
		}
	};
</script>

<style scoped>
	.navbar,
	.navbar-collapse {
		height: 3rem;
		padding: 0.5rem;
	}
</style>
