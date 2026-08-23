<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;
class PhpSpreadsheetLib{
    public function __construct(){
    }
    private function _getHeaderName($header){
        if ($header == 'id') {
            return 'ID';
        }
        else if ($header == 'first_name') {
            return 'First Name';
        }
        else if ($header == 'last_name') {
            return 'Last Name';
        }
        else {
            return ucfirst(str_replace('_', ' ', $header));
        }
    }
    public function createExcel($data){
        $status = false; $message = ''; $resultData = array();
        try{
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $headers = array_keys(get_object_vars($data[0]));
            foreach ($headers as $columnIndex => $header) {
                $headerName = $this->_getHeaderName($header);
                // $sheet->setCellValueByColumnAndRow($columnIndex + 1, 1, $headerName); // Set the column headers
                // $sheet->getStyleByColumnAndRow($columnIndex + 1, 1)->getFont()->setBold(true); // Set header cell styles (bold)

                $cell = Coordinate::stringFromColumnIndex($columnIndex + 1) . '1';
                $sheet->setCellValue($cell, $headerName);
                $sheet->getStyle($cell)->getFont()->setBold(true);
            }
            $dataRow = 2;
            foreach ($data as $rowIndex => $row) {
                $rowData = get_object_vars($row);
                $dataColumn = 0;
                foreach ($rowData as $columnIndex => $value) {
                    // $sheet->setCellValueByColumnAndRow($dataColumn + 1, $dataRow, $value);
                    // $sheet->getStyle($dataColumn + 1, $dataRow)->getAlignment()->setWrapText(true);

                    $cell = Coordinate::stringFromColumnIndex($dataColumn + 1) . $dataRow;
                    $sheet->setCellValue($cell, $value);
                    $sheet->getStyle($cell)->getAlignment()->setWrapText(true);

                    $sheet->getRowDimension('1')->setRowHeight(-1);
                    $dataColumn++;
                }
                $dataRow++;
            }
            foreach (range(1, count($headers)) as $col) {
                // $sheet->getColumnDimensionByColumn($col)->setAutoSize(true); // Adjust column width
                $column = Coordinate::stringFromColumnIndex($col);
                $sheet->getColumnDimension($column)->setAutoSize(true);
            }
            $writer = new Xlsx($spreadsheet); // Write the file
            $fileName = 'phpoffice-test-'.time().".xlsx";
            define('DIR_UPLOAD_PATH', __DIR__ . '/../');
            if ( !is_dir( DIR_UPLOAD_PATH."test/" ) ) {
                mkdir(DIR_UPLOAD_PATH."test/", 0777, true);
            }
            $filePath = DIR_UPLOAD_PATH."test/".$fileName;
            //$fileUrl = DIR_UPLOAD_URL."test/".$fileName;
            //$downloadUrl = base_url('admin/report/downloadExcelOrder/'.$fileName);
            $writer->save($filePath);
            $status = true;
            $resultData = array( 'fileName' => $fileName, 'filePath' => $filePath, /* 'fileUrl' => $fileUrl, 'downloadUrl' => $downloadUrl */ );
        }
        catch(\PhpOffice\PhpSpreadsheet\Exception $e){
            $status = false; $message = 'Error: ' . $e->getMessage();
        }
        catch(Exception $e){
            $status = false; $message = 'Error: ' . $e->getMessage();
        }
        $responseData = array( 'status' => $status, 'message' => $message, 'data' => $resultData );
        return $responseData;
    }
    public function readExcel(){
        $spreadsheet = IOFactory::load('test/phpoffice-test-1785234813.xlsx');
        $sheet = $spreadsheet->getActiveSheet();
        //$data = $sheet->toArray();
        // return $data;
        $rows = $sheet->toArray(null, true, true, true);
    }
    $spreadsheet = IOFactory::load('test/phpoffice-test.xlsx');

    $sheet = $spreadsheet->getActiveSheet();

    

    foreach ($rows as $row) {
        print_r($row);
    }
}
?>