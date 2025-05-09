mkdir tmp-openapi
cp .openapi-generator-ignore ./tmp-openapi

openapi-generator-cli generate -g php -c openapi_generator_config.json -i ./tatrapayplus_api_sandbox.json -o ./tmp-openapi

echo "Backing up existing Model files..."
rm -rf ./lib/ModelBackup
cp -R ./lib/Model ./lib/ModelBackup
echo "Backup done"
rm -rf ./lib/Model
echo "Removed existing Model files"

echo "Copying generated Model files to repo files..."
cp -R ./tmp-openapi/lib/Model ./lib/
echo "Copying finished"
rm -rf ./tmp-openapi

echo "Adding custom Model classes from backup..."
cp ./lib/ModelBackup/TokenSuccessResponseType.php ./lib/Model
cp ./lib/ModelBackup/QRStatus.php ./lib/Model
cp ./lib/ModelBackup/PaymentMethodRules.php ./lib/Model

echo "********************************"
echo "Verify new Model files by running tests -> phpunit --bootstrap vendor/autoload.php tests/tests.php"
echo "Ensure env variables TATRAPAY_CLIENT_ID and TATRAPAY_CLIENT_SECRET are set before running tests"
echo "If successful, remove old Model files backup (dir ./lib/ModelBackup)"

# to revert back to old Model files
# rm -rf ./lib/Model
# cp -R ./lib/ModelBackup ./lib/Model