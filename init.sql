CREATE DATABASE IF NOT EXISTS giphyapp;

CREATE USER IF NOT EXISTS laravelapp;

GRANT ALL PRIVILEGES ON giphyapp.* TO "laravelapp"@"%" IDENTIFIED BY "levaral";

FLUSH PRIVILEGES;
