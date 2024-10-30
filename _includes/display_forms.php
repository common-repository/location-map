<?php
include_once("../../../../wp-config.php");
include_once("locations.class.php");
$loc = new location();

$output = "";
if(isset($_GET['add'])){
$status = "add";
$output .= displayForm($status, null);
} 

if(isset($_GET['update']) && isset($_GET['id'])){
$status = "update";
$id = $_GET['id'];
$output .= displayForm($status, $id);
}
echo $output;

function displayForm($a, $id) {
global $loc;
	if($a == "update"){
	$sql = "SELECT * FROM wp_location WHERE `id`='$id' LIMIT 1";
	$result = mysql_query($sql) or die(mysql_error());
	$e = mysql_fetch_assoc($result);
}
?>
<form id="regForm">
<table>
	<tr>
		<td><label for="managerName">Manager:</label></td>
    	<td><input type="text" name="managerName" id="managerName"<?php if($a=="update"){echo "value='".$e['manager']."'";}?> size="15" /></td>
	</tr>
    <tr>
    	<td><label for="email">Email Address:</label></td>
    	<td><input type="text" name="email" id="email" <?php if($a=="update"){echo "value='".$e['email']."'";}?>size="15" /></td>
    </tr>
    <tr>
    	<td><label for="position">Position:</label></td>
    	<td><input type="text" name="position" id="position" <?php if($a=="update"){echo "value='".$e['position']."'";}?>size="15" /></td>
	</tr>
    <tr>
    	<td><label for="branchName">Branch:</label></td>
    	<td><input type="text" name="branchName" id="branchName" <?php if($a=="update"){echo "value='".$e['branch_name']."'";}?>size="15" /></td>
	</tr>
	<tr>
    	<td><label for="address">Address:</label></td>
    	<td><input type="text" name="address" id="address" size="15" <?php if($a=="update"){echo "value='".$e['address']."'";}?> /></td>
	</tr>
	<tr>
    	<td><label for="city">City:</label></td>
    	<td><input type="text" name="city" id="city" <?php if($a=="update"){echo "value='".$e['city']."'";}?>size="15" /></td>
    </tr>
    <tr>   
    	<td><label for="state">State:</label></td>
		<td><select name="state" id="state" size="1">
        	<?php if($a =="update"){
			echo "<option value='".$e['state']."' SELECTED>";
			echo $loc->getStateName($e['state']);
			echo "</option>";
			}?>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">Dist of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
        </select></td>
	</tr>
	<tr>
		<td><label for="zipCode">Zip Code:</label></td>
		<td><input type="text" name="zipCode" id="zipCode" <?php if($a=="update"){echo "value='".$e['zip']."'";}?> size="10" /></td>
	</tr>
    <tr>
		<td><label for="phone">Phone Number:</label></td>
		<td><input type="text" name="phone" id="phone" <?php if($a=="update"){echo "value='".$e['phone']."'";}?> size="10" /></td>
	</tr>
    </table>
		<?php if($a == "add"){ echo "<input type='button' value='Add Location' id='btn_addLocation' onclick='addLocation();' />";} else { echo "<input type='button' value='Update Location' id='btn_updateLocation' onclick='updateLocation($id);' />";} ?>
        <input type='reset' value='Reset Form' />
        <?php if($a == "update"){ echo "<input type='button' value='Delete' onclick='deleteLocation($id);' />";} ?>
   
  
</form>
<?php 
}

?>