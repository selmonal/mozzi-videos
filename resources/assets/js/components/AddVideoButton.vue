<template>
	<a class="button is-default is-bold" @click="showAddVideoModal">
		Нэмэх
	</a>
</template>

<script>
	import event from './../event';

	export default {
		methods: {
			showAddVideoModal() {
				event.$emit('add-video-modal-show');
			}
		}
	}
</script>