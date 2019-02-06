<?php require_once(APP . DS . 'Vendor' . DS . 'PHPExcel' . DS . 'PHPExcel.php');

class SomeExcel {
    private $yourOwnPrivateProperty;
    private $objPHPExcel;

    public function __construct($data) {
        $this->objPHPExcel    = new PHPExcel();
        $this->objPHPExcel->writeDebugLog = true;

        $this->_createFilename();

    }

    public function create() {
        // you have to study PHPExcel yourself and write this
        $this->_setFileProperties();
        // you have to study PHPExcel and write whatever you want
        $this->_createSheets();
        $result = $this->_save();

        if ($result) {
            return $this->_getAttachmentFormat();
        } else {
            return $result;
        }
    }

    protected function _save() {
        $objWriter = PHPExcel_IOFactory::createWriter($this->objPHPExcel, 'Excel2007');
        /* I will create the folder inside the webroot outputfiles folder 
         * in case it does not exist.
         * I am not going to provide it here as it is not relevant to the question.
         * You need to write your own.
         */
        $this->_createFolder(); 
        try {
            $objWriter->save($this->outputPath . $this->filename);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    protected function _getAttachmentFormat() {
        return array(
            $this->filename => array(
                'file' => $this->outputPath . $this->filename,
                'mimetype' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'contentId' => 'excelfile-for-something'
            )
        );
    }