<template>
	<nav class="nav has-shadow" id="top">
		<div class="container">
			<div class="nav-left">
				<router-link to="/" class="nav-item logo">
					MOZZI <span class="logo-sub">VIDEOS</span>
				</router-link>
				<search-box class="is-hidden-mobile"></search-box>
			</div>
			<span class="nav-toggle" @click="showMenu = ! showMenu">
				<span></span>
				<span></span>
				<span></span>
			</span>
			<div class="nav-right nav-menu" :class="{'is-active': showMenu}">
				<span class="nav-item">
					<add-video-button></add-video-button>
				</span>
				<a class="nav-item is-tab">
					<img src="https://placehold.it/64x64" class="avatar-photo">
				</a>
			</div>
		</div>
	</nav>
</template>

<script>
	import AddVideoButton from './AddVideoButton';
	import SearchBox from './SearchBox';

	export default {
		components: { AddVideoButton, SearchBox },

		data() {
			return {
				showMenu: false,
			};
		},

		mounted() {
		},
	}
</script>

<style>
	#top {
		position: fixed !important;
		top: 0px;
		left: 0px;
		right: 0px;
	}
</style>