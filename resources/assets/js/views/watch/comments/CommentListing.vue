<template>
	<div>
		<article class="media comment-listing-item" v-for="i in [1,2,3,4,5,6]">
			<figure class="media-left">
				<p class="image is-64x64">
					<img src="http://placehold.it/128x128">
				</p>
			</figure>
			<div class="media-content">
				<div class="content">
					<p>
						<strong>Barbara Middleton</strong> <small> · 3 hrs</small>
						<br>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis porta eros lacus, nec ultricies elit blandit non. Suspendisse pellentesque mauris sit amet dolor blandit rutrum. Nunc in tempus turpis.
						<br>
						<small><a>Like</a> · <a>Reply</a></small>
					</p>
				</div>
			</div>
		</article>
	</div>
</template>

<script>
	export default {
		props: {
			id: {
				type: String,
				required: true,
			}
		}
	}
</script>

<style>
	.comment-listing-item {
		margin-bottom: 20px;
	}
</style>