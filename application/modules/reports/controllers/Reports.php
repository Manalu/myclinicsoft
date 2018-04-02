<?php
require_once APPPATH. 'modules/secure/controllers/Secure.php';
set_time_limit(120);
use Dompdf\Dompdf;
//use Dompdf\Css\Stylesheet;

class Reports extends Secure {

	function __construct() {
        parent::__construct();
       
    }

    function _remap($method, $params = array()) {
 
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }

        $directory = getcwd();
        $class_name = get_class($this);
        $this->display_error_log($directory,$class_name,$method);
    }

    private function _init()
	{
		
		$this->template
			->title('Patients') //$article->title
			->prepend_metadata('<script src="/js/jquery.js"></script>')
			->append_metadata('<script src="/js/jquery.flot.js"></script>')
			// application/views/some_folder/header
			->set_partial('header', 'include/header') //third param optional $data
			->set_partial('sidebar', 'include/sidebar') //third param optional $data
			->set_partial('ribbon', 'include/ribbon') //third param optional $data
			->set_partial('footer', 'include/footer') //third param optional $data
			->set_partial('shortcut', 'include/shortcut') //third param optional $data
			->set_metadata('author', 'Randy Rebucas')
			// application/views/some_folder/header
			//->inject_partial('header', '<h1>Hello World!</h1>')  //third param optional $data
			->set_layout('full-column') // application/views/layouts/two_col.php
			->build('manage'); // views/welcome_message);
		
	}

	function index()
	{
		// $this->output->set_common_meta(get_class(), 'description', 'keyword');
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = get_class();
			$this->load->view('ajax/reports', $data);
        } 
		else
		{
			$this->_init();
		}
	}
	
	function export($to, $type){
		$dompdf = new Dompdf();
		
		switch ($to) {
			case 'csv': //
				/*$this->load->dbutil();

				$query = $this->db->query("SELECT visit_date as Date, COUNT(status) as Visits FROM visits WHERE status = 0 AND license_key = $this->license_id");

				echo $this->dbutil->csv_from_result($query);
 */
                break;
            default: //pdf
				
				switch ($type) {
					case 'patients': //
						
						break;
					default: //visits
						$start_ts = date('Y-m-d', strtotime('-8 month', strtotime(date('Y-m-d'))));
						$end_ts = date('Y-m-d');
						$diff = abs(strtotime($end_ts) - strtotime($start_ts));
						$years = floor($diff / (365 * 60 * 60 * 24));
						$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));

						$report = '';
						$report.='<table class="table" style="width:100%">';
							$report.='<thead>';
								$report.='<tr>';
									$report.='<th>Month</th>';
									$report.='<th>Visits</th>';
								$report.='</tr>';
							  $report.='</thead>';
						$report.='<tbody>';
						for($i = 0; $i < $months + 1; $i++){
							$report.="<tr>";
							$report.='<td>'. date('F', strtotime($start_ts . ' + ' . $i . 'month')).'</td>';
							$report.='<td>'. $this->Report->count_all(date('Y-m-d', strtotime($start_ts . ' + ' . $i . 'month')), $this->license_id).'</td>';
							$report.="</tr>";
							$i++; 
						} 
						$report.="</tbody></table>";
						$data['report'] = $report;
					break;
				}
				//
				$html = $this->load->view("ajax/reports/".$type, $data, true);
				
				
				$dompdf->loadHtml($html);

				// (Optional) Setup the paper size and orientation
				$dompdf->setPaper('A4', 'portrait');
				// Render the HTML as PDF
				$dompdf->render();

				// Output the generated PDF to Browser
				$dompdf->stream('report_'.$type);

				//$dompdf->output();*/
				
                break;
        }
	}
}
