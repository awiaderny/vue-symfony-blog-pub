<template>
	<main class="section-comment">
		<div v-if="post">
			{{ post.comment }}
		</div>
	</main>
</template>

<script>
	export default {
		name: 'comment-section',
		data() {
			return {
				post: {},
				routeId: 0
			};
		},
		created() {
			this.routeId = this.$route.params.id;
			this.fetchBlogPostComment(this.routeId);
		},
		methods: {
			async fetchBlogPostComment(id) {
				try {
					const response = await fetch(`https://127.0.0.1:8000/api/post/${id}`);
					const data = await response.json();
					// eslint-disable-next-line no-console
					console.log('data:', data);
					this.post = await data;
				} catch (err) {
					// eslint-disable-next-line no-console
					console.log('err: ', err);
				}
			}
		}
	};
</script>

<style>
	.section-comment {
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
