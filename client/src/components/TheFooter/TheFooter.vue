<template>
	<footer class="footer">Footer</footer>
</template>

<script>
	export default {
		name: 'footer-blog'
	};
</script>

<style>
	.footer {
		height: 45vh;
		padding: 0.5rem;
		margin-top: 7rem;
		grid-column: 1/4;

		background: #eaeaea;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}
</style>
