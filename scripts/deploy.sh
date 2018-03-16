AZ_REPO=$(lsb_release -cs)
echo "deb [arch=amd64] https://packages.microsoft.com/repos/azure-cli/ $AZ_REPO main" | \
     sudo tee /etc/apt/sources.list.d/azure-cli.list
sudo apt-key adv --keyserver packages.microsoft.com --recv-keys 52E16F86FEE04B979B07E28DB02C46DF417A0893
sudo apt-get install apt-transport-https
sudo apt-get update && sudo apt-get install azure-cli
az login --service-principal -u $AZURE_USERNAME -p $AZURE_PASSWORD --tenant $AZURE_TENANT_ID
az container create --resource-group MSAzure-ACIAKS-CICD-Demo --name CICD-Demo --image microsoft/aci-helloworld --dns-name-label aci-cicd-demo --ports 80