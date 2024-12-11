<?php
// Fungsi untuk menghitung CF
function calculate_cf($gejala, $bobot_gejala, $rules) {
    $cf_results = [];
    foreach ($rules as $rule_id => $rule) {
        $cf_rule = $rule['cf'];
        $rule_gejala = $rule['gejala'];
        $cf = $cf_rule;

        foreach ($rule_gejala as $gejala_id) {
            if (isset($gejala[$gejala_id])) {
                $cf *= $bobot_gejala[$gejala_id] * $gejala[$gejala_id];
            } else {
                $cf = 0;
                break;
            }
        }
        $cf_results[$rule_id] = $cf;
    }

    return $cf_results;
}

// Bobot gejala (diambil dari file PDF)
$bobot_gejala = [
    "G01" => 1.0,
    "G02" => 0.6,
    "G03" => 0.4,
    "G04" => 1.0,
    "G05" => 0.6,
    "G06" => 0.4,
    "G07" => 1.0,
    "G08" => 0.6,
    "G09" => 0.4,
    "G10" => 1.0,
    "G11" => 0.6,
    "G12" => 0.4,
    "G13" => 1.0,
    "G14" => 0.6,
    "G15" => 0.4,
    "G16" => 1.0,
    "G17" => 0.6,
    "G18" => 0.4,
    "G19" => 1.0,
    "G20" => 0.6,
    "G21" => 0.4,
];

// Rules
$rules = [
    "P01" => [
        "gejala" => ["G01", "G04", "G07", "G10", "G13", "G16", "G19"],
        "cf" => 0.8
    ],
    "P02" => [
        "gejala" => ["G02", "G05", "G08", "G11", "G14", "G17"],
        "cf" => 0.6
    ],
    "P03" => [
        "gejala" => ["G03", "G06", "G09", "G12", "G15", "G18", "G21"],
        "cf" => 0.4
    ],
];

// Contoh input gejala
$input_gejala = [
    "G01" => 1, // Ya
    "G02" => 0.6, // Kemungkinan besar
    "G03" => 0, // Tidak
    "G04" => 1, // Ya
    "G05" => 0.6, // Kemungkinan besar
];

// Hitung CF
$cf_results = calculate_cf($input_gejala, $bobot_gejala, $rules);

// Tampilkan hasil
foreach ($cf_results as $key => $value) {
    echo "CF untuk $key: $value<br>";
}
?>
