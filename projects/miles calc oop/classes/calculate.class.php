<?php

class Calculate
{


    public function __construct($km, $kmRange, $days)
    {
        $this->km = $km;
        $this->kmRange = $kmRange;
        $this->days = $days;
    }

    //Data calculation and output (3 langs)
    protected function calculateData($km, $kmRange, $days)
    {

        echo "<div>You provided following data"  . "<br>"  . " ---" . "<br>" . "KM initial value: " . $km . "<br>" . "KM range: "  . $kmRange . "<br>" . "DAYS of work: " .  $days . "</div>";
        echo "<div>" . "---" . "</div>";
        echo "<div>" . "<br>" . "Calculations based on provided values" . "<br>"  . "</div>";

        for ($i = 1; $i <=  $days; $i++) {
            echo "<div>" . "-------------------------------------" . "</div>";
            $km = $km + $kmRange;

            echo "<br>" . "<div>" . "<br>" . "Day number:" . "<h3>" . $i . "</h3>" . "</div>";
            echo "<div>" . "<br>" . "KM range:" . "<h3>" . $kmRange . "</h3>" . "</div>";
            echo "<div>" . "<br>" . "KM end value based on range:" . "<h3>" .  $km . "</h3>" . "</div>";
            $km = $km + rand(1, 5);
            echo "<div>" . "<br>" . "KM end value based on range + extra KM(value is random 1-5 extra KM):" . "<h3>" . $km . "</h3>" . "</div>";
            echo "<div>" . "-------------------------------------" . "</div>";
        }
    }

    protected function calculateDataRu($km, $kmRange, $days)
    {

        echo "<div>Вы внесли следующие данные: "  . "<br>"  . " ---" . "<br>" . "Начальное значение в КМ: " . $km . "<br>" . "Расстояние в КМ: "  . $kmRange . "<br>" . "Количество рабочих дней: " .  $days . "</div>";
        echo "<div>" . "---" . "</div>";
        echo "<div>" . "<br>" . "Расчеты основанные на предоставленных данных: " . "<br>"  . "</div>";

        for ($i = 1; $i <=  $days; $i++) {
            echo "<div>" . "-------------------------------------" . "</div>";
            $km = $km + $kmRange;

            echo "<br>" . "<div>" . "<br>" . "Номер дня:" . "<h3>" . $i . "</h3>" . "</div>";
            echo "<div>" . "<br>" . "Расстояние в КМ:" . "<h3>" . $kmRange . "</h3>" . "</div>";
            echo "<div>" . "<br>" . "Количество пройденных КМ основанное на расстоянии:" . "<h3>" .  $km . "</h3>" . "</div>";
            $km = $km + rand(1, 5);
            echo "<div>" . "<br>" . "Конечное расстояние в КМ осонованное на растоянии + немного КМ сверху(случайное значение от 1-5):" . "<h3>" . $km . "</h3>" . "</div>";
            echo "<div>" . "-------------------------------------" . "</div>";
        }
    }

    protected function calculateDataEst($km, $kmRange, $days)
    {

        echo "<div>Esitasite järgmised andmed: "  . "<br>"  . " ---" . "<br>" . "KM algväärtus: " . $km . "<br>" . "KM vahemik: "  . $kmRange . "<br>" . "Tööpäevad: " .  $days . "</div>";
        echo "<div>" . "---" . "</div>";
        echo "<div>" . "<br>" . "Arvutused esitatud väärtuste põhjal" . "<br>"  . "</div>";

        for ($i = 1; $i <=  $days; $i++) {
            echo "<div>" . "-------------------------------------" . "</div>";
            $km = $km + $kmRange;

            echo "<br>" . "<div>" . "<br>" . "Päeva number: " . "<h3>" . $i . "</h3>" . "</div>";
            echo "<div>" . "<br>" . "KM vahemik: " . "<h3>" . $kmRange . "</h3>" . "</div>";
            echo "<div>" . "<br>" . "KM lõppväärtus vahemiku alusel: " . "<h3>" .  $km . "</h3>" . "</div>";
            $km = $km + rand(1, 5);
            echo "<div>" . "<br>" . "KM lõppväärtus, mis põhineb vahemikus + ekstra KM (väärtus on juhuslik 1–5 lisakilomeetrit):" . "<h3>" . $km . "</h3>" . "</div>";
            echo "<div>" . "-------------------------------------" . "</div>";
        }
    }
    ///Error check functions (3 langs)
    protected function errorCheck($km, $kmRange, $days)
    {
        if (empty($km) || empty($kmRange) || empty($days)) {
            echo "<div>" . "Fields cannot be empty!" . "</div>";
            return false;
        } else {
            return true;
        }
    }

    protected function errorCheckRu($km, $kmRange, $days)
    {
        if (empty($km) || empty($kmRange) || empty($days)) {
            echo "<div>" . "Поля не могут быть пустыми!" . "</div>";
            return false;
        } else {
            return true;
        }
    }

    protected function errorCheckEst($km, $kmRange, $days)
    {
        if (empty($km) || empty($kmRange) || empty($days)) {
            echo "<div>" . "Väljad ei tohi olla tühjad!" . "</div>";
            return false;
        } else {
            return true;
        }
    }
}
