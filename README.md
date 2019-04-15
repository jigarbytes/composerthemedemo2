
### HOW TO SETUP DEVELOPMENT ENVIRONMENT  ###
  - Clone this repository
  - Copy env example to .env using this command  `cp .env.example .env`
  - Open .env File and configuration database and site URL 
  - Set Home URL like this http://example.com/web/
  - Generate wp keys got to this url here: https://roots.io/salts.html and copy Env Format and pase in your .env file
  - Install composer in root directory using this commnd `composer install`
  - Now setup wordpress in your system .
  - Login you wp-admin area using your enterd admin credentials.
  - Go to Appearance-> Theme select Demo WP Theme
  - We have used NPM for this theme so Install npm in theme root directory using this commnd `npm install` if missing any  
   node_modules
  
  - For theme option (as per your suggestion "Option Tree plugin" but this plugin was closed on November 6, 2018 and is no 
    longer available for download. Reason: Security Issue more info(https://wordpress.org/plugins/option-tree/). So we are using
    redux framework for wordpress theme option).
  - Import theme opation using redux import section Admin left side menu -> Theme opation -> Import section using this wpdemo.json
