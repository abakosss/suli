<?php
$regex="/^[A-Z][a-z][\d]$/";
if(isset($_POST['submit']))
{
    if(preg_match($regex, $_POST['text']))
    {
        $output="<span style='color:green'>&#x2713;</span>";
    }
    else
    {
        $output="<span style='color:red'>&#x2716;</span>";
    }
}

?>

<form method="POST">
<input type="text" name="text" autofocus/>
<input type="SUBMIT" name="submit">

<?php if(isset($output))
{
    echo $output;
}?>
</form>
<pre>
    ^   Start
    $   Vége
    []  karakterre vonatkozó szabályok
pl: [a-z] <- egy karakter a-tól z-ig bezárólag fogadja el
+ []-ben megadott kritériumat ha megtalálja legalább egyszer, de ezt a shzabályt kizárólag (ami majd utána jön)
    [a-zA-Z] <- szabálykiegészítés
    \s whitespace, vagy space
    [a-zA-Z\s0-9]   számok is jöhetnek
    [a-zA-Z\s\d]    ugyanúgy jöhetnek számok
    . ??? minden megengedett???
    \. szakasz
    [a-zA-Z\s\d\.]{3} összesen 3 karakterre éljen a szabály
    {2,5}   2-5 karakterig éljen a szabály
    [A-Z][a-z][\d] nagybetű, kisbetű, szám
</pre>