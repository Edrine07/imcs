<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medical Record PDF</title>
</head>
<body>

<h1>Medical Record</h1>
    <h3>{{ $patient->patient_name }}</h3>
    <h3>{{ $patient->patient_address }}</h3>
    <h3>{{ $patient->patient_age }}</h3>
    <h3>{{ $patient->patient_sex }}</h3>
    <h3>{{ $patient->patient_number }}</h3>
    <h3>{{ $patient->patient_fb }}</h3>
    <h3>{{ $patient->patient_bp }}</h3>
    <h3>{{ $patient->patient_cr }}</h3>
    <h3>{{ $patient->patient_rr }}</h3>
    <h3>{{ $patient->patient_temp }}</h3>
    <h3>{{ $patient->patient_wt }}</h3>
    <h3>{{ $patient->patient_ht }}</h3>
    <h3>{{ $patient->patient_subjective }}</h3>
    <h3>{{ $patient->patient_objective }}</h3>
    <h3>{{ $patient->patient_assessment }}</h3>
</body>
</html>
