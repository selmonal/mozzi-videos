<template>
	<div class="box">
		<add-comment
			id="123"
			:user="{
				name: 'selmonal'
			}"
		></add-comment>
		<hr>
		<comment-listing id="123"></comment-listing>
	</div>
</template>

<script>
	import AddComment from './AddComment';
	import CommentListing from './CommentListing';

	export default {
		components: {
			AddComment,
			CommentListing,
		}
	}	
</script>