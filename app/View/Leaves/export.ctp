<?php
  /**
   * Export all member records in .xls format
   * with the help of the xlsHelper
   */
   $this->helpers = array('xls');
  //declare the xls helper
  $xls = new xlsHelper();
 
  //input the export file name
  $xls->setHeader('Model_'.date('Y_m_d'));
 
  $xls->addXmlHeader();
  $xls->setWorkSheetName('Model');
   
  //1st row for columns name
  $xls->openRow();
  $xls->writeString('NumberField1');
  $xls->writeString('StringField2');
  $xls->writeString('StringField3');
  $xls->writeString('NumberField4');
  $xls->closeRow();
  
  //rows for data
  foreach ($models as $model):
    $xls->openRow();
    $xls->writeNumber($model['Leave']['apply_by']);
    $xls->writeString($model['Leave']['leave_start_date']);
    $xls->writeString($model['Leave']['leave_end_date']);
    $xls->writeNumber($model['Leave']['total_leaves']);
    $xls->closeRow();
  endforeach;
  
  $xls->addXmlFooter();
  exit();
?>