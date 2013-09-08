<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name'] != "") {
  $sessionStarted = true;
  $name = $_SESSION['name'];
} else {
  $sessionStarted = false;
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./mobile.css" />
<script src="./jquery.js"></script>
<script src="./Chart.min.js"></script>
<script src="./mobile.js"></script>
<meta charset="utf-8" />
</head>
<body onLoad="onCreate();">

<div data-url="demo-page" data-role="page" id="demo-page" data-theme="d">
    <div data-role="header" data-theme="c">
        <h1>Open Quiz</h1>
        <button onClick="neustarten();">Quiz neu starten</button>

    </div><!-- /header -->
    <div data-role="content" id="cont">
        <div class="article">
            <h2 id="frage">Hier sollte die question stehen</h2>
	    <hr>
            <button class="answer" data-answer="1"><p id="a">Antwort A</p></button>
	    	<button class="answer" data-answer="2"><p id="b">Antwort B</p></button>
            <button class="answer" data-answer="3"><p id="c">Antwort C</p></button>


            
        </div><!-- /article -->
    </div><!-- /content -->
    <div data-role="panel" id="left-panel" data-theme="c">
        <ul data-role="listview" data-theme="d">
            <li data-icon="delete"><a href="#" data-rel="close">Schlie&szlig;en</a></li>
            <li data-role="list-divider">Menu</li>
            
        </ul>
        

    </div>
</div>
<script type="text/javascript">

    name = "<?php if(isset($_SESSION['name'])) {echo $_SESSION['name']; } ?>";
	var index = 0;
	var frageng;
	var richtig = 0;
	var falsch = 0;

	function onCreate()
	{
		<?php 
			if($sessionStarted == false) {
				echo "showNameInterface();";
			} else {
				echo "setDefaultText();";
			}
		?>
	}

	function setDefaultText()
	{  


		frageng = [
	{
		"question": "Wieviele Bundesländer hat Deutschland?",
		"answer1": "15",
		"answer2": "16",
		"answer3": "13",
		"rightAnswer": "2"
	},
	{
		"question": "Wie Dicht ist Deutschland besiedelt? (Einwohner/km*2)",
		"answer1": "225",
		"answer2": "140",
		"answer3": "310",
		"rightAnswer": "1"
	},
	{
		"question": "Wie groß ist das Bruttoinlandsprodukt Deutschlands? (in Mrd. USD)",
		"answer1": "5630",
		"answer2": "3099",
		"answer3": "3577",
		"rightAnswer": "3"
	},
	{
		"question": "Wie viel Geld bekommt die Bundeswehr im Jahr vom Staat? (in Mrd. Euro)",
		"answer1": "20,43",
		"answer2": "33,26",
		"answer3": "30,4",
		"rightAnswer": "2"
	},
	{
		"question": "Um wieviel % hob Bush das Militäretat der USA nach dem 11. September? (bis 2012)",
		"answer1": "63,32",
		"answer2": "321,43",
		"answer3": "176,11",
		"rightAnswer": "2"
	},
	{
		"question": "Wie viele Christen gibt es weltweit? (in Mrd)",
		"answer1": "2,26",
		"answer2": "1,57",
		"answer3": "3,43",
		"rightAnswer": "1"
	},
	{
		"question": "Wie viel verdient Angela Merkel jährlich? (in Euro)",
		"answer1": "261500",
		"answer2": "341000",
		"answer3": "120600",
		"rightAnswer": "1"
	}
]
		console.log('hallo');
		hmm();
		//$.getJSON('http://172.31.1.104/jquery/server.php?device=client', function(fragen) {
		//	frageng = fragen;
		//	hmm();
		//});
	}	
		

	function neustarten()
	{
		richtig = 0;
		falsch = 0;
		index = 0;
		hmm();
	}	
	
	function hmm()
	{
			$('#frage').html(frageng[index].question);
			$('#a').html(frageng[index].answer1);
			$('#b').html(frageng[index].answer2);
			$('#c').html(frageng[index].answer3);
	}
	
	$('.answer').on('click', function() {
		var buttonstate = $(this).data('answer');
		if(buttonstate == frageng[index].rightAnswer)
		{
			richtig++;
		}
		else
		{
			falsch++;
		}

		index++;


		if(index <= frageng.length-1)
		{
			hmm();	
		}
		else
		{
			$('#cont').replaceWith('<canvas id="graphen" width="500" height="400"></canvas>');
			graph();
			sendResponse();
		}
	})

	function showNameInterface()
	{
		$('#cont').replaceWith('<form action="login.php" method="POST"><h2>Dein Name:</h2><br><input type="text" name="name" id="namefield"/><br><input type="submit"></button></form>');
	}

	function sendResponse()
	{
		$.post("http://172.31.1.218/server.php?device=client&action=sendAnswers", {"name" : name,
																					"rightAnswers" : richtig,
																				"wrongAnswers": falsch})
	}

</script>
<script type="text/javascript">

function graph()
{

	var data = {
		labels : ["Richtig","Falsch"],
		datasets : [
			{
				fillColor : "rgba(0,250,0,0.5)",
				//strokeColor : "rgba(250,50,0,1)",
				data : [richtig,""]
			},
			{			
				fillColor : "rgba(255,102,51,1)",
				//strokeColor : "rgba(250,50,0,1)",
				data : ["",falsch]
			}
		]
	}

		var options = {
				//Boolean - If we want to override with a hard coded scale
	scaleOverride : true,
	
	//** Required if scaleOverride is true **
	//Number - The number of steps in a hard coded scale
	scaleSteps : frageng.length-1,
	//Number - The value jump in the hard coded scale
	scaleStepWidth : 1,
	//Number - The scale starting value
	scaleStartValue : 0,

		}
		var ctx = $("#graphen").get(0).getContext("2d");
		new Chart(ctx).Bar(data,options);
}


</script>
</body>
</html>