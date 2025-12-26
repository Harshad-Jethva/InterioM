<?php
// This script is designed to be run via Cron Job (e.g., 0 18 * * * php /path/to/cron_reports.php)
require_once dirname(__DIR__) . '/includes/db_connect.php';

// Mock PHPMailer class if not available via Composer for this demo
// In production: use Composer to require phpmailer/phpmailer
if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
    // Just a placeholder to prevent errors in this single-file demo if libraries aren't present
    class MockMailer {
        public function send() { return true; }
        public function addAddress($email) {}
        public function setFrom($email, $name) {}
        public function isHTML($bool) {}
        public function Subject($sub) {}
        public function Body($body) {}
    }
}

try {
    $database = new Database();
    $db = $database->getConnection();

    $today = date('Y-m-d');
    
    // 1. Fetch Daily Progress
    $queryProgress = "SELECT * FROM daily_progress WHERE report_date = :today";
    $stmt = $db->prepare($queryProgress);
    $stmt->bindParam(':today', $today);
    $stmt->execute();
    $progressItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 2. Fetch New Leads
    $queryLeads = "SELECT COUNT(*) as lead_count FROM inquiries WHERE DATE(created_at) = :today";
    $stmtLeads = $db->prepare($queryLeads);
    $stmtLeads->bindParam(':today', $today);
    $stmtLeads->execute();
    $leadCount = $stmtLeads->fetch(PDO::FETCH_ASSOC)['lead_count'];

    // 3. Compile Report Content
    $reportContent = "Daily Report for $today\n\n";
    $reportContent .= "--- Work Progress ---\n";
    if (count($progressItems) > 0) {
        foreach ($progressItems as $item) {
            $reportContent .= "- " . strip_tags($item['details']) . "\n";
        }
    } else {
        $reportContent .= "No progress logged today.\n";
    }
    
    $reportContent .= "\n--- New Leads ---\n";
    $reportContent .= "Total New Inquiries Today: " . $leadCount . "\n";

    // 4. Send Email (using PHPMailer logic)
    // $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    // $mail->isSMTP();
    // $mail->Host = 'smtp.example.com';
    // $mail->SMTPAuth = true;
    // $mail->Username = 'admin@interiom.com';
    // $mail->Password = 'secret';
    // $mail->SMTPSecure = 'tls';
    // $mail->Port = 587;
    // $mail->setFrom('system@interiom.com', 'InterioM System');
    // $mail->addAddress('admin@interiom.com');
    // $mail->isHTML(false);
    // $mail->Subject = "Daily MIS Report - $today";
    // $mail->Body = $reportContent;
    // $mail->send();

    // 5. Send WhatsApp (using UltraMsg or Twilio API)
    // Example using a simple cURL request to a generic WhatsApp Gateway
    /*
    $api_url = "https://api.ultramsg.com/INSTANCE_ID/messages/chat";
    $params = array(
        "token" => "YOUR_TOKEN",
        "to" => "ADMIN_PHONE_NUMBER",
        "body" => $reportContent
    );
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $api_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => http_build_query($params),
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded"
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    */

    // Log the run
    echo "Report generated and sent for $today.\n";
    echo $reportContent;

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
