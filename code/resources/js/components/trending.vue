<template>
	
	<magic-grid class="gif__wrapper" v-if="this.loaded=='true'">
		
		<div class="gif__preview" v-for="(_gif, index) in this.gifs">
			<router-link :to="{ path: '/gif/' + _gif.id, params: { data:_gif.id } }" :key="_gif.id" :id="_gif.id">		
				<img :src="_gif['images']['480w_still']['url']" :width="_gif['images']['480w_still']['width']/2" :height="_gif['images']['480w_still']['height']/2">
			</router-link>
			<div class="gif__like" v-on:click="favthis(_gif.id)">
				<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24" role="img" class="icon "><path d="m18.199 2.04c-2.606-.284-4.262.961-6.199 3.008-2.045-2.047-3.593-3.292-6.199-3.008-3.544.388-6.321 4.43-5.718 7.96.966 5.659 5.944 9 11.917 12 5.973-3 10.951-6.341 11.917-12 .603-3.53-2.174-7.572-5.718-7.96z"></path></svg>
			</div>

		</div>

	</magic-grid>

</template>
<script>

	export default {

		mounted: function() {
			this.getTrending();
		},

		data() {
			return {
				gifs: {},
				loaded: 'false',
				pageTitle: ''
			};
		},

		methods: {

			getTrending: function() {

				const vm = this;

				vm.$http.get( '/api/trending')
				.then( ( res ) => {
					vm.gifs = res.data.data;
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