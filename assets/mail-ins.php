<?php



    // Only process POST reqeusts.

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["course"])) {
            $course = $_POST["course"];
        } 

        
        

        


        $name = strip_tags(trim($_POST["name"]));

				$name = str_replace(array("\r","\n"),array(" "," "),$name);

        $firstlastname = strip_tags(trim($_POST["firstlastname"]));

				$firstlastname = str_replace(array("\r","\n"),array(" "," "),$firstlastname);

                
        $secondlastname = strip_tags(trim($_POST["secondlastname"]));

            $secondlastname = str_replace(array("\r","\n"),array(" "," "),$secondlastname);

        $nationality = strip_tags(trim($_POST["nationality"]));

        $telephone = trim($_POST["telephone"]);

        $bornplace  = strip_tags(trim($_POST["bornplace"]));

        $borndate  = strip_tags(trim($_POST["borndate"]));

        $age = strip_tags(trim($_POST["age"]));

        $civilstatus = strip_tags(trim($_POST["civilstatus"]));

        $address = strip_tags(trim($_POST["address"]));

        $academiclevel = strip_tags(trim($_POST["academiclevel"]));

        $job = strip_tags(trim($_POST["job"]));

        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        $companyname = strip_tags(trim($_POST["companyname"]));

        $companytelephone = strip_tags(trim($_POST["companytelephone"]));

        $companyaddress = strip_tags(trim($_POST["companyaddress"]));

        $companyjob = strip_tags(trim($_POST["companyjob"]));

        $companytime = strip_tags(trim($_POST["companytime"]));

        $paymentperson = strip_tags(trim($_POST["paymentperson"]));

        $paymentrnc = strip_tags(trim($_POST["paymentrnc"]));

        $paymenttelephone = strip_tags(trim($_POST["paymenttelephone"]));

        $paymentcelular = strip_tags(trim($_POST["paymentcelular"]));

        if (isset($_POST["paymenttype"])) {
            $paymenttype = $_POST["paymenttype"];
        } 




        // Check that data was sent to the mailer.

        if ( empty($name)or empty($telephone)  OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {

            // Set a 400 (bad request) response code and exit.

            http_response_code(400);

            echo "Completa e intenta de nuevo.";

            exit;

        }



        // Set the recipient email address.

        // FIXME: Update this to your desired email address.

        $recipient = "test@mailhog.local";



        // Set the email subject.

        $sender = "Nuevo mensaje de $name";



        //Email Header

        $head = " /// Nuevo mensaje de inscripción \\\ ";



        // Build the email content.

        $email_content = "$head\n\n\n";

        $email_content .= "Curso escogido: $course\n\n";

        $email_content .= "Nombre: $name\n\n";

        $email_content .= "Primer apellido: $firstlastname\n\n";

        $email_content .= "Segundo apellido: $secondlastname\n\n";

        $email_content .= "Nacionalidad: $nationality\n\n";

        $email_content .= "Teléfono: $telephone\n\n";

        $email_content .= "Lugar de nacimiento: $bornplace\n\n";

        $email_content .= "Fecha de nacimiento: $borndate\n\n";

        $email_content .= "Edad: $age\n\n";

        $email_content .= "Estado civil: $civilstatus\n\n";

        $email_content .= "Dirección: $address\n\n";

        $email_content .= "Nivel académico: $academiclevel\n\n";

        $email_content .= "Ocupación: $job\n\n";

        $email_content .= "Email: $email\n\n";
        
        $email_content .= "Nombre de la compañia donde trabaja: $companyname\n\n";

        $email_content .= "Teléfono de la compañia donde trabaja: $companytelephone\n\n";

        $email_content .= "Dirección de la compañia donde trabaja: $companyaddress\n\n";

        $email_content .= "Cargo que ocupa en la compañia donde trabaja: $companyjob\n\n";

        $email_content .= "Tiempo en el cargo: $companytime\n\n";

        $email_content .= "Nombre del titular del método de pago: $paymentperson\n\n";

        $email_content .= "Cédula o RNC del método de pago: $paymentrnc\n\n";

        $email_content .= "Teléfono del método de pago: $paymenttelephone\n\n";

        $email_content .= "Celular del método de pago: $paymentcelular\n\n";

        $email_content .= "Tipo de pago: $paymenttype\n\n";

        
        // Build the email headers.

        $email_headers = "From: $name <$email>";



        // Send the email.

        if (mail($recipient, $sender, $email_content, $email_headers)) {

            // Set a 200 (okay) response code.

            http_response_code(200);

            echo "¡Gracias por contactarnos!";

        } else {

            // Set a 500 (internal server error) response code.

            http_response_code(500);

            echo "Algo salió mal.";

        }



    } else {

        // Not a POST request, set a 403 (forbidden) response code.

        http_response_code(403);

        echo "Intenta nuevamente.";

    }



?>
