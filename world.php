<?php
mysql_connect("72.27.62.126","d-colley");
mysql_select_db("world");

$LOOKUP = $_REQUEST['lookup'];
$all = $_REQUEST['all'];
$format = $_REQUEST['format'];

if ($all=='true' && $format=='xml') {
    $results = mysql_query("SELECT * FROM countries;");
    # print $results;
    header("Content-type:application/xml");
    echo "<countrydata>";
    while ($row = mysql_fetch_array($results)) {
        echo "<country>";
        
        echo "<name>";
        echo $row["name"];
        echo "</name>";
        
        echo "<ruler>";
        echo $row["head_of_state"];
        echo "</ruler>";
        
        echo "</country>";
        
    }
    echo "</countrydata>";

}elseif ($all=='true') {
    $results = mysql_query("SELECT * FROM countries;");
   # print $results;
    while ($row = mysql_fetch_array($results)) {
    ?>
    <li> <?php echo $row["name"]; ?>, ruled by <?php echo $row["head_of_state"]; ?> </li>
    <?php
    }
}

# execute a SQL query on the database
else {
    $results = mysql_query("SELECT * FROM countries WHERE name LIKE '%$LOOKUP%';");
    print $results;
# loop through each country
    while ($row = mysql_fetch_array($results)) {
    ?>
    <li> <?php echo $row["name"]; ?>, ruled by <?php echo $row["head_of_state"]; ?> </li>
    <?php
    }
}
?>
