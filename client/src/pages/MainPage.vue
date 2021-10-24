<template>
	<div class="single-blog-post-page">
		<navbar-blog class="navbar">Navbar</navbar-blog>
		<div class="main-page-grid">
			<div class="search-bar">
				<h1>Searchbar: {{ searchTerm }}</h1>
				<div class="input-group mb-3 search-field-with-button-container">
					<input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" />
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button" id="button-addon2"> Search </button>
					</div>
				</div>
			</div>
			<main class="blog-grid">
				<div v-if="posts">
					<div class="blog-grid__item" v-for="post in posts" :key="post.id">
						<h2 class="post-title">{{ post.Title }}</h2>
						<div class="post-thumbnail-container">
							<img src="" alt="post image" class="post-thumbnail" />
						</div>
						<span class="post-description"></span>
						<div>
							<button class="view-post">
								<router-link :to="`/blog-post/${post.id}`"> View Post </router-link>
							</button>
						</div>
					</div>
				</div>
				<div class="blog-grid__item">2</div>
				<div class="blog-grid__item">3</div>
				<div class="blog-grid__item">4</div>
				<div class="blog-grid__item">5</div>
				<div class="blog-grid__item">6</div>
			</main>
		</div>
		<footer-blog class="footer">Footer</footer-blog>
	</div>
</template>

<script>
	import TheFooter from '../components/TheFooter/TheFooter';
	import TheNavbar from '../components/TheNavbar/TheNavbar';

	export default {
		name: 'MainPage',
		components: {
			'footer-blog': TheFooter,
			'navbar-blog': TheNavbar
		},
		data() {
			return {
				searchTerm: '',
				posts: {}
			};
		},
		created() {
			this.fetchAllBlogPostsData();
		},
		methods: {
			async fetchAllBlogPostsData() {
				try {
					const data2 = await fetch('https://127.0.0.1:8000/api/posts');
					const body = await data2.json();
					// eslint-disable-next-line no-console
					console.log('body:', body);
					this.posts = await body;
				} catch (err) {
					// eslint-disable-next-line no-console
					console.log('err:', err);
				}
			}
		}
	};
</script>

<style scoped>
	.main-page-grid {
		display: grid;
	}

	.search-bar {
		grid-column: 1/4;
		background: #eaeaea;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		height: 15vh;
		padding: 0.5rem;
		width: 100%;
		margin-top: 7rem;
		margin-bottom: 5rem;
	}

	.search-field-with-button-container {
		margin: auto;
		min-width: 20rem;
		max-width: 40rem;
		height: 15rem;
	}

	.blog-grid {
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: row;
		flex-wrap: wrap;
		height: auto;
		margin: 5rem auto;
	}

	.blog-grid__item {
		min-width: 18rem;
		min-height: 24rem;
		border: 1px solid #000;
		margin: 1rem 2rem;
		padding: 0.5rem;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}
</style>
