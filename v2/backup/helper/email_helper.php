<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($user, $type)
{
    $emailType = [
        'buat_akun' => [
            'subject' => 'Penambahan Akun || Corfin-IS',
            'body' => buat_akun($user),
            'alt-body' => 'Penambahan Akun || Corfin-IS',
        ],
    ];

    $chosen = $emailType[$type];

    $mail = new PHPMailer(true);
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '';                     // SMTP username
        $mail->Password   = '';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('luthfihizb@gmail.com');    // Name is optional

        // Attachments

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $chosen['subject'];
        $mail->Body    = $chosen['body'];
        $mail->AltBody = $chosen['alt-body'];

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

<?php function buat_akun($user)
{
    return "
    <html>
    <style>
        body {
            padding: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email-card {
            padding: 5px 20px 10px;
            border-radius: 10px;
            background-color: #fbfbfb;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .email-card h1 {
            margin-bottom: -15px;
        }

        .email-card h1,
        .email-card h3 {
            color: #111;
        }

        .email-card table td {
            padding: 5px 10px;
        }
    </style>

    <body>
        <div class='email-card'>
            <h1>CORFIN-IS PINDAD</h1>
            <p>Anda sudah ditambahkan ke dalam aplikasi <b>CORPORATE FINANCE INFORMATION SYSTEM - PT. Pindad</b>.</p>
            <table>
                <tr>
                    <td>NPP</td>
                    <td>:</td>
                    <td>" . $user['npp'] . "</td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td>" . $user['nama_lengkap'] . "</td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td>" . $user['password'] . "</td>
                </tr>
            </table>
            <p>Silahkan login menggunakan NPP dan Password yang tertera pada tautan <a href='https://corfin-dev.pindad.com'>corfin-dev.pindad.com</a></p>
        </div>
    </body>
    </html>
";
} ?>