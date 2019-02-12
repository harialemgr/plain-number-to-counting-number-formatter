# Plain Number to Counting Number Formatter

A simple php class that helps to format a number seperating by comma which make a counting easy.

<h6>Examples</h6>
<strong>South Asian Number System<strong>
  <code>
$formatterObject = new PlainNumberToCountingNumberFomatter();
echo $formatterObject->southAsianNumberSystemFormatter(92345634563.34) . "<br>";
echo $formatterObject->internationalNumberSystemFormatter(92345634563.34) . "<br>";
echo $formatterObject->toPlainNumber('92,345,634,563.34') . "<br>";  
  </code>
  
<strong>International Number System<strong>
