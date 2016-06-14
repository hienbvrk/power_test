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
use \Cake\Utility\Hash;

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
        $this->loadModel('CommonInfos');
        $this->loadModel('Customers');
        $this->loadModel('KwhDetails');
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
        $companies = Hash::extract($transactions, '{n}.company_name');
        $areas = Hash::extract($transactions, '{n}.area');

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
        $data = Xml::toArray(Xml::build($this->path . $this->xmlFiles));
        $JPMGH = Hash::extract($data, '{s}.{s}.JPMGH')[0];

        $JPTRM = Hash::extract($data, '{s}.{s}.JPTRM')[0];

        try {
            $conn = ConnectionManager::get('default');
            $conn->begin();

//             Import Company
            $companiesTmo[$JPTRM['JP06111']] = $this->Companies->saveCompany($JPTRM['JP06111'], $JPTRM['JP06110']);
            $companiesTmo[$JPTRM['JP06359']] = $this->Companies->saveCompany($JPTRM['JP06359'], $JPTRM['JP06358']);
//             Import common_infos tables
            $commonInfo = $this->CommonInfos->newEntity();
            $commonInfo->sent_company_id = $companiesTmo[$JPTRM['JP06111']];
            $commonInfo->received_company_id = $companiesTmo[$JPTRM['JP06359']];   
            $commonInfo->type_code = $JPTRM['JP00002'];
            $commonInfo->report_name = $JPTRM['JP06170'];
            $commonInfo->plan_submitter_code = $JPTRM['JP06360'];
            $commonInfo->plan_submitter_name = $JPTRM['JP06361'];
            $commonInfo->time = $JPTRM['JP06171'];
            $commonInfo->bpid_code = $JPMGH['JPC11'];
            $commonInfo->field1 = $JPMGH['JPC03'];
            $commonInfo->field2 = $JPMGH['JPC06'];
            $commonInfo->field3 = $JPMGH['JPC09'];
            $commonInfo->field4 = $JPMGH['JPC10'];
            $commonInfo->field5 = $JPMGH['JPC12'];
            $commonInfo->field6 = $JPMGH['JPC19'];
            $commonInfo->field7 = $JPMGH['JPC21'];
            $this->CommonInfos->save($commonInfo);
//             Import kwh_details tables
//             JPM00010 type = 1
            $JPM00010 = Hash::extract($JPTRM, 'JPM00010.{s}.{s}.{s}')[0];
            $this->KwhDetails->saveDetails($commonInfo->id, 1, $JPM00010);
            
//             JPM00012
            $JPM00012 = Hash::extract($JPTRM, 'JPM00012.{s}.{s}.{s}')[0];
            $this->KwhDetails->saveDetails($commonInfo->id, 2, $JPM00012);
//             JPM00014
            $JPM00014 = Hash::extract($JPTRM, 'JPM00014.{s}.{s}.{s}');
            $this->KwhDetails->saveDetails($commonInfo->id, 3, $JPM00014[0]);
            
            $JPM00014_1 = $JPM00014[1];
            foreach ($JPM00014_1 as $value) {
                // Import customers table
                $customerTmp[$value['JP06366']] = $this->Customers->saveCustomer(
                        $value['JP06366'],
                        $value['JP06367'],
                        $value['JP06185'],
                        $value['JP06372'],
                        $value['JP06374']
                );
                
                // Import kwh_details tables
                $this->KwhDetails->saveDetails($commonInfo->id, 4, Hash::extract($value, 'JPM00017.JPMR00017'), null, $customerTmp[$value['JP06366']]);
            }
            
            // JPM00022
            $JPM00022 = Hash::extract($JPTRM, 'JPM00022.JPMR00022');
            foreach ($JPM00022 as $value) {
                if(!isset($companiesTmo[$value['JP06317']])) {
                    $companiesTmo[$value['JP06317']] = $this->Companies->saveCompany($value['JP06317'], $value['JP06316']);
                } 
                $JPM00023 = Hash::extract($value, 'JPM00023.{s}.{s}.{s}')[0];                
                $this->KwhDetails->saveDetails($commonInfo->id, 1, $JPM00023, $companiesTmo[$value['JP06317']], null);
                
                $JPM00025 = Hash::extract($value, 'JPM00025.{s}.{s}.{s}')[0];
                $this->KwhDetails->saveDetails($commonInfo->id, 2, $JPM00025, $companiesTmo[$value['JP06317']], null);

                $JPM00027 = Hash::extract($value, 'JPM00027.{s}.{s}.{s}');
                $this->KwhDetails->saveDetails($commonInfo->id, 3, $JPM00027[0], $companiesTmo[$value['JP06317']]);
                $JPM00027_1 = $JPM00027[1];
                if(Hash::check($JPM00027_1, 'JP06366')) {
                    $JPM00027_1 = array($JPM00027_1);
                }
                
                foreach ($JPM00027_1 as $key => $val) {
                    // Import customers table
                    if (!isset($customerTmp[$val['JP06366']])) {
                        $customerTmp[$val['JP06366']] = $this->Customers->saveCustomer(
                                $val['JP06366'], $val['JP06367'], null, $val['JP06372'], $val['JP06374']
                        );
                    }
                    
                    // Import kwh_details tables
                    $this->KwhDetails->saveDetails($commonInfo->id, 4, Hash::extract($val, 'JPM00030.JPMR00030'), $companiesTmo[$value['JP06317']],  $customerTmp[$val['JP06366']]);
                }
            }

            $conn->commit();
        } catch (Exception $ex) {
            $conn->rollback();
        }
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
