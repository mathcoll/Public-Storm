<?php

/*
 * Read README file first.
 *
 * This example
 * ------------
 * This example shows how to create a simple spreadsheet export using
 * fictive data.
 */

// Require necessary files
require("../lib/SpreadsheetExport.php");

// Initialize the export object
$export = new SpreadsheetExport();

// Set the target filename. The extension will automatically be added.
$export->filename = "mySampleExport";

// We add a few columns now using dates, strings and floats. The second
// parameter specifies the column with in cm when using ODS export.
$export->AddColumn("date", 5);
$export->AddColumn("string");
$export->AddColumn("float");

// Now we add 3 rows
$export->AddRow(array("1987-01-01", "world population reached 5 billion", 5));
$export->AddRow(array("1999-01-01", "world population reached 6 billion", 6));
$export->AddRow(array("2012-01-01", "world population reaches 12 billion", 12));

// And now export it either as ODS or CSV (you need the zip library installed to use ODS!)
$export->DownloadODF();
//$export->DownloadCSV();

?>