<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  require_once 'header.php'; ?>
<?php
require_once 'inc/manager-db.php';
if (isset($_GET['continent'])){
  $continent = $_GET['continent'];} else {
    $continent = 'Asia';
  }
$desPays = getCountriesByContinent($continent);
?> 
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1>Les pays en <?php echo $continent;?></h1>
    <div>
    <p> nombre total de ville : <?php echo getNBVilles() ?></p>
     <table class="table">
         <tr>
           <th>Drapeau</th>
           <th>Nom</th>
           <th>Population</th>
           <th>Region</th>
           <th>Capital</th>
           <th>language</th>
           <th>Continent</th>
         </tr>
          <?php foreach ($desPays as $paysContinent): ?>         
            <tr>
              <td> <img src ="./images/drapeau/<?php echo strtolower($paysContinent -> Code2);?>.png"></td>
              <td> <?php echo $paysContinent->Name ?></td>
              <td> <?php echo $paysContinent->Population ?></td>
              <td> <?php echo $paysContinent->Region ?></td>
              <td> <?php if(!empty($paysContinent->Capital)){echo getCapitale($paysContinent->Capital);}else{echo"pas de capital";} ?></td>
              <td> <?php if(!empty($paysContinent->id)){echo language($paysContinent->id);}else{echo"pas de langue officiel";} ?></td>
              <td> <?php echo $paysContinent->Continent ?></td> 
            </tr>
            <?php endforeach; ?>
     </table>
    </div>
  </div>
</main>
<?php
require_once 'javascripts.php';
require_once 'footer.php';
?>
