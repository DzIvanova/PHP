<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>CV Generator</title>
    <style>
        fieldset p {
            margin: 0px;
        }
        #personalInfo input[type="text"] {
            display: block;
        }
        input[type="radio"] {
            display: inline;
        }
        #personalInfo input[type="date"] {
            display: block;
        }
        #personalInfo select {
            display: block;
        }
        section form fieldset {
            width: 500px;
        }
        #result {
            display:inline-block;
            width:500px;
            vertical-align:top;
            margin-left:80px;
        }
    </style>
    <script>
        var progLangID = 0;
        function addProgLang() {
            //progLangID++;
            var progLangDiv = document.createElement("div");
            progLangDiv.setAttribute("id", "progDiv" + progLangID);
            progLangID++;
            progLangDiv.innerHTML = '<input type="text" name="progrLang[]" id="progrLanguages" /> ' +
                '<select name="porgLevel[]" id="level">' +
                    '<option value="Beginner">Beginner</option>' +
                    '<option value="Programmer">Programmer</option>' +
            '<option value="Ninja">Ninja</option>' +
                    '</select>';

            document.getElementById("programmingLanguagesParent").appendChild(progLangDiv);
        }

        function removeProgLang() {
            var lastDiv = document.getElementById("programmingLanguagesParent").lastChild;
            if(lastDiv.id != "progDiv0"){
                document.getElementById("programmingLanguagesParent").removeChild(lastDiv);
            }
        }
        var langID = 0;
        function addLanguage() {
            var langDiv = document.createElement("div");
            langDiv.setAttribute("id", "langNum" + langID);
            langID++;
            langDiv.innerHTML = '<input type="text" name="Lang[]" id="Languages" /> ' +
                '<select name="comprehension[]" id="comprehension">'+
                '<option value="default" disabled selected>-Comprehension-</option>' +
                '<option value="beginner">beginner</option>' +
                '<option value="intermediate">intermediate</option>' +
                '<option value="advanced">advanced</option>' +
                '</select>' +
                '<select name="reading[]" id="reading">' +
                '<option value="default" disabled selected>-Reading-</option>' +
                '<option value="beginner">beginner</option>' +
                '<option value="intermediate">intermediate</option>' +
                '<option value="advanced">advanced</option>' +
                ' </select>' +
                ' <select name="writing[]" id="writing">' +
                '<option value="default" disabled selected required="true">-Writing-</option>' +
                ' <option value="beginner">beginner</option>' +
                '<option value="intermediate">intermediate</option>'+
                '<option value="advanced">advanced</option>'+
                '</select>'+
                ' <br/>';
            document.getElementById("languageParent").appendChild(langDiv);
        }
        function removeLanguage() {
            var lastDiv = document.getElementById("languageParent").lastChild;
            if(lastDiv != "langNum0"){
                document.getElementById("languageParent").removeChild(lastDiv);
            }
        }
    </script>
</head>
<body>
<section>
    <form action="" method="POST">
        <fieldset id="personalInfo">
            <legend>Personal Information</legend>
            <input type="text" name="fName" placeholder="First Name">
            <input type="text" name="lName" placeholder="Last Name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="phone" placeholder="Phone Number">
            <div>
                <label for="female">Female</label>
                <input type="radio" name="sex" id="female" value="female">
                <label for="male">Male</label>
                <input type="radio" name="sex" id="male" value="male">
            </div>
            <label for="bDay">Birth Date</label>
            <input type="date" id="bDay" name="bDay">
            <label for="nationality">Nationality</label>
            <select name="nationality" id="nationality">
                <option disabled selected>Nationality</option>
                <option value="Bulgarian">Bulgarian</option>
                <option value="British">British</option>
                <option value="American">American</option>
                <option value="French">French</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Last Work Position</legend>
            <p>Company name: <input type="text" name="compName"></p>
            <p>From: <input type="date" name="from"></p>
            <p>To: <input type="date" name="to"></p>
        </fieldset>
        <fieldset>
            <legend>Computer Skills</legend>
            <p>Programming Languages:</p>
            <div id="programmingLanguagesParent">

            </div>
            <script>
                addProgLang();
            </script>
            <input type="button" name="removePL" value="Remove Language" onclick="removeProgLang()">
            <input type="button" name="progLang[]" value="Add Language" onclick="addProgLang()">
        </fieldset>
        <fieldset>
            <legend>Other Skills</legend>
            <p>Languages:</p>
            <div id="languageParent">

            </div>
            <script>
                addLanguage();
            </script>
            <input type="button" name="removeL" value="Remove Language" onclick="removeLanguage()">
            <input type="button" name="Lang[]" value="Add Language" onclick="addLanguage()">
            <p>Driver's License</p>
            <label for="b">B </label>
            <input type="checkbox" id="b" value="B" name="B-cat">
            <label for="a">A </label>
            <input type="checkbox" id="a" value="A" name="A-cat">
            <label for="c">C </label>
            <input type="checkbox" id="c" value="C" name="C-cat">
        </fieldset>
        <input type="submit" value="Generate CV" name="generate">

    </form>
</section>
<div id="result">
    <?php
    if(isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['email']) &&
        isset($_POST['phone']) && isset($_POST['sex']) && isset($_POST['bDay']) &&
        isset($_POST['nationality']) && isset($_POST['compName']) &&
        isset($_POST['from']) && isset($_POST['to']) && isset($_POST['progrLang']) &&
        isset($_POST['progLevel']) && isset($_POST['Lang']) && isset($_POST['comprehension']) &&
        isset($_POST['reading']) && isset($_POST['writing'])) {
        $fName = htmlentities($_POST['fName']);
        $lName = htmlentities($_POST['lName']);
        $email = htmlentities($_POST['email']);
        $phone = htmlentities($_POST['phone']);
        $sex = $_POST['sex'];
        $bDay = $_POST['bDay'];
        $nationality = $_POST['nationality'];
        $compName = htmlentities($_POST['compName']);
        $from = $_POST['from'];
        $to = $_POST['to'];
        $progLang = htmlentities($_POST['progLang']);
        $progLevel = $_POST['progLevel'];
        $lang = htmlentities($_POST['Lang']);
        $comprehension = $_POST['comprehension'];
        $reading = $_POST['reading'];
        $writing = $_POST['writing'];
        $category = "";
        if(isset($_POST['B-cat'])){
            array_push($category, "B");
        }
        if(isset($_POST['A-cat'])){
            array_push($category, "A");
        }
        if(isset($_POST['C-cat'])){
            array_push($category, "C");
        }
        $lettersRegX = '/[^A-Za-z]/';
        if(!preg_match($lettersRegX, $fName) && strlen($fName) >= 2 && strlen($fName) <= 20 &&
            !preg_match($lettersRegX,$lName) && strlen($lName) >= 2 && strlen($lName) <= 20 &&
            !preg_match($lettersRegX, $lang) && strlen($lang) >= 2 && strlen($lang) <= 20 &&
            !preg_match('/[^A-Za-z0-9 ]/', $compName) && strlen($compName) >= 2 && strlen($compName) <= 20 &&
            !preg_match('/[^0-9\+\-\s]/', $phone) && !preg_match('/[^a-zA-z0-9]+@{1}[a-zA-z0-9]+.{1}[a-zA-z0-9]+/', $email)){
            $personalInfo = '<table><thead><tr><th colspan="2">Personal Information</th></tr></thead><tbody>' .
                '<tr><td>First Name</td><td>' . $fName . '</td></tr><td>Last Name</td><td>' . $lName  . '</td></tr>' .
                '<tr><td>Email</td><td>' . $email . '</td></tr>' .
                '<tr><td>Phone</td><td>' . $phone . '</td></tr>' .
                '<tr><td>Gender</td><td>' . $sex . '</td></tr>' .
                '<tr><td>Birth Date</td><td>' . $bDay . '</td></tr>' .
                '<tr><td>Nationality</td><td>' . $nationality . '</td></tr></tbody></table>';
            $lastWorkTable = '<table><thead><tr><th colspan="2">Last Work Position</th></tr></thead><tbody>' .
                '<tr><td>Company Name</td><td>' . $compName . '</td></tr>' .
                '<tr><td>From</td><td>' . $from . '</td></tr>' .
                '<tr><td>To</td><td>' . $to . '</td></tr></tbody></table>';
            $computerSkillsTable = '<table><thead><tr><th colspan="2">Computer Skills</th></tr></thead><tbody>' .
                '<tr><td>Programming Languages</td><td><table><thead><tr><th>Language</th><th>Skill Level</th></tr></thead>' .
                '<tbody>';
            for($i = 0; $i < count($progLevel) ;$i++) {
                $computerSkillsTable .= '<tr>';
                $computerSkillsTable .= '<td>' . $progLang[$i] . '</td>';
                $computerSkillsTable .= '<td>' . $progLevel[$i] . '</td>';
                $computerSkillsTable .= '</tr>';

                $computerSkillsTable .= '</tbody></table></tr></tbody></table>';

                $otherSkills = '<table><thead><tr><th colspan="2">Other Skills</th></tr></thead><tbody>' .
                    '<tr><td>Languages</td><td><table><thead><th>Language</th><th>Comprehension</th>' .
                    '<th>Reading</th><th>Writing</th></tr>';

                for($i = 0; $i < count($lang) ;$i++) {
                    $otherSkills .= '<tr>';
                    $otherSkills .= '<td>' . $lang[$i] . '</td>';
                    $otherSkills .= '<td>' . $comprehension[$i] . '</td>';
                    $otherSkills .= '<td>' . $reading[$i] . '</td>';
                    $otherSkills .= '<td>' . $writing[$i] . '</td>';
                }
                $otherSkills .= '</tbody></table></tr><tr><td>Driver`s License</td><td>' .
                    $category[0] . " ".  $category[1]. " " . $category[2] .'</td></tr>';
                $otherSkills .= '</tbody></table>';
            }
        }

    }
    if(isset($personalInfo) && isset($lastWorkTable) && isset($computerSkillsTable) && $otherSkills) {
    echo $personalInfo;
    echo $lastWorkTable;
    echo $computerSkillsTable;
    echo $otherSkills;
    }
    else {
        echo "Please enter a valid information to generate your CV";
    }
    ?>
</div>
</body>
</html>