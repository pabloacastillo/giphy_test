<template>

	<div class="actionbar">
		
			<div class="actionbar__searchwrapper">
				<input class="actionbar__search" id="searchbox" type="text" name="s" placeholder="Search..." autofocus>
				<svg aria-hidden="true" class="icon--search" width="18" height="18" viewBox="0 0 18 18"><path d="M18 16.5l-5.14-5.18h-.35a7 7 0 1 0-1.19 1.19v.35L16.5 18l1.5-1.5zM12 7A5 5 0 1 1 2 7a5 5 0 0 1 10 0z"></path></svg>
			</div>

			<div class="actionbar__menu">
				<router-link :to="{ name: 'start'}"> HOME </router-link>
				
				<span v-if="this.logedin!='true'">
					<router-link :to="{ name: 'login'}"> LOGIN </router-link>
					<router-link :to="{ name: 'register'}"> REGISTER </router-link>
				</span>
				<span v-if="this.logedin=='true'">
					<router-link :to="{ name: 'favorite'}"> FAVS </router-link>
					<router-link :to="{ name: 'history'}"> HISTORY </router-link>
				</span>
			</div>
	
	</div>

</template>

<script>
	export default {

		mounted: function() {
			this._me();
		},

		data() {
			return {
				me: {},
				logedin: 'false',
				loaded_favs: 'false',
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				favs:{}
			};
		},

		methods: {
			_me: function() {
				const vm = this;
				console.log('CARGANDO ME');
				vm.$http.get( '/auth/me')
				.then( ( res ) => {
					this.me = res.data;
					if(this.me.hasOwnProperty('id')){
						this.logedin='true';
					}
				} )
				.catch( ( res ) => {
					console.log( `Something went wrong : ${res}` );
				} );

				vm.$http.get( '/auth/favs')
				.then( ( res ) => {
					this.favs = res.data;
					this.loaded_favs='true';
				} )
				.catch( ( res ) => {
					console.log( `Something went wrong : ${res}` );
				} );
			}
		}
	};
</script>