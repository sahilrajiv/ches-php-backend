<?

$p_title = 'Leaderboard | Eureka';

include('./header.php');

require('mysqli_connect.php');

?>



    <!-- Breadcrumb Area Start -->

    <section class="breadcrumb-area bg-img bg-gradient-overlay jarallax" style="background-image: url(img/bg-img/37.jpg);">

        <div class="container h-100">

            <div class="row h-100 align-items-center">

                <div class="col-12">

                    <div class="breadcrumb-content">

                        <h2 class="page-title">Leaderboard</h2>

                       

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Breadcrumb Area End -->

	





	<section class="our-schedule-area bg-white section-padding-100">

        <div class="container">

            <div class="row">

                <div class="col-12">

                   

	





 <div class="tab-content" id="conferScheduleTabContent">

                        <div class="tab-pane fade show active" >
<p>Each week's score is out of 50. </p>
                    
             <!--   <? 

$d = mysqli_query($dbc,"SELECT * FROM eureka2020 ORDER BY score DESC");


$q= mysqli_query($dbc,"SELECT * FROM `eureka2020_score`");




if ($d === false) {
die(mysqli_error($dbc));
}

if ($q === false) {
die(mysqli_error($dbc));
}

$score = mysqli_fetch_all($d, MYSQLI_ASSOC);
?>

<table class="table table-bordered table-striped">
<thead class="thead-dark">
<tr>
<th scope="col">Team ID</th>
<th scope="col">Team Name</th>
<th scope="col">Week 1</th>
</tr>
</thead>
<tbody>
<?php foreach ($score as $key => $s) : ?>

<?php if ($key === 0 ) {
    continue;
}
?>
<?php if($key === 1 || $key === 2 ||  $key === 3 ):
?>
<tr class="table-success">
<th scope="row"> <? echo $s["team_id"];?>
</th>
<td> <? echo $s["team_name"];?>
</td>
<td> <? echo $s["score"];?>
</td>
</tr>
<?php endif; ?>
<?php if($key>=4):
?>
<tr>
<th scope="row"> <? echo $s["team_id"];?>
</th>
<td> <? echo $s["team_name"];?>
</td>
<td> <? echo $s["score"];?>
</td>
</tr>
<?php endif; ?>
<?php endforeach ?>
</tbody>
</table>
-->

<style type="text/css">
	table.tableizer-table {
		font-size: 16px;
		border: 1px solid #CCC; 
		font-family: Arial, Helvetica, sans-serif;
	} 
	.tableizer-table td {
		padding: 4px;
		margin: 3px;
		border: 1px solid #CCC;
	}
	.tableizer-table th {
		background-color: #104E8B; 
		color: #FFF;
		font-weight: bold;
	}
</style>
<style type="text/css">
	table.tableizer-table {
		font-size: 16px;
		border: 1px solid #CCC; 
		font-family: Arial, Helvetica, sans-serif;
padding:50px;
	} 
	.tableizer-table td {
		padding: 20px;
		margin: 3px;
		border: 1px solid #CCC;
	}
	.tableizer-table th {
		background-color: #104E8B; 
		color: #FFF;
		font-weight: bold;
padding: 20px;
		margin: 3px;

	}
</style>
<table class="tableizer-table">
<thead><tr class="tableizer-firstrow"><th>Team ID</th><th>Team Name</th><th>Week 1</th><th>Week 2</th><th>Week 3</th><th>WEEK 4 </th><th>Total</th></tr></thead><tbody>
 <tr><td>EU20_1</td><td>Team Troubleshooters</td><td>46</td><td>47</td><td>47</td><td>47</td><td>187</td></tr>
 <tr><td>EU20_2</td><td>Chanakya Bois</td><td>46</td><td>43</td><td>47</td><td>46</td><td>182</td></tr>
 <tr><td>EU20_3</td><td>Penelitian</td><td>47</td><td>46</td><td>46</td><td>48</td><td>187</td></tr>
 <tr><td>EU20_4</td><td>Filter challengers</td><td>48</td><td>48</td><td>48</td><td>44</td><td>188</td></tr>
 <tr><td>EU20_5</td><td>Water Heist</td><td>47</td><td>44</td><td>42</td><td>46</td><td>179</td></tr>
 <tr><td>EU20_6</td><td>detective Pikachus</td><td>45</td><td>49</td><td>49</td><td>35</td><td>178</td></tr>
 <tr><td>EU20_7</td><td>Team Waves</td><td>45</td><td>45</td><td>38</td><td>45</td><td>173</td></tr>
 <tr><td>EU20_9</td><td>Vac-o-maniacs</td><td>45</td><td>46</td><td>45</td><td>47</td><td>183</td></tr>
 <tr><td>EU20_10</td><td>Ignited flarians</td><td>47</td><td>44</td><td>46</td><td>46</td><td>183</td></tr>
 <tr><td>EU20_11</td><td>Reflux and Chill</td><td>45</td><td>45</td><td>36</td><td>30</td><td>156</td></tr>
 <tr><td>EU20_12</td><td>HigH On PressurE</td><td>45</td><td>45</td><td>48</td><td>42</td><td>180</td></tr>
 <tr><td>EU20_13</td><td>MFC</td><td>45</td><td>44</td><td>48</td><td>48</td><td>185</td></tr>
 <tr><td>EU20_14</td><td>cO-sYN-oL</td><td>44</td><td>35</td><td>43</td><td>46</td><td>168</td></tr>
 <tr><td>EU20_15</td><td>Plastipsychics</td><td>46</td><td>45</td><td>47</td><td>46</td><td>184</td></tr>
 <tr><td>EU20_16</td><td>ARAMIDES</td><td>48</td><td>37</td><td>38</td><td>48</td><td>171</td></tr>
 <tr><td>EU20_17</td><td>Team MSMV</td><td>48</td><td>45</td><td>37</td><td>40</td><td>170</td></tr>
 <tr><td>EU20_18</td><td>Eco-Analyser</td><td>49</td><td>34</td><td>36</td><td>20</td><td>139</td></tr>
</tbody></table>     			</div>

              </div>

        </div> 

  </div>









    </div>

            </div>

        </div>

    </section>



                         

<?

include('footer.php');

?>