<?php

defined("MODEL_TYPE_USER") or define("MODEL_TYPE_USER", "user");
defined("MODEL_TYPR_BLOCK") or define("MODEL_TYPE_BLOCK", "block");
defined("MODEL_TYPE_DEPARTMENT") or define("MODEL_TYPE_DEPARTMENT", "department");
defined("MODEL_TYPE_WARD") or define("MODEL_TYPE_WARD", "ward");
defined("MODEL_TYPE_VENDOR") or define("MODEL_TYPE_VENDOR", 'vendor');
defined("MODEL_TYPE_ITEMS") or define("MODEL_TYPE_ITEMS", "items");

defined("ROLE_SUPER_ADMIN") or define("ROLE_SUPER_ADMIN", "admin");
defined("ROLE_SUB_ADMIN") or define("ROLE_SUB_ADMIN", "sub-admin");
defined("ROLE_STORE_ADMIN") or define("ROLE_STORE_ADMIN", "store-admin");
defined("ROLE_STORE_SUB_ADMIN") or define("ROLE_STORE_SUB_ADMIN", "store-user");
defined("ROLE_WARD_USER") or define("ROLE_WARD_USER", "ward-user");
defined("ROLE_RECEPTIONIST") or define("ROLE_RECEPTIONIST", "receptionist");

defined("USER_ACTIVE") or define("USER_ACTIVE", 1);
defined("USER_INACTIVE") or define("USER_INACTIVE", 0);

defined("DOCTOR_ACCOUNT_ACTIVE") or define("DOCTOR_ACCOUNT_ACTIVE", 1);
defined("DOCTOR_ACCOUNT_INACTIVE") or define("DOCTOR_ACCOUNT_INACTIVE", 0);

defined("VENDOR_RETURN_POLCICY_APPLICABLE") or define("VENDOR_RETURN_POLCICY_APPLICABLE", 1);
defined("VENDOR_RETURN_POLCICY_NOT_APPLICABLE") or define("VENDOR_RETURN_POLCICY_NOT_APPLICABLE", 0);

defined("PATIENT_CHECKUP_PENDING") or define('PATIENT_CHECKUP_PENDING', 1);
defined("PATIENT_CHECKUP_PROCESSED") or define('PATIENT_CHECKUP_PROCESSED', 2);

defined("OUT_PATIENT_DISCHARGED") or define("OUT_PATIENT_DIRCHARGED", 1);
defined("OUT_PATIENT_EXPIRED") or define("OUT_PATIENT_EXPIRED", 2);
defined("OUT_PATIENT_DISCHARGED_ON_PATIENT_REQUEST") or define("OUT_PATIENT_DISCHARGED_ON_PATIENT_REQUEST", 3);
defined("OUT_PATIENT_REFERRED_TO_ANOTHER_HOSPITAL") or define("OUT_PATIENT_REFERRED_TO_ANOTHER_HOSPITAL", 4);
defined("OUT_PAIENT_SHIFTED_TO_ANOTHER_WARD") or define("OUT_PAIENT_SHIFTED_TO_ANOTHER_WARD", 5);

defined("PATIENT_INVOICE_PENDING") or define("PATIENT_INVOICE_PENDING", 1);
defined("PATIENT_INVOICE_APPROVED") or define("PATIENT_INVOICE_APPROVED", 2);

defined("LAB_TEST_PENDING") or define("LAB_TEST_PENDING", 0);
defined("LAB_TEST_PROCESSING") or define("LAB_TEST_PROCESSING", 1);
defined("LAB_TEST_PROCESSED") or define("LAB_TEST_PROCESSED", 2);

defined("WARD_REQUEST_SUBMITTED") or define("WARD_REQUEST_SUBMITTED", 0);
defined("WARD_REQUEST_APPROVED") or define("WARD_REQUEST_APPROVED", 2);
defined("WARD_REQUEST_REJECTED") or define("WARD_REQUEST_REJECTED", 1);

defined("MODELS") or define("MODELS", [
    'Patient',
    "Patient Recieving",
    "Patient Outcome",
    "Items",
    "Store Request",
    "Vendor"
]);

defined("SPECIALIZATIONS") or define("SPECIALIZATIONS", [
    "Cardiology",
    "Neurology",
    "Orthopedics",
    "Pediatrics",
    "General Surgery",
    "Dermatology",
    "Gynecology",
    "Oncology",
    "Radiology",
    "Psychiatry",
    "Anesthesiology",
    "Ophthalmology",
    "ENT",
    "Urology",
    "Nephrology",
    "Gastroenterology",
    "Endocrinology",
    "Pulmonology"
]);
