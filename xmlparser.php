<?php
/**
 * @author Oscar Batlle <oscarbatlle@gmail.com>
 */

require('xmlreader-iterators.php');

class HeadendIterator extends XMLElementIterator {

    const ELEMENT_NAME = 'job';

    public function __construct(XMLReader $reader) {
        parent::__construct($reader, self::ELEMENT_NAME);
    }

    /**
     * @return SimpleXMLElement
     */
    public function current() {
        return simplexml_load_string($this->reader->readOuterXml());
    }
}

$filepath = "Users/TheNexT/Projects/OscarXMLParser/feed.xml.gz";

// Use a PHP compression stream to open .gzipped files :)
$file = "compress.zlib:///" . $filepath;

$reader = new XMLReader();
$reader->open($file);

foreach (new HeadendIterator($reader) as $job) {
    // Iterate the file
    echo $job->zip, "\n"; // sample output data :)
}