import Masonry from 'masonry-layout';
import imagesLoaded from 'imagesloaded';

export const runMasonry = () => {
  const elem = document.querySelector('.o-container_masonry');
  imagesLoaded( elem, function( instance ) {
  const msnry = new Masonry( elem, {
    // options
    itemSelector: '.o-row_column-masonry',
    gutter: 10,
    percentPosition: true
  });
});
}

// element
imagesLoaded( document.querySelector('.o-container_masonry'), function( instance ) {
  console.log('all images are loaded');
  runMasonry();
});

document.addEventListener("DOMContentLoaded", function(event) {
  imagesLoaded( document.querySelector('.o-container_masonry'), function( instance ) {
  runMasonry();
});
});



