<?php
////
////session_start();
include_once "../loader.php";
////
////define("BASE_URL","http://x.localhost/");
////
////$user = $_SESSION['id'];
//////$id = $_GET['id'];        // Collecting data from query string
//////if (!is_numeric($id)) { // Checking data it is a number or not
//////    echo "Data Error";
//////    exit;
//////}
////
////$query = $db->query("select * from ebooks where book_id= '$id'");
//////
///////* associative array */
////if ($query->num_rows > 0) {
////    while ($row = mysqli_fetch_assoc($query)) {
//////
//////$file =   BASE_URL . 'assets/upload/ebook/' . $row['ebook_file'];
//////header('Content-type: application/pdf');
//////header('Content-Disposition inline; filename="' . $file .'"');
//////header('Content-Tranfer-Encoding: binary');
//////header('Accept-Ranges: bytes');
//////@readfile($file);
//////    }
//////}
////
////
////      //  $file = new Poppler\Process\PdfFile($book);
////
////        $book = BASE_URL . 'assets/upload/ebook/' . $row['ebook_file'];
////        $dir = BASE_URL . 'assets/upload/ebook/';
////
////        $file = new Poppler\Process\PdfFile($book);
////        $file->toHtml($book, $dir);
////
////
////
////    }}
//
////use NcJoes\PopplerPhp\PdfToHtml;
////$pdf = new \TonchikTm\PdfToHtml\Pdf('fibre.pdf', [
////    'pdftohtml_path' => '/user/bin/pdftohtml',
////    'pdfinfo_path' => '/usr/bin/pdfinfo'
////]);
////
////// get content from all pages and loop for they
////foreach ($pdf->getHtml()->getAllPages() as $page) {
////    echo $page . '<br/>'; }
//
//
//// if you are using composer, just use this
//use NcJoes\PopplerPhp\PdfInfo;
//use NcJoes\PopplerPhp\Config;
//use NcJoes\PopplerPhp\PdfToCairo;
//use NcJoes\PopplerPhp\PdfToHtml;
//use NcJoes\PopplerPhp\Constants as C;
//
//// set Poppler utils binary location
//Config::setBinDirectory('C:/path-to-project/vendor/bin/poppler');
//
//// set output directory
//Config::setOutputDirectory('C:/path-to-project/storage/poppler-output');

/**
 * Poppler-PHP
 *
 * Author:  Chukwuemeka Nwobodo (jcnwobodo@gmail.com)
 * Date:    10/14/2016
 * Time:    4:46 AM
 **/

//use NcJoes\PopplerPhp\Config;
//use NcJoes\PopplerPhp\PdfToHtml;
//
//class PdfToHtmlTest
//{
//    public function setUp()
//    {
//        parent::setUp();
//    }
//
//    public function testGenerateMethod()
//    {
//        Config::setOutputDirectory(Config::getOutputDirectory(true), true);
//        $DS = DIRECTORY_SEPARATOR;
//       // $file = __DIR__.$DS."sources{$DS}test1.pdf";
//        $file = "fiber.pdf";
//        $pdfToHtml = new PdfToHtml($file);
//
//        //$cairo->oddPagesOnly();
//        //$cairo->generatePNG();
//
//        //$cairo->startFromPage(1)->stopAtPage(1);
//        //$cairo->generateSVG();
//
//        $pdfToHtml->startFromPage(1)->stopAtPage(5);
//        $pdfToHtml->generateSingleDocument();
//        $pdfToHtml->noFrames();
//        $pdfToHtml->oddPagesOnly();
//        print_r($pdfToHtml->generate());
//    }
//
//}


// initiate

use TonchikTm\PdfToHtml\Pdf;
////$pdf = new \TonchikTm\PdfToHtml\Pdf('fibre.pdf',
////    [
////        'pdftohtml_path' => '/usr/bin/pdftohtml',
////        'pdfinfo_path' => '/usr/bin/pdfinfo'
////    ]
////);
//$pdf = new Pdf('fiber.pdf');
//
//foreach ($pdf->getHtml()->getAllPages() as $page) {
//    echo $page . '<br/>';
//}

$pdf = new Pdf('fibre.pdf', [
    'pdftohtml_path' => '/usr/local/bin/pdftohtml',
    'pdfinfo_path' => '/usr/local/bin/pdfinfo',
    'generate' => [ // settings for generating html
        'singlePage' => false, // we want separate pages
        'imageJpeg' => false, // we want png image
        'ignoreImages' => false, // we need images
        'zoom' => 1.5, // scale pdf
        'noFrames' => false,
    ],
    'clearAfter' => true,
    'removeOutputDir' => true,
    'html' => [
        'inlineImages' => true,
        'onlyContent' => true,
    ]
]);

echo $pdf->getHtml()->getPage(1);





