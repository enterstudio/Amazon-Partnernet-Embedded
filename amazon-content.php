<?php

/**
 * 
 * @param type $inhalt
 * @return type
 */
function amazonContent($inhalt) {
  $spos = 0;
  $epos = 0;

  $neuer_inhalt = $inhalt;

  while ($spos = strpos($neuer_inhalt, '[aartikel]')) {  // find each amazon tag
    $epos = strpos($neuer_inhalt, '[/aartikel]');

    if ($spos > 0 & $epos > 0) {
      $sub = substr($neuer_inhalt, $spos, $epos - $spos); // extract the begin tag and parameters from contents
      $sub = str_replace('[aartikel]', '', $sub); // remove the begin tag

      list($myASIN, $myFloat, $Partner_ID_Element) = explode(':', $sub,3);

      // set default values for missing parameters
      if (($myFloat != 'left') && ($myFloat != 'right'))
        $myFloat = 'none';

      $Partner_ID = "huskyblog04-21";
      if (get_option('amazon_PartnerID') != '')
        $Partner_ID = get_option('amazon_PartnerID');
      if ($Partner_ID_Element != '')
        $Partner_ID = $Partner_ID_Element;
      $amazon_partnernet_links = get_option('amazon_partnernet_links');
      if ($amazon_partnernet_links == '')
        $amazon_partnernet_links = "float:left; width:120px; margin-right:10px; height:240px; background-color:#FFFFFF; border:1px solid #E0E0E0";
      $amazon_partnernet_rechts = get_option('amazon_partnernet_rechts');
      if ($amazon_partnernet_rechts == '')
        $amazon_partnernet_rechts = "float:right; width:120px; margin-left:10px; height:240px; background-color:#FFFFFF; border:1px solid #E0E0E0";
      $amazon_partnernet_none = get_option('amazon_partnernet_none');
      if ($amazon_partnernet_none == '')
        $amazon_partnernet_none = "width:100%; height:240px; background-color:#FFFFFF; border:1px solid #E0E0E0";
      $amazon_partnernet_link = get_option('amazon_partnernet_link');
      if ($amazon_partnernet_link == '_top')
        $amazon_partnernet_link = "false";
      else
        $amazon_partnernet_link = "true";
      $amazon_partnernet_rahmen = get_option('amazon_partnernet_rahmen');
      if ($amazon_partnernet_rahmen == '')
        $amazon_partnernet_rahmen = "false";
      else
        $amazon_partnernet_rahmen = "true";
      $amazon_partnernet_titelfarbe = get_option('amazon_partnernet_titelfarbe');
      if ($amazon_partnernet_titelfarbe == '')
        $amazon_partnernet_titelfarbe = "0066C0";
      $amazon_partnernet_preisfarbe = get_option('amazon_partnernet_preisfarbe');
      if ($amazon_partnernet_preisfarbe == '')
        $amazon_partnernet_preisfarbe = "333333";
      $amazon_partnernet_hintergrundfarbe = get_option('amazon_partnernet_hintergrundfarbe');
      if ($amazon_partnernet_hintergrundfarbe == '')
        $amazon_partnernet_hintergrundfarbe = "FFFFFF";

      // build the link based on the ad type

      $src = '//ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&OneJS=1&Operation=GetAdHtml&MarketPlace=DE&source=ac&ref=tf_til&ad_type=product_link&tracking_id=' . $Partner_ID . '&marketplace=amazon&region=DE&placement=' . $myASIN . '&asins=' . $myASIN . '
			&show_border=' . $amazon_partnernet_rahmen . '&link_opens_in_new_window=' . $amazon_partnernet_link . '&price_color=' . $amazon_partnernet_preisfarbe . '&title_color=' . $amazon_partnernet_titelfarbe . '&bg_color=' . $amazon_partnernet_hintergrundfarbe;

      switch ($myFloat) {
        case 'left':
          $link = '<iframe scrolling="no" frameBorder="0" src="' . $src . '" marginheight="0" marginwidth="0" style="' . $amazon_partnernet_links . '" class="amazon-partnernet"></iframe>';
          break;
        case 'right':
          $link = '<iframe scrolling="no" frameBorder="0" src="' . $src . '" marginheight="0" marginwidth="0" style="' . $amazon_partnernet_rechts . '" class="amazon-partnernet"></iframe>';
          break;
        case 'none':
          $link = '<iframe scrolling="no" frameBorder="0" src="' . $src . '" marginheight="0" marginwidth="0" style="' . $amazon_partnernet_none . '" class="amazon-partnernet"></iframe>';
          break;
      }
      $neuer_inhalt = str_replace('[aartikel]' . $sub . '[/aartikel]', $link, $neuer_inhalt);
    }
  }
  return $neuer_inhalt;
}
