
### HOW TO SETUP DEVELOPMENT ENVIRONMENT  ###
  - Clone this repository
  - Copy env example to .env using this command  `cp .env.example .env`
  - Open .env File and configuration database and site URL 
  - Set Home URL like this http://example.com/web/
  - Generate WP keys got to this URL here: https://roots.io/salts.html and copy Env Format and   paste in your .env file

  - Install composer in root directory using this command `composer install`
  - Now setup WordPress in your system.
  - Login your wp-admin area using your entered admin credentials..
  - Go to Appearance-> Theme select Demo WP Theme
  - We have used NPM for this theme so Install npm in theme root directory using this command `npm install` if missing any node_modules
  
  - For theme option (as per your suggestion "Option Tree plugin" but this plugin was closed on November 6, 2018, and is no longer available for download. Reason: Security Issue more info(https://wordpress.org/plugins/option-tree/). So we are using redux framework for WordPress theme option)..
  - Import theme option using redux import section Admin left side menu -> Theme option -> Import section using this root directory "redux_options_redux_demo_backup_15-04-2019.json"
  -  Import theme demo please used this file root directory "composerthemedemo2.WordPress.2019-04-15.xml"
  - Create new user for n user gallery upload project manager(role)
  - 
  
