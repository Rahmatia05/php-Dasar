<?php
$multidimensi = [
    [
        "No" => 1,
        "Nim" => "D212111034",
        "Nama" => "Rahmatia",
    ],
    [
        "No" => 2,
        "Nim" => "D212111003",
        "Nama" => "Dasimah Seftiani",
    ],
    [
        "No" => 3,
        "Nim" => "D212111005",
        "Nama" => "Dewi Yulianti",
    ],
    [
        "No" => 4,
        "Nim" => "D212111006",
        "Nama" => "Gita Septiani",
    ],
    [
        "No" => 5,
        "Nim" => "D212111007",
        "Nama" => "Iklas Wandana",
    ],
    [
        "No" => 6,
        "Nim" => "D212111008",
        "Nama" => "Intan Khoirunnisa",
    ],
    [
        "No" => 7,
        "Nim" => "D212111009",
        "Nama" => "RIslah Nurhasannah",
    ],
    [
        "No" => 8,
        "Nim" => "D212111010",
        "Nama" => "Kenia Nurazizah",
    ],
    [
        "No" => 9,
        "Nim" => "D212111013",
        "Nama" => "Renaldi Irawan",
    ],
    [
        "No" => 10,
        "Nim" => "D212111012",
        "Nama" => "Puspa Dewi Kusumawati",
    ],
];

echo "<table border='1' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
      </tr>";

foreach ($multidimensi as $value) {
    echo "<tr>
            <td>{$value['No']}</td>
            <td>{$value['Nim']}</td>
            <td>{$value['Nama']}</td>
          </tr>";
}
echo "</table>";
?>
