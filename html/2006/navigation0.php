<div id="navigation">
	<div class="clearboth"></div>
	<div id="main-navigation">
		<?php 
			if (isset($docname) && $docname == "index") 
			{echo "<strong><a href='index.php'>home</a></strong>";}
			else {echo "<a href='index.php'>home</a>";}
		?>
		&middot; 
		<?php 
			if (isset($docname) && $docname == "contact") 
			{echo "<strong><a href='contact.php'>contact</a></strong>";}
			else {echo "<a href='contact.php'>contact</a>";}
		?>
		&middot; <a href="http://www.rebekkagudleifs.com/blog/">blog</a>
		&middot; <a href="http://www.rebekkagudleifs.com/shop" target="_blank">shop</a>
	</div>
	<div id="category-navigation">
		photos:
		<?php 
			if (isset($docname) && $docname == "self-portraits") 
			{echo "<strong><a href='self-portraits.php'>self-portraits</a></strong>";}
			else {echo "<a href='self-portraits.php'>self-portraits</a>";}
		?>
		&middot; 
		<?php 
			if (isset($docname) && $docname == "people") 
			{echo "<strong><a href='people.php'>people</a></strong>";}
			else {echo "<a href='people.php'>people</a>";}
		?>
		&middot;
		<?php 
			if (isset($docname) && $docname == "scenery") 
			{echo "<strong><a href='scenery.php'>scenery</a></strong>";}
			else {echo "<a href='scenery.php'>scenery</a>";}
		?>
		&middot;
		<?php 
			if (isset($docname) && $docname == "drawings") 
			{echo "<strong><a href='drawings.php'>drawings</a></strong>";}
			else {echo "<a href='drawings.php'>drawings</a>";}
		?>
		&middot;
		<?php 
			if (isset($docname) && $docname == "fauna") 
			{echo "<strong><a href='fauna.php'>fauna</a></strong>";}
			else {echo "<a href='fauna.php'>fauna</a>";}
		?>
		&middot;
		<?php 
			if (isset($docname) && $docname == "water") 
			{echo "<strong><a href='water.php'>water</a></strong>";}
			else {echo "<a href='water.php'>water</a>";}
		?>
		&middot;
		<?php 
			if (isset($docname) && $docname == "film") 
			{echo "<strong><a href='film.php'>film</a></strong>";}
			else {echo "<a href='film.php'>film</a>";}
		?>
		&middot;
		<?php 
			if (isset($docname) && $docname == "dolls") 
			{echo "<strong><a href='dolls.php'>dolls</a></strong>";}
			else {echo "<a href='dolls.php'>dolls</a>";}
		?>
	</div>
	<div class="clearboth"></div>
</div>