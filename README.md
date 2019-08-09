# AcGiphyMe
================================================================================================

A simple thingy to get to know the giphy api and docker.


# INSTALATION
================================================================================================

So, to get this running this are the steps:

- To start and install the docker server run:
	'docker-compose up'

- Edit the .env file to add the correct IP address to the database. Just run 'ifconfig' on the terminal to get the IP address of your machine
Add the ip address to the option "DB_HOST" on .env

- To get the database ready and the tables created run:
	'docker-compose exec php bash'
	Inside that terminal run
	'cd /code/''
	'php artisan migrate'
	'exit'

-  Go to the code/ folder in the terminal (not the docker one, the one from your cumputer) and run:
	'composer update'
	'npm install'


- Set your browser to http://localhost:8080 and everything should be working.



# TO DO
================================================================================================

The main idea interacting with the giphy api is to create a middleware interface between the raw api and the data the frontend is expecting.

The same concept is applicable to big part of the tool.

Some special considerations:
	- The fake file cache working right can and should be improved.
	- The auth process implemented has to be upgraded, for security and interaction.
	- The transfer between server and browser can be improved (cache ttl, gziped content, etc)
	- The individual gifs data could be saved locally to the database (the gif information we need shouldnt change in the future)
	- The static images could be saved and served locally, not sure if it would be wise to try and avoid the giphy cdn.
