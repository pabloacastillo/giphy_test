/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

/**
8888888     888b     d888     8888888b.       .d88888b.      8888888b.      88888888888      .d8888b.
  888       8888b   d8888     888   Y88b     d88P" "Y88b     888   Y88b         888         d88P  Y88b
  888       88888b.d88888     888    888     888     888     888    888         888         Y88b.
  888       888Y88888P888     888   d88P     888     888     888   d88P         888          "Y888b.
  888       888 Y888P 888     8888888P"      888     888     8888888P"          888             "Y88b.
  888       888  Y8P  888     888            888     888     888 T88b           888               "888
  888       888   "   888     888            Y88b. .d88P     888  T88b          888         Y88b  d88P
8888888     888       888     888             "Y88888P"      888   T88b         888          "Y8888P"
*/


import Vue from 'vue';
import VueRouter from 'vue-router';
import MagicGrid from 'vue-magic-grid';

Vue.prototype.$http = window.axios;
Vue.prototype.$router = VueRouter;



/**
 .d8888b.       .d88888b.      888b     d888     8888888b.       .d88888b.      888b    888     8888888888     888b    888     88888888888      .d8888b.
d88P  Y88b     d88P" "Y88b     8888b   d8888     888   Y88b     d88P" "Y88b     8888b   888     888            8888b   888         888         d88P  Y88b
888    888     888     888     88888b.d88888     888    888     888     888     88888b  888     888            88888b  888         888         Y88b.
888            888     888     888Y88888P888     888   d88P     888     888     888Y88b 888     8888888        888Y88b 888         888          "Y888b.
888            888     888     888 Y888P 888     8888888P"      888     888     888 Y88b888     888            888 Y88b888         888             "Y88b.
888    888     888     888     888  Y8P  888     888            888     888     888  Y88888     888            888  Y88888         888               "888
Y88b  d88P     Y88b. .d88P     888   "   888     888            Y88b. .d88P     888   Y8888     888            888   Y8888         888         Y88b  d88P
 "Y8888P"       "Y88888P"      888       888     888             "Y88888P"      888    Y888     8888888888     888    Y888         888          "Y8888P"
*/


import header from './components/header.vue';
Vue.component( 'the-header', header );
import footer from './components/footer.vue';
Vue.component( 'the-footer', footer );

import login from './components/login.vue';
Vue.component( 'login', login );
import register from './components/register.vue';
Vue.component( 'register', register );



import trending from './components/trending.vue';
Vue.component( 'trending', trending );

import single from './components/single.vue';
Vue.component( 'single', single );

import search from './components/search.vue';
Vue.component( 'search', search );


import favs from './components/favs.vue';
Vue.component( 'favs', favs );

import history from './components/history.vue';
Vue.component( 'history', history );




/**
8888888b.       .d88888b.      888     888     88888888888     8888888888      .d8888b.
888   Y88b     d88P" "Y88b     888     888         888         888            d88P  Y88b
888    888     888     888     888     888         888         888            Y88b.
888   d88P     888     888     888     888         888         8888888         "Y888b.
8888888P"      888     888     888     888         888         888                "Y88b.
888 T88b       888     888     888     888         888         888                  "888
888  T88b      Y88b. .d88P     Y88b. .d88P         888         888            Y88b  d88P
888   T88b      "Y88888P"       "Y88888P"          888         8888888888      "Y8888P"
*/

const router = new VueRouter( {
	mode: 'history',
	routes: [
		{ path: '/', name: 'start', component: trending },
		{ path: '/gif/', name: 'dummygif', component: trending },
		{ path: '/gif/:gif', name: 'gif', component: single },
		{ path: '/search/', name: 'dummysearch', component: trending },
		{ path: '/search/:search', name: 'search', component: search },
		{ path: '/login', name: 'login', component: login },
		{ path: '/register', name: 'register', component: register },
		{ path: '/history', name: 'history', component: history },
		{ path: '/favorite', name: 'favorite', component: favs },

	]
} );



/**
888     888     888     888     8888888888
888     888     888     888     888
888     888     888     888     888
Y88b   d88P     888     888     8888888
 Y88b d88P      888     888     888
  Y88o88P       888     888     888
   Y888P        Y88b. .d88P     888
    Y8P          "Y88888P"      8888888888

*/


Vue.use( VueRouter );
Vue.use( MagicGrid );


const App = Vue.extend( {
	template: '<div><the-header></the-header>' +
			'<router-view></router-view>' +
			'<the-footer></the-footer></div>',
} );



new App( {
	router
} ).$mount( '#app' );

