<!DOCTYPE html>
<html>
<head>
	<title>피자 입력 만들기!</title>
</head>
<body>
	<h1>재료 입력</h1>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>재료1:</label>
		<input type="foo1" name="foo1" required><br><br>
		<label>재료1은 얼마나?:</label>
		<input type="foo1num" name="foo1num" required><br><br>
		
		<label>재료2:</label>
		<input type="foo2" name="foo2" required><br><br>
		<label>재료2은 얼마나?:</label>
		<input type="foo2num" name="foo2num" required><br><br>

		
        <label>재료3:</label>
		<input type="foo3" name="foo3" required><br><br>
		<label>재료3은 얼마나?:</label>
		<input type="foo3num" name="foo3num" required><br><br>


		<label>재료4:</label>
		<input type="foo4" name="foo4" required><br><br>
		<label>재료4은 얼마나?:</label>
		<input type="foo4num" name="foo4num" required><br><br>

		<label>재료5:</label>
		<input type="foo5" name="foo5" required><br><br>
		<label>재료5은 얼마나?:</label>
		<input type="foo5num" name="foo5num" required><br><br>


		<input type="submit" value="출력">
	</form>
	<?php
	// 폼이 제출되면 회원 정보를 처리하는 코드
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 데이터베이스 연결
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pizza";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// 재료 가져오기
		$foo1 = $_POST["foo1"];
		$foo2 = $_POST["foo2"];
        $foo3 = $_POST["foo3"];
		$foo4 = $_POST["foo4"];
		$foo5 = $_POST["foo5"];
        // 재료숫자 가져오기
		$foo1num = $_POST["foo1num"];
		$foo2num = $_POST["foo2num"];
        $foo3num = $_POST["foo3num"];
		$foo4num = $_POST["foo4num"];
		$foo5num = $_POST["foo5num"];

		// SQL 쿼리 실행
		$sql = "TRUNCATE ingredient";//재료 초기화
		if ($conn->query($sql) === TRUE) {
			echo "재료 초기화 완료.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$sql = "INSERT INTO ingredient (in1,in2,in3,in4,in5,in1num,in2num,in3num,in4num,in5num) VALUES ('$foo1', '$foo2','$foo3','$foo4','$foo5','$foo1num', '$foo2num','$foo3num','$foo4num','$foo5num')";// 재료 새로 넣기
		if ($conn->query($sql) === TRUE) {
			echo "재료 넣기 완료.";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
		
		echo("<script>location.replace('./showPizaaChart.php');</script>");
	}
	?>
</body>
</html>
