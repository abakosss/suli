<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datum_regex</title>
</head>

<body>
    <?php
        function show_form() {
    ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="module" value="check_date" />
        <table>
            <tr>
                <td>Év:</td>
                <td><input type="text" name="year" maxlength="4" /></td>
            </tr>
            <tr>
                <td>Hónapszám:</td>
                <td><input type="text" name="month" maxlength="2" /></td>
            </tr>
            <tr>
                <td>Nap:</td>
                <td><input type="text" name="day" maxlength="2" /></td>
            </tr>
        </table>
        <div>
            <input type="submit" value="Ellenőrzés">
            <input type="reset" value="Visszaállít">
        </div>
    </form>
    <?php
        }

        function leap_year($year){
            return $year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0);
        }

        function check_date(){
            if (!preg_match('/^(19|20)\d{2}$/', $_REQUEST['year'])) {
                return false;
            }

            if (!preg_match('/^(0?[1-9]|1[0-2])$/', $_REQUEST['month'])) {
                return false;
            }

            switch ((int)$_REQUEST['month']) {
                case 2:
                    if (leap_year((int)$_REQUEST['year'])) {
                        return preg_match('/^(0?[1-9]|[1-2][0-9])$/', $_REQUEST['day']);
                    }
                    else {
                        return preg_match('/^(0?[1-9]|1[0-9]|2[0-8])$/', $_REQUEST['day']);
                    }
                case 4: case 6: case 9: case 11:
                    return preg_match('/^(0?[1-9]|[1-2][0-9]|30)$/', $_REQUEST['day']);
                default:
                    return preg_match('/^(0?[1-9]|[1-2][0-9]|30|31)$/', $_REQUEST['day']);
            }
        }

        function write_result(){
            if (check_date()) {
                echo "<p>Ez egy érvényes dátum!</p>";
            }
            else {
                echo "<p>Nem érvényés dátum!</p>";
            }
        }

        if (isset($_REQUEST['module']) && $_REQUEST['module'] === 'check_date') {
            write_result();
        }
        else 
        {
            show_form();
        }
    ?>
</body>
</html>