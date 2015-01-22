<?php
function google_fonts() {
$storeId = Mage::app()->getStore()->getStoreId();
$iw_benza_customfont = '';
$default = array(
					'Din Text Pro Regular',
					'arial',
					'verdana',
					'trebuchet',
					'georgia',
					'times',
					'tahoma',
					'helvetica'
				);
$islandworks_fonts = array(
					Mage::getStoreConfig('themeoptions_theming/theme_fonts/body_font', $storeId),
					Mage::getStoreConfig('themeoptions_theming/theme_fonts/heading_font', $storeId)
				);			
foreach($islandworks_fonts as $islandworks_font) {
	
	if(!in_array($islandworks_font, $default)) {

			$iw_benza_customfont = str_replace(' ', '+', $islandworks_font). ':300,300italic,400,400italic,700,700italic,900,900italic|' . $iw_benza_customfont;
	}
}
	if($iw_benza_customfont){	
	 echo '<link rel="stylesheet"  href="http://fonts.googleapis.com/css?family=' . 		substr_replace($iw_benza_customfont ,"",-1) . '" type="text/css" media="screen" />';
	}
if(Mage::getStoreConfig('themeoptions_theming/theme_fonts/body_font', $storeId) == 'Din Text Pro Regular' ||  Mage::getStoreConfig('themeoptions_theming/theme_fonts/heading_font', $storeId) == 'Din Text Pro Regular') {
?>
<!--// FONTDECK LOADER //-->
<script type="text/javascript">
WebFontConfig = { fontdeck: { id: '41599' } };

(function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
  '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();
</script>
<?php	
}
}
?>