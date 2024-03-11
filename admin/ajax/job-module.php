<?php include('../../connection/config.php');
require_once '../../emailer/mail.class.php';

// Add Job Category 

if (isset($_POST['formType']) && $_POST['formType'] == "addJobtype") {

    $Jobname = mysqli_real_escape_string($con, $_POST['Jobname']);
    $JobExperience =  $_POST['JobExperience'];
    $JobType =  $_POST['JobType'];
    $JobKeyword =  $_POST['JobKeyword'];
    $JobKeyworda = implode(',', $JobKeyword);
    $JobDesc = mysqli_real_escape_string($con, $_POST['JobDesc']);
    $Ins_d = date('Y/m/d');
    $jobToken = 'MIJOB' . $nameKeyTok;

    $inst_job = mysqli_query($con, "INSERT INTO `jobs`(`job_token`, `job_title`, `job_level`, `job_type`, `job_skills`, `job_desc`,  `ins_date` ) VALUES ('$jobToken', '$Jobname','$JobExperience','$JobType','$JobKeyworda','$JobDesc','$Ins_d')");

    if ($inst_job) {
        $var = "insert ignore into job_skills(skill_name) values ";
        foreach ($JobKeyword as $key => $value) {
            $q = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `job_skills` WHERE `skill_name`='$value'"));
            if ($q == 0) {
                $var .= "('" . $value . "'),";
            }
        }
        $var = trim($var, ',');
        $tagQ = mysqli_query($con, $var);

        $data['status'] = true;
        $data['message'] = 'Job Inserted Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error occur in job creation..';
    }
}

// Edit Job Category 

if (isset($_POST['formType']) && $_POST['formType'] == "EditJobtype") {
    $jobToken = $_POST['jobToken'];
    $Jobname = mysqli_real_escape_string($con, $_POST['Jobname']);
    $JobExperience =  $_POST['JobExperience'];
    $JobType =  $_POST['JobType'];
    $JobKeyword =  $_POST['JobKeyword'];
    $JobKeyworda = implode(',', $JobKeyword);
    $JobDesc = mysqli_real_escape_string($con, $_POST['JobDesc']);
    $Ins_d = date('Y/m/d');

    $updateJob = mysqli_query($con, "UPDATE `jobs` SET  `job_title`='$Jobname',`job_level`='$JobExperience',`job_type`='$JobType',`job_skills`='$JobKeyworda',`job_desc`='$JobDesc'  WHERE `job_token`='$jobToken' ");

    if ($updateJob) {
        $var = "insert ignore into job_skills(skill_name) values ";
        foreach ($JobKeyword as $key => $value) {
            $q = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `job_skills` WHERE `skill_name`='$value'"));
            if ($q == 0) {
                $var .= "('" . $value . "'),";
            }
        }
        $var = trim($var, ',');
        $tagQ = mysqli_query($con, $var);

        $data['status'] = true;
        $data['message'] = 'Job Updated Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error occur in job update..';
    }
}

// Delete Job Category 

if (isset($_POST['formType']) && $_POST['formType'] == "jobDlt") {
    $jobId = $_POST['jobId'];
    $updateJob = mysqli_query($con, "DELETE FROM `jobs` WHERE `id`='$jobId' ");
    if ($updateJob) {
        $data['status'] = true;
        $data['message'] = 'Job Delete Successfully..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error occur in job remover..';
    }
}



if (isset($_POST['formType']) && $_POST['formType'] == "applicantSts") {
    $id = $_POST['id'];
    $sts = $_POST['sts'];
    $getAppDet = mysqli_fetch_array(mysqli_query($con, "SELECT ja.*, j.job_title FROM job_applicants ja, jobs j WHERE j.job_token=ja.job_id AND ja.id='$id';"));
    $apEmail = $getAppDet['email'];
    $apName = $getAppDet['name'];
    $jobTitle = $getAppDet['job_title'];
    if ($sts == "in-review") {
        $msg = "We hope this message finds you well. We wanted to inform you that your application is currently under review. Our team is carefully assessing all candidates, and we will get back to you with our decision as soon as possible.";
    } else if ($sts == "interview-schedule") {

        $msg = "Congratulations! We are impressed with your application and would like to invite you for an interview. Our HR representative will contact you shortly to discuss the date and time. Looking forward to meeting you soon!";
    } else if ($sts == "rejected") {

        $msg = "Thank you for your interest in joining our team. After careful consideration, we regret to inform you that your application has not been selected for further advancement. We appreciate your effort and wish you the best in your future endeavors.";
    } else if ($sts == "not-selected") {

        $msg = "Thank you for participating in our interview process. We appreciate your interest in our company. After careful consideration, we regret to inform you that your application was not selected at this time. We encourage you to keep pursuing your goals, and we wish you success in your future endeavors.";
    } else if ($sts == "shortlisted") {
        $msg = "We are thrilled to inform you that your interview was successful, and we are pleased to offer you a position at M-Core Wires & Cabels. Congratulations on being shortlisted! Our HR team will be in touch shortly to discuss the next steps.!";
    }
    $updateJob = mysqli_query($con, "UPDATE `job_applicants` SET  `status`='$sts' WHERE `id`='$id' ");
    if ($updateJob) {
        include '../../emailer_html/job-user/status.php';
        $client_title = " Seven Seas ";
        $client_subject = "Job Application Status | Seven Seas";
        $client = new HttpMail($apEmail);
        $client->send($client_title, $client_subject, $clientmessage);
        $data['status'] = true;
        $data['message'] = 'Applicants status changed..';
    } else {
        $data['status'] = false;
        $data['message'] = 'Error occur in status change..';
    }
}


echo json_encode($data);
