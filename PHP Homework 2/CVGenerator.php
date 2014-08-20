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

</body>
</html>