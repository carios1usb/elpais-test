<?php


include 'models/my_patient.php';

$patient_model = new my_patient();

$patients = $patient_model->getPatientByAge("50");

$quantityByAge=$patient_model->getCountByAge();

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>El País Test</title>
    <meta name="description" content="El País programming test">
    <meta name="author" content="assistrx-dw">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>

    <div class="container">

        <h1>Patient Listing</h1>

        <p>
            <label for="patient_filter">Filter by Name</label>
            <input type="text" id="searchPatient" name="patient_filter" />
        </p>

        <p>
            <label for="patient_filter">Number of patients grouped by age</label>
            <ul class="quantityByAge">
                <!-- Punto 3 Listar numero de paciente por edades -->
                <?php if ($quantityByAge): ?>
                    <?php foreach($quantityByAge as $age): ?>
                        <li><span>Age:<b><?php echo $age->patient_age; ?> </b> </span><span>Patients quantity:<b><?php echo $age->quantity; ?></b></span></li>
                    <?php endforeach; ?>
                <?php endif ?>
            </ul>
        </p>

        <div class="row">
            <div class="col-xs-4">Name</div>
            <div class="col-xs-4 hidden-xs">Age</div>
            <div class="col-xs-4">Phone</div>
        </div>

        <!-- Se muestra un mensaje si no se ecnontró el paciente por nombre -->
        <div id="message" class="col-md-12 text-center" style="display: none;">
            <hr>
            <span>Sorry, this patient was not found in the list</span>
        </div>

        <!-- Punto 4 Esconde la columna Age para móviles -->
        <?php if ($patients["isList"]==1): ?>    
            <?php foreach($patients["list"] as $patient): ?>
                <div class="row patient">
                    <div class="col-xs-4 patientName"><?php echo $patient->patient_name; ?></div>
                    <div class="col-xs-4 hidden-xs"><?php echo $patient->patient_age; ?></div>
                    <div class="col-xs-4"><?php echo $patient->patient_phone; ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-md-12 text-center" style="display: block;">
                <hr>
                <span>No data added</span>
            </div>
        <?php endif ?>

    </div>

    <!-- scripts at the bottom! -->
    <script src="public/js/jquery-1.9.1.min.js"></script>

    <!-- this script file is for global js -->
    <script src="public/js/script.js"></script>
</body>
</html>
