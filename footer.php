<footer>
  <nav>
    <a href="/about" class="footer-link left">About</a>
      <?php if (current_user_can('edit_posts')): ?>
        <a href="/wp-admin" class="footer-link center">Admin</a>
      
      <?php elseif (current_user_can('edit_posts')): ?>
        <a href="/wp-admin/post-new.php" class="footer-link center">Write a review</a>
        
      <?php
        elseif (is_user_logged_in()):
      ?>
        <a href="#" class="footer-link center">Thanks for subscribing!</a>
      
      <?php
        else:
      ?>
        <a href="/wp-login.php" class="footer-link center">Login</a>
      <?php endif; ?>
      <a href="/contact" class="footer-link right">Contact</a>
    </nav>

    <p class="copyright">&copy; Copyrighted <?php echo Date('Y') ?> <?php bloginfo('name') ?>. Designed by <a href="https://kk4oxj.github.io">Zeke Y</a></p>
    
    <?php wp_footer() ?>
</footer>

<?php if (is_home()):	?>
  <script src="jquery.min.js"></script>
  <script src="script.js"></script>
<?php endif; ?>

<script>
  if (navigator.doNotTrack == 1) {
    console.log("Don\'t worry, you won't show up in our analytics since you\'ve got Do Not Track (DNT) turned on.")
  }
  else {
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-57130697-1', 'auto');
    ga('send', 'pageview');
  }
</script>