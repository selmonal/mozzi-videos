<template>
	<div class="box video-meta">
		<div class="video-title">{{ video.title }}</div>
		<br>
		<article class="media">
			<div class="media-left">
				<figure class="image is-64x64">
					<img src="http://placehold.it/128x128" alt="Image">
				</figure>
			</div>
			<div class="media-content">
				<div class="content">
					<div class="columns">
						<div class="column is-6">
							<p>           
								<router-link :to="'/@'+video.user.name">
									<strong>@{{ video.user.name }}</strong>
								</router-link>
								<br>
								<a href="#" class="button is-danger">Subscribe</a>
							</p>
						</div>
						<div class="column is-6">
							<nav class="nav">
								<div class="container">
									<div class="nav-right">
										<a class="nav-item is-tab is-active">
											<span class="title is-4">{{ video.views_count}} үзсэн</span>
										</a>
									</div>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
</template>

<script>
	export default {
		props: {
			video: {
				type: Object,
				required: true,
			}
		}
	}
</script>