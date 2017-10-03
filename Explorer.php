<?php
/**
* Cvičení ze serveru It network
*
*
*
*/

 class Explorer
 {

/**
* @var String jmeno adresare ke kteremu se pristupuje
*/
private $slozka;

/**
* @var Array pole nactenych souborů a složek
*/
private $soubory = array();

/**
* @var Int počet sloupcu generovaných v řádku
*/
private $sloupcu;

/**
* @var Array pole s cestou k ikonán patřičným souborům
*/
private $ikony = array(
            'jpg' => 'img.png',
            'JPG' => 'img.png',
            'png' => 'img.png',
            'jpeg' => 'img.png',
            'txt' => 'txt.png',
            'mp4' => 'video.png',
            'mp3' => 'video.png',
            'up' => 'up.png',
            'fol' => 'folder.png',
            'html' => 'html.png',
            'css' => 'css.png',
            'php' => 'php.png',
            'js' => 'javascript.png',
            'unknown' => 'unknown.png',
            'pdf' => 'pdf.png'
          );

/**
* Kontruktor
* @param String relativní cesta k načítané složce
* @param Int počet sloupců k zobrzení
*/

    public function __construct($slozka, $sloupcu)
    {
                 $this->slozka = $slozka;
                 $this->sloupcu = $sloupcu;
    }

/**
* Načítá složku uloženou na vlastní instanci
*
*/


    public function nacti()
    {
                $slozka = dir($this->slozka);



                while ($polozka = $slozka->read())
                {

                  $polozka != "." ? $this->soubory[] = $polozka : null;
                }
                $slozka->close();

      }


      public function get_slozka()
      {
            echo $this->slozka;
      }

/** Vloží na stránku tabulku a do ní odkozy na soubory a slozky
* 
*
*/

      public function vypis()
      {
              echo('<table id="explorer"><tr>');
              $sloupec = 0;

              foreach ($this->soubory as $soubor) {

                $sloupec++;

                  if ($sloupec > $this->sloupcu) {

                      echo '</tr><tr>';
                      $sloupec = 0;
                  }

                  echo '<td>
                          <a href="' . $this->get_path($soubor) . '">
                            <img src="ico/' . $this->get_icon($soubor) . '" alt="obrazek" title=' . $this->get_path($soubor) . '>
                            <p class"ikona">' . $soubor . '</p>
                          </a>
                        </td>';
              }

              echo('</tr></table>');
        }



/** Vybírá vhodnou ikonu k souboru
* @param String konkrétní soubor
* @return String relativní cestu k ikoně podle přípony souboru nebo ikonu neznámého souboru
*/

  private function get_icon($file)
    {

              $ext = pathinfo($file, PATHINFO_EXTENSION);

              if (!$ext) {
                return $file == ".." ? $this->ikony['up'] : $this->ikony['fol'];
              }

              return $this->ikony[$ext] ? $this->ikony[$ext] : $this->ikony['unknown'];
    }


/** Vytváří cestu pro soubor nebo složku
* @param String konkrétní soubor
* @return String relativní cestu k souboru
*/

      private function get_path($souborJmeno)
        {
            $cesta = "";
          if (is_dir($this->slozka . "/" . $souborJmeno)) {
            $cesta .= 'index.php?slozka=';
          }

            $cesta .= $this->slozka . "/" . $souborJmeno;


          return $cesta;

        }











 }
