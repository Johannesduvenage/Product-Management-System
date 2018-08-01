<?php 
class export extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->database();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('form','url'));
        $this->load->model("data_model");
        require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');
        $g=$this->session->userdata('user_status');
        if($g==0){
            redirect(base_url()."login/logout");
        }
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login");
        } 
        
    }
    public function orderplanexport(){
   


        $objPHPExcel=new PHPExcel();
        $objPHPExcel->getProperties()->setTitle('hello');
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1','date');
        $objPHPExcel->getActiveSheet()->setCellValue('B1','ordernum');
        $objPHPExcel->getActiveSheet()->setCellValue('C1','start_time');
        $objPHPExcel->getActiveSheet()->setCellValue('D1','station');
        $objPHPExcel->getActiveSheet()->setCellValue('E1','activity');
        $objPHPExcel->getActiveSheet()->setCellValue('F1','emp name');
        $objPHPExcel->getActiveSheet()->setCellValue('G1','grams');
        $objPHPExcel->getActiveSheet()->setCellValue('H1','weignt in');
        $objPHPExcel->getActiveSheet()->setCellValue('I1','length in');
        $objPHPExcel->getActiveSheet()->setCellValue('J1','weight out');
        $objPHPExcel->getActiveSheet()->setCellValue('K1','length out');
        $objPHPExcel->getActiveSheet()->setCellValue('L1','end time');
        $objPHPExcel->getActiveSheet()->setCellValue('M1','user');
    
    
        $row=2;
        $order=$this->session->userdata('ordernum');
        $dailydata=$this->data_model->orderplan($order);
            foreach($dailydata as $d){
                $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$d->startdate);
                $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$d->ordernum);
                $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$d->starttime);
                $objPHPExcel->getActiveSheet()->setCellvalue('D'.$row,$d->station);
                $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$d->activity);
                $objPHPExcel->getActiveSheet()->setCellvalue('F'.$row,$d->worker);
                $objPHPExcel->getActiveSheet()->setCellvalue('G'.$row,$d->grams);
                $objPHPExcel->getActiveSheet()->setCellvalue('H'.$row,$d->wei_in);
                $objPHPExcel->getActiveSheet()->setCellvalue('I'.$row,$d->len_in);
                $objPHPExcel->getActiveSheet()->setCellvalue('J'.$row,$d->wei_out);
                $objPHPExcel->getActiveSheet()->setCellvalue('K'.$row,$d->len_out);
                $objPHPExcel->getActiveSheet()->setCellvalue('L'.$row,$d->end_time);
                $objPHPExcel->getActiveSheet()->setCellvalue('M'.$row,$d->user);
                $row++;
    
            }
    
            $filename='orderplan.xls';
            header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:atachment;filename="'.$filename.'"');
            header('Cache-control:max-age=0');
            $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
            $writer->save('php://output');
            clearstatcache();
            exit;
    }
    public function stationplanexport(){
   


        $objPHPExcel=new PHPExcel();
        $objPHPExcel->getProperties()->setTitle('hello');
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('A1','Station');
        $objPHPExcel->getActiveSheet()->setCellValue('B1','ordernum');
        $objPHPExcel->getActiveSheet()->setCellValue('C1','activity');
        $objPHPExcel->getActiveSheet()->setCellValue('D1','emp name');
        $objPHPExcel->getActiveSheet()->setCellValue('E1','grams');
        $objPHPExcel->getActiveSheet()->setCellValue('F1','start time');
        $objPHPExcel->getActiveSheet()->setCellValue('G1','user');
    
       $date=$this->session->userdata('date');
        $row=2;
        $temp=1;
        $data=$this->data_model->stations();
        foreach($data as $p){
            $sta=$this->data_model->station_plan($date,$p->station);
            error_reporting(E_ERROR | E_PARSE);
            if($sta){
                $count=count($sta);
                if($count>1){
                $objPHPExcel->getActiveSheet()->mergeCells('A'.$row.':A'.($count+$temp));}
                $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$p->station);
                foreach($sta as $e){
                    error_reporting(E_ERROR | E_PARSE);
                    $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$e->ordernum);
                    $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$e->activity);
                    $objPHPExcel->getActiveSheet()->setCellvalue('D'.$row,$e->worker);
                    $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$e->grams);
                    $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$e->starttime);
                    $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$e->user);
                    $row++;
                }
            }
        }
    
            $filename='stationpending.xls';
            header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:atachment;filename="'.$filename.'"');
            header('Cache-control:max-age=0');
            $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
            $writer->save('php://output');
            clearstatcache();
            exit;
    }
    public function dailyexport(){
   


    $objPHPExcel=new PHPExcel();
    $objPHPExcel->getProperties()->setTitle('hello');
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','date');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','ordernum');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','start_time');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','station');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','activity');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','emp name');
    $objPHPExcel->getActiveSheet()->setCellValue('G1','grams');
    $objPHPExcel->getActiveSheet()->setCellValue('H1','weignt in');
    $objPHPExcel->getActiveSheet()->setCellValue('I1','length in');
    $objPHPExcel->getActiveSheet()->setCellValue('J1','weight out');
    $objPHPExcel->getActiveSheet()->setCellValue('K1','length out');
    $objPHPExcel->getActiveSheet()->setCellValue('L1','end time');
    $objPHPExcel->getActiveSheet()->setCellValue('M1','user');


    $row=2;
    $date=$this->session->userdata('date');
    $dailydata=$this->data_model->dailyplan($date);
        foreach($dailydata as $d){
            $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$d->startdate);
            $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$d->ordernum);
            $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$d->starttime);
            $objPHPExcel->getActiveSheet()->setCellvalue('D'.$row,$d->station);
            $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$d->activity);
            $objPHPExcel->getActiveSheet()->setCellvalue('F'.$row,$d->worker);
            $objPHPExcel->getActiveSheet()->setCellvalue('G'.$row,$d->grams);
            $objPHPExcel->getActiveSheet()->setCellvalue('H'.$row,$d->wei_in);
            $objPHPExcel->getActiveSheet()->setCellvalue('I'.$row,$d->len_in);
            $objPHPExcel->getActiveSheet()->setCellvalue('J'.$row,$d->wei_out);
            $objPHPExcel->getActiveSheet()->setCellvalue('K'.$row,$d->len_out);
            $objPHPExcel->getActiveSheet()->setCellvalue('L'.$row,$d->end_time);
            $objPHPExcel->getActiveSheet()->setCellvalue('M'.$row,$d->user);
            $row++;

        }

        $filename='dailyplan.xls';
        header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:atachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
        $writer->save('php://output');
        clearstatcache();
        exit;
}
public function empexport(){
   


    $objPHPExcel=new PHPExcel();
    $objPHPExcel->getProperties()->setTitle('hello');
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','Worker');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','Activity');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','Time');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','Grams');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','PerHour');


    $row=2;
    $temp=1;
    $start_date=$this->session->userdata('start_date');
    $end_date=$this->session->userdata('end_date');
    $data=$this->data_model->employeereport();
    foreach($data as $p){
        $emp=$this->data_model->empdatafetch($start_date,$end_date,$p->employee);
        error_reporting(E_ERROR | E_PARSE);
        if($emp){
            $count=count($emp);
            if($count>1){
            $objPHPExcel->getActiveSheet()->mergeCells('A'.$row.':A'.($count+$temp));}
            $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$p->employee);
            foreach($emp as $e){
                error_reporting(E_ERROR | E_PARSE);
                $result=$e->grams/($e->MinuteDiff/60);
                $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$e->activity);
                $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$e->MinuteDiff);
                $objPHPExcel->getActiveSheet()->setCellvalue('D'.$row,$e->grams);
                $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$result);
                $row++;
            }
        }
    }

        $filename='employe_report.xls';
        header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:atachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
        $writer->save('php://output');
        clearstatcache();
        exit;
}
public function monthlyexport(){
   


    $objPHPExcel=new PHPExcel();
    $objPHPExcel->getProperties()->setTitle('montly');
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','date');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','ordernum');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','start_time');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','station');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','activity');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','emp name');
    $objPHPExcel->getActiveSheet()->setCellValue('G1','grams');
    $objPHPExcel->getActiveSheet()->setCellValue('H1','weignt in');
    $objPHPExcel->getActiveSheet()->setCellValue('I1','length in');
    $objPHPExcel->getActiveSheet()->setCellValue('J1','weight out');
    $objPHPExcel->getActiveSheet()->setCellValue('K1','length out');
    $objPHPExcel->getActiveSheet()->setCellValue('L1','end time');
    $objPHPExcel->getActiveSheet()->setCellValue('M1','user');


    $row=2;
    $startdate=$this->session->userdata('start_date');
    $enddate=$this->session->userdata('end_date');
    $pk=$this->data_model->monthlyreport($startdate,$enddate);
    if($pk){
        foreach($pk as $d){
            $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$d->startdate);
            $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$d->ordernum);
            $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$d->starttime);
            $objPHPExcel->getActiveSheet()->setCellvalue('D'.$row,$d->station);
            $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$d->activity);
            $objPHPExcel->getActiveSheet()->setCellvalue('F'.$row,$d->worker);
            $objPHPExcel->getActiveSheet()->setCellvalue('G'.$row,$d->grams);
            $objPHPExcel->getActiveSheet()->setCellvalue('H'.$row,$d->wei_in);
            $objPHPExcel->getActiveSheet()->setCellvalue('I'.$row,$d->len_in);
            $objPHPExcel->getActiveSheet()->setCellvalue('J'.$row,$d->wei_out);
            $objPHPExcel->getActiveSheet()->setCellvalue('K'.$row,$d->len_out);
            $objPHPExcel->getActiveSheet()->setCellvalue('L'.$row,$d->end_time);
            $objPHPExcel->getActiveSheet()->setCellvalue('M'.$row,$d->user);
            $row++;

        }
    }
    
        $filename='monthlyplan.xls';
        header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:atachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
        $writer->save('php://output');
        clearstatcache();
        exit;
}
public function dailyreportexport(){
    

    $objPHPExcel=new PHPExcel();
    $objPHPExcel->getProperties()->setTitle('hello');
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','Activity');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','Grams');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','Wastage');
    


    $row=2;
    $date=$this->session->userdata('date');
    $dailydata=$this->data_model->dailyreport($date);
        foreach($dailydata as $d){
            $wastage=($d->i)-($d->o);
            $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$d->activity);
            $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$d->g);
            $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$wastage);
            $row++;

        }

        $filename='Daily Report.xls';
        header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:atachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
        $writer->save('php://output');
        clearstatcache();
        exit;
}

public function stationexport(){
   


    $objPHPExcel=new PHPExcel();
    $objPHPExcel->getProperties()->setTitle('hello');
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','Station');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','Grams/Pieces(Total)');


    $row=2;
    $date=$this->session->userdata('date');
    $dailydata=$this->data_model->station($date);
        foreach($dailydata as $d){
            $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$d->station);
            $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$d->a);
            $row++;

        }

        $filename='Station Report.xls';
        header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:atachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
        $writer->save('php://output');
        clearstatcache();
        exit;
}

public function workeractivityexport(){
   


    $objPHPExcel=new PHPExcel();
    $objPHPExcel->getProperties()->setTitle('hello');
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','date');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','Worker');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','Activity');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','Grams');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','Wastage');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','Time');
    $objPHPExcel->getActiveSheet()->setCellValue('G1','Per Hour');


    $row=2;
    $go=$this->data_model->employeeactivity_report();
        foreach($go as $d){
            $wastage=($d->wei_in)-($d->wei_out);
            error_reporting(E_ERROR | E_PARSE);
            $time=$d->grams/($d->MinuteDiff/60);
            $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$d->startdate);
            $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$d->worker);
            $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$d->activity);
            $objPHPExcel->getActiveSheet()->setCellvalue('D'.$row,$d->grams);
            $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$wastage);
            $objPHPExcel->getActiveSheet()->setCellvalue('F'.$row,$d->MinuteDiff);
            $objPHPExcel->getActiveSheet()->setCellvalue('G'.$row,$time);
            $row++;

        }

        $filename='WorkerActivity.xls';
        header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:atachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
        $writer->save('php://output');
        clearstatcache();
        exit;
}

public function companyaverageexport(){
   


    $objPHPExcel=new PHPExcel();
    $objPHPExcel->getProperties()->setTitle('hello');
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','Activity');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','Average');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','Max');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','Min');


    $row=2;
    $start_date=$this->session->userdata('start_date');
    $end_date=$this->session->userdata('end_date');
    $dailydata=$this->data_model->companyactivity($start_date,$end_date);
        foreach($dailydata as $d){
            $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$d->activity);
            $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$d->a);
            $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$d->m);
            $objPHPExcel->getActiveSheet()->setCellvalue('D'.$row,$d->o);
            $row++;

        }

        $filename='Company Activity Average.xls';
        header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:atachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
        $writer->save('php://output');
        clearstatcache();
        exit;
}

public function activityexport(){
   


    $objPHPExcel=new PHPExcel();
    $objPHPExcel->getProperties()->setTitle('ActivityReport');
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','Activity');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','Worker');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','PerHour');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','Avg');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','Max');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','Min');


    $row=2;
    $date=$this->session->userdata('date');
    $data=$this->data_model->selectacivity();
        foreach($data as $emp){
            $data1=$this->data_model->activityfetchdata($date,$emp->activity);
            $count=count($data1);
            if($data1){
                $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$emp->activity);
            
            $avg=0;
            $max=0;
            $min=9999999999;
           
        foreach($data1 as $d){
            $result=$d->grams/($d->time/60);
            $avg=$avg+$result;
            $avg=$avg/$count;
            if($max < $result){
                $max=$result;
                
            }
            if($min > $result){
                $min=$result;
            } 
            $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$d->worker);
            $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$result);
            $row++;
           
        }
        $objPHPExcel->getActiveSheet()->setCellvalue('D'.$row,$avg);
        $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$max);
        $objPHPExcel->getActiveSheet()->setCellvalue('F'.$row,$min);
        $row++;
    }
    }
        $filename='Activity Average.xls';
        header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:atachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
        $writer->save('php://output');
        clearstatcache();
        exit;
}

public function dailyplanexport(){
    $objPHPExcel=new PHPExcel();
    $objPHPExcel->getProperties()->setTitle('hello');
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1','Station');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','ordernum');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','activity');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','empname');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','TimeAllocated');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','Quantity');
    $objPHPExcel->getActiveSheet()->setCellValue('G1','Date');   
    $objPHPExcel->getActiveSheet()->setCellValue('H1','StartTime');

     $this->load->model('data_model');
    $data=$this->data_model->selectdaily();
    $row=1;
    foreach($data as $d){
        $objPHPExcel->getActiveSheet()->setCellvalue('A'.$row,$d->station);
        $objPHPExcel->getActiveSheet()->setCellvalue('B'.$row,$d->ordernum);
        $objPHPExcel->getActiveSheet()->setCellvalue('C'.$row,$d->activity);
        $objPHPExcel->getActiveSheet()->setCellvalue('D'.$row,$d->worker);
        $objPHPExcel->getActiveSheet()->setCellvalue('E'.$row,$d->timerqrd);
        $objPHPExcel->getActiveSheet()->setCellvalue('F'.$row,$d->wei_in);
        $objPHPExcel->getActiveSheet()->setCellvalue('G'.$row,$d->startdate);
        $objPHPExcel->getActiveSheet()->setCellvalue('H'.$row,$d->starttime);
        $row++;
    }
    $filename='Dailyplan.xls';
    header('Content-Type:application/vnd.openxmlformats-officedocuments-officedocument.spreadsheetml.sheet');
    header('Content-Disposition:atachment;filename="'.$filename.'"');
    header('Cache-control:max-age=0');
    $writer=PHPExcel_IOFactory::createwriter($objPHPExcel,'Excel2007');
    $writer->save('php://output');
    clearstatcache();
    exit;
}
}
?>