    <div class="footer">
        <!-- echo out the content of the SESSION via KINT, a Composer-loaded much better version of var_dump -->
        <!-- KINT can be used with the simple function d() -->
       <!-- <?php print_r($_SESSION); ?>-->
    </div>
  <a class="exit-off-canvas"></a>

  </div>
</div>
    <script>
        var url = "<?php echo URL; ?>";
    </script>

      <!--  <script type="text/javascript" src="<?php echo URL; ?>public/js/zepto.min.js"></script>-->


       <!-- <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-2.1.1.min.js"></script>-->


        <script src="<?php echo URL; ?>public/js/vendor/jquery.js"></script>
        <script src="<?php echo URL; ?>public/js/foundation.min.js"></script>
        <script src="<?php echo URL; ?>public/js/hammer.min.js"></script>
        <script src="<?php echo URL; ?>public/js/jquery.hammer.js"></script>
        <script>
          $(document).foundation();
        </script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/form.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/ui.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/navigation.js"></script>
        <script type="text/javascript">
window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
</script>
</body>
</html>