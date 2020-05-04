import $ from 'jquery';
import strip_tags from './helpers/strip-tags';

wp.customize('_themename_site_info', (value) => {
    value.bind ( (to) => {
        $('.c-site-info__text').html(strip_tags(to, '<a>'));
    })
})

