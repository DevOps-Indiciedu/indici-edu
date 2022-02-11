<?php        defined('BASEPATH') or exit('No direct script access allowed');        class BlinqApi{        public function __construct(){            $this->CI =& get_instance();        }        public function getAccessToken(){            return $this->CI->session->userdata('blinq_token');        }        public function getTokenExpiry(){            return $this->CI->session->userdata('blinq_exp_date');        }        public function setAccessToken($token){            $this->CI->session->set_userdata('blinq_token', $token[0]);            $this->CI->session->set_userdata('blinq_exp_date', $token[1]);        }        public function getToken($url, $post_fields){                        $curl = curl_init();            curl_setopt_array($curl, array(                CURLOPT_URL => BLINQ_URL.$url,                CURLOPT_SSL_VERIFYPEER => FALSE,                CURLOPT_SSL_VERIFYHOST => FALSE,                CURLOPT_RETURNTRANSFER => true,                CURLOPT_HEADER => true,                CURLOPT_ENCODING => '',                CURLOPT_MAXREDIRS => 10,                CURLOPT_TIMEOUT => 0,                CURLOPT_FOLLOWLOCATION => true,                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,                CURLOPT_CUSTOMREQUEST => 'POST',                CURLOPT_POSTFIELDS => json_encode($post_fields),                CURLOPT_HTTPHEADER => array(                    'Content-Type: application/json'                ),            ));            $response = curl_exec($curl);            $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);            curl_close($curl);            $header = substr($response, 0, $header_size);            $body = substr($response, $header_size);            $header = explode("\n", $header);                        if(strpos($body,'Authorized')) {                $token_string = $header[6];                $expiry_string = $header[11];                $expiry_string = str_replace("Date: ", "",$expiry_string);                                $return_array[] = $token_string;                $return_array[] = $expiry_string;                //Set Blinq Session Here                //$this->setAccessToken($return_array);                return $return_array;            }             return false;                    }                public function createConsumer() {            $curl = curl_init();            curl_setopt_array($curl, array(            CURLOPT_URL => 'https://staging-api.blinq.com.pk/consumer/create',            CURLOPT_SSL_VERIFYPEER => FALSE,            CURLOPT_SSL_VERIFYHOST => FALSE,            CURLOPT_RETURNTRANSFER => true,            CURLOPT_HEADER => true,            CURLOPT_ENCODING => '',            CURLOPT_MAXREDIRS => 10,            CURLOPT_TIMEOUT => 0,            CURLOPT_FOLLOWLOCATION => true,            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,            CURLOPT_CUSTOMREQUEST => 'POST',            CURLOPT_POSTFIELDS =>'[            {            "ConsumerCode": "01993",            "Name": "Ammad Farooqi",            "Mobile1": "03311234567",            "Mobile2": "03311234567",            "Mobile3": "03311234567",            "Email1" : "test1@gmail.com",            "Email2" : "test1@gmail.com",            "Email3" : "test1@gmail.com",            "Address" : "NIL"            }            ]',            CURLOPT_HTTPHEADER => array(                'Token: TJ5y9eSbTwnzLMQyJjMMVUKMPBfHy7iWvvJM4Y/r0XhUWS1uQ3j+ugQQ2+unZnVjcQ9sU4xw2v/hRhOOipZUT2ADVx5h3/Lh+K0nJ+86V8Y=',                'Content-Type: application/json'            ),            ));            $response = curl_exec($curl);            curl_close($curl);            echo $response;        }        public function createInvoice($url, $token_header, $post_fields){                        $curl = curl_init();            curl_setopt_array($curl, array(                CURLOPT_URL => BLINQ_URL.$url,                CURLOPT_SSL_VERIFYPEER => FALSE,                CURLOPT_SSL_VERIFYHOST => FALSE,                CURLOPT_RETURNTRANSFER => true,                CURLOPT_ENCODING => '',                CURLOPT_MAXREDIRS => 10,                CURLOPT_TIMEOUT => 0,                CURLOPT_FOLLOWLOCATION => true,                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,                CURLOPT_CUSTOMREQUEST => 'POST',                CURLOPT_POSTFIELDS => '['.$post_fields.']',                CURLOPT_HTTPHEADER => $token_header,            ));            $response = curl_exec($curl);            curl_close($curl);            $response = json_decode($response, true);            return $response;        }        /*        public function createInvoice($url, $token_header, $post_fields){                        $curl = curl_init();            curl_setopt_array($curl, array(                CURLOPT_URL => BLINQ_URL.$url,                CURLOPT_SSL_VERIFYPEER => FALSE,                CURLOPT_SSL_VERIFYHOST => FALSE,                CURLOPT_RETURNTRANSFER => true,               // CURLOPT_HEADER => true,                CURLOPT_ENCODING => '',                CURLOPT_MAXREDIRS => 10,                CURLOPT_TIMEOUT => 0,                CURLOPT_FOLLOWLOCATION => true,                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,                CURLOPT_CUSTOMREQUEST => 'POST',                CURLOPT_POSTFIELDS => '[                    {                    "ConsumerId": "",                    "InvoiceNumber": "TestMar_P_30-03-21",                    "InvoiceAmount": "2500",                    "InvoiceDueDate": "30/03/2021",                    "InvoiceType": "Service",                    "IssueDate": "30/03/2021",                    "InvoiceExpireAfterSeconds": "180",                    "CustomerName": "Ammad Farooqi",                    "CustomerMobile1": "03311234567",                    "CustomerMobile2": "03311234567",                    "CustomerMobile3": "03311234567",                    "CustomerEmail1": "test1@gmail.com",                    "CustomerEmail2": "test@gmail.com",                    "CustomerEmail3": "test1@gmail.com",                    "CustomerAddress": "NIL"                    }                   ]',                   CURLOPT_HTTPHEADER => array(                        $token_header,                        'Content-Type: application/json'                    ),            ));            $response = curl_exec($curl);            curl_close($curl);            //$response = json_decode($response, true);            return $response;        }        */        public function markInvoiceAsPaid() {            $curl = curl_init();            curl_setopt_array($curl, array(            CURLOPT_URL => 'https://staging-api.blinq.com.pk/invoice/markaspaid?csvInvoices=TestMar_O_26-03-21',            CURLOPT_SSL_VERIFYPEER => FALSE,            CURLOPT_SSL_VERIFYHOST => FALSE,            CURLOPT_RETURNTRANSFER => true,            CURLOPT_HEADER => true,            CURLOPT_ENCODING => '',            CURLOPT_MAXREDIRS => 10,            CURLOPT_TIMEOUT => 0,            CURLOPT_FOLLOWLOCATION => true,            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,            CURLOPT_CUSTOMREQUEST => 'GET',            CURLOPT_HTTPHEADER => array(                'Token: n3sZBS5Okh1b9daEUCWL9Sa0K4lCKb1lONLubHn0EutaW8ecczF1OOVYS57By3lDVSDOdddCD3eg+kvOWhcjSoQbNjNyq+5WtlrludKEkRQ='            ),            ));            $response = curl_exec($curl);            curl_close($curl);        }    }//Blinqapi?>