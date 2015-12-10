<?php

require 'php-export-data.class.php';

class Controller_Admin_Export extends Controller_Admin {

    public function action_index() {

        $this->template->title = "Export";
        $data['current_year'] = $current_year = intval(date('Y'));

        if(isset($_POST) && count($_POST)) {

            $exporter = new ExportDataExcel('browser', 'export_aivam.xls');
            $exporter->initialize(); // starts streaming data to web browser

            $whereClause = "";
            $whereClauseArr = array();
            $exporter->addRow(
                    array(
                    'year',
                    'month',
                    'city',
                    'group',
                    'make',
                    'premium_segment',
                    'model_gnr',
                    'model',
                    'segment',
                    'ckd_cbu',
                    'pc_cv',
                    'engine_type',
                    'type',
                    'displacement',
                    'sales',
                    'origine',
                    'body_type',
                    'rsp',
                    'price_class'
                ));
            for ($i=2006; $i <= $current_year; $i++) {
                if(isset($_POST['month_'.$i]) && count($_POST['month_'.$i])) {
                    $whereClauseTemp = "(i.year = ".$i." AND ";
                    $temp = array();
                    foreach ($_POST['month_'.$i] as $value) {
                        $temp[] = $value;
                    }
                    $whereClauseTemp .= "month in (" . implode(",",$temp). "))";

                    $query = "SELECT * FROM items i
                                WHERE " . $whereClauseTemp." ORDER BY created_at DESC";
                    $items_arr = DB::query($query, DB::SELECT)->execute()->as_array();

                    foreach ($items_arr as $key => $value) {
                        $exporter->addRow(
                            array(
                            Aivam_Util::trueValue($value['year']),
                            Aivam_Util::trueValue($value['month']),
                            Aivam_Util::trueValue($value['city']),
                            Aivam_Util::trueValue($value['group']),
                            Aivam_Util::trueValue($value['make']),
                            Aivam_Util::trueValue($value['premium_segment']),
                            Aivam_Util::trueValue($value['model_gnr']),
                            Aivam_Util::trueValue($value['model']),
                            Aivam_Util::trueValue($value['segment']),
                            Aivam_Util::trueValue($value['ckd_cbu']),
                            Aivam_Util::trueValue($value['pc_cv']),
                            Aivam_Util::trueValue($value['engine_type']),
                            Aivam_Util::trueValue($value['type']),
                            Aivam_Util::trueValue($value['displacement']),
                            Aivam_Util::trueValue($value['sales']),
                            Aivam_Util::trueValue($value['origine']),
                            Aivam_Util::trueValue($value['body_type']),
                            Aivam_Util::trueValue($value['rsp']),
                            Aivam_Util::trueValue($value['price_class'])
                        ));
                    }

                }
            }


            $exporter->finalize(); // writes the footer, flushes remaining data to browser.

            exit(); // all done

        }

        $this->template->content = View::forge('admin/export/index', $data);

    }

    public function exportItems($arr) {

        Package::load("excel");

        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

//        // Set document properties
//        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
//                                     ->setLastModifiedBy("Maarten Balliauw")
//                                     ->setTitle("Office 2007 XLSX Test Document")
//                                     ->setSubject("Office 2007 XLSX Test Document")
//                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
//                                     ->setKeywords("office 2007 openxml php")
//                                     ->setCategory("Test result file");


        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Year')
                    ->setCellValue('B1', 'Month')
                    ->setCellValue('C1', 'City')
                    ->setCellValue('D1', 'Group')
                    ->setCellValue('E1', 'Make')
                    ->setCellValue('F1', 'Premium segment')
                    ->setCellValue('G1', 'Model GNR')
                    ->setCellValue('H1', 'Model')
                    ->setCellValue('I1', 'Segment')
                    ->setCellValue('J1', 'CKD/CBU')
                    ->setCellValue('K1', 'PC/CV')
                    ->setCellValue('L1', 'Engine Type')
                    ->setCellValue('M1', 'Type')
                    ->setCellValue('N1', 'Displacement')
                    ->setCellValue('O1', 'Sales')
                    ->setCellValue('P1', 'Origine')
                    ->setCellValue('Q1', 'Body type')
                    ->setCellValue('R1', 'RSP')
                    ->setCellValue('S1', 'Price Class');

        // Miscellaneous glyphs, UTF-8
        foreach ($arr as $key => $value) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.($key+2), Aivam_Util::trueValue($value['year']))
                    ->setCellValue('B'.($key+2), Aivam_Util::trueValue($value['month']))
                    ->setCellValue('C'.($key+2), Aivam_Util::trueValue($value['city']))
                    ->setCellValue('D'.($key+2), Aivam_Util::trueValue($value['group']))
                    ->setCellValue('E'.($key+2), Aivam_Util::trueValue($value['make']))
                    ->setCellValue('F'.($key+2), Aivam_Util::trueValue($value['premium_segment']))
                    ->setCellValue('G'.($key+2), Aivam_Util::trueValue($value['model_gnr']))
                    ->setCellValue('H'.($key+2), Aivam_Util::trueValue($value['model']))
                    ->setCellValue('I'.($key+2), Aivam_Util::trueValue($value['segment']))
                    ->setCellValue('J'.($key+2), Aivam_Util::trueValue($value['ckd_cbu']))
                    ->setCellValue('K'.($key+2), Aivam_Util::trueValue($value['pc_cv']))
                    ->setCellValue('L'.($key+2), Aivam_Util::trueValue($value['engine_type']))
                    ->setCellValue('M'.($key+2), Aivam_Util::trueValue($value['type']))
                    ->setCellValue('N'.($key+2), Aivam_Util::trueValue($value['displacement']))
                    ->setCellValue('O'.($key+2), Aivam_Util::trueValue($value['sales']))
                    ->setCellValue('P'.($key+2), Aivam_Util::trueValue($value['origine']))
                    ->setCellValue('Q'.($key+2), Aivam_Util::trueValue($value['body_type']))
                    ->setCellValue('R'.($key+2), Aivam_Util::trueValue($value['rsp']))
                    ->setCellValue('S'.($key+2), Aivam_Util::trueValue($value['price_class']));
        }

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('AIVAM EXPORT');


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="aivam.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }




}
