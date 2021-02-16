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
echo '<br>Porines ir neporines indekso reiksmes:<br>';
$porinis = array_filter(array_keys($senasPliusNaujasMasyvas), (function($skaicius) {return $skaicius % 2 === 0; }));
$nePorinis = array_filter(array_keys($senasPliusNaujasMasyvas), (function($skaicius) {return $skaicius % 2 !== 0; }));

echo '<pre>';
print_r($porinis);
echo '<br><br><br><br>';
print_r($nePorinis);
echo '<br><br><br><br>';


//KUR G UZDUOTIS??????????????????????????????????????????????????????????????????????????????????????????????????????
//cia:

// G) Masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu jie didesni už 15;

foreach($porinis as $key => &$value){
    if($value > 15){
        $value = 0;
    }
}
unset($value);
print_r($porinis);

// H) Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė didesnė už 10;

function didesnisUzDesimt($skaicius){
    return $skaicius > 10;
}
$skaiciusDidesnisUzDesimt = array_filter($senasPliusNaujasMasyvas, 'didesnisUzDesimt'); 
sort($skaiciusDidesnisUzDesimt);
print_r($skaiciusDidesnisUzDesimt[0]);

// I)
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

echo '<br><br><br>------------TRECIA UZDUOTIS-----------<br><br><br><br>';

// Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200. Suskaičiuokite kiek yra kiekvienos raidės.

$array = [];
$countA = 0;
$countB = 0;
$countC = 0;
$countD = 0;

for($i = 0; $i <200; $i++){
    array_push($array, chr(rand(65, 68)));
}

print_r($array);

for($i = 0; $i < count($array); $i++){
    switch ($array[$i]) {
        case 'A':
            $countA++;
            break;
        case 'B':
            $countB++;
            break;
        case 'C':
            $countC++;
            break;
        case 'D':
            $countD++;
            break;
        default:
            echo 'kazkokia tai nesamone cia tau susigeneravo';    
    }
}
echo '<br><br><br>------------KETVIRTA UZDUOTIS-----------<br><br><br><br>';
// Išrūšiuokite 3 uždavinio masyvą pagal abecėlę.
 
sort($array, SORT_STRING);
print_r($array);

echo '<br><br><br>------------PENKTA UZDUOTIS-----------<br><br><br><br>';
// Sugeneruokite 3 masyvus pagal 3 uždavinio sąlygą. Sudėkite masyvus, sudėdami atitinkamas reikšmes. Paskaičiuokite kiek unikalių reikšmių kombinacijų gavote.

$arrayA = [];
$arrayB = [];
$arrayC = [];
$arrayABC = [];

for($i = 0; $i <200; $i++){
    array_push($arrayA, chr(rand(65, 68)));
}

for($i = 0; $i <200; $i++){
    array_push($arrayB, chr(rand(65, 68)));
}

for($i = 0; $i <200; $i++){
    array_push($arrayC, chr(rand(65, 68)));
}

for ($i = 0; $i < 200; $i++){
    array_push($arrayABC, $arrayA[$i] . $arrayB[$i] . $arrayC[$i]);
}
echo '<pre>';
print_r(array_count_values($arrayABC));
echo '<br><br> skirtingu kombinaciju yra: ' . count((array_count_values($arrayABC)));


echo '<br><br><br>------------SESTA UZDUOTIS-----------<br><br><br><br>';

// Sugeneruokite du masyvus, kurių reikšmės yra atsitiktiniai skaičiai nuo 100 iki 999. Masyvų ilgiai 100. Masyvų reikšmės turi būti unikalios savo masyve (t.y. neturi kartotis).

$masyvas = [];
while(count($masyvas)<100){
    $skaicius = rand(100, 999);
    if (!in_array($skaicius, $masyvas)){
        array_push($masyvas, $skaicius);
    }
}

echo '<pre>';
print_r($masyvas);

$masyvas2 = [];
while(count($masyvas2)<100){
    $skaicius = rand(100, 999);
    if (!in_array($skaicius, $masyvas2)){
        array_push($masyvas2, $skaicius);
    }
}

echo '<pre>';
print_r($masyvas2);

echo '<br><br><br>------------SEPTINTA UZDUOTIS-----------<br><br><br><br>';

// Sugeneruokite masyvą, kuris būtų sudarytas iš reikšmių, kurios yra pirmame 6 uždavinio masyve, bet nėra antrame 6 uždavinio masyve.

$arr = array_diff($masyvas, $masyvas2);
echo 'pre';
print_r($arr);

echo '<br><br><br>------------ASTUNTA UZDUOTIS-----------<br><br><br><br>';
// Sugeneruokite masyvą iš elementų, kurie kartojasi abiejuose 6 uždavinio masyvuose.

$arr = array_intersect($masyvas, $masyvas2);
echo 'pre';
print_r($arr);

echo '<br><br><br>------------DEVINTA UZDUOTIS-----------<br><br><br><br>';
// Sugeneruokite masyvą, kurio indeksus sudarytų pirmo 6 uždavinio masyvo reikšmės, o jo reikšmės iš būtų antrojo masyvo.

echo '<pre>';
print_r(array_slice(array_combine($masyvas2, $masyvas), 0, 6, true));

echo '<br><br><br>------------DESIMTA UZDUOTIS-----------<br><br><br><br>';
// Sugeneruokite 10 skaičių masyvą pagal taisyklę: Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25. Trečias, pirmo ir antro suma. Ketvirtas- antro ir trečio suma. Penktas trečio ir ketvirto suma ir t.t.

$masyvas10 = [rand(5, 25), rand(5, 25)];
$i = 0;
while(count($masyvas10) < 10){
    array_push($masyvas10, ($masyvas10[$i] + $masyvas10[$i+1]));
    $i++;
}
echo '<pre>';
print_r($masyvas10);

/////currrrenttt???

echo '<br><br><br>------------VIENUOLIKTA UZDUOTIS-----------<br><br><br><br>';

// Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300. Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, kad visos reikšmės masyve būtų unikalios. Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų. Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės). Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite. (Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30)
