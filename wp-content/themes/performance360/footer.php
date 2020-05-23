</div>
<footer>
    <div class="c-footer">
        <div class="o-container">
            <div class="o-row">
                <?php get_template_part( 'template-parts/footer/info'); ?>
                <?php get_template_part( 'template-parts/footer/widgets'); ?>
            </div>
        </div>
    </div>
</footer>

<div class="l-modal is-hidden--off-flow js-modal-shopify">
  <div class="l-modal__shadow js-modal-hide"></div>
  <div class="c-popup l-modal__body">
  <div class="l-modal__close"><i class="fas fa-times"></i></div>
    <p class="c-popup__description с-popup_description-subscribe"></p>
  </div>
</div>

        <?php wp_footer();?>
    </body>
</html>