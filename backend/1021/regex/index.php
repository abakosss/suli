<?php
//RegEx: Regular Expression
//Szabályos Kifejezések:
//Karaktersorozatokra szabályrendszer, megfelelő syntaxissal
// jó tudni:
//ezzel kezdünk: $regex="//"
// 

$regex="/^[a-z]+$/";

if (isset($_POST['submit'])) {
    if (preg_match($regex, $_POST['text'])) {
        $output="<span style='color:green'>&#x2713;</span>";
    }
    else {
        $output="<span style='color:red'>&#x2716;</span>";
    }
}
?>
<form method="POST">
    <input type="text" name="text" autofocus>
    <input type="SUBMIT" name="submit">
</form>
<?php if (isset($output))
{
    echo $output;
}
?>

<pre>
    ^ Start
    $ Vége
    []: Szabályok egy karakterre vonatkozó
    pl: [a-z] <- egy darab karakter és csak kis a-tól kis z-ig mehet
    +: hozzáadja a szabályt a rákövetkező irányba (utána lévőre is ugyanaz a szabály)
</pre>