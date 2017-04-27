<?php
include("con.php");

$result = $_GET[emotion];
//echo $result;
//$result = '{ "faceRectangle": { "left": 1235, "top": 525, "width": 677, "height": 677 }, "scores": { "anger": 0.1022928, "contempt": 0.579521, "disgust": 0.2233283, "fear": 0.000002794455, "happiness": 0.00103985844, "neutral": 0.09139749, "sadness": 0.00239139958, "surprise": 0.0000263756556 } } ';
$array = json_decode($result, true);

$anger = $array['scores']['anger'];
$contempt = $array['scores']['contempt'];
$disgust = $array['scores']['disgust'];
$fear = $array['scores']['fear'];
$happiness = $array['scores']['happiness'];
$neutral = $array['scores']['neutral'];
$sadness = $array['scores']['sadness'];
$surprise = $array['scores']['surprise'];


 if (mysqli_connect_errno($con))
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
     $sql = "INSERT INTO Emotions ('anger', 'contempt','disgust','fear','happiness','neutral','sadness','surprise')
    VALUES
    ('$anger','$contempt','$disgust','$fear','$happiness','$neutral','$sadness','$surprise')";
    if (!mysqli_query($con,$sql))
      {
      die('Error: ' . mysqli_error($con));
      }
    echo "1 record added";
    mysqli_close($con);
?>