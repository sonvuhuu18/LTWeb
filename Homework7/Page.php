<?php
/**
 * Created by PhpStorm.
 * User: T410s
 * Date: 10/28/2016
 * Time: 10:28 PM
 */

class Page {
    private $page;
    private $title;
    private $year;
    private $copyright;

    public function __construct ($page, $title, $year, $copyright)
    {
        $this->page = $page;
        $this->title = $title;
        $this->year = $year;
        $this->copyright = $copyright;
        $this->addHeader();
    }

    private function addHeader()
    {
        $this->page .= "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <title>$this->title</title>
        </head>
        <body>
            <p>$this->title</p>
        ";
    }

    public function addContent ($content)
    {
        $this->page .= $content;
    }

    private function addFooter ()
    {
        $this->page .= "
            <p>&copy; $this->year $this->copyright</p>
            </br>
        </body>
        </html>
        ";
    }

    public function get ()
    {
        $temp = $this->page;
        $this->addFooter();
        $page = $this->page;
        $this->page = $temp;
        return $page;
    }
}

$pageOne = new Page('', 'PageOne', 1995, 'Sơn Vũ');
$pageOne->addContent("<p>This is a web page</p>");
echo $pageOne->get();

$pageTwo = new Page('', 'PageTwo', 1995, 'Sơn Vũ');
$pageTwo->addContent("<p>This is a web page</p>");
echo $pageTwo->get();

$pageThree = new Page('', 'PageThree', 1995, 'Sơn Vũ');
$pageThree->addContent("<p>This is a web page</p>");
echo $pageThree->get();