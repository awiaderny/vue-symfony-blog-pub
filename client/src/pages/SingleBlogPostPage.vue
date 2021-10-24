<template>
	<div class="main-page">
		<navbar-blog class="navbar" />
		<div class="main-page-grid">
			<main class="main-section">
				<img src="../assets/single-blog-post-main-picture.png" alt="single blog post main" height="280px" width="380px" />
				<h1>{{ post.Title }}</h1>
			</main>
			<aside class="left-sidebar">
				<h3> Contents </h3>
				<ol>
					<li>Lorem</li>
					<li>Lorem</li>
					<li>Lorem</li>
					<li>Lorem</li>
				</ol>
			</aside>
			<article class="article">
				<section>
					<span>{{ post.Body }} </span>
				</section>
			</article>
			<aside class="right-sidebar">
				<div>
					<img src="../assets/blog-author-avatar.png" alt="blog author avatar" height="80px" width="80px" />
				</div>
				<p>Author: 123</p>
				<span
					>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla quae reprehenderit ex doloremque assumenda! Maiores
					iste delectus necessitatibus odio illo.</span
				>
			</aside>
			<comment-section />
			<footer-blog class="footer" />
		</div>
	</div>
</template>

<script>
	import TheFooter from '../components/TheFooter/TheFooter';
	import TheNavbar from '../components/TheNavbar/TheNavbar';
	import CommentSection from '../components/CommentSection';

	export default {
		name: 'SingleBlogPostPage',
		components: {
			'footer-blog': TheFooter,
			'navbar-blog': TheNavbar,
			'comment-section': CommentSection
		},
		data() {
			return {
				post: {},
				routeId: 0
			};
		},
		created() {
			this.routeId = this.$route.params.id;
			this.fetchBlogPostData(this.routeId);
		},
		watch: {
			$route: 'fetchBlogPostData'
		},
		methods: {
			async fetchBlogPostData(id) {
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

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
	.main-page-grid {
		display: grid;
		grid-template-columns: 9.375rem auto 9.375rem;
	}

	.main-section {
		grid-column: 1/4;
		background-color: blue;
	}

	@media all and (max-width: 700px) {
		aside,
		article {
			grid-column: 1 / 4;
		}
	}

	article,
	.main-section {
		background: #eaeaea;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}

	aside {
		background: #eaeaea;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: start;
	}

	.main-section {
		height: 60vh;
		padding: 0.5rem;
	}

	aside,
	article {
		padding: 5rem;
	}
</style>
