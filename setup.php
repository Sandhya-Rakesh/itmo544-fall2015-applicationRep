<?php
// Start the session
require 'vendor/autoload.php';

$rds = new Aws\Rds\RdsClient([
    'version' => 'latest',
    'region'  => 'us-west-2'
]);

$result = $rds->createDBInstance([
    'AllocatedStorage' => 10,
    'DBInstanceClass' => 'db.t2.micro', // REQUIRED
    'DBInstanceIdentifier' => 'mp1-sg', // REQUIRED
    'DBName' => 'customerrecords',
    'Engine' => 'MySQL', // REQUIRED
    'EngineVersion' => '5.6.23',
    'MasterUsername' => 'sandhyagupta',
    'MasterUserPassword' => 'sandhya987',   
    'PubliclyAccessible' => true,
    #'VpcSecurityGroupIds' => ['<string>', ...],
]);

#Create DB Instance Read Replica

print "Create RDS DB results: \n";
# print_r($rds);

$result = $rds->waitUntil('DBInstanceAvailable',['DBInstanceIdentifier' => 'mp1-sg',]);

// Create a table 
$result = $rds->describeDBInstances([
    'DBInstanceIdentifier' => 'mp1-sg',
]);

$endpoint = $result['DBInstances'][0]['Endpoint']['Address'];
print "============\n". $endpoint . "================\n";

$link = mysqli_connect($endpoint,"sandhyagupta","sandhya987","3306") or die("Error " . mysqli_error($link)); 
echo "Here is the result: " . $link;

$create_table = 'CREATE TABLE IF NOT EXISTS userdetails  
(
    id INT NOT NULL AUTO_INCREMENT,
    uname VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    s3rawurl VARCHAR(255) NOT NULL,
    s3finishedurl VARCHAR(255) NOT NULL,    
    jpgfilename VARCHAR(255) NOT NULL,	
    status INT NOT NULL,
    createdat DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
)';

$con->query($sql);

?>

