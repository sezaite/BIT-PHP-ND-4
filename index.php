  <!-- array_map( "callback", array_keys($array), $array); <---- kaip pasiusti dvi arrays, kai viena is ju - tos pacios array indeksu array -->

<!-- Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25. -->
 
<?php

echo '<br><br><br>------------PIRMA UZDUOTIS-----------<br><br><br><br>';

// function add($nulis){
//     return $nulis + rand(5, 25);
// }

$masyvas = array_fill(0, 30, 0);
$galutinisMasyvas = (array_map(function($nulis) {return $nulis + rand(5, 25); }, $masyvas));
print_r($galutinisMasyvas);

echo '<br><br><br>------------ANTRA UZDUOTIS-----------<br><br><br><br>';

// Naudodamiesi 1 uždavinio masyvu:
// Suskaičiuokite kiek masyve yra reikšmių didesnių už 10;
$didesnisUzDesimt = array_filter($galutinisMasyvas, function($masyvoNarys) {return $masyvoNarys > 10; });
print_r($didesnisUzDesimt);
echo '<br><br>' . count($didesnisUzDesimt) . '<br><br>';

// Raskite didžiausią masyvo reikšmę;
rsort($galutinisMasyvas);
echo $galutinisMasyvas[0] . '<br><br>';

// Suskaičiuokite visų reikšmių sumą;
echo array_sum($galutinisMasyvas) . '<br><br>';

// Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo reikšmes minus tos reikšmės indeksas;
$naujasMasyvas = array_map('atimkIndeksa', $galutinisMasyvas, array_keys($galutinisMasyvas)); 

function atimkIndeksa($value, $key){
    return ($value - $key);
}
print_r($naujasMasyvas);
echo '<br><br><br><br>';
////// tas pats tik viena eilute:

print_r(array_map(function($value, $key) { return $value - $key; }, $galutinisMasyvas, array_keys($galutinisMasyvas))); 

echo '<br><br><br><br>';

// Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo 5 iki 25, kad bendras masyvas padidėtų iki indekso 39;

$papildomasMasyvas = array_fill(0, 10, 0);
$uzpildytasPapildomasMasyvas = (array_map(function($nulis) {return $nulis + rand(5, 25); }, $papildomasMasyvas));
$senasPliusNaujasMasyvas = array_merge($galutinisMasyvas, $uzpildytasPapildomasMasyvas);

print_r($senasPliusNaujasMasyvas);
echo '<br><br><br><br>';

// Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių;

$porinis = array_filter(array_keys($senasPliusNaujasMasyvas), (function($skaicius) {return $skaicius % 2 === 0; }));
$nePorinis = array_filter(array_keys($senasPliusNaujasMasyvas), (function($skaicius) {return $skaicius % 2 !== 0; }));

print_r($porinis);
echo '<br><br><br><br>';
print_r($nePorinis);
echo '<br><br><br><br>';

// Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10;

function didesnisUzDesimt($skaicius){
    return $skaicius > 10;
}
$skaiciusDidesnisUzDesimt = array_filter($senasPliusNaujasMasyvas, 'didesnisUzDesimt'); 
sort($skaiciusDidesnisUzDesimt);
print_r($skaiciusDidesnisUzDesimt[0]);

// Naudodami funkciją unset() iš masyvo ištrinkite visus elementus turinčius porinį indeksą;
echo '<br><br>unset uzdavinys: <br><br>';

// function poriniuAtranka($key => $el){
//     if ($key % 2 === 0){
//         unset($key);
//     } 
// }
// print_r(array_map('poriniuAtranka', array_keys($senasPliusNaujasMasyvas), $senasPliusNaujasMasyvas));

// $masyvoIlgis = count($senasPliusNaujasMasyvas);
// for ($i = 0; $i < $masyvoIlgis; $i = $i + 2) {
//     unset($GLOBALS[$senasPliusNaujasMasyvas[$i]]);
// }

// print_r($senasPliusNaujasMasyvas);

$masyvoIlgis = count($senasPliusNaujasMasyvas);
for ($i = 0; $i < $masyvoIlgis; $i = $i + 2){
    unset($senasPliusNaujasMasyvas[$i]);
}

print_r($senasPliusNaujasMasyvas);








    
