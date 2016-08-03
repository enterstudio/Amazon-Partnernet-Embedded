<?php

/**
 * Admin Options Page
 */
function amazonOptionsPage() {
  if (isset($_POST['amazonUpdate'])) {
    $Partner_ID = $_POST["BenutzerID"];
    $amazon_partnernet_links = $_POST["amazon_partnernet_links_name"];
    $amazon_partnernet_rechts = $_POST["amazon_partnernet_rechts_name"];
    $amazon_partnernet_none = $_POST["amazon_partnernet_none_name"];
    $amazon_partnernet_link = $_POST["amazon_partnernet_link_name"];
    $amazon_partnernet_rahmen = $_POST["amazon_partnernet_rahmen_name"];
    $amazon_partnernet_titelfarbe = $_POST["amazon_partnernet_titelfarbe_name"];
    $amazon_partnernet_preisfarbe = $_POST["amazon_partnernet_preisfarbe_name"];
    $amazon_partnernet_hintergrundfarbe = $_POST["amazon_partnernet_hintergrundfarbe_name"];

    update_option('amazon_PartnerID', $Partner_ID);
    update_option('amazon_partnernet_links', $amazon_partnernet_links);
    update_option('amazon_partnernet_rechts', $amazon_partnernet_rechts);
    update_option('amazon_partnernet_none', $amazon_partnernet_none);
    update_option('amazon_partnernet_link', $amazon_partnernet_link);
    update_option('amazon_partnernet_rahmen', $amazon_partnernet_rahmen);
    update_option('amazon_partnernet_titelfarbe', $amazon_partnernet_titelfarbe);
    update_option('amazon_partnernet_preisfarbe', $amazon_partnernet_preisfarbe);
    update_option('amazon_partnernet_hintergrundfarbe', $amazon_partnernet_hintergrundfarbe);
    ?>

    <div class="updated fade" id="message" style="background-color: rgb(207, 235, 247);">
      <p><strong>Options saved.</strong></p>
    </div>
    <?php
  } else {
    $Partner_ID = get_option('amazon_PartnerID');
    $amazon_partnernet_links = get_option('amazon_partnernet_links');
    $amazon_partnernet_rechts = get_option('amazon_partnernet_rechts');
    $amazon_partnernet_none = get_option('amazon_partnernet_none');
    $amazon_partnernet_link = get_option('amazon_partnernet_link');
    $amazon_partnernet_rahmen = get_option('amazon_partnernet_rahmen');
    $amazon_partnernet_titelfarbe = get_option('amazon_partnernet_titelfarbe');
    $amazon_partnernet_preisfarbe = get_option('amazon_partnernet_preisfarbe');
    $amazon_partnernet_hintergrundfarbe = get_option('amazon_partnernet_hintergrundfarbe');
  }
  ?>
  <div class="container">

    <ul class="tabs">
      <li class="tab-link current" data-tab="tab-1">Einstellungen</li>
      <li class="tab-link" data-tab="tab-2">Einbindung</li>
      <li class="tab-link" data-tab="tab-3">Weitere Informationen</li>
    </ul>

    <div id="tab-1" class="tab-content current">
      <form method="POST">
        <table class="optiontable">
          <tr valign="top">
            <th>PartnerID</th>
            <td><input id="BenutzerID" name="BenutzerID" type="text" value="<?php echo $Partner_ID; ?>">
              <br>
              Die Partner ID bekommst du indem du dich unter https://partnernet.amazon.de anmeldest! Achtung, wenn du dieses Feld leer l&auml;sst, dann wird die Partner ID <strong>huskyblog04-21</strong> eingesetzt und die Verkaufsprovisionen werden mir gutgeschrieben!</td>
          </tr>
          <tr valign="top">
            <th>Style f&uuml;r Float Links</th>
            <td><input name="amazon_partnernet_links_name" type="text" id="amazon_partnernet_links_name" value="<?php echo $amazon_partnernet_links; ?>" size="80">
              <br>
              CSS Anweisungen f&uuml;r Partnernetlink der links gefloatet werden soll.  Du kennst dich nicht mit CSS aus? Kein Problem! Lasse das Feld leer. Es wird dann diese Anweisung: <strong>float:left; width:120px; margin-right:10px; height:240px; background-color:#FFFFFF; border:1px solid #E0E0E0</strong> verwendet.</td>
          </tr>
          <tr valign="top">
            <th>Style f&uuml;r Float Rechts</th>
            <td><input name="amazon_partnernet_rechts_name" type="text" id="amazon_partnernet_rechts_name" value="<?php echo $amazon_partnernet_rechts; ?>" size="80">
              <br>
              CSS Anweisungen f&uuml;r Partnernetlink der rechts gefloatet werden soll.  Du kennst dich nicht mit CSS aus? Kein Problem! Lasse das Feld leer. Es wird dann diese Anweisung: <strong>float:right; width:120px; margin-left:10px; height:240px; background-color:#FFFFFF; border:1px solid #E0E0E0</strong> verwendet.</td>
          </tr>
          <tr valign="top">
            <th>Style f&uuml;r kein Float</th>
            <td><input name="amazon_partnernet_none_name" type="text" id="amazon_partnernet_none_name" value="<?php echo $amazon_partnernet_none; ?>" size="80">
              <br>
              CSS Anweisungen f&uuml;r Partnernetlink der nicht gefloatet werden soll.  Du kennst dich nicht mit CSS aus? Kein Problem! Lasse das Feld leer. Es wird dann diese Anweisung: <strong>width:100%; height:240px; background-color:#FFFFFF; border:1px solid #E0E0E0</strong> verwendet.</td>
          </tr>
          <tr valign="top">
            <th>Link in neuem Fenster?</th>
            <td><input id="amazon_partnernet_link_name" name="amazon_partnernet_link_name" type="text" value="<?php echo $amazon_partnernet_link; ?>">
              <br>
              Schreibe hier <strong>_blank</strong> (Link im neuen Fenster) oder <strong>_top</strong> (Link im gleichen Fenster) hinein. Wenn du das Feld leer l&auml;sst, wird <strong>_blank</strong> (Link im neuen Fenster) verwendet.</td>
          </tr>
          <tr valign="top">
            <th>Rahmen verwenden?</th>
            <td><input id="amazon_partnernet_rahmen_name" name="amazon_partnernet_rahmen_name" type="text" value="<?php echo $amazon_partnernet_rahmen; ?>">
              <br>
              Schreibe hier <strong>true</strong> oder <strong>false</strong> hinein. Wenn du das Feld leer l&auml;sst, wird <strong>false</strong> verwendet. Dieser hellgraue dÃ¼nne Rahmen wird von Amazon gesetzt, hat also nichts mit obiger Style Anweisung zu tun. Hast du mittels Style bereits einen Rahmen definiert, so wird mit dieser Option ein zusÃ¤tzlicher Rahmen innerhalb definiert, dessen Eigenschaften aber nicht beeinflusst werden kÃ¶nnen.</td>
          </tr>
          <tr valign="top">
            <th>Textfarbe</th>
            <td><input id="amazon_partnernet_titelfarbe_name" name="amazon_partnernet_titelfarbe_name" type="text" value="<?php echo $amazon_partnernet_titelfarbe; ?>">
              <br>
              Schreibe hier den Hexadezimalcode ohne # f&uuml;r die Textfarbe hinein, also z.B. <strong>0066C0</strong> f&uuml;r Blau. Wenn du das Feld leer l&auml;sst, wird 0066C0 verwendet.</td>
          </tr>
          <tr valign="top">
            <th>Linkfarbe</th>
            <td><input id="amazon_partnernet_preisfarbe_name" name="amazon_partnernet_preisfarbe_name" type="text" value="<?php echo $amazon_partnernet_preisfarbe; ?>">
              <br>
              Schreibe hier den hecadezimalcode ohne # f&uuml;r die Textfarbe hinein, also z.B. <strong>333333</strong> f&uuml;r Grau.Wenn du das Feld leer l&auml;sst, wird 333333 verwendet.</td>
          </tr>
          <tr valign="top">
            <th>Art</th>
            <td><input id="amazon_partnernet_hintergrundfarbe_name" name="amazon_partnernet_hintergrundfarbe_name" type="text" value="<?php echo $amazon_partnernet_hintergrundfarbe; ?>">
              <br>
              Schreibe hier den hecadezimalcode ohne # f&uuml;r die Hintergrundfarbe hinein, also z.B. <strong>FFFFFF</strong> f&uuml;r Weiss. Wenn du das Feld leer l&auml;sst, wird FFFFFF verwendet.</td>
          </tr>
          <tr valign="top">
            <td>&nbsp;</td>
            <td><input name="amazonUpdate" type="submit" value="Speichern"></td>
          </tr>
        </table>
      </form>
    </div>

    <div id="tab-2" class="tab-content">
      <p>Um den Amazon Partnernet-Link in deinen Weblog einzubinden, musst du folgenden Tag in deinem Wordpressartikel eingeben:</p>
      <code>[aartikel]myASIN:myFloat:Partner_ID[/aartikel]</code>
      <p>wobei die beiden Parameter <strong>myFloat</strong> und <strong>Partner_ID</strong> optinal sind...</p>
      <ul>
        <li><b>myASIN:</b> Hier musst du die ISBN Nummer oder ASIN Nummer des Amazon Artikel eingeben.</li>
        <li><b>myFloat:</b> Hier kannst du <b>left</b> oder <b>right</b> angeben oder den Parameter weglassen.  Dadurch bestimmst du ob der Amazon Artikel nach links, rechts oder nicht gefloatet werden soll.</li>
        <li><b>Partner_ID:</b> Wenn sich die gew&uuml;nschte Partner_ID von der in den Einstellungen eingegebenen Partner_ID unterscheiden soll, kannst du sie mit diesem Parameter angeben.</li>
      </ul>
      <p></p>
      <h4>Beispiele</h4>
      <p>1. Einzelartikel Link ohne Float eingeben</p>
      <code>[aartikel]3835402617[/aartikel]</code>
      <p>Dadurch wird der Partnernetlink mit der ASIN 3835402617 eingef&uuml;gt. Es findet keine Textumfluss statt.</p>
      <hr>
      <p>2. Einzelartikellink mit Float eingeben</p>
      <code>[aartikel]3835402617:left[/aartikel]</code>
      <p>Dadurch wird der Partnernetlink mit der ASIN 3835402617 eingef&uuml;gt. Es findet ein Textumfluss float:left statt.</p>
      <hr>
      <p>3. Einzelartikellink mit Float und anderer Partner_IDeingeben</p>
      <code>[aartikel]3835402617:left:huskyblog04-21[/aartikel]</code>
      <p>Dadurch wird der Partnernetlink mit der ASIN 3835402617 eingef&uuml;gt. Es findet ein Textumfluss float:left statt. Es wird die Partner-ID huskyblog04-21 verwendet, auch wenn in den Einstellungen eine andere Partner ID eingegeben wurde.</p>
      <hr>
    </div>

    <div id="tab-3" class="tab-content">
      <p>Mehr Informanten findest du auf der Plugin Seite oder auf Github.</p>
    </div>

  </div><!-- container -->
  <?php
}
