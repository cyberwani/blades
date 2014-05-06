# Blades

WordPress theme for Upstatement.com

* * *

## Getting started with Development

> Requires [WPCLI](http://wp-cli.org/), try `brew install wp-cli`
> brew requires homebrew to be installed and assumes OSX http://brew.sh/
> if you have brew installed, but it's not working, run `brew doctor`

### 1. Create a directory for your work & download WordPress
```
mkdir [wherever you'd like]/wordpress-blades
cd [whereever]/wordpress-blades
wp core download
```

### 2. Install WordPress and connect to the database
```
wp core config --dbuser=[your db user] --dbpass=[yourpw] --dbname=[your db name]
wp core install
```

> if using MAMP, include a flag for dbhost that looks like this: `--dbhost=localhost:/Applications/MAMP/tmp/mysql/mysql.sock`

### 3. Fetch & import the database
1. get a copy of the database dump you'd like to use (we store lots of these on Dropbox, ask Jared where)
2. import the database
 * with this one-liner: `mysql -u root -phopic0ji wp_blades < [your file here].sql`
 * OR with a phpmyadmin import via your MAMP install
 * OR via Sequel Pro, import

### 4. Install required plugins
```
wp plugin install advanced-custom-fields --activate
wp plugin install debug-bar --activate
wp plugin install simple-page-ordering --activate
wp plugin install debug-bar-console --activate
wp plugin install debug-bar-timber --activate
wp plugin install timber-library --activate
wp plugin install term-management-tools --activate
wp plugin install https://github.com/Upstatement/chainsaw-share/archive/master.zip
mv wp-content/plugins/chainsaw-share-master wp-content/plugins/chainsaw-share
wp plugin activate chainsaw-share
wp plugin install https://github.com/Upstatement/jigsaw/archive/master.zip
mv wp-content/plugins/jigsaw-master wp-content/plugins/jigsaw
wp plugin activate jigsaw
wp plugin install https://www.dropbox.com/s/trpteyhka1vqwl7/acf-flexible-content.zip --activate
wp plugin install https://www.dropbox.com/s/xko2bru3oiul3yh/acf-options-page.zip --activate
wp plugin install https://www.dropbox.com/s/axhuiewwls3bd2l/acf-repeater.zip --activate
```

### 5. Install this theme
This is the blades theme. It will power your site
```
cd wp-content/themes
git clone git@github.com:Upstatement/blades.git
```

### 6. Update Bower + SCSS
```
cd wp-content/themes/blades
bower install
compass compile
```
