</main>
	<!--/ wrapper -->
	<!-- footer -->
	<footer class="l-footer">
		<div class="l-footer__col">
			<nav class="l-footer__nav">
				<ul class="l-footer__links">
					<li><a href="/about/">About Us</a></li>
					<li><a href="/works/" class="js-casestudy-link">Case Study</a></li>
					<li><a href="/works/?release" class="js-release-link">Release</a></li>
					<li><a href="/careers/">Careers</a></li>
				</ul>
				<ul class="l-footer__links">
					<li><a href="<?php echo $gVars["contact"]; ?>" target="_blank" rel="noopener">Contact</a></li>
					<li><a href="/privacy-policy/">Privacy Policy</a></li>
				</ul>
			</nav>
			<div class="l-footer__pageTop js-scrollTop">
				<button class="l-footer__btn">
					<img src="/wp-content/themes/o-e-n.co.jp/_assets/images/common/diagonal-arrow.svg" alt="">
					<span>Page Top</span>
				</button>
			</div>
		</div>
		<div class="l-footer__col">
			<div class="l-footer__logo">
				<a href="/"><img src="/wp-content/themes/o-e-n.co.jp/_assets/images/common/logo.svg" alt="OEN"></a>
			</div>
			<address class="l-footer__address">
				<p class="l-footer__access">
					40-1, Udagawa-cho, <br class="u-spbr">Shibuya-ku, Tokyo<br>
					Abema Towers 5th floor<br>
					150-0042
				</p>
				<small class="l-footer__copyright">©2022 OEN inc.All Rights Reserved.</small>
			</address>
		</div>
	</footer>
	<!--/ footer -->
	<?php wp_footer(); ?>
</body>
</html>
