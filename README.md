# Chaos Server

A server returning http responses according to a "chaos mode". Each mode has a different chance of returning some http response status(200, 401, 500 etc).
The server can be accesed using the /response endpoint.
A test.php page has been added for calling the server endpoint 100 times and displaying the actual percentages of the https response statuses returned from the server. The user needs to select one of the mode buttons to initiate the process.

## Getting Started

Deploy the chaos directory and access the test.php file

### Configuration

The button names and percentages are read from a json file named buttonsConfig.json. You can configure the 3 button names and return statuses accordingly.

``` 
Example of a buttonsConfig.json file
{
	"normal": {
		"200":100
	},
	"degraded": {
		"201":95,
		"202": 5
	},
	"Failure": {
		"200": 40,
		"201": 40,
		"500": 10,
		"501": 10
	}
}


