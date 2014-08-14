# PHP Json api for ember

This README outlines the details of collaborating on this Ember application.

##
* standard lamp setup
* node
* bower

## Installation

* `git clone` this repository into your apache folder
* `npm install`
* `bower install`
* import the /sql/base.sql into your db (if necessary edit your db user)

## Usage

* add the domain of your frontend site to `Access-Control-Allow-Origin` in initialize.php
* simply run `grunt` to process the files
* The php files will be compiled to `dist` folder, where your domain should link to
