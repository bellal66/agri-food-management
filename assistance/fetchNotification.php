<?php
include '../lib/Database.php';
$db = new Database();
$data = array();
$output = ' ';

$query = "SELECT * FROM `inputtingproblem` where seen=0 and questionId=0";
$resulCount = $db->select($query);
if ($resulCount) {

    $data['count'] = $resulCount->num_rows;

        foreach ($resulCount as $msg) {
        $output.= '     <li>';
            $output.= '<a class="app-notification__item" href="#">';

            $output.= '  <span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                    <div>
                                        <p class="app-notification__message">Ask a new question</p>
                                    </div></a>
                            </li>';
    }
}
$data['list'] = $output;
$data = json_encode($data);
echo $data;
header("Content-type: application/json");
?>