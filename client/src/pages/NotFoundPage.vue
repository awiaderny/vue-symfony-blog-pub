<template>
	<div class="single-blog-post-page">
		<navbar-blog class="navbar">Navbar</navbar-blog>
		<main>Page not found</main>
	</div>
</template>

<script>
	import TheNavbar from '../components/TheNavbar/TheNavbar';

	export default {
		name: 'NotFoundPage',
		components: {
			'navbar-blog': TheNavbar
		}
	};
</script>

<style scoped></style>
