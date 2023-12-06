<!DOCTYPE html>
<html>
<head>
    <?php
    session_start(); 
    $connect = mysqli_connect("localhost", "root", "111111", "FOOTBALL");
    ?>
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
        .horizontal-line {
        width: 100%;
        height: 2px; 
        background-color: #000; 
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
        background-color: #f2f2f2;
        }
    </style>
    <script>
    function updateCompetitions() {
    var countrySelect = document.getElementById("country");
    var competitionSelect = document.getElementById("competition");
    var clubSelect = document.getElementById("club");

    while (competitionSelect.options.length > 0) {
        competitionSelect.options.remove(0);
    }

    while (clubSelect.options.length > 0) {
        clubSelect.options.remove(0);
    }

    var selectedCountry = countrySelect.value; 

    var option = document.createElement("option");
    option.text = '선택하세요';
    competitionSelect.add(option);

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_competitions.php?country=" + selectedCountry, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            for (var i = 0; i < response.length; i++) {
                var option = document.createElement("option");
                option.text = response[i].CompetitionName;
                competitionSelect.add(option);
            }
        }
    };
    xhr.send();
}

function updateClubs() {
    var competitionSelect = document.getElementById("competition");
    var clubSelect = document.getElementById("club");

    while (clubSelect.options.length > 0) {
        clubSelect.options.remove(0);
    }

    var selectedCompetition = competitionSelect.value; 

    var option = document.createElement("option");
    option.text = '선택하세요';
    clubSelect.add(option);

    var xhrclub = new XMLHttpRequest();
    xhrclub.open("GET", "get_clubs.php?competition=" + selectedCompetition, true);
    xhrclub.onreadystatechange = function () {
        if (xhrclub.readyState == 4 && xhrclub.status == 200) {
            var response = JSON.parse(xhrclub.responseText);
            for (var i = 0; i < response.length; i++) {
                var option = document.createElement("option");
                option.text = response[i].ClubName;
                clubSelect.add(option);
            }
        }
    };
    xhrclub.send();
}

function updatePlayers() {
    var clubSelect = document.getElementById("club");
    var playerSelect = document.getElementById("player");

    while (playerSelect.options.length > 0) {
        playerSelect.options.remove(0);
    }

    var selectedClub = clubSelect.value; 

    var option = document.createElement("option");
    option.text = '선택하세요';
    playerSelect.add(option);

    var xhrclub = new XMLHttpRequest();
    xhrclub.open("GET", "get_players.php?club=" + selectedClub, true);
    xhrclub.onreadystatechange = function () {
        if (xhrclub.readyState == 4 && xhrclub.status == 200) {
            var response = JSON.parse(xhrclub.responseText);
            for (var i = 0; i < response.length; i++) {
                var option = document.createElement("option");
                option.text = response[i].Name;
                playerSelect.add(option);
            }
        }
    };
    xhrclub.send();
}

function updateCompetition_Recontract() {
    var countrySelect = document.getElementById("country_Recontract");
    var competitionSelect = document.getElementById("competition_Recontract");
    var clubSelect = document.getElementById("club_Recontract");

    while (competitionSelect.options.length > 0) {
        competitionSelect.options.remove(0);
    }

    while (clubSelect.options.length > 0) {
        clubSelect.options.remove(0);
    }

    var selectedCountry = countrySelect.value; 

    var option = document.createElement("option");
    option.text = '선택하세요';
    competitionSelect.add(option);

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_competitions.php?country=" + selectedCountry, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            for (var i = 0; i < response.length; i++) {
                var option = document.createElement("option");
                option.text = response[i].CompetitionName;
                competitionSelect.add(option);
            }
        }
    };
    xhr.send();
}

function updateClubs_Recontract() {
    var competitionSelect = document.getElementById("competition_Recontract");
    var clubSelect = document.getElementById("club_Recontract");

    while (clubSelect.options.length > 0) {
        clubSelect.options.remove(0);
    }

    var selectedCompetition = competitionSelect.value; 

    var option = document.createElement("option");
    option.text = '선택하세요';
    clubSelect.add(option);

    var xhrclub = new XMLHttpRequest();
    xhrclub.open("GET", "get_clubs.php?competition=" + selectedCompetition, true);
    xhrclub.onreadystatechange = function () {
        if (xhrclub.readyState == 4 && xhrclub.status == 200) {
            var response = JSON.parse(xhrclub.responseText);
            for (var i = 0; i < response.length; i++) {
                var option = document.createElement("option");
                option.text = response[i].ClubName;
                clubSelect.add(option);
            }
        }
    };
    xhrclub.send();
}

function updatePlayers_Recontract() {
    var clubSelect = document.getElementById("club_Recontract");
    var playerSelect = document.getElementById("player_Recontract");

    while (playerSelect.options.length > 0) {
        playerSelect.options.remove(0);
    }

    var selectedClub = clubSelect.value; 

    var option = document.createElement("option");
    option.text = '선택하세요';
    playerSelect.add(option);

    var xhrclub = new XMLHttpRequest();
    xhrclub.open("GET", "get_players.php?club=" + selectedClub, true);
    xhrclub.onreadystatechange = function () {
        if (xhrclub.readyState == 4 && xhrclub.status == 200) {
            var response = JSON.parse(xhrclub.responseText);
            for (var i = 0; i < response.length; i++) {
                var option = document.createElement("option");
                option.text = response[i].Name;
                playerSelect.add(option);
            }
        }
    };
    xhrclub.send();
}

function updateBacknumber() {
    var playerSelect = document.getElementById("name");
    var BackNumberSelect = document.getElementById("BackNumber");

    var selectedPlayer = playerSelect.value; 

    var xhrclub = new XMLHttpRequest();
    xhrclub.open("GET", "get_backnumber.php?name=" + selectedPlayer, true);
    xhrclub.onreadystatechange = function () {
        if (xhrclub.readyState == 4 && xhrclub.status == 200) {
            var response = JSON.parse(xhrclub.responseText);
            for (var i = 0; i < response.length; i++) {
                var option = document.createElement("option");
                option.text = response[i].Name;
                BackNumberSelect.add(option);
            }
        }
    };
    xhrclub.send();
}
    
    
</script>

</head>
<body>
    <h1><a href="football.php">FOOTBALL DATA</a></h1>
    <hr class = "horizontal-line">
    <h2>
    <ul>
        <?php
        echo 'MENU';
        if (isset($_GET['id'])) {
            $selectedId = $_GET['id'];
        } else {
            $selectedId = '';
        }
        ?>
        <li><a href="football.php?id=Transfer" class="<?php echo ($selectedId == 'Transfer') ? 'current-page' : ''; ?>">Transfer</a></li>
        <ul>
        <?php
            if ($_GET['id'] == 'Transfer') {
                $selectedTOP = $_GET['top'];
                echo '<li><a href="football.php?id=Transfer&top=transfer" class="' . ($selectedTOP == 'transfer' ? 'current-page' : '') . '">Top Transfer</a></li>';
                echo '<li><a href="football.php?id=Transfer&top=income-expenditure" class="' . ($selectedTOP == 'income-expenditure' ? 'current-page' : '') . '">Top Income/Expenditure</a></li>';
            }
        ?>
        </ul>
        <li><a href="football.php?id=Player_Stats" class="<?php echo ($selectedId == 'Player_Stats') ? 'current-page' : ''; ?>">Player Stats</a></li>
        <ul>
        <?php
             if($_GET['id'] == 'Player_Stats'){
                $selectedTOP = $_GET['top'];
                echo '<li><a href="football.php?id=Player_Stats&top=goal_assist" class="' . ($selectedTOP == 'goal_assist' ? 'current-page' : '') . '">Most goal and assist</a></li>';
            }
        ?>
        </ul>
        <li><a href="football.php?id=ADMIN" class="<?php echo ($selectedId == 'ADMIN') ? 'current-page' : ''; ?>">ADMIN MENU</a></li>
        <ul>
        <?php
             if($_GET['id'] == 'ADMIN'){
                $selectedADMIN = $_GET['ADMIN'];
                echo '<li><a href="football.php?id=ADMIN&ADMIN=INSERT" class="' . ($selectedADMIN == 'INSERT' ? 'current-page' : '') . '">INSERT DATA</a></li>';
                echo '<li><a href="football.php?id=ADMIN&ADMIN=DELETE" class="' . ($selectedADMIN == 'DELETE' ? 'current-page' : '') . '">DELETE DATA</a></li>';
                echo '<li><a href="football.php?id=ADMIN&ADMIN=UPDATE" class="' . ($selectedADMIN == 'UPDATE' ? 'current-page' : '') . '">UPDATE DATA</a></li>';
            }
        ?>
        </ul>
    
    </ul>
    <hr class = "horizontal-line">
    - Simple Search
    <form action="simple_search.php" method="POST">
        <label for="country">국가:</label>
        <select name="country" id="country" onchange="updateCompetitions()">
            <option value="">선택하세요</option>
            <?php
            $sql = "SELECT DISTINCT Country FROM Competition";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $country = $row['Country'];
                echo '<option value="' . $country . '">' . $country . '</option>';
            }
            ?>
        </select>
        <label for="competition">대회:</label>
        <select name="competition" id="competition" onchange="updateClubs()">
            <option value="">선택하시오</option>
        </select>
        <label for="club">클럽:</label>
        <select name="club" id="club" onchange="updatePlayers()">
            <option value="">선택하시오</option>
        </select>
        <label for="player">선수:</label>
        <select name="player" id="player">
            <option value="">선택하시오</option>
        </select>
        <button type="submit">검색</button>
    </form>
    </h2>
    <hr class = "horizontal-line">
    <h3>
        <?php
        if (isset($_GET['id'])) {
            if(isset($_GET['ADMIN'])){
                if($_GET['ADMIN'] == 'INSERT'){
                    echo '<h2>선수 추가 :</h2>';
                    echo'
                    <form action="insert_data.php" method="POST">
                    <label for="name">선수 이름:</label>
                    <input type="text" name="name" id="name" required>

                    <label for="citizenship">국적:</label>
                    <input type="text" name="citizenship" id="citizenship" required>

                    <label for="backnumber">등 번호:</label>
                    <input type="number" name="backnumber" id="backnumber" required>

                    <label for="preferFoot">주발:</label>
                    <input type="text" name="preferFoot" id="preferFoot" required>

                    <label for="gender">성별:</label>
                    <input type="text" name="gender" id="gender" required>

                    <label for="height">키:</label>
                    <input type="number" name="height" id="height" required>

                    <label for="birthdate">생년월일:</label>
                    <input type="date" name="birthdate" id="birthdate"  required>

                    <label for="position">포지션:</label>
                    <input type="text" name="position" id="position" required>

                    <input type="hidden" name="add_type" value="player" required>

                    <button type="submit">데이터 추가</button>
                    </form>'
                    ;
                    echo '<br><h2>클럽 추가 :</h2>';
                    echo'
                    <form action="insert_data.php" method="POST">
                    <label for="name">클럽 이름:</label>
                    <input type="text" name="name" id="name" required>

                    <label for="country">클럽 나라:</label>
                    <input type="text" name="country" id="country" required>

                    <label for="headcoach">감독:</label>
                    <input type="text" name="headcoach" id="headcoach" required>

                    <input type="hidden" name="add_type" value="club" required>

                    <button type="submit">데이터 추가</button>
                    </form>'
                    ;

                    echo '<br><h2>competition 추가 :</h2>';
                    echo'
                    <form action="insert_data.php" method="POST">
                    <label for="name">competition 이름:</label>
                    <input type="text" name="name" id="name" required>

                    <label for="country">competition 나라:</label>
                    <input type="text" name="country" id="country" required>

                    <label for="season">시즌:</label>
                    <input type="text" name="season" id="season" required>

                    <input type="hidden" name="add_type" value="competition" required>

                    <button type="submit">데이터 추가</button>
                    </form>'
                    ;

                    echo '<br><h2>competition에 팀 추가 :</h2>';
                    echo '
                    <form action="insert_data.php" method="POST">
                    <label for="ClubName">클럽 이름:</label>
                        <select name="ClubName" id="ClubName">
                            <option value="">선택하세요</option>';
                            $sql = "SELECT DISTINCT ClubName FROM Club";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $ClubName = $row['ClubName'];
                                echo '<option value="' . $ClubName . '">' . $ClubName . '</option>';
                            }
                        
                    echo '
                    </select>
                    <label for="CompetitionName">competition 이름:</label>
                        <select name="CompetitionName" id="CompetitionName">
                            <option value="">선택하세요</option>';
                            $sql = "SELECT DISTINCT CompetitionName FROM Competition";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $CompetitionName = $row['CompetitionName'];
                                echo '<option value="' . $CompetitionName . '">' . $CompetitionName . '</option>';
                            }
                        
                    echo '

                    <input type="hidden" name="add_type" value="CompetitionTeam" required>

                    <button type="submit">데이터 추가</button>
                    </form>'
                    ;



                    echo '<br><h2>계약 추가 :</h2>';
                    echo '
                    <form action="insert_data.php" method="POST">
                        <label for="name">선수:</label>
                        <select name="name" id="name">
                            <option value="">선택하세요</option>';
                            $sql = "SELECT DISTINCT Name FROM Player";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $Name = $row['Name'];
                                echo '<option value="' . $Name . '">' . $Name . '</option>';
                            }
                        
                    echo '
                    </select>
                    <label for="previousClub">이전 소속팀:</label>
                    <select name="previousClub" id="previousClub">
                        <option value="">선택하세요</option>';
                        $sql = "SELECT DISTINCT ClubName FROM Club";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $Name = $row['ClubName'];
                                echo '<option value="' . $Name . '">' . $Name . '</option>';
                            }
                    echo'
                    </select>
                    <label for="NewClub">새 소속팀:</label>
                    <select name="NewClub" id="NewClub">
                        <option value="">선택하세요</option>';
                        $sql = "SELECT DISTINCT ClubName FROM Club";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $Name = $row['ClubName'];
                                echo '<option value="' . $Name . '">' . $Name . '</option>';
                            }
                    echo'
                    </select>
                    
                    <label for="TrasnferFee">이적료:</label>
                    <input type="number" name="TrasnferFee" id="TrasnferFee"  required>

                    <label for="ConStartDate">계약 시작일:</label>
                    <input type="date" name="ConStartDate" id="ConStartDate"  required>

                    <label for="ConEndDate">계약 만료일:</label>
                    <input type="date" name="ConEndDate" id="ConEndDate"  required>

                    <input type="hidden" name="add_type" value="contract" required>
                    <button type="submit">데이터 추가</button>
                    </form>'
                    ;
                    echo '<br><h2>매치 레코드 추가 :</h2>';
                    echo '
                    <form action="insert_data.php" method="POST">
                        <label for="name">선수:</label>
                        <select name="name" id="name">
                            <option value="">선택하세요</option>';
                            $sql = "SELECT DISTINCT Name FROM Player";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $Name = $row['Name'];
                                echo '<option value="' . $Name . '">' . $Name . '</option>';
                            }
                        
                    echo '
                    </select>
                    <label for="competition">리그/토너먼트:</label>
                    <select name="competition" id="competition">
                        <option value="">선택하세요</option>';
                        $sql = "SELECT DISTINCT CompetitionName FROM Competition";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $com = $row['CompetitionName'];
                                echo '<option value="' . $com . '">' . $com . '</option>';
                            }
                    echo'
                    </select>
                    <label for="home">홈팀:</label>
                    <select name="home" id="home">
                        <option value="">선택하세요</option>';
                        $sql = "SELECT DISTINCT ClubName FROM Club";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $Name = $row['ClubName'];
                                echo '<option value="' . $Name . '">' . $Name . '</option>';
                            }
                    echo'
                    </select>
                    <label for="away">어웨이팀:</label>
                    <select name="away" id="away">
                        <option value="">선택하세요</option>';
                        $sql = "SELECT DISTINCT ClubName FROM Club";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $Name = $row['ClubName'];
                                echo '<option value="' . $Name . '">' . $Name . '</option>';
                            }
                    echo'
                    </select>
                    <label for="Appearance">출전여부:</label>
                    <select name="Appearance" id="Appearance">
                        <option value="">선택하세요</option>
                        <option value="1">출전</option>
                        <option value="0">결장</option>
                    </select>

                    </select>
                    <label for="Starting_MEM">선발여부:</label>
                    <select name="Starting_MEM" id="Starting_MEM">
                        <option value="">선택하세요</option>
                        <option value="1">선발</option>
                        <option value="0">벤치</option>
                    </select>

                    </select>
                    <label for="season">시즌:</label>
                    <select name="season" id="season">
                        <option value="">선택하세요</option>';
                        $sql = "SELECT DISTINCT Season FROM Competition";
                        $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $season = $row['Season'];
                                echo '<option value="' . $season . '">' . $season . '</option>';
                            }
                        echo'
                    </select>

                    <label for="goal">골 수:</label>
                    <input type="number" name="goal" id="goal"  required>

                    <label for="assist">어시스트 수:</label>
                    <input type="number" name="assist" id="assist"  required>

                    <label for="yellow">엘로카드 수:</label>
                    <select name="yellow" id="yellow">
                        <option value="">선택하세요</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="1">2</option>
                    </select>

                    <label for="red">레드카드 수:</label>
                    <select name="red" id="red">
                        <option value="">선택하세요</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>

                    <label for="matchdate">경기 날짜:</label>
                    <input type="date" name="matchdate" id="matchdate"  required>

                    <input type="hidden" name="add_type" value="matchrecord" required>
                    <button type="submit">데이터 추가</button>
                    </form>'
                    ;
                }else if($_GET['ADMIN'] == 'UPDATE'){
                    echo '<h2>재계약 :</h2>
                    <form action="update_data.php" method="POST">
                    <label for="country_Recontract">국가:</label>
                    <select name="country_Recontract" id="country_Recontract" onchange="updateCompetition_Recontract()">
                        <option value="">선택하세요</option>';
                        $sql = "SELECT DISTINCT Country FROM Competition";
                        $result = mysqli_query($connect, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $country = $row['Country'];
                            echo '<option value="' . $country . '">' . $country . '</option>';
                        }
                        echo'
                     </select>
                    <label for="competition_Recontract">대회:</label>
                    <select name="competition_Recontract" id="competition_Recontract" onchange="updateClubs_Recontract()">
                        <option value="">선택하시오</option>
                     </select>
                    <label for="club_Recontract">클럽:</label>
                    <select name="club_Recontract" id="club_Recontract" onchange="updatePlayers_Recontract()">
                        <option value="">선택하시오</option>
                    </select>
                    <label for="player_Recontract">선수:</label>
                    <select name="player_Recontract" id="player_Recontract">
                        <option value="">선택하시오</option>
                    </select>

                    <label for="ConEndDate">새로운 계약 만료일:</label>
                    <input type="date" name="ConEndDate" id="ConEndDate"  required>

                    <input type="hidden" name="update_type" value="contract" required>
                    <button type="submit">데이터 업데이트</button>
                    </form>';
                    
                }
                else if($_GET['ADMIN'] == 'DELETE'){
                    $selectedDEL_OBJ= $_GET['DEL_OBJ'];
                    echo '<li><a href="football.php?id=ADMIN&ADMIN=DELETE&DEL_OBJ=PLAYER"class="' . ($selectedDEL_OBJ == 'PLAYER' ? 'current-page' : '') . '">DELETE PLAYER</a></li>';
                    echo '<li><a href="football.php?id=ADMIN&ADMIN=DELETE&DEL_OBJ=CLUB"class="' . ($selectedDEL_OBJ == 'CLUB' ? 'current-page' : '') . '">DELETE CLUB</a></li>';
                    echo '<li><a href="football.php?id=ADMIN&ADMIN=DELETE&DEL_OBJ=COMPETITION"class="' . ($selectedDEL_OBJ == 'COMPETITION' ? 'current-page' : '') . '">DELETE COMPETITION</a></li>';
                    echo '<li><a href="football.php?id=ADMIN&ADMIN=DELETE&DEL_OBJ=COMPETITIONTEAM"class="' . ($selectedDEL_OBJ == 'COMPETITIONTEAM' ? 'current-page' : '') . '">DELETE COMPETITIONTEAM</a></li>';
                    echo '<li><a href="football.php?id=ADMIN&ADMIN=DELETE&DEL_OBJ=CONTRACT"class="' . ($selectedDEL_OBJ == 'CONTRACT' ? 'current-page' : '') . '">DELETE CONTRACT</a></li>';
                    echo '<li><a href="football.php?id=ADMIN&ADMIN=DELETE&DEL_OBJ=MATCHRECORD"class="' . ($selectedDEL_OBJ == 'MATCHRECORD' ? 'current-page' : '') . '">DELETE MATCHRECORD</a></li>';
                    echo '<li><a href="football.php?id=ADMIN&ADMIN=DELETE&DEL_OBJ=STAT"class="' . ($selectedDEL_OBJ == 'STAT' ? 'current-page' : '') . '">DELETE STAT</a></li>';
                    if($_GET['DEL_OBJ'] == 'PLAYER'){
                        $sql = "SELECT * FROM Player";
                        $result = mysqli_query($connect, $sql);
                        if ($result->num_rows > 0) {
                        echo "<form method='post' action='delete_data.php'>";
                        echo "<table border='1'>";
                        echo "<tr><th>PlayerID</th><th>Name</th><th>BackNumber</th><th>PreferredFoot</th><th>Gender</th><th>Height</th><th>Birthdate</th><th>Position</th><th>Age</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["PlayerID"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["BackNumber"] . "</td>";
                            echo "<td>" . $row["PreferredFoot"] . "</td>";
                            echo "<td>" . $row["Gender"] . "</td>";
                            echo "<td>" . $row["Height"] . "</td>";
                            echo "<td>" . $row["Birthdate"] . "</td>";
                            echo "<td>" . $row["Position"] . "</td>";
                            echo "<td>" . $row["Age"] . "</td>";
                            echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row["PlayerID"] . "'></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<input type='hidden' name='delete_type' value='" . $_GET["DEL_OBJ"] . "' required>";
                        echo "<input type='submit' value='Delete Selected Rows'>";
                        echo "</form>";
                        }
                        else {
                            echo "0 results";
                        } 
                    }
                    else if($_GET['DEL_OBJ'] == 'CLUB'){
                        $sql = "SELECT * FROM Club";
                        $result = mysqli_query($connect, $sql);
                        if ($result->num_rows > 0) {
                        echo "<form method='post' action='delete_data.php'>";
                        echo "<table border='1'>";
                        echo "<tr><th>ClubID</th><th>ClubName</th><th>Country</th><th>HeadCoach</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["ClubID"] . "</td>";
                            echo "<td>" . $row["ClubName"] . "</td>";
                            echo "<td>" . $row["Country"] . "</td>";
                            echo "<td>" . $row["HeadCoach"] . "</td>";
                            echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row["ClubID"] . "'></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<input type='hidden' name='delete_type' value='" . $_GET["DEL_OBJ"] . "' required>";
                        echo "<input type='submit' value='Delete Selected Rows'>";
                        echo "</form>";
                        }
                        else {
                            echo "0 results";
                        } 
                    }
                    else if($_GET['DEL_OBJ'] == 'COMPETITION'){
                        $sql = "SELECT * FROM Competition";
                        $result = mysqli_query($connect, $sql);
                        if ($result->num_rows > 0) {
                        echo "<form method='post' action='delete_data.php'>";
                        echo "<table border='1'>";
                        echo "<tr><th>CompetitionID</th><th>CompetitionName</th><th>Country</th><th>Season</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["CompetitionID"] . "</td>";
                            echo "<td>" . $row["CompetitionName"] . "</td>";
                            echo "<td>" . $row["Country"] . "</td>";
                            echo "<td>" . $row["Season"] . "</td>";
                            echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row["CompetitionID"] . "'></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<input type='hidden' name='delete_type' value='" . $_GET["DEL_OBJ"] . "' required>";
                        echo "<input type='submit' value='Delete Selected Rows'>";
                        echo "</form>";
                        }
                        else {
                            echo "0 results";
                        } 
                    }
                    else if ($_GET['DEL_OBJ'] == 'COMPETITIONTEAM') {
                        $sql = "SELECT * FROM CompetitionTeam";
                        $result = mysqli_query($connect, $sql);
                    
                        if ($result->num_rows > 0) {
                            echo "<form method='post' action='delete_data.php'>";
                            echo "<table border='1'>";
                            echo "<tr><th>CompetitionName</th><th>ClubName</th><th>Season</th></tr>";
                    
                            while ($row = $result->fetch_assoc()) {
                                $sql_clubname = "SELECT ClubName FROM Club WHERE ClubID = " . $row["ClubID"];
                                $result_club = mysqli_query($connect, $sql_clubname);
                                $row_club = mysqli_fetch_assoc($result_club);
                    
                                $sql_CompetitionName_SEASON = "SELECT CompetitionName, Season FROM Competition WHERE CompetitionID = " . $row["CompetitionID"];
                                $result_CompetitionName_SEASON = mysqli_query($connect, $sql_CompetitionName_SEASON);
                                $row_competition = mysqli_fetch_assoc($result_CompetitionName_SEASON);
                    
                                echo "<tr>";
                                echo "<td>" . $row_competition["CompetitionName"] . "</td>";
                                echo "<td>" . $row_club["ClubName"] . "</td>";
                                echo "<td>" . $row_competition["Season"] . "</td>";
                                echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row["CompetitionID"] . "'></td>";
                                echo "<td><input type='checkbox' name='delete_ids_2[]' value='" . $row["ClubID"] . "'></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "<input type='hidden' name='delete_type' value='" . $_GET["DEL_OBJ"] . "' required>";
                            echo "<input type='submit' value='Delete Selected Rows'>";
                            echo "</form>";
                        } else {
                            echo "0 results";
                        }
                    }
                    else if($_GET['DEL_OBJ'] == 'CONTRACT'){
                        $sql = "SELECT * FROM Contract";
                        $result = mysqli_query($connect, $sql);
                        if ($result->num_rows > 0) {
                        echo "<form method='post' action='delete_data.php'>";
                        echo "<table border='1'>";
                        echo "<tr><th>PlayerName</th><th>CurrentClub</th><th>PreviousClub</th><th>TransferFee</th><th>ContractStartDate</th><th>ContractEndDate</th></tr>";
                        while ($row = $result->fetch_assoc()) {

                            $sql_clubname_P = "SELECT ClubName FROM Club WHERE ClubID = " . $row["PreviousClubID"];
                            $result_club_P = mysqli_query($connect, $sql_clubname_P);
                            $row_club_P = mysqli_fetch_assoc($result_club_P);

                            $sql_clubname_C = "SELECT ClubName FROM Club WHERE ClubID = " . $row["CurrentClubID"];
                            $result_club_C = mysqli_query($connect, $sql_clubname_C);
                            $row_club_C = mysqli_fetch_assoc($result_club_C);

                            $sql_player = "SELECT Name FROM Player WHERE PlayerID = " . $row["PlayerID"];
                            $result_player = mysqli_query($connect, $sql_player);
                            $row_player = mysqli_fetch_assoc($result_player);
                    
                            echo "<tr>";
                            echo "<td>" . $row_player["Name"] . "</td>";
                            echo "<td>" . $row_club_C["ClubName"] . "</td>";
                            echo "<td>" . $row_club_P["ClubName"] . "</td>";
                            echo "<td>" . $row["TransferFee"] . "</td>";
                            echo "<td>" . $row["ContractStartDate"] . "</td>";
                            echo "<td>" . $row["ContractEndDate"] . "</td>";
                            echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row["ContractID"] . "'></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<input type='hidden' name='delete_type' value='" . $_GET["DEL_OBJ"] . "' required>";
                        echo "<input type='submit' value='Delete Selected Rows'>";
                        echo "</form>";
                        }
                        else {
                            echo "0 results";
                        } 
                    }
                    else if($_GET['DEL_OBJ'] == 'MATCHRECORD'){
                        $sql = "SELECT * FROM MatchRecord";
                        $result = mysqli_query($connect, $sql);
                        if ($result->num_rows > 0) {
                        echo "<form method='post' action='delete_data.php'>";
                        echo "<table border='1'>";
                        echo "<tr><th>PlayerName</th><th>CompetitionName</th><th>Season</th><th>Matchdate</th><th>HomeTeamName</th><th>AwayTeamName</th>
                        <th>Appearance</th><th>Goals</th><th>Assists</th><th>YellowCards</th><th>RedCards</th><th>Starting_MEM</th></tr>";
                        while ($row = $result->fetch_assoc()) {

                            $sql_clubname_H = "SELECT ClubName FROM Club WHERE ClubID = " . $row["HomeTeamID"];
                            $result_club_H = mysqli_query($connect, $sql_clubname_H);
                            $row_club_H = mysqli_fetch_assoc($result_club_H);

                            $sql_clubname_A = "SELECT ClubName FROM Club WHERE ClubID = " . $row["AwayTeamID"];
                            $result_club_A = mysqli_query($connect, $sql_clubname_A);
                            $row_club_A = mysqli_fetch_assoc($result_club_A);

                            $sql_player = "SELECT Name FROM Player WHERE PlayerID = " . $row["PlayerID"];
                            $result_player = mysqli_query($connect, $sql_player);
                            $row_player = mysqli_fetch_assoc($result_player);

                            $sql_CompetitionName_SEASON = "SELECT CompetitionName, Season FROM Competition WHERE CompetitionID = " . $row["CompetitionID"];
                            $result_CompetitionName_SEASON = mysqli_query($connect, $sql_CompetitionName_SEASON);
                            $row_competition = mysqli_fetch_assoc($result_CompetitionName_SEASON);
                    

                            echo "<tr>";
                            echo "<td>" . $row_player["Name"] . "</td>";
                            echo "<td>" . $row_competition["CompetitionName"] . "</td>";
                            echo "<td>" . $row["Matchdate"] . "</td>";
                            echo "<td>" . $row_player["Name"] . "</td>";
                            echo "<td>" . $row_club_H["ClubName"] . "</td>";
                            echo "<td>" . $row_club_A["ClubName"] . "</td>";
                            echo "<td>" . $row["Appearance"] . "</td>";
                            echo "<td>" . $row["Goals"] . "</td>";
                            echo "<td>" . $row["Assists"] . "</td>";
                            echo "<td>" . $row["YellowCards"] . "</td>";
                            echo "<td>" . $row["RedCards"] . "</td>";
                            echo "<td>" . $row["Starting_MEM"] . "</td>";
                            echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row["MatctID"] . "|" . $row["PlayerID"] . "|" . $row["CompetitionID"]. "|" . $row["Season"] . "|" .  $row["Appearance"] . "|" . $row["Goals"] . "|" . $row["Assists"] . "|" . $row["YellowCards"] . "|" . $row["RedCards"] . "|" . $row["Starting_MEM"] . "'></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<input type='hidden' name='delete_type' value='" . $_GET["DEL_OBJ"] . "' required>";
                        echo "<input type='submit' value='Delete Selected Rows'>";
                        echo "</form>";
                        }
                        else {
                            echo "0 results";
                        } 
                    }
                    else if($_GET['DEL_OBJ'] == 'STAT'){
                        $sql = "SELECT * FROM PlayerStat";
                        $result = mysqli_query($connect, $sql);
                        if ($result->num_rows > 0) {
                        echo "<form method='post' action='delete_data.php'>";
                        echo "<table border='1'>";
                        echo "<tr><th>PlayerName</th><th>CompetitionName</th><th>Season</th>
                        <th>Appearance</th><th>Goals</th><th>Assists</th><th>YellowCards</th><th>RedCards</th><th>Starting_MEM</th></tr>";
                        while ($row = $result->fetch_assoc()) {

                            $sql_player = "SELECT Name FROM Player WHERE PlayerID = " . $row["PlayerID"];
                            $result_player = mysqli_query($connect, $sql_player);
                            $row_player = mysqli_fetch_assoc($result_player);

                            $sql_CompetitionName_SEASON = "SELECT CompetitionName, Season FROM Competition WHERE CompetitionID = " . $row["CompetitionID"];
                            $result_CompetitionName_SEASON = mysqli_query($connect, $sql_CompetitionName_SEASON);
                            $row_competition = mysqli_fetch_assoc($result_CompetitionName_SEASON);
                    

                            echo "<tr>";
                            echo "<td>" . $row_player["Name"] . "</td>";
                            echo "<td>" . $row_competition["CompetitionName"] . "</td>";
                            echo "<td>" . $row_competition["Season"] . "</td>";
                            echo "<td>" . $row_player["Name"] . "</td>";
                            echo "<td>" . $row["Appearance"] . "</td>";
                            echo "<td>" . $row["Goals"] . "</td>";
                            echo "<td>" . $row["Assists"] . "</td>";
                            echo "<td>" . $row["YellowCards"] . "</td>";
                            echo "<td>" . $row["RedCards"] . "</td>";
                            echo "<td>" . $row["Starting_MEM"] . "</td>";
                            echo "<td><input type='checkbox' name='delete_ids[]' value='" . $row["PlayerStatID"] . "'></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<input type='hidden' name='delete_type' value='" . $_GET["DEL_OBJ"] . "' required>";
                        echo "<input type='submit' value='Delete Selected Rows'>";
                        echo "</form>";
                        }
                        else {
                            echo "0 results";
                        } 
                    }


                }
                else{

                }
            }else{

            }
        }else if(isset($_GET['Player'])){
            $name = $_GET['Player'];
            echo 'Player Stat<br>';
            $sql = "SELECT *  FROM Player WHERE Name = '$name';";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $Name = $row["Name"];
                $playerID = $row["PlayerID"];
                $backnumber = $row['BackNumber'];
                echo "#{$backnumber} {$Name}<br>";
                $birthdate = $row['Birthdate'];
                $age = $row['Age'];
                $gender = $row['Gender'];
                $nationality = $row['Nationality'];
                $preferFoot = $row['PreferredFoot'];
                $height = $row['Height'];
                $position = $row['Position'];
                echo "Date of birth : {$birthdate}<br>";
                echo "Age : {$age}<br>";
                echo "Gender : {$gender}<br>";
                echo "height : {$height}<br>";
                echo "citizenship : {$nationality}<br>";
                echo "position : {$position}<br>";
                echo "Main foot : {$preferFoot}<br>";
            }

            echo 'Player Contract End date';
            $sql_latest_Contract = "SELECT ContractEndDate
            FROM Contract
            WHERE PlayerID = '$playerID'
            ORDER BY ContractEndDate DESC
            LIMIT 1;";
            $latest_contract = mysqli_query( $connect, $sql_latest_Contract );
            $row_latest_contract = mysqli_fetch_assoc($latest_contract);
            $LatestContractEnddate = $row_latest_contract["ContractEndDate"];

            echo " : {$LatestContractEnddate}";

        }else{
            echo "Welcome!<br>";
            echo "Recent Transfers";
            echo '
            <table>
                <thead>
                    <tr>
                        <th>선수 이름</th>
                        <th>이전 클럽</th>
                        <th>새로운 클럽</th>
                        <th>이적료</th>
                        <th>이적 일자</th>
                    </tr>
                </thead>
                <tbody>';
        
            $sql = "SELECT Player.Name, CurrentClub.ClubName AS CurrentClubName, PreviousClub.ClubName AS PreviousClubName, Contract.TransferFee, Contract.ContractStartDate
            FROM Contract
            JOIN Club AS CurrentClub ON Contract.CurrentClubID = CurrentClub.ClubID
            JOIN Club AS PreviousClub ON Contract.PreviousClubID = PreviousClub.ClubID
            JOIN Player ON Contract.PlayerID = Player.PlayerID
            ORDER BY Contract.ContractStartDate DESC
            LIMIT 10;
            ;";
            $result = mysqli_query($connect, $sql);
        
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["PreviousClubName"] . "</td>";
                    echo "<td>" . $row["CurrentClubName"] . "</td>";
                    echo "<td>" . $row["TransferFee"] . "</td>";
                    echo "<td>" . $row["ContractStartDate"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>데이터가 없습니다.</td></tr>";
            }
        
            echo '
                </tbody>
            </table>';
        }
        ?>
    </h3>
    <?php
    if (isset($_GET["id"])) {
        if (isset($_GET["top"])) {
            if ($_GET["top"] == 'transfer') {
                echo '
                <form action="top_transfer.php" method="POST">
                    <label for="season">시즌:</label>
                    <select name="season" id="season">
                        <option value="">모든 시즌</option>';
                        $sql = "SELECT DISTINCT ContractStartDate FROM Contract";
                            $result = mysqli_query($connect, $sql);
                            $append_data =[];

                            while ($row = mysqli_fetch_assoc($result)) {
                                $startdate = $row['ContractStartDate'];
                                $year = date_parse($startdate)['year'];
                                $month = date_parse($startdate)['month'];
                                if($month >= 6){
                                    $firstseason = $year;
                                    $nextseason = ($firstseason + 1)%100;
                                    $season = "{$firstseason}/{$nextseason}";
                                }
                                else{
                                    $nextseason =$year;
                                    $firstseason = $nextseason -1;
                                    $nextseason =$year%100;
                                    $season = "{$firstseason}/{$nextseason}";
                                }
                                if (!in_array($season, $append_data)) {
                                    echo '<option value="' . $season . '">' . $season . '</option>';
                                    $append_data[] = $season;
                                }
                            }
                        
                    echo'
                    </select>
                    <label for="citizenship">국적:</label>
                    <select name="citizenship" id="citizenship">
                        <option value="">모든 국적</option>';
                        $sql = "SELECT DISTINCT Nationality FROM Player";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $Nationality = $row['Nationality'];
                                echo '<option value="' . $Nationality . '">' . $Nationality . '</option>';
                            }
                    echo'
                    </select>
                    <label for "position">포지션:</label>
                    <select name="position" id="position">
                        <option value="">모든 포지션</option>';
                        $sql = "SELECT DISTINCT Position FROM Player";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $Position = $row['Position'];
                                echo '<option value="' . $Position . '">' . $Position . '</option>';
                            }
                    echo'
                    </select>
                    <label for="age">나이:</label>
                    <select name="age" id="age">
                        <option value="">모든 나이</option>';
                        $sql = "SELECT DISTINCT Age FROM Player";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $Age = $row['Age'];
                                echo '<option value="' . $Age . '">' . $Age . '</option>';
                            }
                    echo'
                    </select>
                    <input type="hidden" name="add_type" value="top-transfer" required>
                    <button type="submit">검색</button>
                </form>';
                if (isset($_SESSION['ranks'])) {
                    $ranks = $_SESSION['ranks'];
                    echo '
                    <table>
                        <thead>
                            <tr>
                                <th>랭킹</th>
                                <th>선수 이름</th>
                                <th>선수 나이</th>
                                <th>국적</th>
                                <th>현 소속팀</th>
                                <th>이적료</th>
                            </tr>
                        </thead>
                        <tbody>';
                    foreach($ranks as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["RANK"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["Age"] . "</td>";
                            echo "<td>" . $row["Nationality"] . "</td>";
                            echo "<td>" . $row["ClubName"] . "</td>";
                            echo "<td>" . $row["Transferfee"] . "</td>";
                            echo "</tr>";
                        }
                }
                else {

                }

                
            } else if($_GET["top"] == 'income-expenditure') {
                echo '
                <form action="top_transfer.php" method="POST">
                    <label for="period_from">기간:</label>from
                    <select name="period_from" id="period_from">
                        <option value="ALL">모든 기간</option>';
                        $sql = "SELECT DISTINCT ContractStartDate FROM Contract";
                        $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $startdate = $row['ContractStartDate'];
                                $year = date_parse($startdate)['year'];
                                $month = date_parse($startdate)['month'];
                                if($month >= 6){
                                    $firstseason = $year;
                                    $nextseason = ($firstseason + 1)%100;
                                    $season = "{$firstseason}/{$nextseason}";
                                }
                                else{
                                    $nextseason =$year;
                                    $firstseason = $nextseason -1;
                                    $nextseason =$year%100;
                                    $season = "{$firstseason}/{$nextseason}";
                                }
                                echo '<option value="' . $season . '">' . $season . '</option>';
                            }
                        echo'
                    </select>
                    to
                    <select name="period_to" id="period_to">
                        <option value="ALL">모든 기간</option>';
                        $sql = "SELECT DISTINCT ContractStartDate FROM Contract";
                        $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $startdate = $row['ContractStartDate'];
                                $year = date_parse($startdate)['year'];
                                $month = date_parse($startdate)['month'];
                                if($month >= 6){
                                    $firstseason = $year;
                                    $nextseason = ($firstseason + 1)%100;
                                    $season = "{$firstseason}/{$nextseason}";
                                }
                                else{
                                    $nextseason =$year;
                                    $firstseason = $nextseason -1;
                                    $nextseason =$year%100;
                                    $season = "{$firstseason}/{$nextseason}";
                                }
                                echo '<option value="' . $season . '">' . $season . '</option>';
                            }
                        echo'
                    </select>

                    <label for="country">소속 국가:</label>
                    <select name="country" id="country">
                        <option value="">모든 소속 국가</option>';
    
                        $sql = "SELECT DISTINCT Country FROM Club";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $country = $row['Country'];
                                echo '<option value="' . $country . '">' . $country . '</option>';
                            }
                    echo'
                    </select>
                    <label for "position">포지션:</label>
                    <select name="position" id="position">
                        <option value="">모든 포지션</option>';
    
                        $sql = "SELECT DISTINCT Position FROM Player";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $Position = $row['Position'];
                                echo '<option value="' . $Position . '">' . $Position . '</option>';
                            }
                    echo'
                    </select>
                    <label for="age">나이:</label>
                    <select name="age" id="age">
                        <option value="">모든 나이</option>';
    
                        $sql = "SELECT DISTINCT Age FROM Player";
                            $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $age = $row['Age'];
                                echo '<option value="' . $age . '">' . $age . '</option>';
                            }
                    echo'
                    </select>
                    <label for="sorting">정렬 기준:</label>
                    <select name="sorting" id="sorting">
                        <option value="Income">Income</option>
                        <option value="Expenditure">Expenditure</option>
                    </select>
                    <input type="hidden" name="add_type" value="income-expenditure" required>
                    <button type="submit">검색</button>
                </form>';
                if (isset($_SESSION['ranks_income_Expenditure'])) {
                    $ranks1 = $_SESSION['ranks_income_Expenditure'];
                    echo '
                    <table>
                        <thead>
                            <tr>
                                <th>랭킹</th>
                                <th>클럽 이름</th>
                                <th>지출</th>
                                <th>수입</th>
                                <th>balance</th>
                            </tr>
                        </thead>
                        <tbody>';
                    foreach($ranks1 as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["RANK"] . "</td>";
                            echo "<td>" . $row["ClubName"] . "</td>";
                            echo "<td>" . $row["TotalExpenditure"] . "</td>";
                            echo "<td>" . $row["TotalIncome"] . "</td>";
                            echo "<td>" . $row["Balance"] . "</td>";
                            echo "</tr>";
                        }
                }
                else {

                }

            }else if($_GET["top"] == 'goal_assist'){
                echo '
                <form action="top_transfer.php" method="POST">
                    <label for="season">시즌:</label>
                    <select name="season" id="season">
                        <option value="">선택하세요</option>';
                        $sql = "SELECT DISTINCT Season FROM PlayerStat";
                        $result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $season = $row['Season'];
                                echo '<option value="' . $season . '">' . $season . '</option>';
                            }
                            
                        echo'
                    </select>
                    <label for="citizenship">국적:</label>
                    <select name="citizenship" id="citizenship">
                        <option value="">선택하시오</option>';
                        $sql = "SELECT DISTINCT Player.Nationality
                        FROM PlayerStat
                        JOIN Player ON PlayerStat.PlayerID = Player.PlayerID;
                        ;";
                        $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $Nationality = $row['Nationality'];
                                echo '<option value="' . $Nationality . '">' . $Nationality . '</option>';
                            }
                        echo'
                    </select>
                    <label for "position">포지션:</label>
                    <select name="position" id="position">
                        <option value="">선택하시오</option>';
                        $sql = "SELECT DISTINCT Player.Position
                        FROM PlayerStat
                        JOIN Player ON PlayerStat.PlayerID = Player.PlayerID;";
                        $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $position = $row['Position'];
                                echo '<option value="' . $position . '">' . $position . '</option>';
                            }
                        echo'
                    </select>

                    <label for="competition">리그/토너먼트:</label>
                    <select name="competition" id="competition">
                        <option value="">선택하시오</option>';
                        $sql = "SELECT DISTINCT CompetitionName
                            FROM PlayerStat
                            JOIN Competition ON PlayerStat.CompetitionID = Competition.CompetitionID;";
                        $result = mysqli_query($connect, $sql);
    
                            while ($row = mysqli_fetch_assoc($result)) {
                                $name = $row['CompetitionName'];
                                echo '<option value="' . $name . '">' . $name . '</option>';
                            }
                            
                        echo'
                    </select>
                    <label for="sorting">정렬 기준:</label>
                    <select name="sorting" id="sorting">
                        <option value="">선택하시오</option>
                        <option value="goal">goal</option>
                        <option value="assist">assist</option>
                    </select>
                    <input type="hidden" name="add_type" value="goal_assist" required>

                    <button type="submit">검색</button>
                </form>';
                if (isset($_SESSION['ranks_goal_assist'])) {
                    $ranks1 = $_SESSION['ranks_goal_assist'];
                    echo '
                    <table>
                        <thead>
                            <tr>
                                <th>랭킹</th>
                                <th>선수</th>
                                <th>나이</th>
                                <th>국적</th>
                                <th>리그</th>
                                <th>골 수</th>
                                <th>어시스트 수</th>
                                <th>공격 포인트</th>
                            </tr>
                        </thead>
                        <tbody>';
                    foreach($ranks1 as $row) {
                            echo "<tr>";
                            echo "<td>" . $row["RANK"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["Age"] . "</td>";
                            echo "<td>" . $row["Nationality"] . "</td>";
                            echo "<td>" . $row["CompetitionName"] . "</td>";
                            echo "<td>" . $row["Goals"] . "</td>";
                            echo "<td>" . $row["Assists"] . "</td>";
                            echo "<td>" . $row["AttackPoints"] . "</td>";
                            echo "</tr>";
                        }
                }
            }else{
                echo "<tr><td colspan='5'>데이터가 없습니다.</td></tr>";
            }
        }
        else {
           
        }
    } 
    else if(isset($_GET['Player'])){
        $name = $_GET['Player'];
        $sql = "SELECT *  FROM Player WHERE Name = '$name';";
        $result = mysqli_query($connect, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $player_id = $row['PlayerID'];
        }
        echo ' <form action="top_transfer.php" method="POST">
        <label for="competition">참가 대회:</label>
        <select name="competition" id="competition">
            <option value="">선택하세요</option>';
            $sql = "SELECT DISTINCT CompetitionName FROM PlayerStat
            JOIN Competition ON PlayerStat.CompetitionID = Competition.CompetitionID
            WHERE PlayerID = {$player_id}
            ;";
            $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $competition = $row['CompetitionName'];
                    echo '<option value="' . $competition . '">' . $competition . '</option>';
                }
                
            echo'
        </select>
        <label for="season">시즌:</label>
        <select name="season" id="season">
            <option value="">선택하세요</option>';
            $sql = "SELECT DISTINCT Season FROM PlayerStat WHERE PlayerID = {$player_id};";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $season = $row['Season'];
                echo '<option value="' . $season . '">' . $season . '</option>';
            }
            echo'
        </select>
        <input type="hidden" name="add_type" value="player" required>
        <input type="hidden" name="player_id" value="'.$player_id.' "required>
        <input type="hidden" name="name" value="'.$name.' "required>
        <button type="submit">검색</button>
        </form>
        ';
        if (isset($_SESSION['stats'])) {
            $stats = $_SESSION['stats'];
            foreach($stats as $row) {
                echo "GOAL : " ; echo $row["Goals"] ; 
                echo "<br>Assists : " ; echo $row["Assists"] ;
                echo "<br>Starting_MEM : " ; echo $row["Starting_MEM"];
                echo "<br>Appearance : " ; echo $row["Appearance"];
                echo "<br>YellowCards : " ; echo $row["YellowCards"] ;
                echo "<br>RedCards : " ; echo $row["RedCards"] ;            
            }
        }


    }
    else {
       
    }

    
    ?>
</body>
</html>