<template>
	<div id="app">
		<router-view />
	</div>
</template>

<script>
	export default {
		name: 'App',
		computed: {
			loggedIn() {
				return this.$store.getters.loggedIn;
			}
		}
	};
</script>

<style>
	#app {
		font-family: Helvetica, Arial, sans-serif;
	}
</style>
