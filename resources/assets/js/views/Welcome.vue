<template>
	<div class="container">
		<h3 class="title is-1 has-text-centered" style="text-transform: uppercase;">
			#Цоо шинэ
		</h3>

		<hr>

		<infinite-video-listing url="/api/videos"></infinite-video-listing>
	</div>
</template>

<script>
	import InfiniteVideoListing from './../components/InfiniteVideoListing';
	
	export default {
		components: {
			InfiniteVideoListing
		}
	}
</script>