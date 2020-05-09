// convertisseur hexa en rgb
$colorCmd = "#[test2][multi][test couleur]#";
$colorCmdRgb = "#[test2][multi][color rgb]#";

$color = cmd::byString($colorCmd)->execCmd();

cmd::byString("$colorCmdRgb")->event((1));

$scenario->setLog("hexa : $color");
    if ($color[0] == '#')
        $color = substr($color, 1);
  
    if (strlen($color) == 6) {
       $hex0 = hexdec($color[0] . $color[1]);
       $hex1 = hexdec($color[2] . $color[3]);
      $hex2 = hexdec($color[4] . $color[5]);
    }  

  $scenario->setLog("rgb($hex0,$hex1,$hex2)");
// $scenario->setData("rgb-variable", "rgb($hex0,$hex1,$hex2)");
cmd::byString("$colorCmdRgb")->event(("rgb($hex0,$hex1,$hex2)"));

// convertisseur rgb en hexa

   $rgb = dechex(($hex0<<16)|($hex1<<8)|$hex2);
   $rgb = ("#".substr("000000".$rgb, -6));
  $scenario->setLog("reconvertion en hexa : $rgb");

