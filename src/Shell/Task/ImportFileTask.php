<?php

/**
 * Description of ImportFileTask
 *
 * @author HienBV <hienbv.it@gmail.com>
 */

namespace App\Shell\Task;

use Cake\Console\Shell;
use Cake\Utility\Xml;
use Cake\Datasource\ConnectionManager;

class ImportFileTask extends Shell
{

    public $csvFiles = 'KS001_20160531.csv';
    public $xmlFiles = 'W6_0250_20160531_00_40916_6.xml';
    public $path = '';

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Areas');
        $this->loadModel('Companies');
        $this->loadModel('Transactions');
    }

    public function main()
    {
        $this->path = APP . 'data' . DS;

        $this->processCSVFile();

        $this->processXMLFile();
    }

    /**
     *  Import data into database from CSV file
     */
    private function processCSVFile()
    {
        $transactions = $this->readCSV($this->path . $this->csvFiles);
        $companies = \Cake\Utility\Hash::extract($transactions, '{n}.company_name');
        $areas = \Cake\Utility\Hash::extract($transactions, '{n}.area');

        try {
            $conn = ConnectionManager::get('default');
            $conn->begin();

            // Import companies tables
            $companies = array_unique($companies);
            foreach ($companies as $company) {
                $data = $this->Companies->newEntity();
                $data->name = $company;
                $this->Companies->save($data);

                $companiesTmo[$company] = $data->id;
            }
            
            // Import areas table
            $areas = array_unique($areas);
            foreach ($areas as $area) {
                $data = $this->Areas->newEntity();
                $data->name = $area;
                $this->Areas->save($data);

                $areasTmo[$area] = $data->id;
            }

            // import transactions table
            foreach ($transactions as $transaction) {
                $data = $this->Transactions->newEntity();
                $data->data_id = $transaction['data_id'];
                $data->company_id = $companiesTmo[$transaction['company_name']];
                $data->transaction_at = $transaction['transaction_at'];
                $data->area_id = $areasTmo[$transaction['area']];
                $data->val1 = $transaction['val1'];
                $data->val2 = $transaction['val2'];
                $data->val3 = $transaction['val3'];
                $data->val4 = $transaction['val4'];
                $data->val5 = $transaction['val5'];
                $data->val6 = $transaction['val6'];

                $this->Transactions->save($data);
            }

            $conn->commit();
        } catch (Exception $ex) {
            $conn->rollback();
        }
    }

    /**
     * Import data into database from XML file
     */
    private function processXMLFile()
    {
        $this->log(Xml::toArray(Xml::build($this->path . $this->xmlFiles)), 'debug');
        // TODO import
    }

    /**
     * Reade a file csv
     * 
     * @return type
     */
    private function readCSV($file)
    {
        // open the file
        $handle = fopen($file, 'r');
        // read the 4th row as headings
        $header = fgetcsv($handle);
        $header = fgetcsv($handle);
        $header = fgetcsv($handle);

        $header = fgetcsv($handle);
        // create a message container
        $return = array(
            'messages' => array(),
            'errors' => array(),
        );
        // read each data row in the file
        $i = 0;
        $data = array();
        while (($row = fgetcsv($handle)) !== FALSE) {
            $i++;

            // for each header field 
            foreach ($header as $k => $head) {
                $data[$i][$head] = (isset($row[$k])) ? static::convertToUtf8($row[$k]) : '';
            }
        }

        return $data;
    }

    /**
     * Convert Shift-JIS into UTF-8
     * 
     * @param string $text
     * @return string
     */
    private static function convertToUtf8($text)
    {
        $textJIS = mb_detect_encoding($text, array('Shift-JIS'));
        return mb_convert_encoding($text, 'UTF-8', $textJIS);
    }

}
