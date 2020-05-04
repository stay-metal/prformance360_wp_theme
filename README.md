# Performance 360 WP theme

## Theme structure
/
    /dist - минифицированые js и css
        /assets
            /css
                admin.css - стили wp_admin
                bundle.css - стили темы
            /js
                admin.js - js в wp-admin
                bundle.js - js в теме
    /lib -  php функци
    /template-parts - включенные области в шаблонах
 header.php - подключаемая область header
 footer.php - подключаемая область footer  
 sidebar.php - подключаемая область sidebar 
 index.php - основной шаблон
 functions.php - generic файл с функциями WP
 loop.php - основной файл c loop WP
 searchform.php - форма поиска
 style.css - generic WP файл стилей
 404.php - шаблон ошибки 404
 home.php - шаблон главной страницы
 page.php - шаблон вывода статичных страниц
 search.php - шаблон вывода результатов поиска
 single.php - шаблон вывода поста (записи)

### List of dev dependencies

    * @babel/core :  ^7.9.6 ,
    * @babel/preset-env :  ^7.9.6 ,
    * @babel/register :  ^7.9.0 ,
    * babel-loader :  ^8.1.0 ,
    * browser-sync :  ^2.26.7 ,
    * del :  ^5.1.0 ,
    * gulp :  ^4.0.2 ,
    * gulp-clean-css :  ^4.3.0 ,
    * gulp-if :  ^3.0.0 ,
    * gulp-imagemin :  ^7.1.0 ,
    * gulp-replace :  ^1.0.0 ,
    * gulp-sass :  ^4.1.0 ,
    * gulp-sourcemaps :  ^2.6.5 ,
    * gulp-zip :  ^5.0.1 ,
    * node-sass :  ^4.14.0 ,
    * vinyl-named :  ^1.1.0 ,
    * webpack-stream :  ^5.2.1 ,
    * yargs :  ^15.3.1 

