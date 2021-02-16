<h1>--------------------------------1.--------------------------------</h1>
<p>Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių
reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25.</p>
<?php
$array = [];
for ($i = 0; $i < 30; $i++) {
    array_push($array, rand(5, 25));
}
echo 'One array printing method <br>';
echo '<pre>';
print_r($array);
echo '</pre>';
echo 'Other array printing method <br><br>';
foreach($array as $index => $value) {
    echo $index . ' =>' . $value . '<br>';
}
?>
<h1>--------------------------------2.--------------------------------</h1>
<p>Naudodamiesi 1 uždavinio masyvu:
<br>
a) Suskaičiuokite kiek masyve yra reikšmių didesnių už 10;
</p>
<?php
$count = 0;
for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] > 10) {
        $count++;
    }
}
echo "There are $count numbers bigger than 10.";
?>
<p>b) Raskite didžiausią masyvo reikšmę;</p>
<?php
$biggest = 0;
for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] >= $biggest) {
        $biggest = $array[$i];
        $position = $i;
    }
}
echo "The biggest value is $biggest in position $position.";
?>
<p>c) Suskaičiuokite visų reikšmių sumą;</p>
<?php
$sum = 0;
for ($i = 0; $i < count($array); $i++) {
    $sum += $array[$i];
}
echo "The sum of all array values is $sum.";
?>
<p>d) Sukurkite naują masyvą, kurio reikšmės yra 1 uždavinio masyvo
reikšmes minus tos reikšmės indeksas;</p>
<?php
$newArray = [];
for ($i = 0; $i < count($array); $i++) {
    array_push($newArray, ($array[$i] - $i));
}
echo 'New array: <pre>';
print_r($newArray);
echo '</pre>';
?>
<p>e) Papildykite masyvą papildomais 10 elementų su reikšmėmis nuo
5 iki 25, kad bendras masyvas padidėtų iki indekso 39;</p>
<?php
for ($i = 0; $i < 10; $i++) {
    array_push($array, rand(2, 25));
}
echo 'Array with indexes up to 39: <pre>';
print_r($array);
echo '</pre>';
?>
<p>f) Iš masyvo elementų sukurkite du naujus masyvus. Vienas turi
būti sudarytas iš neporinių indekso reikšmių, o kitas iš porinių;</p>
<?php
$evenArray = [];
$oddArray = [];
foreach ($array as $index=> $value) {
    if ($index % 2 === 0) {
        array_push($evenArray, $index);
    } else {
        array_push($oddArray, $index);
    }
}
echo 'New even index array: <pre>';
print_r($evenArray);
echo '</pre>';
echo 'New odd index array: <pre>';
print_r($oddArray);
echo '</pre>';
?>
<p>g) Masyvo elementus su poriniais indeksais padarykite lygius 0 jeigu
jie didesni už 15;</p>
<?php
foreach ($array as $index=> $value) {
    if (($index % 2 === 0) && ($value > 15)) {
        $replacement = array($index => 0);
        $array = array_replace($array, $replacement);
    }
}
// for ($i = 0; $i < count($array); $i++) {
//     if (($i % 2 === 0) && ($array[$i] > 15)) {
//         $replacement = array($i => 0);
//         $array = array_replace($array, $replacement);
//     }
// }
echo 'Array in which all even index values bigger than 15 are equal to  0.: <pre>';
print_r($array);
echo '</pre>';
?>
<p>h) Suraskite pirmą (mažiausią) indeksą, kurio elemento reikšmė
didesnė už 10;</p>
<?php
foreach ($array as $index => $value) {
    if ($value > 10) {
        $smallestIndex = $index;
        break;
    }
}
echo "The smallest index of value more than 10 - $value is index $index.";
?>
<p>i) Naudodami funkciją unset()iš masyvo ištrinkite visus elementus
turinčius porinį indeksą;</p>
<?php
foreach ($array as $index => $value) {
    if ($index % 2 === 0) {
       unset($array[$index]);
    }
}
echo 'Array without even elements: <pre>';
print_r($array);
echo '</pre>';
?>
<h1>--------------------------------3.--------------------------------</h1>
<p>Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis
200. Suskaičiuokite kiek yra kiekvienos raidės.</p>
<?php
$array2 = [];
$letters = ['A', 'B', 'C', 'D'];
for ($i = 0; $i < 200; $i++) {
    $random = rand(0, 3);
    array_push($array2, $letters[$random]);
}
echo 'Letter count: <pre>';
print_r($array2);
print_r(array_count_values($array2));
echo '</pre>';
?>
<h1>--------------------------------4.--------------------------------</h1>
<p>Išrūšiuokite 3 uždavinio masyvą pagal abecėlę.</p>
<?php
$sortCountArray2 = array_count_values($array2);
sort($array2);
echo '<pre>';
print_r($array2);
print_r($sortCountArray2);
echo '</pre>';
?>
<h1>--------------------------------5.--------------------------------</h1>
<p>Sugeneruokite 3 masyvus pagal 3 uždavinio sąlygą. Sudėkite masyvus, sudėdami atitinkamas reikšmes. Paskaičiuokite kiek unikalių reikšmių kombinacijų gavote.</p>
<?php
$array3 = [];
$array4 = [];
$array5 = [];
$letters = ['A', 'B', 'C', 'D'];
$mergedArray = [];
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 200; $j++) {
        $random = rand(0, 3);
        if ($i === 0) {
            array_push($array3, $letters[$random]);
        } else if ($i === 1) {
            array_push($array4, $letters[$random]);
        } else {
            array_push($array5, $letters[$random]);
        }
    }
}
$mergedArray = [];
for ($i = 0; $i < 200; $i++) {
    $temp = $array3[$i] . $array4[$i] . $array5[$i];
    array_push($mergedArray, $temp);
}
$combinations = array_count_values($mergedArray);
$unicCombinations = 0;
$unicCombinationsArray = [];
foreach ($combinations as $letters => $value) {
    if ($value === 1) {
        $unicCombinations++;
        array_push($unicCombinationsArray, $letters);
    }
}
echo 'Merged array: <pre>';
print_r($mergedArray);
echo '</pre> All combinations array: <pre>';
print_r(array_count_values($mergedArray));
echo '</pre> Unic combinations array: <pre>';
print_r($unicCombinationsArray);
echo "</pre> There are $unicCombinations unic combinations in this array.";
?>
<h1>--------------------------------6.--------------------------------</h1>
<p>Sugeneruokite du masyvus, kurių reikšmės yra atsitiktiniai skaičiai nuo 100 iki 999 Masyvų ilgiai 100. Masyvų reikšmės turi būti unikalios savo masyve (t.y. neturi kartotis </p>
<?php
$randomNumber = rand(100, 999);
$arrayOne = [];
$arrayTwo = [];
for ($i = 0; $i < 2; $i++) {
    for ($j = 0; $j < 100; $j++) {
        $random = rand(100, 999);
        if ($i === 0 && !in_array($random, $arrayOne)) {
            array_push($arrayOne, $random);
        } else if (!in_array($random, $arrayTwo)) {
            array_push($arrayTwo, $random);
        }
    }
}
echo '<pre>';
print_r($arrayOne);
print_r($arrayTwo);
echo '</pre>'; 
?>
<h1>--------------------------------7.--------------------------------</h1>
<p>Sugeneruokite masyvą, kuris būtų sudarytas iš reikšmių, kurios yra pirmame 6 uždavinio masyve, bet nėra antrame 6 uždavinio masyve.</p>
<?php
$notRecurArray = array_diff($arrayOne, $arrayTwo);
echo '<pre>';
print_r($notRecurArray);
echo '</pre>';
?>
<h1>--------------------------------8.--------------------------------</h1>
<p>Sugeneruokite masyvą iš elementų, kurie kartojasi abiejuose 6 uždavinio
masyvuose</p>
<?php
$repetitiveArray = array_intersect($arrayOne, $arrayTwo);
echo '<pre>';
print_r($repetitiveArray);
echo '</pre>';
?>
<h1>--------------------------------9.--------------------------------</h1>
<p>Sugeneruokite masyvą, kurio indeksus sudarytų pirmo 6 uždavinio masyvo reikšmės, o jo reikšmės iš būtų antrojo masyvo.</p>
<?php
$arrayOneSlice = array_slice($arrayOne, 0, 6, true);
$arrayTwoSlice = array_slice($arrayTwo, 0, 6, true);
$arrayBoth = array_combine($arrayOneSlice, $arrayTwoSlice);
echo '<pre>';
print_r($arrayBoth);
echo '</pre>';
?>
<h1>-------------------------------10.--------------------------------</h1>
<p>Sugeneruokite 10 skaičių masyvą pagal taisyklę: Du pirmi skaičiai- atsitiktiniai nuo 5 iki 25. Trečias, pirmo ir antro suma. Ketvirtas- antro ir trečio suma. Penktas trečio ir ketvirto suma ir t.t.</p>
<?php
$arrayByRule = [];
for ($i = 0; $i < 10; $i++) {
    if ($i < 2) {
        array_push($arrayByRule, rand(5, 25));
    } else {
        array_push($arrayByRule, ($arrayByRule[$i - 2] + $arrayByRule[$i - 1]));
    }
}
echo '<pre>';
print_r($arrayByRule);
echo '</pre>';
?>
<h1>-------------------------------11.--------------------------------</h1>
<p>Sugeneruokite 101 elemento masyvą su atsitiktiniais skaičiais nuo 0 iki 300. Reikšmes kurios tame masyve yra ne unikalios pergeneruokite iš naujo taip, kad visos reikšmės masyve būtų unikalios. Išrūšiuokite masyvą taip, kad jo didžiausia reikšmė būtų masyvo viduryje, o einant nuo jos link masyvo pradžios ir pabaigos reikšmės mažėtų. Paskaičiuokite pirmos ir antros masyvo dalies sumas (neskaičiuojant vidurinės). Jeigu sumų skirtumas (modulis, absoliutus dydis) yra didesnis nei | 30 | rūšiavimą kartokite. (Kad sumos nesiskirtų viena nuo kitos daugiau nei per 30)</p>
<?php
$array101 = [];
for ($i = 0; $i < 101; $i++) {
    $random = rand(0, 300);
    array_push($array101, $random);
}
echo '<pre>';
print_r($array101);
echo '</pre>';
?>