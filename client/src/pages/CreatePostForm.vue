<template>
	<div class="create-post-page">
		<navbar-blog class="navbar">Navbar</navbar-blog>
		<main class="container-create-post-form">
			<form v-on:submit.prevent="handleCreatePost">
				<h1>Create post</h1>
				<div class="form-group">
					<label for="title">Title</label>
					<input v-model="title" type="text" placeholder="Title" class="form-control" />
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea v-model="content" type="text" placeholder="Content" class="form-control" rows="3" />
				</div>
				<div class="form-group">
					<label for="slug">Slug</label>
					<input v-model="slug" type="text" placeholder="Slug" class="form-control" />
				</div>
				<div class="form-group">
					<label for="comment">Comment</label>
					<input v-model="comment" type="text" placeholder="Comment" class="form-control" />
				</div>
				<button type="submit" class="btn btn-primary"> Submit </button>
			</form>
		</main>
	</div>
</template>

<script>
	import TheNavbar from '../components/TheNavbar/TheNavbar';

	export default {
		name: 'create-post',
		components: {
			'navbar-blog': TheNavbar
		},
		data() {
			return {
				title: '',
				content: '',
				slug: '',
				comment: ''
			};
		},
		methods: {
			async handleCreatePost() {
				try {
					const exampleData = JSON.stringify({
						title: this.title,
						content: this.content,
						slug: this.slug,
						comment: this.comment
					});
					const dataFromFetchPost = await fetch('https://127.0.0.1:8000/api/post/create', {
						method: 'post',
						headers: {
							Accept: 'application/json',
							'Content-Type': 'application/json'
						},
						body: JSON.stringify({
							title: this.title,
							content: this.content,
							slug: this.slug,
							comment: this.comment
						})
					});
					const body = await dataFromFetchPost.json();
					await console.log('body: ', body);
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
	.container-create-post-form {
		margin: 3rem auto;
		padding-bottom: 3rem;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.form-control {
		width: 50vw;
	}
</style>
