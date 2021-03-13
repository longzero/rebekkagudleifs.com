<?php include("header.php"); ?>
<div id="container">
	<!--div id="photo"><img src="<?php echo $photo; ?>" width="675" alt="" /></div-->
	<div id="photo">
		<?php
			if (isset($_GET['photo']))
			{
				$photo = $_GET['photo'];
				getPhoto($docname, $photo);
			}
			else
			{
        do
        {
  				//$photo = getRandomPhoto("$docname");
  				$imagesize = getPhotoSize($docname, $photo);
  				$width = $imagesize[0];
  				$height = $imagesize[1];
  		  } while ($width < $height || $width == $height);

				//if ($width < $height || $width == $height) {echo "<img src='$photo' height='500' alt='' />";}
				echo "<img src='$photo' width='675' alt='' />";
			}
		?>
	</div>
	<div id="content">
    <h2><span style="color:#fff;">about</span>rebekka</h2>
    <p>Visual artist and  photographer.</p>
    <p>Here you will find a selection of my best photographs and drawings. A larger collection can be viewed <a href="http://www.flickr.com/photos/rebba">on flickr</a>.</p>
    <p>All photographs are taken by myself (also the ones with me in them) and all post-processing is done by me.</p>
    <p>In addition to photography and drawing, a great deal of my time is spent custom designing and hand-knitting sweaters.</p>
    <!--p>I am self-taught.</p>
    <p>I decided to become a photographer in May of 2005.</p>
    <p>There is nothing i would rather do.</p>
    <p>I primarily shoot digital, because it's more accessible, but i work with film whenever i get the chance and i have  a darkroom at my disposal.</p>
    
    <p>My equipment is as follows:</p>
    <p>Cameras</p>
    <ul>
      <li>Canon EOS 5D (dslr)</li>
      <li>Canon EOS 350D (dslr)</li>
      <li>Canon EOS 500 (slr)</li>
    </ul>
    <p>Lenses (all Canon)</p>
    <ul>
      <li>10-22mm EFS</li>
      <li>18-55mm EFS</li>
      <li>100mm f/2 EF</li>
      <li>17-40mm EF</li>
      <li>15mm EF (fisheye)</li>
    </ul>
    <p>Canon Speedlite 580EX<br />
    ST-E2 transmitter<br />
    Cable remote</p-->
	</div>
</div>
<?php include("footer.php"); ?>