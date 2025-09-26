<?php
$loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.
voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni 
dolores eos qui ratione voluptatem sequi nesciunt.";

echo "<p>{$loremIpsum}</p>";
echo "Panjang karakter: ". strlen($loremIpsum)."<br/>";
echo "Jumlah kata: ". str_word_count($loremIpsum)."<br/>";
echo "<p>" . strtoupper($loremIpsum) . "</p>";
echo "<p>" . strtolower($loremIpsum) . "</p>";

?>