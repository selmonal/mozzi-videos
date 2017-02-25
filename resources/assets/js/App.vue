<template>
	<div class="main-container">
		<Navbar />
		<router-view></router-view>
		<add-video-modal></add-video-modal>
		<login-modal></login-modal>
		<message></message>
	</div>
</template>

<script>
	import AddVideoModal from './components/AddVideoModal';
	import LoginModal from './components/LoginModal';
	import Navbar from './components/Navbar';
	import Message from './components/Message';

	export default {
		components: { 
			AddVideoModal,
			Message,
			Navbar,
			LoginModal
		}
	}
</script>

<style>
	.main-container {
		margin-top: 70px;
	}
</style>