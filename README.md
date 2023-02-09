# Tideways example

This is an example PHP application with [Tideways](https://tideways.com/) set up.

Read the documentation at [bref.sh/docs/monitoring.html#tideways](https://bref.sh/docs/monitoring.html#tideways).

This example deploys:

- a simple example PHP application (`index.php`)
- a VPC (virtual private network) using the [serverless-vpc-plugin](https://github.com/smoketurner/serverless-vpc-plugin)
- an EC2 instance (Tideways daemon) inside the VPC via embedded CloudFormation code

all that from `serverless.yml`. That makes `serverless.yml` a bit verbose, but everything is deployed at once, automatically configured.

You don't have to deploy the VPC and the EC2 from `serverless.yml`. You can also create them manually via the AWS console if you prefer (for example to reuse them between environments or projects). Check out the documentation at [bref.sh/docs/monitoring.html#tideways](https://bref.sh/docs/monitoring.html#tideways) to learn more.

## Deployment

Clone this project and install Composer and NPM dependencies:

```bash
composer install
npm install
```

Edit `serverless.yml` to set your `TIDEWAYS_APIKEY` (or set it as an environment variable on your machine).

If you wish to deploy to a different region than the one set in `serverless.yml`, update the `provider.region` field as well as the `ImageId` field in the `TidewaysDaemon` section: you can find out the AMI ID (aka image ID) for your preferred region [on this page](https://github.com/tideways/tideways-daemon-ami#readme).

Then, deploy the application:

```bash
serverless deploy
```

The URL of the deployed application will be displayed in the terminal. Open the URL and wait a few minutes until the metrics show up at [app.tideways.io](https://app.tideways.io/).
