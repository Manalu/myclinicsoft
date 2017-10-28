<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class Php_mailer {

    private $ci;
    
    function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }

    function send($data){

        // create a log channel
        $log = new Logger('phpmailer');
        $log->pushHandler(new StreamHandler($this->ci->config->item('log_path').'myclinicsoft.log', Logger::DEBUG));
        $log->pushHandler(new FirePHPHandler());

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
        $mail->isSMTP();                                        // Set mailer to use SMTP
        $mail->Host = 'n1plcpnl0051.prod.ams1.secureserver.net';                // Specify main and backup SMTP servers
        $mail->SMTPAuth = false;                                // Enable SMTP authentication
        $mail->Username = 'coreweb@myclinicsoft.com';                                   // SMTP username
        $mail->Password = 'R@nDY2017!';                                   // SMTP password
        $mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                       // TCP port to connect to

        $mail->setFrom($data['from_email'], $data['from_email']);
        $mail->addAddress($data['to_email'], $data['to_name']);       // Add a recipient
        //$mail->addAddress('ellen@example.com');                 // Name is optional
        $mail->addReplyTo($data['from_email'], $data['from_email']);
        $mail->addCC('rebucasrandy1986@gmail.com');
        $mail->addBCC('coreweb2015@gmail.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');           // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');      // Optional name
        $mail->isHTML(true);                                    // Set email format to HTML
        //$mail->Subject = 'Here is the subject';
        $mail->Subject = $data['subject'];
        //$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->Body    = $data['body'];
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->AltBody = $data['altbody'];


        if(!$mail->send()) {
            $log->error('Mailer Error: ' . $mail->ErrorInfo);
        } else {
            $log->info('Message has been sent');
        }
    }

}