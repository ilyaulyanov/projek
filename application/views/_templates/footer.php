    <div class="footer">
        <!-- echo out the content of the SESSION via KINT, a Composer-loaded much better version of var_dump -->
        <!-- KINT can be used with the simple function d() -->
       <!-- <?php print_r($_SESSION); ?>-->
    </div>

    <script>
        var url = "<?php echo URL; ?>";
    </script>

      <!--  <script type="text/javascript" src="<?php echo URL; ?>public/js/zepto.min.js"></script>-->


        <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-2.1.1.min.js"></script>

        <!--TO DO for Drayton

        put this file to local folder
        -->
        <script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo URL; ?>public/js/application.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/form.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>public/js/navigation.js"></script>
</body>
</html>