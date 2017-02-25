<template>
	<div class="message" v-if="show">
		{{ text }}
	</div>
</template>

<script>
	import event from './../event';

	export default {
		data() {
			return {
				show: false,
				text: '',
			};
		},

		mounted() {
			event.$on('set-message', this.showMessage)
		},

		destroy() {
			event.$off('set-message', this.showMessage)
		},

		methods: {
			showMessage(options) {
				console.log('asdf');
				this.show = true;
				this.text = options.text;
				let delay = options.delay || 5000;
				setTimeout(() => this.show = false, delay);
			}
		}
	}
</script>

<style>
	.message {
		position: fixed;
		bottom: 20px;
		right: 20px;
		background-color: #ff3860;
		color: white;
		padding: 10px;
		font-size: 18px;
	}
</style>