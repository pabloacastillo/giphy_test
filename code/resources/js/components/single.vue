<template>	

	<div class="gif__single" >
		
		<div class="gif__preview" v-if="this.loaded=='true'">
			<h1>{{ this.gif['title'] }}</h1>
			<a :href="this.gif['bitly_url']" target="_blank">	
				<img :src="this.gif['images']['original']['url']" :width="this.gif['images']['original']['width']" :height="this.gif['images']['original']['height']">
			</a>

			<div class="gif__like" v-on:click="favthis(this.gif['id'])">
				<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" role="img" class="icon "><path d="m18.199 2.04c-2.606-.284-4.262.961-6.199 3.008-2.045-2.047-3.593-3.292-6.199-3.008-3.544.388-6.321 4.43-5.718 7.96.966 5.659 5.944 9 11.917 12 5.973-3 10.951-6.341 11.917-12 .603-3.53-2.174-7.572-5.718-7.96z"></path></svg>
			</div>

		</div>

	</div>

</template>
<script>
export default {

	mounted: function() {
		this.getGif();
	},

	data() {
		return {
			gif: {},
			loaded: 'false',
			pageTitle: ''
		};
	},

	methods: {

		getGif: function() {
			const vm = this;
			var pip = vm.$route.params.gif ;
			vm.$http.get( '/api/gif/'+pip)
			.then( ( res ) => {
				vm.gif = res.data.data;
				vm.loaded = 'true';
			} )
			.catch( ( res ) => {
				console.log( `Something went wrong on trending.vue : ${res}` );
			} );

		},
		favthis(gifid){
			console.log(gifid);
			const vm = this;
			vm.$http.get( '/auth/fav/'+gifid)
			.then( ( res ) => {
				console.log(res);
				
			} )
			.catch( ( res ) => {
				console.log( `Something went wrong on trending.vue : ${res}` );
			} );
		}

	}
};
</script>