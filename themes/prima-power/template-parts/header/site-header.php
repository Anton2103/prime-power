<?php
?>

<header id="site-header" role="banner">
    <div class="header-wrapper">
        <div class="container menu-container sticky">
            <div class="brand">
			    <?php if (has_custom_logo()) : ?>
                    <div class="site-logo"><?php
					    the_custom_logo(); ?></div>
			    <?php endif; ?>
            </div>
            <div class="nav-block">
			    <?php
			    wp_nav_menu(
				    array(
					    'primary' => 'Primary menu'
				    )
			    );
			    ?>

            </div>
            <div class="toggle-nav">
                <span class="toggle-nav__first"></span>
                <span class="toggle-nav__second"></span>
            </div>
        </div>
    </div>
</header>