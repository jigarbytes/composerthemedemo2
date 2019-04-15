<footer class="py-5 bg-dark">
 	<div class="container">
   	<p class="m-0 text-center text-white">
   		<?php 
   			global $redux_demo;
   			$footer_text = $redux_demo['text-example'];
   			if(!empty($footer_text)){
				echo $footer_text;
   			}
   		?>
   	</p>
 	</div> <!-- /.container -->
</footer>

<?php wp_footer(); ?>
</body>
</html>






