<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        a {
            text-decoration: none;
        }
        a:visited {
            color: green;
        }
        a:active {
            color: red;
        }
        a.current-page {
            text-decoration: underline;
            color: red;
        }
    </style>
    <script>
        function updateCompetitions() {
            var countrySelect = document.getElementById("country");
            var competitionSelect = document.getElementById("competition");
            var clubSelect = document.getElementById("club");
            var selectedCountry = countrySelect.value;

            // Clear previous options
            while (competitionSelect.options.length > 0) {
                competitionSelect.options.remove(0);
            }
            while (clubSelect.options.length > 0) {
                clubSelect.options.remove(0);
            }

            if (selectedCountry === "영국") {
                var competitions = ["EPL", "챔피언스 리그"];
                competitions.forEach(function (competition) {
                    var option = document.createElement("option");
                    option.text = competition;
                    option.value = competition; // 옵션 값 설정
                    competitionSelect.add(option);
                });
                var clubs = ["맨시티", "토트넘", "아스날", "첼시", "맨유", "리버풀"];
                clubs.forEach(function (club) {
                    var option2 = document.createElement("option");
                    option2.text = club;
                    option2.value = club; // 옵션 값 설정
                    clubSelect.add(option2);
                });
            } else if (selectedCountry === "독일") {
                var competitions = ["분데스리가", "챔피언스 리그"];
                competitions.forEach(function (competition) {
                    var option = document.createElement("option");
                    option.text = competition;
                    option.value = competition; // 옵션 값 설정
                    competitionSelect.add(option);
                });
                var clubs = ["레버쿠젠", "바이에르 믠헨", "슈투트가르트"];
                clubs.forEach(function (club) {
                    var option2 = document.createElement("option");
                    option2.text = club;
                    option2.value = club; // 옵션 값 설정
                    clubSelect.add(option2);
                });
            } else {
                var option = document.createElement("option");
                option.text = "모든 대회";
                option.value = ""; // 빈 값 설정
                competitionSelect.add(option);

                var option2 = document.createElement("option");
                option2.text = "모든 클럽";
                option2.value = ""; // 빈 값 설정
                clubSelect.add(option2);
            }
        }
    </script>
</head>
<body>
    <h1><a href="football.php">Transfer Market</a></h1>
    <ul>
        <?php
        if (isset($_GET['id'])) {
            $selectedId = $_GET['id'];
        } else {
            $selectedId = '';
        }
        ?>
        <li><a href="football.php?id=Transfer" class="<?php echo ($selectedId == 'Transfer') ? 'current-page' : ''; ?>">Transfer</a></li>
        <li><a href="football.php?id=Player_Stats" class="<?php echo ($selectedId == 'Player_Stats') ? 'current-page' : ''; ?>">Player Stats</a></li>
    </ul>
    <h2>
    <form action="search.php" method="GET">
        <label for="country">국가:</label>
        <select name="country" id="country" onchange="updateCompetitions()">
            <option value="">선택하세요</option>
            <option value="영국">영국</option>
            <option value="독일">독일</option>
        </select>
        <label for="competition">대회:</label>
        <select name="competition" id="competition">
            <option value="">모든 대회</option>
        </select>
        <label for="club">클럽:</label>
        <select name="club" id="club">
            <option value="">모든 클럽</option>
        </select>
        <label for="player">선수:</label>
        <input type="text" name="player" id="player">
        <button type="submit">검색</button>
    </form>
    </h2>
    <h3>
        <?php
        if (isset($_GET['id'])) {
            echo $_GET['id'];
        } else {
            echo "Welcome";
        }
        ?>
    </h3>
</body>
</html>
